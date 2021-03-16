<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserImage extends Model
{
    protected $table = 'user_image';

    protected $fillable = ['user_id', 'image'];

    /*public function getImageAttribute($value)
    {
        if (! empty($value)) {
            return url('uploads'.DIRECTORY_SEPARATOR.User::PATH.DIRECTORY_SEPARATOR.$value);
        }

        return asset('assets/images/avatar.png');
    }*/
}
