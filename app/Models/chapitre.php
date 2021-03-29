<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chapitre extends Model
{
    use HasFactory;

    protected $table = "chapitre";
    protected $fillable = ['type_chapitre','name_chapitre','text','num_chapitre','num_box','id_book','file_id'];

    public function book()
    {
       return $this->belongsTo(book::class); 
    }

    

}
