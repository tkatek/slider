@php
    $content = [
        'page_title' => 'Practice 3',
        'title'      => 'Practice 3',
        'subtitle'   => 'Complete each sentence with the correct word from the word bank.',

        // No audio
        'audio' => null,

        'sentences' => [
            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-blue-500 text-sm font-black text-white'>1</span> The detective found a {{1}} near the window.",

            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-emerald-500 text-sm font-black text-white'>2</span> Please {{2}} your seatbelt before the car moves.",

            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-violet-500 text-sm font-black text-white'>3</span> We heard someone {{3}} during the movie.",

            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-amber-500 text-sm font-black text-white'>4</span> The children played outside and their shoes became {{4}}.",

            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-rose-500 text-sm font-black text-white'>5</span> The police searched for {{5}} to solve the case.",

            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-cyan-500 text-sm font-black text-white'>6</span> She had to {{6}} down to pick up the coin.",

            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-indigo-500 text-sm font-black text-white'>7</span> Someone tried to {{7}} the door open.",

            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-orange-500 text-sm font-black text-white'>8</span> The {{8}} was broken, so the gate wouldn’t close.",

            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-fuchsia-500 text-sm font-black text-white'>9</span> We saw a strange {{9}} on the wall.",

            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-teal-500 text-sm font-black text-white'>10</span> He didn’t {{10}} the truth until later.",

            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-red-500 text-sm font-black text-white'>11</span> During the {{11}}, the lights went out.",

            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-lime-600 text-sm font-black text-white'>12</span> The cat left a {{12}} on the wet floor.",

            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-purple-500 text-sm font-black text-white'>13</span> Everyone thought an {{13}} had entered the house.",

            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-pink-500 text-sm font-black text-white'>14</span> There was a small {{14}} on the table.",

            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-sky-500 text-sm font-black text-white'>15</span> I {{15}} when I heard the loud noise.",
        ],

        'answers' => [
            'clue',
            'fasten',
            'whisper',
            'muddy',
            'evidence',
            'kneel',
            'force',
            'latch',
            'shadow',
            'realize',
            'storm',
            'footprint',
            'intruder',
            'scratch',
            'froze',
        ],

        'word_bank' => [
            'kneel',
            'muddy',
            'footprint',
            'latch',
            'fasten',
            'force',
            'intruder',
            'scratch',
            'shadow',
            'whisper',
            'storm',
            'realize',
            'freeze',
            'clue',
            'evidence',
        ],
    ];
@endphp

@include("slider.game.drag-and-drop-blanks")