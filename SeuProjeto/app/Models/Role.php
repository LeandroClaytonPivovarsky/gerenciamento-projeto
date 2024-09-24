<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model{
    use HasFactory;

    private static $roles = [
        "ADMIN" => 1,
        "WORKER" => 2,
        "CLIENT" => 3,
    ];

    public function resource()
    {
        return $this->belongsToMany(Resource::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

    
    public static function getRoleId($name) {
        return self::$roles[$name];
    }

    public static function getIdRole($id) {
        return array_search($id, self::$roles);
    }
}