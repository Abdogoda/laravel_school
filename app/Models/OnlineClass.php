<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnlineClass extends Model{

    use HasFactory;
    public $fillable = ['stage_id', 'class_id', 'section_id', 'user_id', 'meeting_id', 'topic', 'start_url', 'join_url', 'duration', 'password', 'start_at'];

    public function stage(){
        return $this->belongsTo(Stage::class, 'stage_id');
    }

    public function class(){
        return $this->belongsTo(Classroom::class, 'class_id');
    }

    public function section(){
        return $this->belongsTo(Section::class, 'section_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}