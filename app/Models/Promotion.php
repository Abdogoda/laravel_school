<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model{

    use HasFactory;

    protected $table = 'promotions';
    public $fillable = ['student_id', 'from_stage', 'to_stage', 'from_class', 'from_academic_year', 'to_class', 'from_section', 'to_section', 'to_academic_year'];

    public function student(){
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function last_stage(){
        return $this->belongsTo(Stage::class, 'from_stage');
    }

    public function last_class(){
        return $this->belongsTo(Classroom::class, 'from_class');
    }

    public function last_section(){
        return $this->belongsTo(Section::class, 'from_section');
    }

    public function current_stage(){
        return $this->belongsTo(Stage::class, 'to_stage');
    }

    public function current_class(){
        return $this->belongsTo(Classroom::class, 'to_class');
    }

    public function current_section(){
        return $this->belongsTo(Section::class, 'to_section');
    }

}