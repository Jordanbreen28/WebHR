<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Shifts;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ShiftController;
use Carbon\Carbon;

class ShiftCreate extends Component
{
    public $state;
    public $employee;
    public $shift_date;
    public $start_time;
    public $end_time;

    protected $rules = [
        'employee' => 'required',
        'shift_date' => 'required',
        'start_time' => 'required',
        'end_time' => 'required'
    ];

    public function render()
    {
        return view('livewire.shift-create', [
            'employees' => User::all(),
        ]);
    }

    public function createShift()
    {
                $this->validate(); //add vailidation in form protected $rules = []
                
                $employeeID = $this->employee;
                $shift_date = $this->shift_date;
                //parse time field into readable format for MySQL
                $start_time = $this->start_time;
                $end_time = $this->end_time;
                $start_time = Carbon::createFromTimestamp(strtotime($this->shift_date . $start_time . ":00"))->format('Y-m-d H:i:s');
                $end_time = Carbon::createFromTimestamp(strtotime($this->shift_date . $end_time . ":00"))->format('Y-m-d H:i:s');

                $employee_name = User::all()->where('id', $employeeID)->pluck('name')->first();

                Shifts::create([
                    'user_id' => $employeeID,
                    'created_by' => Auth::id(),
                    'shift_date' => $shift_date,
                    'shift_start' => $start_time,
                    'shift_end'=> $end_time,
                ]);

                session()->flash('message', 'Shift successfully created and email sent to '.$employee_name);
                //clear session values
                $this->employee = '';
                $this->shift_date = '';
                $this->start_time = '';
                $this->end_time = '';
}

}