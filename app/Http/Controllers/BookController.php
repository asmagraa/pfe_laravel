<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use  App\Http\Resources\BookResource;
class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::paginate(10);
        return BookResource::collection($books);
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
        $book = new Book(); 
        $book->type_book = $request->type_book;
        $book->name_book = $request->name_book;
        $book->author = $request->author;
        $book->description = $request->description;
        $book->langue = $request->langue;
        $book->edition = $request->edition;
        $book->user_update = $request->user_update;
        $book->id_type = $request->id_type;
        $book->file_id = $request->file_id;
        if($book->save())
        {
            return new BookResource($book);
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
        $book = Book::findOrFail($id);
        return new BookResource($book);
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
        $book = Book::findOrFail($id);
        $book->type_book = $request->type_book;
        $book->name_book = $request->name_book;
        $book->author = $request->author;
        $book->description = $request->description;
        $book->langue = $request->langue;
        $book->edition = $request->edition;
        $book->user_update = $request->user_update;
        $book->id_type = $request->id_type;
        $book->file_id = $request->file_id;
        if($book->save())
        {
            return new BookResource($book);
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
        $book = Book::findOrFail($id);
        if($book->delete())
        {
            return new BookResource($book);
        }

    }
}
