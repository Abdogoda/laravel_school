<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillOfExchange extends Model{
    use HasFactory;

    protected $table = 'bill_of_exchanges';
    public function student(){
        return $this->belongsTo(Student::class, 'student_id');
    }
}