<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Translation extends Model {
    use HasFactory;
    
    protected $table = 'translation';
    public $timestamps = false;
    protected $fillable = ['idquestionimg', 'language', 'question', 'realNew'];
}