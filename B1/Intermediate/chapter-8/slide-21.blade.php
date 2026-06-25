@php
    $content = [

        'title'      => 'Practice 9',
        'subtitle'   => 'Match the phrasal verbs to the sentences.',

        'sentences' => [
            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-emerald-500 text-sm font-black text-white'>1</span> We usually {{1}} at the mall after school.",
            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-blue-500 text-sm font-black text-white'>2</span> She {{2}} a way to solve the problem.",
            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-pink-500 text-sm font-black text-white'>3</span> The new smartphone {{3}} yesterday.",
            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-orange-500 text-sm font-black text-white'>4</span> Let's {{4}} that new café downtown.",
            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-violet-500 text-sm font-black text-white'>5</span> They {{5}} because they didn't want to cook.",
            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-cyan-500 text-sm font-black text-white'>6</span> Everything {{6}} better than expected.",
            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-rose-500 text-sm font-black text-white'>7</span> I felt {{7}} when my friends made plans without me.",
        ],

        'answers' => [
            'hang out',
            'worked out',
            'came out',
            'check out',
            'ate out',
            'turned out',
            'left out',
        ],

        'word_bank' => [
            'hang out',
            'worked out',
            'came out',
            'check out',
            'ate out',
            'turned out',
            'left out',
        ],
    ];
@endphp

@include("slider.game.drag-and-drop-blanks")