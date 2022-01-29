<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model {
    use HasFactory;

    public $table = "roles";
    protected $primaryKey = 'id';

    // The attributes that are mass assignable
    protected $fillable = ['name'];

    public function users() {
        return $this->hasMany(User::class);
    }
}
