<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'tb__comment';
    public $timestamps = false;
    use HasFactory;
    public function user(){
        return $this->hasOne(User::class,'id', 'UserID');
    }
}
