<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BooksController extends Controller
{
    /**
     * @param Book $book
     */
    public function __construct(private Book $book){}

    public function index(){
        return response()->json($this->book->all());
    }

    /**
     * @param $id
     * @return mixed
     */
    public  function show($id)
    {
        return response()->json($this->book->findOrfail($id));
    }

    public function store(Request $request){

        return response()->json($this->book->create($request->all()), response::HTTP_CREATED);
    }
}
