<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuggestedBucket extends Model
{
    use HasFactory;
    protected $fillable = ['bucket_id', 'ball_id','color', 'count'];

    public function bucket()
    {
        return $this->belongsTo(Bucket::class, 'bucket_id');
    }

    public function ball()
    {
        return $this->belongsTo(Ball::class, 'ball_id');
    }

   
    
}
