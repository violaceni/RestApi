<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use App\Http\Resources\BookResource;

class BookController extends Controller
{
    public function getAllBooks(Request $request)
    {
        $books = Book::filterColumn($request);
        if(count($books) != 0){
            return $this->successResponse($books);
        }
        else{ 
            return $this->errorResponse("No existing records", 404);
        }
    }

    public function getBookById($id)
    {
        $book = Book::find($id);
       
        if($book != null){  
            $bookCollection = new BookResource($book);
            return $this->successResponse($bookCollection);
        }
        else{ 
            return $this->errorResponse("This record does not exists", 404);
        }
    }

    public function storeBook(Request $request)
    {
        $validator = Book::validate($request);

        if($validator->fails()){ 
            return $this->errorResponse($validator->messages(), 422);
        }
        $data = $request->all();
        $book = Book::create($data);
        return response()->json($book, 201);
    }

    public function updateBook(Request $request, $id) {
        
        $book = Book::find($id);
        if($book == null){
            return $this->errorResponse("This record does not exists", 404);
        }
        $validator = Book::validateField($request);
        if($validator->fails()){ 
            return $this->errorResponse($validator->messages(), 422);
        }
        $book->update($request->all());
        return response()->json($book, 200);
    }

    public function deleteBook($id) {
        $book = Book::find($id);
        if($book == null){
            return $this->errorResponse("This record does not exists", 404);
        }
        $book->delete();
        return response()->json(null, 204);
    }

    public function findBook($id){
        $book = Book::find($id);
        if($book == null){
            return $this->errorResponse("This record does not exists", 404);
        }
        return response()->json($book, 200);
    }

}
