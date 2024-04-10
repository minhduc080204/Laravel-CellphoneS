<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $table='tb_specific_phone';
    protected $primaryKey = 'PhoneID';
    protected $fillable = [
        'Screen',
        'Camerabf',
        'Cameraat',
        'Cpu',
        'Ram',
        'Ssd',
        'Pin',
        'Os',
        'Material',
        'Weight',
        'url',
    ];
    public $timestamps = false;
    use HasFactory;
    public function product(){
        return $this->belongsTo(Product::class, 'ProductID', "ProductID");
    }
}