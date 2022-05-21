<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TaskStatus;
use App\Models\User;

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
        'created_by_id',
        'assigned_to_id'
    ];

    public function status()
    {
        return $this->belongsTo(TaskStatus::class, 'status_id');
    }


    public function assignedUser()
    {
        return $this->belongsTo(User::class, 'assigned_to_id');
    }

    public function createdUser()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }
}
