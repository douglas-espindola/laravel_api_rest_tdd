<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class BooksController extends Controller
{
    /**
     * @param Book $book
     */
    public function __construct(private Book $book){}

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json($this->book->all(), Response::HTTP_OK);
    }

    /**
     * @param $id
     * @return JsonResponse|null
     */
    public  function show($id): JsonResponse|null
    {
        return response()->json($this->book->findOrfail($id), Response::HTTP_OK);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        return response()->json($this->book->create($request->all()), Response::HTTP_CREATED);
    }

    /**
     * @param $id
     * @param Request $request
     * @return JsonResponse
     */
    public function update($id, Request $request): JsonResponse
    {
        $book = Book::findOrfail($id);
        $book->update($request->all());
        return response()->json($book, Response::HTTP_OK);
    }
}
