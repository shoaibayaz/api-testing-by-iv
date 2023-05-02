<x-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Tasks') }}
            </h2>
            <x-primary-link
                x-data=""
                style="cursor: pointer;"
                x-on:click.prevent="$dispatch('open-modal', 'select-image')"
            >
               Modal
            </x-primary-link>
            <x-modal name="select-image" focusable>
                <div class="p-6">
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Select Image') }}
                    </h2>
                    <div class="mt-4">
                        <x-input-label for="image" :value="__('Image')" />
                        <x-text-input id="image" name="image" type="file" class="mt-1 block w-full" onchange="loadFile()" id="file-input"/>
                    </div>
                    <div class="mt-4">
                        <x-input-label for="image" :value="__('Image Preview')" />
                        <img id="output"/>
                    </div>
                </div>
            </x-modal>
        </div>
    </x-slot>
    <livewire:tasks-list></livewire:tasks-list>
    @push('scripts')
        <script>
            const loadFile = function() {
                const fileInput = document.getElementById('file-input');
                const output = document.getElementById('output');
                output.src = URL.createObjectURL(fileInput.files[0]);
                output.onload = function() {
                    URL.revokeObjectURL(output.src)
                }
            };
        </script>
    @endpush
</x-layout>
