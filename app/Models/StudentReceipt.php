<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentReceipt extends Model
{
    use HasFactory;
    protected $table ='student_receipts';
    public $fillable =['student_id', 'debit', 'description'];

    public function student(){
        return $this->belongsTo(Student::class, 'student_id');
    }
}