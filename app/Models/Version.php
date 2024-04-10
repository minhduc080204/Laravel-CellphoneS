<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Version extends Model
{
    protected $table = 'tb__version';
    protected $primaryKey = 'VersionID';
    protected $fillable= ['Version', 'ProductID'];
    public $timestamps = false;
    use HasFactory;
    public function product(){
        return $this->belongsTo(Product::class, "ProductID", "ProductID");
    }
}
