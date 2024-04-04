<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    use HasFactory;

    protected $fillable = ['tasks_no', 'user_id'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
