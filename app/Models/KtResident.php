<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KtResident extends Model
{
    public function nomination()
    {
        return $this->hasMany(Nomination::class);
    }
}
