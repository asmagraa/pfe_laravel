<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class FileDownloadController extends Controller
{
    public function file(){
        return response()->download(public_path('user2.png'), 'User Image');
    }

   /* public function file(){
        $downloads=DB::table('file')->get();
        return $downloads;
    }*/

    /*public function file($file)
    {
      $url = Storage::url($file);
        $download=DB::table('file')->get();
        return Storage::download($url);
    }*/
}
