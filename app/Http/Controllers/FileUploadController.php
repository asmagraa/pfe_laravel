<?php

namespace App\Http\Controllers;
use App\Models\file;
use Illuminate\Http\Request;
use  App\Http\Resources\FileResource;
use \Illuminate\Filesystem\FilesystemManager;
use Illuminate\Support\Facades\Storage;


class FileUploadController extends Controller
{
    public function file(Request $request)
    {
        $post = new File; 
        if($request->hasFile('image'))
        {
            $completeFileName=$request->file('image')->getClientOriginalName();
            $fileNameOnly = pathinfo($completeFileName,PATHINFO_FILENAME);
            $extenshion = $request->file('image')->getClientOriginalExtension();
            $compPic = str_replace(' ', '_', $fileNameOnly).'-'.rand(). '_'.time(). '.'.
            $extenshion;
            $path=$request->file('image')->storeAs('public/posts',$compPic);
            copy( '../storage/app/'.$path, $compPic );

            $completeFileName1=$request->file('path')->getClientOriginalName();
            $fileNameOnly1 = pathinfo($completeFileName1,PATHINFO_FILENAME);
            $extenshion1 = $request->file('path')->getClientOriginalExtension();
            $compPic1 = str_replace(' ', '_', $fileNameOnly1).'-'.rand(). '_'.time(). '.'.
            $extenshion1;
            $path1=$request->file('path')->storeAs('public/posts',$compPic1);
     
            copy( '../storage/app/'.$path1, $compPic1 );
            $post->file_name =  asset($compPic);
            $post->path =  asset($compPic1);
           
            // $post->thumbnail_path = asset($compPic);
            $post -> user_update='test'; 

        
        }
        
        if($post->save()){
            return['status' => true, 'message'=>'File saved suucessfuly' , 'thumbnail_path' => asset($compPic)];
        }else{
            return['status' => false, 'message'=>'Something went'];
        }

    }
    public function index()
    {
        $file = file::paginate(10);
        return FileResource::collection($file);
    }

    public function create()
    {
        //
    }
    public function show($id)
    {
        $file = File::findOrFail($id);
        return new FileResource($file);
    }
    public function update(Request $request, $id)
    {
        $post = File::findOrFail($id);
        $post->file_name = $compPic;
        $post->image = $path1;
        $post->thumbnail_path = $thumbnail_path;
        $post -> user_update='test'; 
    
        if($post->save())
        {
            return new FileResource($book);
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
        $file = File::findOrFail($id);
        if($file->delete())
        {
            return new FileResource($file);
        }

    }
}
