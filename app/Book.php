<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Book extends Model
{
    protected $fillable = [
        'title', 'author_fullname', 'published_date', 'description'
    ];

    public static function filterColumn($request){

        if (count($request->all()) == 0){
            return Book::all();
        }
        else {
            $filters = array_keys($request->all());
            $filtersNumber = count($filters);
            
            switch ($filtersNumber){
                case($filtersNumber == 1);
                    return Book::select($filters[0])->get();
                    break;
                case($filtersNumber == 2);
                    return Book::select($filters[0], $filters[1])->get();
                    break;
                case($filtersNumber == 3);
                    return Book::select($filters[0], $filters[1], $filters[2])->get();
                    break;
                case($filtersNumber == 4);
                    return Book::select($filters[0], $filters[1], $filters[2], $filters[3])->get();
                    break;
                case($filtersNumber == 5);
                    return Book::select($filters[0], $filters[1], $filters[2], $filters[3], $filters[4])->get();
                    break;
            }
        }
    }

    public static function validate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:100',
            'author_fullname' => 'required|string|max:100',
            'published_date' => 'required|date',
            'description' => 'required|string|max:1000'
        ]);

        return $validator;
    }

    public static function validateField(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'string|max:100',
            'author_fullname' => 'string|max:100',
            'published_date' => 'date',
            'description' => 'string|max:1000'
        ]);

        return $validator;
    }
}
