<?php

namespace App\Modules\Users\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['nome', 'sobrenome'];
}