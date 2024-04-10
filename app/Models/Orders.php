<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table='tb__orders';
    protected $primaryKey = 'OrderID';
    protected $fillable = ['Status', 'Delivered'];
    public $timestamps = false;
    use HasFactory;
    public function orderdetails(){
        return $this->hasMany(OrderDetail::class, 'OrderID', 'OrderID');
    }
    public function customer(){
        return $this->hasOne(Customer::class, 'CustomerID', 'CustomerID');
    }
}
