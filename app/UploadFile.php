<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UploadFile extends Model
{

    protected $fillable = ['file_name'];


    public function setTitleAttribute($filename)
    {
        $this->attributes['title'] = str_random(4).'_'.$filename;
        $this->attributes['file_name'] = $filename;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
