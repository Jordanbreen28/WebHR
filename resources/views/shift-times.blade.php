<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
<form class="form-hor" action="{{ url('clock-in')}}" method="post">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            @foreach($shift_times as $shift_time)
                            <ul>{{$shift_time->shift_start}}</ul>
            @endforeach
            <button class="btn btn" type="submit">Clock-in</button>
            </form>
            <form class="form-hor" action="{{ url('clock-out')}}" method="PUT">

            @foreach($shift_times as $shift_time)
                            <ul>{{$shift_time->shift_end}}</ul>
            @endforeach
            <button class="btn btn" type="submit">Clock-out</button>
            </form>
            </div>
        </div>
    </div>
            </div>
        </div>
    </div>
</x-app-layout>

