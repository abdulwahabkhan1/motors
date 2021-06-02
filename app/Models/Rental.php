<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id',
        'vehicle_id',
        'vehicle_checkout',
        'vehicle_checkin',
        'vehicle_initial_condition',
        'vehicle_returned_condition',
        'rental_status'
    ];

    /**
     * Get the vehicle that is rented.
     */
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    /**
     * Get the customer who rented.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
