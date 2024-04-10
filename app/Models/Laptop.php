<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laptop extends Model
{
    protected $table='tb_specific_laptop';
    protected $primaryKey = 'LaptopID';
    protected $fillable = [
        'Cpu',
        'Gpu',
        'Ram',
        'Ssd',
        'Screen',
        'Pin',
        'Os',
        'Material',
        'Weight',
    ];
    
    public $timestamps = false;
    use HasFactory;
    public function product(){
        return $this->belongsTo(Product::class, 'ProductID', "ProductID");
    }
}
