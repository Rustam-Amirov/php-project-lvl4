<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Task;

/**
 * App\Models\Label
 *
 * @property string $name
 * @property string $description
 */
class Label extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];

    public function tasks()
    {
        return $this->morphedByMany(Task::class, 'task', 'task_labels');
    }
}
