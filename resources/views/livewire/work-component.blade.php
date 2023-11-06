<div x-data="{ 'showModal': false }" @keydown.escape="showModal = false" x-cloak>
    <!-- Trigger for Modal -->
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
        </div>
        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
            <button class="block rounded-md bg-lime-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-lime-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-lime-600" @click="showModal = true">Andika amafaranga yakorewe</button>
        </div>
    </div>
    <!-- Modal -->
    <div class="fixed inset-0 z-30 flex items-center justify-center overflow-auto bg-black bg-opacity-50" x-show="showModal">
        <!-- Modal inner -->
        <div class="w-full max-w-4xl px-8 py-6 mx-auto text-left bg-white rounded shadow-lg" @click.away="showModal = true"
            x-transition:enter="motion-safe:ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100">
            <!-- Title / Close-->
            <div class="flex items-center justify-between">
                <h1 class="mr-3 font-bold uppercase text-xl text-black max-w-none">Ongeramo akazi Kakozwe</h1>
                <button type="button" class="z-50 cursor-pointer rounded-full bg-red-400 py-2 px-2" @click="showModal = false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <!-- content -->
            <div class="py-8">
                <form wire:submit="save">
                    <div class="grid grid-cols-1 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-4">
                        <div class="mt-4">
                            <x-input-label for="employee" :value="__('Choose Employee')" />
                            <select class="select2" name="employee_id" id="employees" wire:model="employee_id" autofocus>
                                <option value disabled {{ old('employee_id', null) === null ? 'selected' : '' }}>Select Employee</option>
                                @foreach(\App\Models\Employee::all() as $employee)
                                    <option value="{{ $employee->id}}" {{ old('employee_id') == $employee->id ? 'selected' : '' }}>{{ $employee->code}} ({{$employee->names}})</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('employee_id')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="bar_amount" :value="__('Bar Amount')" />
                            <x-text-input id="bar_amount" class="block mt-1 w-full" type="number" wire:model="bar_amount"  />
                            <x-input-error :messages="$errors->get('bar_amount')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="kitchen_amount" :value="__('Kitchen Amount')" />
                            <x-text-input id="kitchen_amount" class="block mt-1 w-full" type="number" wire:model="kitchen_amount" />
                            <x-input-error :messages="$errors->get('kitchen_amount')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="chamber_amount" :value="__('Chamber Amount')" />
                            <x-text-input id="chamber_amount" class="block mt-1 w-full" type="number" wire:model="chamber_amount"/>
                            <x-input-error :messages="$errors->get('chamber_amount')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="bingalo_amount" :value="__('Bingalo Amount')" />
                            <x-text-input id="bingalo_amount" class="block mt-1 w-full" type="number" wire:model="bingalo_amount" />
                            <x-input-error :messages="$errors->get('bingalo_amount')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="cash_in" :value="__('Cash In')" />
                            <x-text-input id="cash_in" class="block mt-1 w-full" type="number" wire:model="cash_in" />
                            <x-input-error :messages="$errors->get('cash_in')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="cash_out" :value="__('Cash Out')" />
                            <x-text-input id="cash_out" class="block mt-1 w-full" type="number" wire:model="cash_out" />
                            <x-input-error :messages="$errors->get('cash_out')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="payout" :value="__('Daily Payout')" />
                            <x-text-input id="payout" class="block mt-1 w-full" type="number" wire:model.live="payout"/>
                            <x-input-error :messages="$errors->get('payout')" class="mt-2" />
                        </div>
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Bika umwirondoro</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@push('js')
    <script>
        // Wait for the DOM to be ready
        $(document).ready(function () {
            // Initialize Select2 on the select element with the "mySelect" ID
            $('#employees').select2({
                theme: 'tailwind',
            });
        });
    </script>
</script>
@endpush