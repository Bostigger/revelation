<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NextOfKins extends Model
{
    protected $guarded = [];
    protected $fillable = ['membership_id','first_name','middle_name','last_name','email','phone_number','alternate_phone_number'];
}
