<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Relationship extends Model{

    use HasFactory;
    use HasTranslations;

    protected $table = 'relationships';
    public $fillable = ['title'];
    public $translatable = ['title'];
}