<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Classroom extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $table = 'classrooms';
    public $fillable = ['name', 'stage_id'];
    public $translatable = ['name'];

    public function stage(){
        return $this->belongsTo(Stage::class, 'stage_id', 'id');
    }

    public function sections(){
        return $this->hasMany(Section::class, 'class_id');
    }
}