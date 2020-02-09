<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nomination extends Model
{
    public function nominee_id()
    {
        return $this->belongsTo(KtResident::class, 'nominee_id');
    }

    public function nominee2_id()
    {
        return $this->belongsTo(KtResident::class, 'nominee2_id');
    }
}
