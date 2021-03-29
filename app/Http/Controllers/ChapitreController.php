<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chapitre;
use  App\Http\Resources\ChapitreResource;

class ChapitreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chapitres = Chapitre::paginate(10);
        return ChapitreResource::collection($chapitres);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $chapitre = new Chapitre(); 
        $chapitre->type_chapitre = $request->type_chapitre;
        $chapitre->name_chapitre = $request->name_chapitre;
        $chapitre->text = $request->text;
        $chapitre->num_chapitre = $request->num_chapitre;
        $chapitre->num_box = $request->num_box;
        $chapitre->id_book = $request->id_book;
        $chapitre->file_id = $request->file_id;
        if($chapitre->save())
        {
            return new ChapitreResource($chapitre);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $chapitre = Chapitre::findOrFail($id);
        return new ChapitreResource($chapitre);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $chapitre = Chapitre::findOrFail($id);
        $chapitre->type_chapitre = $request->type_chapitre;
        $chapitre->name_chapitre = $request->name_chapitre;
        $chapitre->text = $request->text;
        $chapitre->num_chapitre = $request->num_chapitre;
        $chapitre->num_box = $request->num_box;
        $chapitre->id_book = $request->id_book;
        $chapitre->file_id = $request->file_id;
        if($chapitre->save())
        {
            return new ChapitreResource($chapitre);
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
        $chapitre = Chapitre::findOrFail($id);
        if($chapitre->delete())
        {
            return new ChapitreResource($chapitre);
        }

    }
}
