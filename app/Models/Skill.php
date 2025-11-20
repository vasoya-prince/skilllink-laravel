<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'icon'
    ];

    public function workers()
    {
        return $this->belongsToMany(WorkerProfile::class, 'worker_skill', 'skill_id', 'worker_id');
    }
}
