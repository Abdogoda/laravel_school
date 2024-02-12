<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable{
    use HasFactory;
    use HasTranslations;
    use SoftDeletes;
    protected $table = 'students';
    public $fillable = ['name', 'email', 'password', 'job', 'phone', 'academic_year', 'gender_id', 'address', 'birth_of_date', 'blood_id', 'nationality_id', 'religion_id', 'national_id', 'passport_id', 'stage_id', 'class_id', 'section_id'];

    public $translatable = ['name'];


    public function gender(){
        return $this->belongsTo(Gender::class, 'gender_id');
    }

    public function nationality(){
        return $this->belongsTo(Nationality::class, 'nationality_id');
    }

    public function blood(){
        return $this->belongsTo(Blood::class, 'blood_id');
    }

    public function religion(){
        return $this->belongsTo(Religion::class, 'religion_id');
    }

    public function stage(){
        return $this->belongsTo(Stage::class, 'stage_id');
    }

    public function class(){
        return $this->belongsTo(Classroom::class, 'class_id');
    }

    public function section(){
        return $this->belongsTo(Section::class, 'section_id');
    }

    public function gardians(){
        return $this->hasMany(Gardian::class, 'student_id');
    }
    
    public function attachments(){
        return $this->hasMany(Attachment::class, 'attachmentable_id')->where('model', 'Student');
    }

    public function accounts(){
        return $this->hasMany(StudentAccount::class, 'student_id');
    }

    public function attendance(){
        return $this->hasMany(Attendance::class, 'student_id');
    }
}