<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use ReflectionClass;

class JobPost extends Model
{
    use HasFactory;

    public const STATUS_STARTED = 1;
    public const STATUS_CONTRACTED = 2;
    public const STATUS_DRAFTED = 3;
    public const STATUS_CANCELED = 4;
    public const STATUS_POSTED = 5;
    public const STATUS_REQUEST_ACCEPTED = 6;
    public const STATUS_PROPOSED = 7;
    public const STATUS_CLOSED = 8;

    protected $fillable = [
        'title', 'description', 'status', 'starts_at', 'ends_at', 'client_id', 'provider_id',
    ];

    // not a fan but to make it quick
    static function getStatuses(): array
    {
        return (new ReflectionClass(__CLASS__))->getConstants();
    }
}
