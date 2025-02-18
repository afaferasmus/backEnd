<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = ['videourl', 'button1', 'button2', 'videourloption1', 'videourloption2'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'videos';
}
