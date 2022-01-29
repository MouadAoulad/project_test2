<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model {
    use HasFactory;

    public $table = "users";
    protected $primaryKey = 'id';

    // The attributes that are mass assignable
    protected $fillable = ['name','email','password','school_id','role_id'];

    public function groups() {
        return $this->belongsToMany(Group::class, 'group_user');
    }

    public function courses() {
        return $this->belongsToMany(Course::class, 'course_user');
    }

    public function role() {
        return $this->belongsTo(Role::class);
    }

    public function school() {
        return $this->belongsTo(school::class);
    }
}
