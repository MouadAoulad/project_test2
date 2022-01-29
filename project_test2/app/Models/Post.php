<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model {
    use HasFactory;

    public $table = "posts";
    protected $primaryKey = 'id';

    protected $fillable = ['content','date','user_id','group_id']; // 'user_id'

    public function group() {
        return $this->belongsTo(Group::class);
    }

}
