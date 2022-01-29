<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model {
    use HasFactory;

    public $table = "courses";
    protected $primaryKey = 'id';

    // The attributes that are mass assignable
    protected $fillable = ['title','description','owner_id'];

    public function users() {
        return $this->belongsToMany(User::class, 'course_user');
    }

}
