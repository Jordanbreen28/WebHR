<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Shifts') }}
        </h2>
    </x-slot>
<form class="form-hor" action="" method="PUT">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            @foreach($shifts as $shift)
            <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="date" value="Shift Date" />
            <x-jet-label type="date" class="mt-1 block w-full" value="{{$shift->shift_date}}"/>
            </div>               
            @endforeach
            <button class="btn btn" type="submit">Clock-in</button>
            </form>
            <form class="form-hor" action="" method="PUT">
            <button class="btn btn" type="submit">Clock-out</button>
            </form>
            </div>
        </div>
    </div>
            </div>
        </div>
    </div>