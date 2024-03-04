<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Products Form') }}
        </h2>
    </header>
  
    <div class="container mx-auto">
        <form method="POST" wire:submit.prevent="storeProduct" class="mt-6 space-y-6">
            @csrf
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input wire:model.lazy="name" id="name" name="name" type="text" class="mt-1 block w-full" required autofocus autocomplete="name" />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>

            <div>
                <x-input-label for="description" :value="__('Description')" />
                <x-text-input wire:model.lazy="description" id="description" name="description" type="text" class="mt-1 block w-full" required autofocus autocomplete="description" />
                <x-input-error class="mt-2" :messages="$errors->get('description')" />
            </div>

            <div>
                <x-input-label for="price" :value="__('Price')" />
                <x-text-input wire:model.lazy="price" id="price" name="price" type="number" class="mt-1 block w-full" required autofocus autocomplete="price" />
                <x-input-error class="mt-2" :messages="$errors->get('price')" />
            </div>
            
            <div>
                <x-input-label for="location" :value="__('Location')" />
                <x-text-input wire:model.lazy="location" id="location" name="location" type="text" class="mt-1 block w-full" required autofocus autocomplete="location" />
                <x-input-error class="mt-2" :messages="$errors->get('location')" />
            </div>

            <div>
                <x-input-label for="validTo" :value="__('Valid To')" />
                <x-text-input wire:model.lazy="validTo" id="validTo" name="validTo" type="text" class="mt-1 block w-full" required autofocus autocomplete="validTo" />
                <x-input-error class="mt-2" :messages="$errors->get('validTo')" />
            </div>
            
            <div>
                <x-input-label for="category" :value="__('Category')" />
                <x-text-input wire:model.lazy="category" id="category" name="category" type="text" class="mt-1 block w-full" required autofocus autocomplete="category" />
                <x-input-error class="mt-2" :messages="$errors->get('category')" />
            </div>
            
            <x-primary-button class="bg-blue-600">{{ __('Save') }}</x-primary-button>
            
        </form>
    </div>
</section>

<script>
        flatpickr('#validTo', {
            mode: 'single',
            dateFormat: 'Y-m-d',
        });
</script>