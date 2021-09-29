<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\ShiftTimes;
use Carbon\Carbon;

class ShiftCreate extends Component
{
    public $state;
    public $employee;
    public $shift_date;
    public $start_time;
    public $end_time;

    public function render()
    {
        return view('livewire.shift-create', [
            'employees' => User::all(),
        ]);
    }

    public function mount()
    {
        //$this->employees = $employees;//Pass employee array from controller to livewire component
    }

    public function createShift()
    {
        //$this->validate(); //add vailidation in form protected $rules = []
        $employeeID = $this->employee;
        $shift_date = $this->shift_date;
        //parse time field into readable format for MySQL and MySQL
        $start_time = $this->start_time;
        $end_time = $this->end_time;
        $start_time = Carbon::createFromTimestamp(strtotime($this->shift_date . $start_time . ":00"))->format('Y-m-d H:i:s');
        $end_time = Carbon::createFromTimestamp(strtotime($this->shift_date . $end_time . ":00"))->format('Y-m-d H:i:s');

        ShiftTimes::create([
            'user_id' => $employeeID,
            'shift_date' => $shift_date,
            'shift_start' => $start_time,
            'shift_end'=> $end_time,
            

        ]);
        return redirect('/shift-create/{id}');
    }
}
