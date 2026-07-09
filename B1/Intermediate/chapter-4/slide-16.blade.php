@php
    $content = [

        'title'      => 'Reading Comprehension',
        'subtitle'   => 'Fill in the blanks using the words in the box.',

        'sentences' => [
            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-emerald-500 text-sm font-black text-white'>1</span> The potato chip was {{1}} in 1853 in New York.",
            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-blue-500 text-sm font-black text-white'>2</span> The snack quickly became {{2}} around the world.",
            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-pink-500 text-sm font-black text-white'>3</span> Herman W. Lay started a successful {{3}}.",
            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-orange-500 text-sm font-black text-white'>4</span> Chips come in many different {{4}}.",
            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-violet-500 text-sm font-black text-white'>5</span> A {{5}} complained that the potatoes were too thick.",
            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-cyan-500 text-sm font-black text-white'>6</span> In 1961, two companies {{6}} together to form Frito-Lay.",
            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-rose-500 text-sm font-black text-white'>7</span> Snack chips are not very {{7}}.",
            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-amber-500 text-sm font-black text-white'>8</span> They contain a lot of {{8}}.",
            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-indigo-500 text-sm font-black text-white'>9</span> Chips are {{9}} to eat.",
            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-teal-500 text-sm font-black text-white'>10</span> The snack industry continues to {{10}} every year.",
        ],

        'answers' => [
            'invented',
            'popular',
            'company',
            'flavours',
            'customer',
            'joined',
            'healthy',
            'fat',
            'easy',
            'grow',
        ],

        'word_bank' => [
            'invented',
            'popular',
            'company',
            'flavours',
            'customer',
            'joined',
            'healthy',
            'fat',
            'easy',
            'grow',
        ],
    ];
@endphp

@include("slider.game.drag-and-drop-blanks")