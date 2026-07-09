@php
    $content = [
        'page_title' => 'Practice 4',
        'title'      => 'Practice 4',
        'subtitle'   => 'Complete each sentence using the expressions in the box',

        'sentences' => [
            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-green-500 text-sm font-black text-white'>1</span> Many people {{1}} the simple things in life, like fresh air and clean water.",

            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-green-500 text-sm font-black text-white'>2</span> We can’t wait for others to solve the problem; {{2}} to protect the environment.",

            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-green-500 text-sm font-black text-white'>3</span> Even small actions {{3}}, and they can make a big difference.",

            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-green-500 text-sm font-black text-white'>4</span> Everyone should {{4}} to reduce their impact on the planet.",

            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-green-500 text-sm font-black text-white'>5</span> One easy way to help is {{5}} when you see trash in your community.",

            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-green-500 text-sm font-black text-white'>6</span> Using public transport or planting trees helps {{6}} in our cities.",

            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-green-500 text-sm font-black text-white'>7</span> I plan to {{7}} renewable energy sources to reduce my electricity use.",

            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-green-500 text-sm font-black text-white'>8</span> If we all work together, {{8}} to build a better future for our planet.",
        ],

        'answers' => [
            'take for granted',
            'it’s up to us',
            'counts',
            'take steps',
            'picking up litter',
            'keep the air clean',
            'switch to',
            'take action',
        ],

        'word_bank' => [
            'take for granted',
            'take action',
            'take steps',
            'counts',
            'picking up litter',
            'keep the air clean',
            'switch to',
            'it’s up to us',
        ],
    ];
@endphp

@include("slider.game.drag-and-drop-blanks")