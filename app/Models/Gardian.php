<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Gardian extends Authenticatable{
    use HasFactory;
    protected $table = 'gardians';
    public $fillable = ['name', 'email', 'password', 'relationship_id', 'job', 'phone', 'gender_id', 'address', 'birth_of_date', 'student_id', 'blood_id', 'nationality_id', 'religion_id', 'national_id', 'passport_id',];

    public function relationship(){
        return $this->belongsTo(Relationship::class, 'relationship_id');
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

    public function student(){
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function attachments(){
        return $this->hasMany(Attachment::class, 'attachmentable_id')->where('model', 'Gardian');
    }
}