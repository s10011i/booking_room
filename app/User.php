<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class User extends Model implements Authenticatable{
    use \Illuminate\Auth\Authenticatable;

    public function rooms(){
        return $this->hasMany(Room::class);
    }

    public function reservations(){
        return $this->hasMany(Reservation::class);
    }

    public function roles(){
        return $this->belongsToMany(Role::class);
    }

}
