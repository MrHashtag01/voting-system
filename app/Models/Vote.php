<?php

namespace App\Models;

use App\Models\Poll;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'user_id', 'poll_id', 'vote'
    ];

    public function poll()
    {
        return $this->belongsTo(Poll::class);
    }
    

}
