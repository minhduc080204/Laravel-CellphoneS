<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='tb__product';
    protected $primaryKey = 'ProductID';
    protected $fillable = [
        'Name',
        'Status',
        'Image',
        'Price',
        'VAT',
        'Quantity',
        'Warranty',
        'Description',
        'Type',
        'Detail',
        'BrandID',
    ];
    public $timestamps = false;
    use HasFactory;

    public function laptop(){
        return $this->hasOne(Laptop::class,'ProductID', 'ProductID');
    }
    public function phone(){
        return $this->hasOne(Phone::class,'ProductID', 'ProductID');
    }
    public function colors(){
        return $this->hasMany(Color::class,'ProductID', 'ProductID');
    }
    public function versions(){
        return $this->hasMany(Version::class,'ProductID', 'ProductID');
    }
    public function images(){
        return $this->hasMany(Images::class,'ProductID', 'ProductID');
    }
    public function cart(){
        return $this->belongsTo(Cart::class, "ProductID", "ProductID");
    }
    public function brand(){
        return $this->belongsTo(Brand::class, "BrandID", "BrandID");
    }
}
