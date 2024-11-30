<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conference extends Model
{
    use HasFactory;

    // Включение автоматических меток времени
    public $timestamps = true;

    // Поля, которые могут быть заполнены
    protected $fillable = ['name', 'description', 'date'];
}