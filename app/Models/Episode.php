<?php

namespace App\Models;

use App\Models\User;
use App\Models\Cours;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Episode extends Model
{
    use HasFactory;

    public function cours(){
        return $this->belongsTo(Cours::class);
    }
    
    public function users()
    {
        return $this->belongsToMany(User::class, 'completions', 'episode_id', 'user_id');
    }
}