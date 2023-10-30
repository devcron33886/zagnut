<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('Employees') }}
		</h2>
	</x-slot>
	<div class="py-12">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="px-4 sm:px-6 lg:px-8">
  				<div class="sm:flex sm:items-center">
					<div class="sm:flex-auto">
						<h1 class="text-base font-semibold leading-6 text-gray-900">Add New Today's Employee Work (Ongeramo amafaranga umukozi yakoreye)</h1>
					</div>
  				</div>
	            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-8">
	            	<div class="px-8 py-8">
	            		<form  method="POST" action="{{ route('works.store')}}">
	            			@csrf
					        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-4">
					            <div class="mt-4">
					                <x-input-label for="employee" :value="__('Choose Employee')" />
					                <select class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="employee_id" autofocus>

					                <option value disabled {{ old('employee_id', null) === null ? 'selected' : '' }}>Select Employee</option>
					                @foreach($employees as $employee)
					                    <option value="{{ $employee->id}}" {{ old('employee_id') == $employee->id ? 'selected' : '' }}>{{ $employee->code}} ({{$employee->names}})</option>
					                @endforeach
					                </select>
					                <x-input-error :messages="$errors->get('employee_id')" class="mt-2" />
					            </div>
					            <div class="mt-4">
					                <x-input-label for="bar" :value="__('Amount in Bar')" />
					                <x-text-input id="bar_amount" class="block mt-1 w-full" type="number" name="bar_amount" :value="old('bar_amount')" />
					                <x-input-error :messages="$errors->get('bar_amount')" class="mt-2" />
					            </div>
					            <div class="mt-4">
					                <x-input-label for="kitchen_amount" :value="__('Amount in Kitchen')" />
					                <x-text-input id="kitchen_amount" class="block mt-1 w-full" type="number" name="kitchen_amount" :value="old('kitchen_amount')" />
					                <x-input-error :messages="$errors->get('kitchen_amount')" class="mt-2" />
					            </div>
					            <div class="mt-4">
					                <x-input-label for="loss" :value="__('Amount of Loss Employee has')" />
					                <x-text-input id="loss" class="block mt-1 w-full" type="number" name="loss"  :value="old('loss')"/>
					                <x-input-error :messages="$errors->get('loss')" class="mt-2" />
					            </div>
					            <div class="mt-4">
					                <x-input-label for="paid_loss" :value="__('Amount of Loss Paid by Employee')" />
					                <x-text-input id="paid_loss" class="block mt-1 w-full" type="number" name="paid_loss"  :value="old('paid_loss')"/>
					                <x-input-error :messages="$errors->get('paid_debt')" class="mt-2" />
					            </div>
					            
					            <div class="mt-4">
					                <x-input-label for="bonus" :value="__('Amount of Bonus Employee Earned today')" />
					                <x-text-input id="bonus" class="block mt-1 w-full" type="number" name="bonus"  :value="old('bonus')"/>
					                <x-input-error :messages="$errors->get('bonus')" class="mt-2" />
					            </div>
					            <div class="mt-4">
		            				<x-input-label for="percentage" :value="__('Percentage to Work on')" />
		            				<x-text-input id="percentage" class="block mt-1 w-full" type="number" name="percentage" :value="old('percentage')" />
		            				<x-input-error :messages="$errors->get('percentage')" class="mt-2" />
		        				</div>
					            <div class="mt-4">
					                <x-input-label for="Status" :value="__('Employee Work Status')" />
					                <select class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="status" :value="old('status')">
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
	            </div>
        	</div>
    	</div>
	</div>
</x-app-layout>