<x-app-layout>
    <div class="nav-spacer"></div>
    {{-- Mobile header --}}
    <div class="px-6 md:hidden">
        <div class="mt-4 text-sm text-pink-400 font-semibold flex justify-center flex-wrap">
            <a href="#" class="px-2">#propaganda</a>
            <a href="#" class="px-2">#článok</a>
            <a href="#" class="px-2">#video</a>
        </div>
        <h2 class="mt-4 slab text-4xl text-red-800 tracking-wide leading-tight text-center">Akcia ZET umenovedná výprava</h2>
        <p class="mt-4 text-gray-400 text-sm text-center">
            19. Novembra 2020 — 27. Júna 2021 Esterházyho palác, Bratislava
            <br/>
            Námet: Alexandra Kusá
        </p>
    </div>
    <img class="mt-10 md:mt-0 h-40 md:h-96 w-full object-cover" src="https://placekitten.com/800/600">
    <div class="px-6 max-w-5xl mx-auto">
        <h2 class="mt-10 hidden md:block slab text-5xl text-red-800 tracking-wide leading-tight text-center">Hoaxy medzi nami</h2>
        <p class="mt-8 max-w-2xl mx-auto slab font-bold text-sm tracking-wide text-red-800 text-center leading-relaxed md:text-lg md:leading-7">
            Od novembra tohto roku maľuje v átriu SNG výtvarník Marcel Mališ autorskú repliku strateného diela - svoj nový obraz s pozmeneným názvom VďakyZdanie československého ľudu. Ako verne k úlohe pristúpi, bude na jeho rozhodnutí.
        </p>
        <div class="mt-4 md:mt-12 md:grid md:grid-cols-3 gap-x-8  text-sm md:text-lg ">
            <div class="hidden md:block">
                <p class="text-gray-400 ">
                    19. Novembra 2020 — 27. Júna 2021
                    <br/>
                    Esterházyho palác, Bratislava
                    <br/>
                    Námet: Alexandra Kusá
                </p>
                <ul class="mt-8 text-pink-400 font-semibold space-y-2">
                    <li><a href="#">#propaganda</a></li>
                    <li><a href="#">#článok</a></li>
                    <li><a href="#">#video</a></li>
                </ul>
            </div>
            <div class="text-gray-800 col-span-2">
                <p>
                    Pre maliara bude galéria „pracovňou“ a obraz tak bude pribúdať pred zrakmi verejnosti.
                    Maliarska akcia je východiskom pre nový experimentálny žáner - umenovednú výpravu, ktorá zrkadlí
                    naše premýšľanie o postavení národnej galérie ako vzdelávacej inštitúcie dnes. Je to miesto kladenia otázok a hľadania odpovedí.
                </p>
                <p class="mt-4 italic">
                    V horúcom júni roku 1950, ktorý sa stane novým temným obdobím našej novodobej histórie,
                    v tom júni, keď bola popravená Milada Horáková, začína trojica výtvarníkov pracovať na veľkolepej
                    propagandistickej zákazke. Jan Čumpelík, Jaromír Schoř a Alena Čermáková ako členovia tvorivého
                    kolektívu Č.S.Č. maľujú na zákazku ikonické dielo socialistického realizmu Vďakyvzdanie českého a
                    slovenského ľudu generalissimovi Stalinovi. Monumentálny obraz (8,7 x 8 m) má reprezentovať servilnosť
                    Československa na výstave hospodárskych úspechov v Moskve, no nakoniec sa stáva highlightom výstavy
                    Československo-sovietskeho priateľstva v umení na pražskom Žofíne. Obrazu je venovaná mimoriadna
                    pozornosť, o jeho vzniku pravidelne informujú médiá, jeho odhalenie sprevádza adekvátna mediálna
                    pozornosť, prezentuje sa za účasti politikov, nakrúca ho filmový štáb. Nadšenie však veľmi skoro
                    opadáva a obraz sa stáva terčom kritiky. V marci 1953 jeho hlavný protagonista zomiera a obraz
                    navždy zmizne.
                </p>
                <p class="mt-4">
                    Výprava je príležitosťou na otvorenie niekoľkých tém, ktoré sú (nielen) v našom umení znepokojujúco prítomné.
                    Okrem situácie v 50. rokoch 20. storočia sa budeme venovať aj vzťahu propagandy a umenia, hoaxom,
                    budovaniu kultu osobnosti či téme strachu, vzťahu originálu a kópie, problematike autorstva,
                    monumentálnej tvorbe, umeniu na zákazku, mecenášstvu či vnímaniu a chápaniu problematických úsekov našich dejín.
                    Ukončenie projektu sme naplánovali na 27. júna 2021, symbolicky na výročie popravy Milady Horákovej.
                </p>
            </div>
        </div>

        <div class="mt-6 md:hidden text-sm text-pink-400 font-semibold flex justify-center flex-wrap">
            <a href="#" class="px-2">#propaganda</a>
            <a href="#" class="px-2">#článok</a>
            <a href="#" class="px-2">#video</a>
        </div>
    </div>
    <div class="mt-12 bg-gradient-to-r-334 from-red-800 to-gray-700 shadow-lg">
        <div class="p-6 max-w-7xl mx-auto grid md:grid-cols-2 gap-x-16">
            <div class="flex">
                <div class="border border-yellow-200 h-full w-20 flex-shrink-0 md:mr-12"></div>
                <x-article-preview class="pt-4" />
            </div>
            <div>
                {{-- Mobile divider --}}
                <hr class="my-6 border-t-2 border-yellow-200 md:hidden">
                <div class="flex h-full">
                    {{-- Desktop divider --}}
                    <div class="border-l-2 border-yellow-200 h-full w-2 -ml-8 mr-8"></div>
                    <x-article-preview class="pt-4" />
                    <div class="border border-yellow-200 h-full w-20 flex-shrink-0 md:ml-12"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="px-6 pb-16 max-w-5xl mx-auto">
        <div class="md:flex text-center md:text-left text-red-800 mt-6 md:mt-12">
            <div class="order-2">
                <h3 class="slab text-2xl md:text-lg tracking-wide">Partneri projektu</h3>
                <ul class="mt-4 text-xs md:text-base space-y-4">
                    <li><a href="https://www.ustrcr.cz/" class="font-bold underline">Ústav pro studium totalitních režimů v Prahe</a></li>
                    <li><a href="https://historickarevue.sme.sk/t/5318/dejiny-tyzdenny-historicky-podcast" class="font-bold underline">Denník SME – podcast Dejiny a Jaroslav Valent (šéfredaktor časopisu Historická revue)</a></li>
                    <li><a href="https://snd.sk/" class="font-bold underline">Slovenské národné divadlo</a></li>
                    <li>
                        Špeciálne poďakovanie za umožnenie prístupu k archívnym materiálom patrí Vojenskému historickému ústavu v Prahe.
                    </li>
                </ul>
            </div>
            <div class="order-1 md:max-w-md">
                <h3 class="mt-10 md:mt-0 slab text-2xl md:text-lg tracking-wide">Cold Revolution</h3>
                <p class="mt-4 text-xs md:text-base md:pr-16">
                    Akcia ZET je pripravená aj pri príležitosti výstavno-edičného projektu Cold Revolution
                    (Jérôme Bazin, Joanna Kordjak) v Národnej galérii umenia Zachęta vo Varšave.
                </p>
            </div>
        </div>

        <div class="mt-8 md:mt-16 max-w-2xl mx-auto text-center">
            <div class="text-pink-600">
                <p class="slab leading-relaxed">
                    „našou motiváciou je presvedčenie, že proti nebezpečenstvu totality vedie iba jedna cesta:
                    cesta skúsenosti a slobodnej diskusie o tom, čoho sa treba vyvarovať“
                </p>
                <p class="mt-2 text-sm md:text-base">Traumfabrik Kommunismus, 2003</p>
            </div>
        </div>
    </div>
</x-app-layout>