<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity', 'subtotal');
    }

    public function customerWithTrashed()
    {
        return $this->belongsTo(Customer::class, 'customer_id')->withTrashed();
    }

    public function insertProducts($cart, $user)
    {
        $total = 0;
        $totalPoints = 0;

        foreach ($cart as $c) {
            $product = Product::find($c['id']);
            $subtotal = $c['quantity'] * $c['price'];
            $total += $subtotal;

            // Calculate points
            if (in_array($product->product_type->name, ['Deluxe', 'Superior', 'Suite'])) {
                // 5 points for deluxe, superior, and suite per product
                $totalPoints += 5 * $c['quantity'];
            } else {
                // 1 point for every 300,000 IDR
                $totalPoints += floor($subtotal / 300000);
            }

            // Update available_room
            if ($product->available_room >= $c['quantity']) {
                $product->available_room -= $c['quantity'];
                $product->save();
            } else {
                // Handle case where there is not enough room available
                throw new \Exception("Not enough rooms available for product ID: " . $product->id);
            }

            // Insert into the product_transaction table
            $this->products()->attach($c['id'], ['quantity' => $c['quantity'], 'subtotal' => $subtotal]);
        }

        // Update user points
        $user->point += $totalPoints;
        $user->save();

        $tax = $total * 0.11;
        $grandTotal = $total + $tax;

        return ['total' => $total, 'tax' => $tax, 'grandTotal' => $grandTotal, 'pointsEarned' => $totalPoints];
    }
}
