<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Translatable\HasTranslations;

class Teacher extends Authenticatable
{
    use HasFactory;
    use HasTranslations;

    protected $table = 'teachers';
    public $fillable = ['name', 'email', 'password', 'phone', 'date_of_birth', 'address', 'national_id', 'passport_id', 'joining_date', 'specialization_id', 'gender_id', 'nationality_id', 'religion_id', 'blood_id'];
    public $translatable = ['name'];
    
    public function specialization(){
        return $this->belongsTo(Specialization::class, 'specialization_id');
    }

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

    public function sections(){
        return $this->belongsToMany(Section::class, 'teacher_sections');
    }

}