<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book_ocr extends Model
{
    use HasFactory;

    protected $table = "book_ocr";
    protected $fillable = ['page','file','id_book'];

    public function book()
    {
       return $this->belongsTo(book::class); 
    }

}

