<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table='tb__order_detail';
    public $timestamps = false;
    use HasFactory;    
    public function product()
    {
        return $this->belongsTo(Product::class, 'ProductID', 'ProductID');
    }

    public function version()
    {
        return $this->belongsTo(Version::class, 'VersionID', 'VersionID');
    }

    public function color()
    {
        return $this->belongsTo(Color::class, 'ColorID', 'ColorID');
    }
}
