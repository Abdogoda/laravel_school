<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Quiz extends Model{

    use HasFactory;
    use HasTranslations;

    protected $table = 'quizzes';
    public $fillable = ['name', 'stage_id', 'class_id', 'section_id', 'subject_id', 'teacher_id'];
    public $translatable = ['name'];
    
    public function stage(){
        return $this->belongsTo(Stage::class, 'stage_id');
    }
    
    public function class(){
        return $this->belongsTo(Classroom::class, 'class_id');
    }
    
    public function section(){
        return $this->belongsTo(Section::class, 'section_id');
    }
    
    public function subject(){
        return $this->belongsTo(Subject::class, 'subject_id');
    }
    
    public function teacher(){
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }
    
    public function questions(){
        return $this->hasMany(Question::class, 'quiz_id');
    }
}