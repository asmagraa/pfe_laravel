<?php

namespace App\Http\Controllers;
use App\Models\file;
use  App\Http\Resources\FileResource;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function FileUpload(Request $request){
       $uploaded_files = $request->file->store('public/uploads');
       $file = new file;
       $file -> file_name = $request-> file_name;
       $file -> user_update = $request-> user_update;
       $file -> path = $request->file->hashName();
       $results = $file ->save();
       if($results) {
           return ["result"=>"added"];
       } else {
        return["result"=>"not added"];
       }
       
    }


    public function ocrbook(Request $request){
        $ocr = new ocr;
        $ocr->file = $request->file; 
        $results = $file ->save();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $file = file::paginate(10);
        return FileResource::collection($file);
    }



     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $file = file::findOrFail($id);
        return new FileResource($file);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $file = file::findOrFail($id);
        //$uploaded_files = $request->file->store('public/uploads');
        $file = new file;
        $file -> file_name = $request-> file_name;
        $file -> user_update = $request-> user_update;
        $file -> path = $request->file;
        $results = $file ->save();
        if($results) {
            return ["result"=>"added"];
        } else {
         return["result"=>"not added"];
        }
    }


      /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = file::findOrFail($id);
        if($file->delete())
        {
            return new FileResource($file);
        }

    }
}
