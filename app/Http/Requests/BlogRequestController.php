<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequestController extends FormRequest
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
        $rules = [
            'title'=>'required|min:3|unique:articles|alpha_dash',
            'description'=>'required'
        ];
        if ('blog.update' == array_get($this->route()->action, 'as')) {
            $rules['title'] = 'required|min:3|unique:articles,title,' . $this->article->id;
        }
        return $rules;
    }
}
