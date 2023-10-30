<div>
    <form  wire:submit="save">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-4">
            <div class="mt-4">
                <x-input-label for="employee" :value="__('Choose Employee')" />
                <select class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="employee_id"  wire:model="employee_id" autofocus>

                <option value disabled {{ old('employee_id', null) === null ? 'selected' : '' }}>Select Employee</option>
                @foreach($employees as $employee)
                    <option value="{{ $employee->id}}" {{ old('employee_id') == $employee->id ? 'selected' : '' }}>{{ $employee->code}} ({{$employee->names}})</option>
                @endforeach
                </select>
                <x-input-error :messages="$errors->get('employee_id')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="bar" :value="__('Amount in Bar')" />
                <x-text-input id="bar_amount" class="block mt-1 w-full" type="number" name="bar_amount" :value="old('bar_amount')"  wire:model.live.debounce.250ms="bar_amount" />
                <x-input-error :messages="$errors->get('bar_amount')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="kitchen_amount" :value="__('Amount in Kitchen')" />
                <x-text-input id="kitchen_amount" class="block mt-1 w-full" type="number" name="kitchen_amount" :value="old('kitchen_amount')"  wire:model.live.debounce.250ms="kitchen_amount" />
                <x-input-error :messages="$errors->get('kitchen_amount')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="loss" :value="__('Amount of Loss Employee has')" />
                <x-text-input id="loss" class="block mt-1 w-full" type="number" name="loss"  :value="old('loss')" wire:model="loss"/>
                <x-input-error :messages="$errors->get('loss')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="paid_loss" :value="__('Amount of Loss Paid by Employee')" />
                <x-text-input id="paid_loss" class="block mt-1 w-full" type="number" name="paid_loss"  :value="old('paid_loss')" wire:model.live.debounce.250ms="loss"/>
                <x-input-error :messages="$errors->get('paid_debt')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="remaining_loss" :value="__('Amount of Remainin Loss Employee Has')" />
                <x-text-input id="remaining_loss" class="block mt-1 w-full" type="number" name="remaining_loss"  :value="old('kitchen_amount')" wire:model.live.debounce.250ms="remaining_loss"/>
                <x-input-error :messages="$errors->get('remaining_loss')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="bonus" :value="__('Amount of Bonus Employee Earned today')" />
                <x-text-input id="bonus" class="block mt-1 w-full" type="number" name="bonus"  :value="old('bonus')" wire:model.live.debounce.250ms="bonus"/>
                <x-input-error :messages="$errors->get('bonus')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="daily_total" :value="__('Total amount Employee worked today')" />
                <x-text-input id="daily_total" class="block mt-1 w-full" type="number" name="daily_total" wire:model.live.debounce.250ms="0" wire:model="daily_total" :value="old('daily_total')"/>
                <x-input-error :messages="$errors->get('daily_total')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="payout" :value="__('Total amount Employee worked today')" />
                <x-text-input id="payout" class="block mt-1 w-full" type="number" name="payout" wire:model.live.debounce.250ms="0" wire:model="payout" :value="old('payout')"/>
                <x-input-error :messages="$errors->get('payout')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="Status" :value="__('Employee Work Status')" />
                <select class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="status" :value="old('status')" wire:model="status">
                     <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>Select Status</option>
                    @foreach(App\Models\Work::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('status')" class="mt-2" />
            </div>
        </div>
        <div class="mt-4">
            <x-primary-button>
                {{ __('Save New Work Day') }}
            </x-primary-button>
        </div>
    </form>
</div>
