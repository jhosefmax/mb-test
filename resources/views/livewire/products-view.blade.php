<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Products View') }}
        </h2>
    </header>
    
    <div class="w-full flex justify-end">
        <x-primary-button wire:click="newProduct()"  class="bg-blue-600">{{ __('New') }}</x-primary-button>
    </div>
    <div class="flex items-center mb-4">
        <div class="w-full">
            <x-input-label for="searchField" :value="__('Search Field')" class="block ml-2 w-3/4"/>
            <select wire:model.live.debounce.100ms="searchField" id="searchField" name="searchField" style="height: 41px;" class="block ml-2 w-3/4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="name">Name</option>
                <option value="location">Location</option>
                <option value="category">Category</option>
                <option value="validTo">Valid To</option>
            </select>
        </div>
        <div class="w-full">
            <x-input-label :value="__('Search')" />
            
            <div class="w-full" @if($searchField !== 'validTo') style="display: none;" @endif>
                <x-text-input type="text" value="{{ old('search') }}" class="date-range-picker mt-1 block w-full" placeholder="Select Date Range" wire:model.live.debounce.500ms="search" id="dateRangeField" name="dateRangeField" required autofocus autocomplete="search" />
            </div>
            <div class="w-full" @if($searchField === 'validTo') style="display: none;" @endif>
                <x-text-input placeholder="Search..." value="{{ old('search') }}" wire:model.live.debounce.500ms="search" id="searchField" name="searchField" type="text" class="mt-1 block w-full" required autofocus autocomplete="search" />
            </div>
        </div>
    </div>
    
    <div class="shadow-lg rounded-lg overflow-hidden mx-4 md:mx-10 ">
        <table class="w-full table-fixed">
            <thead>
                <tr class="bg-gray-100">
                    <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">Id</th>
                    <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">Name</th>
                    <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">Price</th>
                    <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">Location</th>
                    <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">Valid To</th>
                    <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">Category</th>
                    <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">Edit</th>
                    <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">Remove</th>
                </tr>
            </thead>
            <tbody class="bg-white">
            @foreach($products as $product)
                <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                    <td class="py-4 px-6 border-b border-gray-200">{{ $product->id }}</td>
                    <td class="py-4 px-6 border-b border-gray-200 truncate">{{ $product->name }}</td>
                    <td class="py-4 px-6 border-b border-gray-200">{{ $product->price }}</td>
                    <td class="py-4 px-6 border-b border-gray-200">{{ $product->location }}</td>
                    <td class="py-4 px-6 border-b border-gray-200 truncate">{{ $product->validTo }}</td>
                    <td class="py-4 px-6 border-b border-gray-200">{{ $product->category }}</td>
                    <td class="py-4 px-6 border-b border-gray-200" style="text-align: center;">
                        <button wire:click="redirectToEdit({{ $product->id }})" class="text-white py-1 px-2 rounded-full text-xs" style="background-color: #4299e1 !important;">
                            Edit
                        </button>
                    </td>
                    <td class="py-4 px-6 border-b border-gray-200" style="text-align: center;">
                        <button wire:click="destroy({{ $product->id }})" class="bg-red-500 text-white py-1 px-2 rounded-full text-xs">
                            Delete
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div style="margin-top: 10px;">
    {{ $products->links() }}    
    </div>

</section>

<script>
        flatpickr('#dateRangeField', {
            mode: 'range',
            dateFormat: 'Y-m-d',
        });
</script>