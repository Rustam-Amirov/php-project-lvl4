<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskLabels extends Model
{
    use HasFactory;
    protected $table = 'task_labels';

    public $timestamps = false;


    protected $fillable = [
        'label_id',
        'task_id',
        'label_type'
    ];
}
