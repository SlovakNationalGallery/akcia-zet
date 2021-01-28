<div x-data="{{ json_encode(['show' => session()->has('message')])}}"
    x-show="show"
    style="display: none;"
    class="text-sm text-gray-600 overflow-hidden sm:rounded-md my-4">
    <div class="px-4 py-5 bg-indigo-500 text-white sm:p-6 flex flex-row items-start">
        <div class="flex-grow">
            {{ session('message') }}
        </div>
        <a href="#" class="font-bold hover:underline" @click.prevent="show = false">Zavrieť</a>
    </div>

</div>
