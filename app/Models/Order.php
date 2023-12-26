<?php

namespace App\Models;

use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $table = 'ordres';
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'state',
        'country',
        'cite',
        'address1',
        'address2',
        'pincode',
        'phonenumber',
        'status',
        'message',
        'tracking_no',
        'total_price',

    ];

    /**
     * Get all of the comments for the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderitems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
