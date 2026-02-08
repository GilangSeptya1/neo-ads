<?php

namespace App\Services;

use App\Models\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class ActivityLogService
{
    /**
     * Store activity log
     *
     * @param string $logName The name/category of the log
     * @param string $description Description of the activity
     * @param string $event The event that occurred (created, updated, deleted, etc.)
     * @param string|null $subjectType The subject model type
     * @param int|null $subjectId The subject model ID
     * @param array|null $properties Additional properties to store
     * @return Log
     */
    public function log(
        string $logName,
        string $description,
        string $event = 'activity',
        ?string $subjectType = null,
        ?int $subjectId = null,
        ?array $properties = null
    ): Log {
        $user = Auth::user();

        return Log::create([
            'log_name' => $logName,
            'description' => $description,
            'subject_type' => $subjectType,
            'subject_id' => $subjectId,
            'causer_type' => $user ? get_class($user) : null,
            'causer_id' => $user?->id,
            'event' => $event,
            'properties' => $properties,
            'ip_address' => Request::ip(),
            'user_agent' => Request::userAgent(),
            'url' => Request::fullUrl(),
            'method' => Request::method(),
        ]);
    }

    /**
     * Log a create/create action
     *
     * @param string $logName
     * @param string $description
     * @param string|null $subjectType
     * @param int|null $subjectId
     * @param array|null $properties
     * @return Log
     */
    public function logCreated(
        string $logName,
        string $description,
        ?string $subjectType = null,
        ?int $subjectId = null,
        ?array $properties = null
    ): Log {
        return $this->log($logName, $description, 'created', $subjectType, $subjectId, $properties);
    }

    /**
     * Log an update action
     *
     * @param string $logName
     * @param string $description
     * @param string|null $subjectType
     * @param int|null $subjectId
     * @param array|null $properties
     * @return Log
     */
    public function logUpdated(
        string $logName,
        string $description,
        ?string $subjectType = null,
        ?int $subjectId = null,
        ?array $properties = null
    ): Log {
        return $this->log($logName, $description, 'updated', $subjectType, $subjectId, $properties);
    }

    /**
     * Log a delete action
     *
     * @param string $logName
     * @param string $description
     * @param string|null $subjectType
     * @param int|null $subjectId
     * @param array|null $properties
     * @return Log
     */
    public function logDeleted(
        string $logName,
        string $description,
        ?string $subjectType = null,
        ?int $subjectId = null,
        ?array $properties = null
    ): Log {
        return $this->log($logName, $description, 'deleted', $subjectType, $subjectId, $properties);
    }

    /**
     * Log a view/access action
     *
     * @param string $logName
     * @param string $description
     * @param string|null $subjectType
     * @param int|null $subjectId
     * @param array|null $properties
     * @return Log
     */
    public function logViewed(
        string $logName,
        string $description,
        ?string $subjectType = null,
        ?int $subjectId = null,
        ?array $properties = null
    ): Log {
        return $this->log($logName, $description, 'viewed', $subjectType, $subjectId, $properties);
    }

    /**
     * Log a download action
     *
     * @param string $logName
     * @param string $description
     * @param string|null $subjectType
     * @param int|null $subjectId
     * @param array|null $properties
     * @return Log
     */
    public function logDownloaded(
        string $logName,
        string $description,
        ?string $subjectType = null,
        ?int $subjectId = null,
        ?array $properties = null
    ): Log {
        return $this->log($logName, $description, 'downloaded', $subjectType, $subjectId, $properties);
    }

    /**
     * Log for authentication (login/logout)
     *
     * @param string $event The auth event (login, logout, failed, etc.)
     * @param string $description
     * @param array|null $properties
     * @return Log
     */
    public function logAuth(
        string $event,
        string $description,
        ?array $properties = null
    ): Log {
        return $this->log('auth', $description, $event, null, null, $properties);
    }

    /**
     * Log for file operations (upload, delete, etc.)
     *
     * @param string $event The file event (uploaded, deleted, etc.)
     * @param string $description
     * @param string|null $fileName
     * @param string|null $filePath
     * @param string|null $fileSize
     * @return Log
     */
    public function logFile(
        string $event,
        string $description,
        ?string $fileName = null,
        ?string $filePath = null,
        ?string $fileSize = null
    ): Log {
        $properties = array_filter(compact('fileName', 'filePath', 'fileSize'));

        return $this->log('file', $description, $event, null, null, $properties ?: null);
    }

    /**
     * Get logs for a specific user
     *
     * @param int $userId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getUserLogs(int $userId)
    {
        return Log::where('causer_id', $userId)
            ->where('causer_type', 'App\Models\User')
            ->latest()
            ->get();
    }

    /**
     * Get logs for a specific model
     *
     * @param string $modelType
     * @param int $modelId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getModelLogs(string $modelType, int $modelId)
    {
        return Log::where('subject_type', $modelType)
            ->where('subject_id', $modelId)
            ->latest()
            ->get();
    }

    /**
     * Get logs by log name/category
     *
     * @param string $logName
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getLogsByName(string $logName)
    {
        return Log::where('log_name', $logName)
            ->latest()
            ->get();
    }

    /**
     * Get logs by event
     *
     * @param string $event
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getLogsByEvent(string $event)
    {
        return Log::where('event', $event)
            ->latest()
            ->get();
    }
}
