<div class="py-12" wire:poll.360000ms>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="my-4">
            <x-input-label for="search" :value="__('Search')"/>

            <x-text-input id="search" class="block mt-1 w-full" wire:model="search" type="text" name="search"/>
        </div>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Task
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Title
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Description
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Color Code
                        </th>
                    </tr>
                    </thead>
                    <tbody class="p-2">
                    @forelse($tasks as $task)
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $task->task }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $task->title }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $task->description }}
                            </td>
                            <td class="px-6 py-4" style="background: {{ $task->color_code }}">
                                &nbsp;
                            </td>
                        </tr>
                    @empty
                        <tr class="bg-white border-b">
                            <td colspan="4">
                                <div
                                    class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                                    role="alert">
                                    <span class="block sm:inline">No Tasks found!</span>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
