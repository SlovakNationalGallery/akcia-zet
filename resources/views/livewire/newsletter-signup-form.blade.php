<div class="bg-pink-600 text-center py-6 md:py-12 {{ $class }}">
    <h3 class="slab text-yellow-400 text-3xl md:text-5xl tracking-wide">Newsletter A*Z</h3>
    <form wire:submit.prevent="subscribe">
        <div class="md:flex mt-4 max-w-xl mx-auto">
            <div class="bg-gradient-to-b from-yellow-200 to-white h-12 relative mx-5 flex-1">
                <svg viewBox="0 0 8 8" class="absolute h-full">
                    <polygon points="0,0 0,8 1,4" class="fill-current text-pink-600">
                </svg>
                <svg viewBox="0 0 8 8" class="absolute h-full right-0">
                    <polygon points="8,0 7,4 8,8" class="fill-current text-pink-600">
                </svg>
                <input type="email"
                    placeholder="Vaša e-mailová adresa"
                    class="bg-transparent h-full w-full text-center text-lg"
                    required
                    wire:model.defer="email"
                />
            </div>
            <div>
                <input type="submit"
                    wire:loading.attr="disabled"
                    wire:loading.class="opacity-80"
                    value="Odoberať"
                    class="slab text-yellow-200 bg-gradient-to-b from-gray-700 to-red-800 hover:bg-none hover:bg-gray-700 disabled:bg-gray-700 disabled:bg-none disabled:text-yellow-100 rounded h-12 px-4 text-xl tracking-wide mt-6 md:mt-0"
                />

            </div>
        </div>
    </form>
    <p class="text-yellow-200 mt-4">
        <span wire:loading>Moment...</span>
        <span wire:loading.remove>
            @if($success) Ďakujeme. Vaša e-mailová adresa bola pridaná @endif
            @if($errors->any()) Ľutujeme, ale vyskytla sa neočakáná chyba @endif
        </span>
    </p>
</div>
