<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{

    protected $appends = ['created_at_diff'];
    public function getCreatedAtDiffAttribute()
    {
        return Carbon::parse($this->created_at)->diffForHumans();
    }

}
