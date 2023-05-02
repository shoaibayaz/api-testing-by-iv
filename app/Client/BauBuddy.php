<?php

namespace App\Client;

use App\Models\Task;
use Illuminate\Support\Facades\Http;

class BauBuddy
{
    public string $token = '';

    public function login()
    {
        try {
            $result = Http::asJson()
                ->withoutVerifying()
                ->withBasicAuth('API_Explorer', '123456isALamePass')
                ->post(config('services.bau_buddy.login_url'), [
                    'username' => '365',
                    'password' => '1'
                ]);

            $data = $result->json();
            $this->token = $data['oauth']['access_token'];
            return $this;
        } catch (\Exception $e) {
            abort(500, 'Unable to login to the api');
        }
    }

    public function tasks()
    {
        $results = Http::asJson()
            ->withoutVerifying()
            ->withToken($this->token)
            ->get(config('services.bau_buddy.base_url') . '/tasks/select');

        foreach ($results->json() as $task) {
            Task::updateOrCreate(
                ['task' => $task['task']],
                [
                    'title' => $task['title'],
                    'description' => $task['description'],
                    'color_code' => $task['colorCode'],
                ]
            );
        }

        return Task::all();
    }
}
