<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks';

    protected $attributes = [
        'status_id' => 1
    ];


    protected $fillable = [
        'name',
        'status_id',
        'description',
        'assigned_to_id'
    ];
}
