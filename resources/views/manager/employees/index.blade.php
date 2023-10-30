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
						<h1 class="text-base font-semibold leading-6 text-gray-900">Employees</h1>
						<p class="mt-2 text-sm text-gray-700">A list of all the employees.</p>
					</div>
					<div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
						<a href="{{ route('employees.create') }}" class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add New Employee</a>
					</div>
  				</div>
  				<div class="mt-8 flow-root">
  					<div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
  						<div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
  							<div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
  								<table class="min-w-full divide-y divide-gray-300">
  									<thead class="bg-gray-50">
										<tr>
											<th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Code</th>
											<th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Name</th>
											<th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">National Id</th>
											<th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Mobile</th>
											<th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Sex</th>
											
										</tr>
									</thead>
									<tbody class="divide-y divide-gray-200 bg-white">
										@foreach($employees as $employee)
										<tr>
											<td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ $employee->code}}</td>
											<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-900">{{ $employee->names}}</td>
											<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-900">{{$employee->national_id}}</td>
											<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-900">{{$employee->phone_number}}</td>
											<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-900">{{$employee->sex}}</td>
			  							</tr>
			  						@endforeach
			  					</tbody>
			  				</table>
			  			</div>
			  		</div>
			  	</div>
			</div>
		</div>
	</div>
</x-app-layout>