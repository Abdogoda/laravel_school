<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Degree extends Model{

    use HasFactory;
    protected $table = 'degrees';
    public $guarded = [];

    public function student(){
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function quiz(){
        return $this->belongsTo(Quiz::class, 'quiz_id');
    }
}