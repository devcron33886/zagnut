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

    public function formattedLoss(): Money
    {
        return Money::RWF($this->loss);
    }

    public function formattedPaidLoss(): Money
    {
        return Money::RWF($this->paid_loss);
    }

    public function formattedBonus(): Money
    {
        return Money::RWF($this->bonus);
    }

    public function formattedRemainingLoss(): Money
    {
        $remaining_loss = $this->loss - $this->paid_loss;

        return Money::RWF($remaining_loss);
    }

    public function formattedTotal(): Money
    {
        $remaining_loss = $this->loss - $this->paid_loss;

        return Money::RWF($this->bar_amount + $this->kitchen_amount + $this->bonus + $remaining_loss);
    }

    public function formatedPayout(): Money
    {
        $daily_total = $this->bar_amount + $this->kitchen_amount + $this->bonus + $this->loss - $this->paid_loss;
        $grand_total = ($daily_total * $this->percentage) / 100;

        return Money::RWF($grand_total + $this->loss - $this->paid_loss);
    }
}
