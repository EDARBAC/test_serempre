<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clients') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-2 my-3">
                        <div>
                            <select name="city" wire:model="city">
                                <option>Select City</option>
                                @foreach ($cities as $item)
                                    <option value="{{ $item->cod }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            <select wire:model="perPage">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="15">15</option>
                                <option value="20">20</option>
                                <option value="25">25</option>
                            </select>
                        </div>
                        <div class="grid justify-items-end">
                            <a href="{{ route('clients.create') }}" wire:click="" class="hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                <i class="fas fa-plus"></i>   Add
                            </a>
                        </div>
                    </div>

                    <table class="w-full">
                        <thead>
                            <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                                <th class="px-2 py-2">Code</th>
                                <th class="px-2 py-2">Name</th>
                                <th class="px-2 py-2">City</th>
                                <th class="px-2 py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($clients as $client)
                                <tr>
                                    <td class="px-2 py-3 border w-1/12">{{ $client->cod }}</td>
                                    <td class="px-2 py-3 border">{{ $client->name }}</td>
                                    <td class="px-2 py-3 border">{{ $client->cityy->name }}</td>
                                    <td class="px-2 py-3 border w-2/12">
                                        <a href="{{ route('clients.edit',['client' => $client->cod]) }}" class="hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-1 px-2 border border-blue-500 hover:border-transparent rounded">Edit</a>
                                        <button wire:click="delete({{ $client->cod }})" class="hover:bg-red-500 text-red-700 font-semibold hover:text-white py-1 px-2 border border-red-500 hover:border-transparent rounded">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if( count($clients) > 1 )
                        {{ $clients->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
