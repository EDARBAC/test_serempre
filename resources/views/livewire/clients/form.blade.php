<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if (empty($client->cod))
                Create Client
            @else
                Edit Client
            @endif
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form class="w-full">
                        <div class="flex flex-wrap -mx-3 mb-6">
                            @if ($client->cod)
                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                    Code
                                </label>
                                <input disabled class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="Name ..." value="{{ $client->cod }}">
                            </div>
                            @endif
                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                    Name
                                </label>
                                <input wire:model="client.name" class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('name') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="Name ...">
                                @error('name')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                    City
                                </label>
                                <select wire:model="client.city" class="@error('name') border-red-500 @enderror">
                                    <option>Select City</option>
                                    @foreach ($cities as $item)
                                        <option value="{{ $item->cod }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('city')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                        </form>
                    </div>
                    <div class="grid grid-cols-1 my-3 justify-items-end">
                        <div class="grid grid-cols-2">
                            <button wire:click="save" class="mx-2 hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                <i class="fas fa-save"></i>  Save
                            </button>
                            <a href="{{ route('clients.index') }}" class="mx-2 hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded">
                                <i class="fas fa-close"></i>  Return
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

