@props(['dark' => false])
@php
    $textColorClass = $dark ? 'text-white' : 'text-red-800';
@endphp

<div>
    <div class="px-6 py-16 md:pt-16 md:pb-14 bg-pink-600 text-yellow-400 text-center">
        <p class="slab leading-relaxed tracking-wide md:text-lg max-w-2xl mx-auto">
            „našou motiváciou je presvedčenie, že&nbsp;proti nebezpečenstvu totality vedie iba jedna cesta:
            cesta skúsenosti a&nbsp;slobodnej diskusie o&nbsp;tom, čoho sa&nbsp;treba vyvarovať“
        </p>
        <p class="mt-2 text-sm md:text-base">Traumfabrik Kommunismus, 2003</p>
    </div>
    <div class="md:flex text-center md:text-left mt-6 md:mt-12 px-6 pb-32 max-w-5xl mx-auto {{ $textColorClass }}">
        <div class="order-2">
            <h3 class="slab text-2xl md:text-xl tracking-wide">Partneri projektu</h3>
            <ul class="mt-4 text-sm md:text-base space-y-4">
                <li><a href="https://www.ustrcr.cz/" class="font-bold underline">Ústav pro studium totalitních <span class="sm:hidden"><br /></span> režimů v Prahe</a></li>
                <li><a href="https://historickarevue.sme.sk/t/5318/dejiny-tyzdenny-historicky-podcast" class="font-bold underline">Denník SME – podcast Dejiny <span class="sm:hidden"><br /></span>a Jaroslav Valent</a></li>
                <li><a href="https://snd.sk/" class="font-bold underline">Slovenské národné divadlo</a></li>
                <li>
                    Špeciálne poďakovanie za umožnenie prístupu k archívnym materiálom patrí Vojenskému historickému ústavu v Prahe.
                </li>
            </ul>
        </div>
        <div class="order-1 md:max-w-md">
            <h3 class="mt-10 md:mt-0 slab text-2xl md:text-xl tracking-wide">Cold Revolution</h3>
            <p class="mt-4 text-sm md:text-base md:pr-16">
                Akcia ZET je pripravená aj pri príležitosti výstavno-edičného projektu
                <a href="https://zacheta.art.pl/en/kalendarz/konferencja-6" class="font-bold underline">Cold Revolution</a>
                v Národnej galérii umenia Zachęta vo Varšave.
            </p>
        </div>
    </div>
</div>
