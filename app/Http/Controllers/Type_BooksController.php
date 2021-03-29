<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\type_books;
use  App\Http\Resources\Type_BooksResource;

class Type_BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $type_book = type_books::paginate(10);
        return Type_BooksResource::collection($type_book);
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
        $type_book = new type_books(); 
        $type_book->type_name = $request->type_name;
        $type_book->user_update = $request->user_update;
        if($type_book->save())
        {
            return new Type_BooksResource($type_book);
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
        $type_book = type_books::findOrFail($id);
        return new Type_BooksResource($type_book);
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
        $type_book = type_books::findOrFail($id);
        $type_book->type_name = $request->type_name;
        $type_book->user_update = $request->user_update;
        if($type_book->save())
        {
            return new Type_BooksResource($type_book);
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
        $type_book = type_books::findOrFail($id);
        if($type_book->delete())
        {
            return new Type_BooksResource($type_book);
        }
    }
}
