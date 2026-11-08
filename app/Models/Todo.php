<?php

namespace App\Models;

use App\TodoPriority;
use App\TodoStatus;
use Illuminate\Database\Eloquent\Model;
use Override;

class Todo extends Model
{
    protected $fillable = [
        'user_id',
        'status',
        'priority',
        'start_date',
        'due_date',
        'title',
        'description',
    ];

    #[Override]
    public function casts()
    {
        return [
            'status' => TodoStatus::class,
            'priority' => TodoPriority::class,
            'start_date' => 'datetime',
            'due_date' => 'datetime',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
