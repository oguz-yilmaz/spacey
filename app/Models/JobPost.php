<?php

namespace App\Models;

use App\Library\JobPosting\States\Canceled;
use App\Library\JobPosting\States\Closed;
use App\Library\JobPosting\States\Contracted;
use App\Library\JobPosting\States\Drafted;
use App\Library\JobPosting\States\Posted;
use App\Library\JobPosting\States\RequestAccepted;
use App\Library\JobPosting\States\Started;
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

    public function getStatusClass(int $status)
    {
        $statusClasses = [
            self::STATUS_STARTED => Started::class,
            self::STATUS_CONTRACTED => Contracted::class,
            self::STATUS_DRAFTED => Drafted::class,
            self::STATUS_CANCELED => Canceled::class,
            self::STATUS_POSTED => Posted::class,
            self::STATUS_REQUEST_ACCEPTED => RequestAccepted::class,
            self::STATUS_PROPOSED => Proposed::class,
            self::STATUS_CLOSED => Closed::class,
        ];

        return $statusClasses[$status];
    }
}
