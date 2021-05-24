<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    use HasFactory;

    protected $table = "book";
    protected $fillable = ['type_book','name_book','author','description','langue','edition','user_update','id_type','thumbnail','thumbnail_path'];


    public function chapitre()
    {
       return $this->hasMany(chapitre::class); 
    }

    public function type_book()
    {
       return $this->belongsTo(type_books::class); 
    }

    public function file()
    {
       return $this->belongsTo(file::class); 
    }

    public function bookocr()
    {
       return $this->hasOne(book_ocr::class); 
    }
    function addBook($data){
       DB::table('book')->insert($data);
          }

}


