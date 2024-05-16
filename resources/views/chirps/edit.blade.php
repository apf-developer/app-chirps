<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Chirps') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('chirps.update', $chirp) }}" method="POST">
                        @csrf @method('PUT')
                        <textarea name="mensaje"
                                  class="block w-full rounded-md border-gray-300 shadow-sm bg-white"       
                                  placeholder="¿Qué estás pensando?" 
                        >{{ old('mensaje', $chirp->mensaje) }}</textarea>
                        <x-input-error :messages="$errors->get('mensaje')" class="mt-2" />
                        <x-primary-button class="mt-4">{{ __('Actualizar') }}</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
