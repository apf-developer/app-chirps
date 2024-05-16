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
                    <form action="{{ route('chirps.store') }}" method="POST">
                        @csrf
                        <textarea name="mensaje"
                                  class="block w-full rounded-md border-gray-300 shadow-sm bg-white"       
                                  placeholder="¿Qué estás pensando?" 
                        >{{ old('mensaje') }}</textarea>
                        <x-input-error :messages="$errors->get('mensaje')" class="mt-2" />
                        <x-primary-button class="mt-4">{{ __('Chirp') }}</x-primary-button>
                    </form>
                </div>
            </div>
            @foreach ($chirps as $chirp)
                <div class="bg-white dark:bg-slate-800 rounded-lg px-6 py-8 ring-1 ring-slate-900/5 shadow-sm mt-4">
                    <div>
                        <span class="inline-flex items-center justify-center p-2 bg-green-700 rounded-md shadow-lg">
                            <svg class="h-6 w-6 text-white dark:text-gray-400 -scale-x-100" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                            </svg>
                        </span>
                        <small class="ml-2 text-slate-700 dark:text-white font-medium">{{ $chirp->created_at->format('j M Y, g:i a') }}</small>
                        @if ($chirp->created_at != $chirp->updated_at)
                            <small class="ml-2 text-orange-500 dark:text-orange-100 font-medium">Editado</small>
                        @endif
                    </div>
                    <h3 class="text-slate-900 dark:text-white mt-5 text-base font-medium tracking-tight">{{ $chirp->user->name }}</h3>
                    <p class="text-slate-500 dark:text-slate-400 mt-2 text-sm">
                        {{ $chirp->mensaje }}
                    </p>
                    @can('update', $chirp)
                        <a class="mt-3 text-blue-500 dark:text-blue-200" href="{{ route('chirps.edit', $chirp) }}">Editar</a>
                        <form action="{{ route('chirps.delete', $chirp) }}" method="POST">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-500 dark:text-red-200">Eliminar</button>
                        </form>
                    @endcan
                </div>
            @endforeach
        </div>
    </div>

</x-app-layout>
