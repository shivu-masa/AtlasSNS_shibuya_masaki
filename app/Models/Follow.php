<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;

public function users(){
return $this->belongsToMany('App\Models\User', 'Follow_users', 'follow_id', 'user_id');
}


}
