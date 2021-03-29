<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\book_ocr;
use  App\Http\Resources\Book_ocrResource;

class Book_ocrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book_ocr = book_ocr::paginate(10);
        return Book_ocrResource::collection($book_ocr);
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
        $book_ocr = new book_ocr(); 
        $book_ocr->page = $request->page;
        $book_ocr->file = $request->file;
        $book_ocr->id_book = $request->id_book;
        if($book_ocr->save())
        {
            return new Book_ocrResource($book_ocr);
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
        $book_ocr = book_ocr::findOrFail($id);
        return new Book_ocrResource($book_ocr);
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
        $book_ocr = book_ocr::findOrFail($id);
        $book_ocr->page = $request->page;
        $book_ocr->file = $request->file;
        $book_ocr->id_book = $request->id_book;
        if($book_ocr->save())
        {
            return new Book_ocrResource($book_ocr);
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
        $book_ocr = book_ocr::findOrFail($id);
        if($book_ocr->delete())
        {
            return new Book_ocrResource($book_ocr);
        }

    }
}
