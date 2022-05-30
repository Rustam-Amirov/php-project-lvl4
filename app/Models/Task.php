<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TaskStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

/**
 * @property string $name
 * @property integer $statud_id
 * @property string $description
 * @property integer $created_by_id
 * @property integer $assigned_to_id
 */
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

    public function labels()
    {
        return $this->morphToMany(Label::class, 'task', 'task_labels');
    }

    public function scopeStatusId(Builder $query, int $status_id)
    {
        return $query->where('status_id', '=', $status_id);
    }
}
