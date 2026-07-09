@php
    $content = [
        'title'      => 'Practice 8',
        'subtitle'   => 'Complete the conversation',


        'sentences' => [
            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-blue-500 text-sm font-black text-white'>1</span> Tyler {{1}} fallen asleep.",

            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-emerald-500 text-sm font-black text-white'>2</span> He {{2}} forgotten about dinner.",

            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-violet-500 text-sm font-black text-white'>3</span> He {{3}} had an emergency.",

            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-amber-500 text-sm font-black text-white'>4</span> He {{4}} not had time to call.",

            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-rose-500 text-sm font-black text-white'>5</span> He might have {{5}}.",
        ],

        'answers' => [
            'must have',
            "couldn't have",
            'could have',
            'might have',
            'gone out',
        ],

        'word_bank' => [
            'must have',
            'might have',
            "couldn't have",
            'could have',
            'gone out',
        ],
    ];
@endphp

@include("slider.game.drag-and-drop-blanks")