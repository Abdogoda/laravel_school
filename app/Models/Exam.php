<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Exam extends Model{
    use HasFactory;
    use HasTranslations;
    protected $table = 'exams';
    public $fillable = ['name', 'academic_year', 'term'];
    public $translatable = ['name'];

}