<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \App\Models\Log log(string $logName, string $description, string $event = 'activity', ?string $subjectType = null, ?int $subjectId = null, ?array $properties = null)
 * @method static \App\Models\Log logCreated(string $logName, string $description, ?string $subjectType = null, ?int $subjectId = null, ?array $properties = null)
 * @method static \App\Models\Log logUpdated(string $logName, string $description, ?string $subjectType = null, ?int $subjectId = null, ?array $properties = null)
 * @method static \App\Models\Log logDeleted(string $logName, string $description, ?string $subjectType = null, ?int $subjectId = null, ?array $properties = null)
 * @method static \App\Models\Log logViewed(string $logName, string $description, ?string $subjectType = null, ?int $subjectId = null, ?array $properties = null)
 * @method static \App\Models\Log logDownloaded(string $logName, string $description, ?string $subjectType = null, ?int $subjectId = null, ?array $properties = null)
 * @method static \App\Models\Log logAuth(string $event, string $description, ?array $properties = null)
 * @method static \App\Models\Log logFile(string $event, string $description, ?string $fileName = null, ?string $filePath = null, ?string $fileSize = null)
 * @method static \Illuminate\Database\Eloquent\Collection getUserLogs(int $userId)
 * @method static \Illuminate\Database\Eloquent\Collection getModelLogs(string $modelType, int $modelId)
 * @method static \Illuminate\Database\Eloquent\Collection getLogsByName(string $logName)
 * @method static \Illuminate\Database\Eloquent\Collection getLogsByEvent(string $event)
 *
 * @see \App\Services\ActivityLogService
 */
class ActivityLog extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'activity-log';
    }
}
