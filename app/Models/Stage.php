<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Stage extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $table = 'stages';
    public $fillable = ['name', 'notes'];
    public $translatable = ['name'];

    
    public function classrooms(){
        return $this->hasMany(Classroom::class, 'stage_id');
    }

    public function sections(){
        return $this->hasMany(Section::class, 'stage_id');
    }
}