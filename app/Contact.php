<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function getContactSubjectAttribute($value)
    {
        return !empty($value) ? $value : "";
    }
}
