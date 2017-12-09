<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UploadFile extends Model
{

    protected $fillable = ['image', 'filename'];


    public function setTitleAttribute($title, $filename)
    {
        $this->attributes['title'] = $title;
        $this->attributes['filename'] = $filename;

    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
