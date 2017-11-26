<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Request\ValidateRequest;
class ValidateController extends Controller
{
    public function index()
    {
        $user = [
          'name'=>'www',
          'age'=>44,
          'email'=>'a@a.com',
          'assessments'=>[4,5,4.5,2,8]
        ];

        $validator = Validator::make($user,[

            'name'=>'required|min:4|max:10',
            'age'=>'required|numeric|between:18,65',
            'email'=>'email',
            'assessments.*'=>'integer'
        ]);
        dd(
            $validator->fails(),
            $validator->errors()->all(),
            $validator->errors()->has('age'),
            $validator->errors()->get('assessments.*')
        );
        return view('validate.index');
    }

    public  function form()
    {
        return view('validate.form');
    }

    public function store(ValidateRequest $request)
    {
        return $request->all();
    }
}
