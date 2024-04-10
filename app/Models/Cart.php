<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table='tb__cart';
    protected $primaryKey = 'CartID';
    protected $fillable = ['Quantity'];
    public $timestamps = false;
    use HasFactory;
    public function products(){
        return $this->hasOne(Product::class,'ProductID', 'ProductID');
    }
    public function colors(){
        return $this->hasOne(Color::class,'ColorID', 'ColorID');
    }
    public function versions(){
        return $this->hasOne(Version::class,'VersionID', 'VersionID');
    }
}
