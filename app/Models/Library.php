<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Library extends Model{

    use HasFactory;
    use HasTranslations;
    protected $table = 'library';
    public $fillable = ['title', 'stage_id', 'class_id', 'section_id', 'teacher_id'];
    public $translatable = ['title'];

    public function stage(){
        return $this->belongsTo(Stage::class, 'stage_id');
    }

    public function class(){
        return $this->belongsTo(Classroom::class, 'class_id');
    }

    public function section(){
        return $this->belongsTo(Section::class, 'section_id');
    }

    public function teacher(){
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }

    public function attachment(){
        return $this->hasOne(Attachment::class, 'attachmentable_id')->where('model', 'Library');
    }
}