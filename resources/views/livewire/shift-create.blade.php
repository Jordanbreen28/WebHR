<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Shift') }}
        </h2>
    </x-slot>
<x-jet-form-section submit="createShift">
    <x-slot name="title">
    <x-slot name="description">
    <x-slot name="form">
        <!-- Name -->
    <div class="col-span-6 sm:col-span-4">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
    </h2>
    <div class="col-span-6 sm:col-span-4">
    <h1 class="font-semibold text-sml text-gray-800 leading-tight">
        {{ __('Add a new shift for an employee. Please be mindful that the employee will an receive email notification upon submission.') }}
    </h1>
</div>
<div class="p-3">
</div>
@if (session()->has('message'))
            <div id="alert" class="p-3 bg-green-300 text-white-200 rounded shadow-sm" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)">
                {{ session('message') }}
            </div>
            <div class="p-3"></div>
@endif
            <x-jet-label for="name" value="Employee" />
            <x-jet-input-error for="name" class="mt-2" required="true"/>
            <select class="form-control" wire:model="employee"  name="employee" class="mt-1 block w-full" wire:model.defer="state.name" autocomplete="name">
                    <option value="" selected>Choose employee</option>
                    @foreach($employees as $employee)
                        <option value="{{ $employee->id}}">{{ $employee->name }}</option>
                    @endforeach
                </select>
        </div>

        <!-- Shift Date -->
            <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="date" value="Shift Date" />
            <x-jet-input wire:model="shift_date" id="shift_date" type="date" class="mt-1 block w-full"/>
            <x-jet-input-error for="date" class="mt-2" />
        </div>
               <!-- Shift Start Time -->
            <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="start-time" value="Start Time" />
            <x-jet-input wire:model="start_time" id="start_time" type="time" class="mt-1 block w-full"/>
            <x-jet-input-error for="time" class="mt-2" />
        </div>
        <!-- Shift End Time -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="end-time" value="End Time (Expected)" />
            <x-jet-input wire:model="end_time" id="end_time" type="time" class="mt-1 block w-full"/>
            <x-jet-input-error for="time" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button type="submit" wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
    </x-slot>
    </x-slot>
</x-form-section>