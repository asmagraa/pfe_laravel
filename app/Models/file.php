<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class file extends Model
{
    use HasFactory;

    protected $table = "file";
    protected $fillable = ['file_name','path','user_update'];


    public function book()
    {
       return $this->hasOne(book::class); 
    }
}
