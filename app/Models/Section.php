<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Section extends Model
{
    use HasFactory;
    use HasTranslations;
    
    protected $table = "sections";
    public $fillable = ['name', 'status', 'stage_id', 'class_id'];
    public $translatable = ['name'];

    public function stage(){
    return $this->belongsTo(Stage::class, 'stage_id');
    }

    public function class(){
    return $this->belongsTo(Classroom::class, 'class_id');
    }

    public function teachers(){
        return $this->belongsToMany(Teacher::class, 'teacher_sections');
    }

}