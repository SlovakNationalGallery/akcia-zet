<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
                    <div class="flex items-center">
                        <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="{{ route('admin.articles.index') }}">Články</a></div>
                    </div>

                    <div class="ml-4">
                        <div class="mt-2 text-sm text-gray-500">
                            Pridať, upraviť alebo vymazať články.
                        </div>
                        <a href="{{ route('admin.articles.index') }}">
                            <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                                    <div>Prejsť na články</div>

                                    <div class="ml-1 text-indigo-500">
                                        <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                    </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
