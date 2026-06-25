@php
    $content = [

        'title'      => 'Practice 3',
        'subtitle'   => 'Fill in the blanks using the words in the box.',

        'sentences' => [
            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-emerald-500 text-sm font-black text-white'>1</span> A brand can help people {{1}} a product or service.",
            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-blue-500 text-sm font-black text-white'>2</span> Good brands build {{2}} with their customers.",
            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-pink-500 text-sm font-black text-white'>3</span> Brands often create an {{3}} such as happiness or excitement.",
            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-orange-500 text-sm font-black text-white'>4</span> Companies use {{4}} to promote their products.",
            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-violet-500 text-sm font-black text-white'>5</span> A brand can {{5}} a certain level of quality.",
            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-cyan-500 text-sm font-black text-white'>6</span> Strong brands {{6}} ideas and stories to people.",
            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-rose-500 text-sm font-black text-white'>7</span> Many brands want to {{7}} people’s choices.",
            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-amber-500 text-sm font-black text-white'>8</span> A brand helps {{8}} feel confident about what they buy.",
            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-indigo-500 text-sm font-black text-white'>9</span> Logos and names {{9}} a company or product.",
            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-teal-500 text-sm font-black text-white'>10</span> People often {{10}} brands they know well.",
        ],

        'answers' => [
            'trust',
            'trust',
            'emotion',
            'advertising',
            'guarantee',
            'communicate',
            'influence',
            'customers',
            'represent',
            'trust',
        ],

        'word_bank' => [
            'trust',
            'influence',
            'quality',
            'emotion',
            'belonging',
            'represent',
            'communicate',
            'customers',
            'guarantee',
            'advertising',
        ],
    ];
@endphp

@include("slider.game.drag-and-drop-blanks")