@props(['dark'])
@php
    $textColorClass = $dark ? 'text-white' : 'text-red-800';
    $pinkTextColorClass = $dark ? 'text-pink-400' : 'text-pink-600'
@endphp

<div class="px-6 pb-16 max-w-5xl mx-auto">
    <div class="md:flex text-center md:text-left mt-6 md:mt-12 {{ $textColorClass }}">
        <div class="order-2">
            <h3 class="slab text-2xl md:text-xl tracking-wide">Partneri projektu</h3>
            <ul class="mt-4 text-sm md:text-lg space-y-4">
                <li><a href="https://www.ustrcr.cz/" class="font-bold underline">Ústav pro studium totalitních režimů v Prahe</a></li>
                <li><a href="https://historickarevue.sme.sk/t/5318/dejiny-tyzdenny-historicky-podcast" class="font-bold underline">Denník SME – podcast Dejiny a Jaroslav Valent (šéfredaktor časopisu Historická revue)</a></li>
                <li><a href="https://snd.sk/" class="font-bold underline">Slovenské národné divadlo</a></li>
                <li>
                    Špeciálne poďakovanie za umožnenie prístupu k archívnym materiálom patrí Vojenskému historickému ústavu v Prahe.
                </li>
            </ul>
        </div>
        <div class="order-1 md:max-w-md">
            <h3 class="mt-10 md:mt-0 slab text-2xl md:text-xl tracking-wide">Cold Revolution</h3>
            <p class="mt-4 text-sm md:text-lg md:pr-16">
                Akcia ZET je pripravená aj pri príležitosti výstavno-edičného projektu
                <a href="https://zacheta.art.pl/en/kalendarz/konferencja-6" class="font-bold underline">Cold Revolution</a>
                (Jérôme Bazin, Joanna Kordjak) v Národnej galérii umenia Zachęta vo Varšave.
            </p>
        </div>
    </div>

    <div class="mt-16 max-w-4xl mx-auto text-center">
        <div class="{{ $pinkTextColorClass }}">
            <p class="slab leading-relaxed md:text-lg">
                „našou motiváciou je presvedčenie, že proti nebezpečenstvu totality vedie iba jedna cesta:
                cesta skúsenosti a slobodnej diskusie o tom, čoho sa treba vyvarovať“
            </p>
            <p class="mt-2 text-sm md:text-lg">Traumfabrik Kommunismus, 2003</p>
        </div>
    </div>
</div>
