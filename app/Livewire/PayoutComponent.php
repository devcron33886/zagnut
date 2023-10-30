<?php

namespace App\Livewire;

use AfricasTalking\SDK\AfricasTalking;
use App\Models\Employee;
use App\Models\Work;
use Livewire\Attributes\Rule;
use Livewire\Component;

class PayoutComponent extends Component
{
    public Work $work;

    #[Rule('required|integer')]
    public $employee_id = '';

    #[Rule('required|integer')]
    public $bar_amount = 0;

    #[Rule('required|integer')]
    public $kitchen_amount = 0;

    #[Rule('required|integer')]
    public $loss = 0;

    #[Rule('required|integer')]
    public $paid_loss = 0;

    #[Rule('required|integer')]
    public $remaining_loss = 0;

    #[Rule('required|integer')]
    public $bonus = 0;

    #[Rule('required|integer')]
    public $daily_total = 0;

    #[Rule('required|integer')]
    public $payout = 0;

    #[Rule('required|integer')]
    public $status = 0;

    public function mount(Work $work)
    {
        $this->work = $work;
    }

    public function save()
    {
        $data = array_merge($this->validate(), ['user_id' => auth()->user()->id]);
        Work::create($data);
        $username = 'zagnut';
        $apiKey = '1ec71d253627b01ea8580d94e572a9e947733bd165351db3321d6e08c1512977';
        $AT = new AfricasTalking($username, $apiKey);

        // Get one of the services
        $sms = $AT->sms();

        // Use the service
        $result = $sms->send([
            'to' => '+250785446262',
            'message' => 'Hello Jacques This is the balance you earned today '.$this->payout,
        ]);

        return to_route('works.index')
            ->with('status', 'Work successfully created.');
    }

    public function updated($key, $value)
    {
        if (in_array($key, ['bar_amount', 'kitchen_amount', 'loss', 'paid_loss', 'bonus'])) {
            $this->remaining_loss = $this->loss - $this->paid_loss;
            $this->daily_total = $this->bar_amount + $this->kitchen_amount + $this->remaining_loss;
        }
    }

    public function render()
    {
        $employees = Employee::all();

        return view('livewire.payout-component', ['employees' => $employees]);
    }
}
