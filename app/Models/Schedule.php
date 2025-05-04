<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Schedule extends Model
{
    use HasFactory, HasUuids;

    protected $primaryKey = 'scheduleId';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $table = 'schedule';

    protected $fillable = [
        'scheduleId',
        'date',
        'class',
        'module',
        'time',
        'tentor',
    ];

    protected $casts = [
        'date' => 'datetime',
    ];
}
