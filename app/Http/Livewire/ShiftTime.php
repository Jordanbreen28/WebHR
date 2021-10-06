<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Shifts;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use DB;


class ShiftTime extends Component
{
    public function render()
    {
        return view('livewire.shift-times');
    }
}
