<?php

namespace App\Livewire;

use App\Models\Employee;
use Livewire\Attributes\Rule;
use Livewire\Component;

class EmployeeComponent extends Component
{
    public $search = '';

    #[Rule('required|min:5|string|max:255')]
    public $names = '';

    #[Rule(['required', 'min:10', 'string', 'max:20'])]
    public $phone_number = '';

    public function save()
    {
        $this->validate();
        $data = array_merge($this->only(['names', 'phone_number']), ['user_id' => auth()->user()->id]);
        Employee::create($data);

        return to_route('dashboard');
    }

    public function render()
    {
        return view('livewire.employee-component', ['employees' => Employee::where('names', 'like', '%'.$this->search.'%')
            ->orWhere('phone_number', 'like', '%'.$this->search.'%')
            ->get(),
        ]);

    }
}
