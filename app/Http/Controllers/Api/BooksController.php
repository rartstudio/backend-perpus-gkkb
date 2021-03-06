<?php

namespace App\Http\Controllers\Api;

use App\Authors;
use App\Books;
use App\CategoriesBook;
use App\Http\Controllers\Controller;
use App\Http\Resources\Books\BookCollection;
use App\Http\Resources\Books\BookResource;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function parserData($data){
        //encode it to array associative
        $parser = json_decode($data);

        //a container for using where in
        $conArray = array();

        //loop through array associative and object inside
        foreach($parser as $value){
            $int = $value->id;
            array_push($conArray,$int);
        }

        return $conArray;
    }

    public function index(Request $request) 
    {
        //query name
        if ($request->query('name')){
            //get query
            $query = $request->query('name');    
            
            //get all data book
            $data = Books::with(['author','categories_book','publisher','review'])->where('title','like','%'.$query.'%')->paginate(5);   
        }
        else if ($request->query('sort') && $request->query('max')){
            //get query
            $query = $request->query('sort');
            $max = $request->query('max');

            $data = Books::with(['author','categories_book','publisher','review'])->orderBy('created_at',$query)->take($max)->get();
        }
        else if ($request->query('author')){
            //get query
            $query = $request->query('author');    
            
            //get id of author
            $id = Authors::select('id')->where('author_name','like','%'.$query.'%')->get();

            //using function parser data
            $conArray = $this->parserData($id);

            //get data
            $data = Books::with(['author','categories_book','publisher','review'])->whereIn('author_id',$conArray)->get();
        }
        else if ($request->query('cat')){
            //get query
            $query = $request->query('cat');    
            
            //get id of cat
            $id = CategoriesBook::select('id')->where('cbo_name','like','%'.$query.'%')->get();

            //using function parser data
            $conArray = $this->parserData($id);

            //get data
            $data = Books::with(['author','categories_book','publisher','review'])->whereIn('cbo_id',$conArray)->paginate(5);
        }
        else if ($request->query('sort')){
            //get query
            $query = $request->query('sort');

            $data = Books::with(['author','categories_book','publisher','review'])->orderBy('created_at',$query)->paginate(5);
        }
        else {
            $data = Books::with(['author','categories_book','publisher','review','stock'])->paginate(5);
        }

        
        return new BookCollection($data);
    }

    public function show (Books $book) 
    {
        $data = Books::with(['author','categories_book','publisher','review'])->find($book->id);

        //checking if data null
        if(is_null($data)){
            return response()->json([
                "message" => "Resource not found"
            ],404);
        }

        return new BookResource($data);
    }
}
