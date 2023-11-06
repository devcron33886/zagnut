<?php

namespace App\Livewire;

use App\Models\Work;
use Livewire\Attributes\Rule;
use Livewire\Component;

class WorkComponent extends Component
{
    public Work $work;

    #[Rule('required|integer|exists:employees,id')]
    public $employee_id = '';

    #[Rule('required|integer')]
    public $bar_amount = '';

    #[Rule('required|integer')]
    public $kitchen_amount = '';

    #[Rule('required|integer')]
    public $chamber_amount = '';

    #[Rule('required|integer')]
    public $bingalo_amount = '';

    #[Rule('required|integer')]
    public $cash_in = '';

    #[Rule('required|integer')]
    public $cash_out = '';

    #[Rule('required|integer')]
    public $payout = '';


    public function save()
    {
        $this->validate();
        $data = array_merge($this->only(['employee_id', 'bar_amount', 'kitchen_amount', 'chamber_amount', 'bingalo_amount', 'cash_in', 'cash_out', 'payout']), ['user_id' => auth()->user()->id]);
        Work::create($data);
        return to_route('dashboard');
    }

    public function updated($key, $value)
    {
        if (in_array($key, [$this->only(['bar_amount', 'kitchen_amount', 'chamber_amount', 'bingalo_amount', 'cash_in', 'cash_out'])])) {
            $this->payout = $this->bar_amount + $this->bingalo_amount + $this->kitchen_amount;
        }
    }

    public function render()
    {
        return view('livewire.work-component');
    }
}
