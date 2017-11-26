<?php

namespace App\Http\Request;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ValidateRequest extends Controller
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
   public function authorize()
   {
       return \Auth::check();
   }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
   public function rules()
   {
        return [
            'name'=>'required|min:4|max:10',
            'age'=>'required|numeric|between:18,65'
        ];
   }
}
