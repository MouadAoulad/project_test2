<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model {
    use HasFactory;

    public $table = "schools";
    protected $primaryKey = 'id';

    // The attributes that are mass assignable
    protected $fillable = ['name','slug'];

    public function users() {
        return $this->hasMany(User::class);
    }
    
}
