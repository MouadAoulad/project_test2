<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model {
    use HasFactory;

    public $table = "groups";
    protected $primaryKey = 'id';

    protected $fillable = ['name'];

    public function users() {
        return $this->belongsToMany(User::class, 'group_user');
    }

    public function posts() {
        return $this->hasMany(Post::class);
    }
    
}
