<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuggestedBucket extends Model
{
    use HasFactory;
    protected $fillable = ['bucket_name', 'color', 'count'];
}
