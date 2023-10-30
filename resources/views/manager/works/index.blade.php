<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('Daily Works') }}
		</h2>
	</x-slot>
	<div class="py-12">
		<div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
			<div class="px-4 sm:px-6 lg:px-8">
  				<div class="sm:flex sm:items-center">
					<div class="sm:flex-auto">
						<h1 class="text-base font-semibold leading-6 text-gray-900">Daily Works</h1>
					</div>
					<div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
						<a href="{{ route('works.create') }}" class="block rounded-md bg-lime-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-lime-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-lime-600">Add New Work</a>
					</div>
  				</div>
  				<div class="mt-8 flow-root">
  					<div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
  						<div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
  							<div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
  								<table id="myTable" class="min-w-full divide-y divide-gray-300">
  									<thead class="bg-gray-50">
										<tr>
											<th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Code</th>
											<th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Bar Amount</th>
											<th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Kitchen Amount</th>
											<th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Loss</th>
											<th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Paid Loss</th>
											<th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Remaining Loss</th>
											<th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Bonus</th>
											<th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Total Amount</th>
											<th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Payout</th>
											<th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Percentage</th>
											<th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Status</th>
										</tr>
									</thead>
									<tbody class="divide-y divide-gray-200 bg-white">
										@foreach($works as $work)
										<tr>
											<td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ $work->employee->code}}</td>
											<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-900">{{ $work->formattedBar() }}</td>
											<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-900">{{ $work->formattedKitchen() }}</td>
											<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-900">{{ $work->formattedLoss() }}</td>
											<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-900">{{ $work->formattedPaidLoss() }}</td>
											<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-900">{{ $work->formattedRemainingLoss() }}</td>
											<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-900">{{ $work->formattedBonus() }}</td>
											<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-900">{{ $work->formattedTotal() }}</td>
											<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-900">{{ $work->formatedPayout() }}</td>
											<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-900">{{ $work->percentage }}</td>
											<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-900">
												@if($work->status==1)
													<span class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">Closed</span>
												@elseif($work->status==0)
													<span class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/10">Open</span>
												@endif
											</td>
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