<div x-data="{ 'showModal': false }" @keydown.escape="showModal = false" x-cloak> 
    <div class="flex flex-1 items-center justify-center px-2 lg:ml-6 lg:justify-end">
        <div class="w-full max-w-lg lg:max-w-xs">
            <label for="search" class="sr-only">Search</label>
            <div class="relative">
                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                    <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
                    </svg>
                </div>
                <input type="search" wire:model.live="search" class="block w-full rounded-md border-0 bg-white py-1.5 pl-10 pr-3 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Shakisha Umukozi">
            </div>
        </div>
        @if (!empty($search))
            <div class="relative mt-24">
                <div class="absolute left-1/2 z-10 mt-5 flex w-screen max-w-max -translate-x-1/2 px-4">
                    <div class="w-screen max-w-md flex-auto overflow-hidden rounded-md bg-white text-sm leading-6 shadow-lg ring-1 ring-gray-900/5">
                        @forelse ($employees as $employee)
                            <div class="p-4 items-center">
                                <div class="group relative flex gap-x-6 rounded-lg p-4 hover:bg-gray-50">
                                    <a href="" class="sm:flex sm:items-center">
                                        <div class="sm:flex-auto">
                                            {{ $employee->phone_number}}
                                        </div>
                                        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                                            <span class="inline-flex justify-end rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">Add Work</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @empty
                            <div class="p-4 items-center">
                                <div class="group relative flex gap-x-6 rounded-lg p-4 bg-yellow-100">
                                    <div class="sm:flex sm:items-center">
                                        <div class="sm:flex-auto">
                                            Uyu mukozi ntago arimo
                                        </div>
                                        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                                            <button class="inline-flex block rounded-md bg-lime-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-lime-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-lime-600" @click="showModal = true">
                                                    Mwongeremo
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        @endif     
    </div>
    <!-- Modal -->
    <div class="fixed inset-0 z-30 flex items-center justify-center overflow-auto bg-black bg-opacity-50" x-show="showModal">
        <!-- Modal inner -->
        <div class="w-full max-w-3xl max-h-full px-8 py-6 mx-auto text-left bg-white shadow-sm sm:rounded-lg mt-8 flow-root" @click.away="showModal = true"
            x-transition:enter="motion-safe:ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100">
            <!-- Title / Close-->
            <div class="flex items-center justify-between">
                <h1 class="mr-3 font-bold uppercase px-3.5 py-2.5 text-xl text-black max-w-none">Ongeramo Umukozi Mushya</h1>
                <button type="button" class="z-50 cursor-pointer rounded-full bg-red-400 py-2 px-2" @click="showModal = false">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </button>
            </div>
            <!-- content -->
            <div class="py-8">
                <form wire:submit="save">
                    <div class="mt-4">
                        <x-input-label for="names" :value="__('Names')" />
                        <x-text-input id="names" class="block mt-1 w-full" type="text" wire:model="names" />
                        <x-input-error :messages="$errors->get('names')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="phone_number" :value="__('Phone Number')" />
                        <x-text-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" wire:model="phone_number" />
                        <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Bika umwirondoro</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
