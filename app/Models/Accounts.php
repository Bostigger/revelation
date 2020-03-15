<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Accounts extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    protected $fillable = ['client_id','next_of_kin_id','bank_name','bank_branch','account_name','account_number'];
}
