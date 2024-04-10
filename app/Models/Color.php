<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $table='tb__color';
    protected $primaryKey = 'ColorID';
    protected $fillable= ['Color', 'ProductID'];
    public $timestamps = false;
    
    use HasFactory;
    public function product(){
        return $this->belongsTo(Product::class, "ProductID", "ProductID");
    }
}
