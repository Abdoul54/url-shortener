<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UrlMapping extends Model
{
    protected $fillable = ['original_url', 'short_url'];
}
