<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Fee extends Model{

    use HasFactory;
    use HasTranslations;
    protected $table = 'fees';
    public $fillable = ['name', 'cost', 'grade_id', 'class_id', 'notes', 'academic_year'];
    public $translatable = ['name'];

    public function stage(){
        return $this->belongsTo(Stage::class, 'stage_id');
    }

    public function class(){
        return $this->belongsTo(Classroom::class, 'class_id');
    }

}