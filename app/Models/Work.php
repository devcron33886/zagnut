<?php

namespace App\Models;

use Cknow\Money\Money;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Work extends Model
{
    use SoftDeletes;

    public const STATUS_SELECT = [
        '0' => 'Open',
        '1' => 'Closed',
    ];

    protected $guarded = [];

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function formattedBar(): Money
    {
        return Money::RWF($this->bar_amount);
    }

    public function formattedKitchen(): Money
    {
        return Money::RWF($this->kitchen_amount);
    }

    public function formattedBingalo(): Money
    {
        return Money::RWF($this->bingalo_amount);
    }

    public function formattedChamber(): Money
    {
        return Money::RWF($this->chamber_amount);
    }

    public function formattedCashIn(): Money
    {
        return Money::RWF($this->cash_in);
    }

    public function formattedCashOut(): Money
    {
        return Money::RWF($this->cash_out);
    }
    public function formattedPayOut(): Money
    {
        return Money::RWF($this->payout);
    }

    public function formattedTotal(): Money
    {
        return Money::RWF($this->bar_amount + $this->kitchen_amount + $this->bingalo_amount+$this->chamber_amount);
    }

    public function formatedSalary(): Money
    {
        return Money::RWF($this->payout);
    }
    public function formatedPercentage(): Money
    {
        $total_amount=$this->bar_amount + $this->kitchen_amount + $this->bingalo_amount+$this->chamber_amount;
        return Money::RWF($total_amount/30);
    }

}
