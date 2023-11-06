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
						<h1 class="text-base font-semibold leading-6 text-gray-900">Add New Employee(Ongeramo umukozi mushya)</h1>
						
					</div>
  				</div>
	            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-8">
	            	<div class="px-8 py-8">
	            		<form action="{{ route('employees.store')}}" method="POST">
	            			@csrf
	            			<div>
	            				<x-input-label for="names" :value="__('Names')" />
	            				<x-text-input id="names" class="block mt-4 w-full" type="text" name="names" :value="old('names')" required autofocus autocomplete="name" />
	            				<x-input-error :messages="$errors->get('names')" class="mt-2" />
	        				</div>
		        			<div class="mt-4">
		            			<x-input-label for="phone_number" :value="__('Phone Number')" />
		            			<x-text-input id="phone_number" class="block mt-4 w-full" type="tel" name="phone_number" :value="old('phone_number')" />
		            			<x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
		        			</div>
		        			<div class="mt-4">
		            			<x-input-label for="national_id" :value="__('National Id')" />
		            			<x-text-input id="national_id" class="block mt-1 w-full" type="tel" name="national_id" :value="old('national_id')" />
		            			<x-input-error :messages="$errors->get('national_id')" class="mt-2" />
		        			</div>
		        			<div class="mt-4">
	  							<x-input-label for="Gender" :value="__('Gender')" />
		        				<select class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="sex" :value="old('sex')">
		        					<option value disabled {{ old('sex', null) === null ? 'selected' : '' }}>Select Gender</option>
                                        @foreach(App\Models\Employee::GENDER_SELECT as $key => $label)
                                            <option value="{{ $key }}" {{ old('sex', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                        @endforeach
		        				</select>
		        				<x-input-error :messages="$errors->get('sex')" class="mt-2" />
							</div>
		        			<div class="mt-4">
		        				<x-primary-button>
                					{{ __('Save New Employee') }}
            					</x-primary-button>
            				</div>
	            		</form>
	        		</div>
	            </div>
        	</div>
    	</div>
	</div>
</x-app-layout>