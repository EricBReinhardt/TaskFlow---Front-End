<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class SupabaseService
{
    protected $baseUrl;
    protected $apiKey;
    
    public function __construct()
    {
        $this->baseUrl = config('services.supabase.url');
        $this->apiKey = config('services.supabase.key');
    }
    
    public function fetchTasks($projectId)
    {
        return Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->apiKey,
            'apikey' => $this->apiKey
        ])->get("{$this->baseUrl}/rest/v1/tasks", [
            'project_id' => 'eq.' . $projectId
        ])->json();
    }
}