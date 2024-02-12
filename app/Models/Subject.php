<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Subject extends Model{
    use HasFactory;
    use HasTranslations;
    protected $table = 'subjects';
    public $fillable = ['name', 'teacher_id', 'stage_id', 'class_id'];
    public $translatable = ['name'];

    public function teacher(){
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }

    public function stage(){
        return $this->belongsTo(Stage::class, 'stage_id');
    }

    public function class(){
        return $this->belongsTo(Classroom::class, 'class_id');
    }
}