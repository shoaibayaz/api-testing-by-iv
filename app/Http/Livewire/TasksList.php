<?php

namespace App\Http\Livewire;

use App\Client\BauBuddy;
use App\Models\Task;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class TasksList extends Component
{
    public string $search = '';

    public function render(BauBuddy $bauBuddy)
    {
        Cache::remember('tasks', now()->addHour(), fn() => $bauBuddy->login()->tasks());
        $tasks = Task::search($this->search)->get();
        return view('livewire.tasks-list', compact('tasks'));
    }
}
