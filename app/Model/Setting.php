<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    //
    protected $table = 'settings';

    protected $fillable = ['site_name', 'email', 'keywords', 'description', 'site_state', 'massage_state'];
}
