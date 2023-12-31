<?php

namespace App\Http\Controllers;

use App\Http\Requests\API\BooksStoreRequest;
use App\Models\Book;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class BooksController extends Controller
{
    /**
     * @param Book $book
     */
    public function __construct(private readonly Book $book){}

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
    public function store(BooksStoreRequest $request): JsonResponse
    {
        return response()->json($this->book->create($request->all()), Response::HTTP_CREATED);
    }

    /**
     * @param $id
     * @param Request $request
     * @return JsonResponse|null
     */
    public function update($id, Request $request): JsonResponse|null
    {
        $book = Book::findOrfail($id);
        $book->update($request->all());
        return response()->json($book, Response::HTTP_OK);
    }

    /**
     * @param $id
     * @return JsonResponse|null
     */
    public function destroy($id): JsonResponse|null
    {
        return response()->json($this->book->destroy($id), Response::HTTP_NO_CONTENT);
    }
}
