<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCate extends Model
{
    protected $table='tb__product_cate';
    public $timestamps = false;
    use HasFactory;
}
