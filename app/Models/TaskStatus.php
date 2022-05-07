<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskStatus extends Model
{
    use HasFactory;

    public static $defaultTaskStatuses = [
        1 => 'новый',
        2 => 'в работе',
        3 => 'на тестировании',
        4 => 'завершен',
    ];

    public $timestamps = false;

    protected $dates = [
        'created_at',
    ];

    protected $fillable = [
        'name',
    ];
}
