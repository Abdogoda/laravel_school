<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeInvoice extends Model
{
    use HasFactory;
    protected $table = 'fee_invoices';
    public $fillable = ['student_id', 'stage_id', 'class_id', 'fee_amount', 'fee_id', 'notes'];

    public function student (){
        return $this->belongsTo(Student::class, 'student_id');
    }
    public function stage (){
        return $this->belongsTo(Stage::class, 'stage_id');
    }
    public function class (){
        return $this->belongsTo(Classroom::class, 'class_id');
    }

    public function fee (){
        return $this->belongsTo(Fee::class, 'fee_id');
    }
}