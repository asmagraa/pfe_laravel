<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class type_books extends Model
{
    use HasFactory;

    protected $table = "type_books";
    protected $fillable = ['type_name','user_update'];

    public function book()
    {
       return $this->hasMany(book::class); 
    }
}

