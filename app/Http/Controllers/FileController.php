<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function insert(Request $request)
    {
        $post = new Post; 
        if($request->hasFile('path'))
        {
            $completeFileName=$request->file('path')->getClientOriginalName();
            $fileNameOnly = pathinfo($completeFileName,PATHINFO_FILENAME);
            $extenshion = $request->file('path')->getClientOriginalExtension();
            $compPic = str_replace(' ', '_', $fileNameOnly).'-'.rand(). '_'.time(). '.'.
            $extenshion;
            $path=$request->file('path')->storeAs('public/posts',$compPic);
            $post->file_name = $compPic;
            $post->path = $path;
        }
        if($post->save()){
            return['status' => true, 'message'=>'File saved suucessfuly'];
        }else{
            return['status' => false, 'message'=>'Something went'];

        }

    }
}
