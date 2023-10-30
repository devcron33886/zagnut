<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public const GENDER_SELECT = [
        'Male' => 'Male',
        'Female' => 'Female'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($employee) {
            $lastEmployee = static::orderBy('id', 'desc')->first();
            $registrationNumber = 'ZAG-'.sprintf('%05d', ($lastEmployee ? $lastEmployee->id + 1 : 1));
            $employee->code = date('Y').$registrationNumber;
        });
    }
}
