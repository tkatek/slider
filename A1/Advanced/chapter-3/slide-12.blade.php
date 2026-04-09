@php
    $content = [
        'page_title' => 'Practice 5',
        'title' => 'Practice 5',
        'subtitle' => 'Checking out of a hotel',

        'sentences' => [
            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-pink-100 text-sm font-extrabold text-pink-700 ring-1 ring-pink-200 dark:bg-pink-500/15 dark:text-pink-300 dark:ring-pink-400/20'>1</span> How can I {{1}}",
            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-blue-100 text-sm font-extrabold text-blue-700 ring-1 ring-blue-200 dark:bg-blue-500/15 dark:text-blue-300 dark:ring-blue-400/20'>2</span> We would like to {{2}}",
            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-emerald-100 text-sm font-extrabold text-emerald-700 ring-1 ring-emerald-200 dark:bg-emerald-500/15 dark:text-emerald-300 dark:ring-emerald-400/20'>3</span> Sure. Can I have your {{3}}",
            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-violet-100 text-sm font-extrabold text-violet-700 ring-1 ring-violet-200 dark:bg-violet-500/15 dark:text-violet-300 dark:ring-violet-400/20'>4</span> Did you like your {{4}}",
            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-amber-100 text-sm font-extrabold text-amber-700 ring-1 ring-amber-200 dark:bg-amber-500/15 dark:text-amber-300 dark:ring-amber-400/20'>5</span> That will be {{5}}",
            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-rose-100 text-sm font-extrabold text-rose-700 ring-1 ring-rose-200 dark:bg-rose-500/15 dark:text-rose-300 dark:ring-rose-400/20'>6</span> Did you use {{6}}",
            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-cyan-100 text-sm font-extrabold text-cyan-700 ring-1 ring-cyan-200 dark:bg-cyan-500/15 dark:text-cyan-300 dark:ring-cyan-400/20'>7</span> Have a safe {{7}}",
            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-indigo-100 text-sm font-extrabold text-indigo-700 ring-1 ring-indigo-200 dark:bg-indigo-500/15 dark:text-indigo-300 dark:ring-indigo-400/20'>8</span> Everything was {{8}}",
            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-fuchsia-100 text-sm font-extrabold text-fuchsia-700 ring-1 ring-fuchsia-200 dark:bg-fuchsia-500/15 dark:text-fuchsia-300 dark:ring-fuchsia-400/20'>9</span> We have some {{9}}",
            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-teal-100 text-sm font-extrabold text-teal-700 ring-1 ring-teal-200 dark:bg-teal-500/15 dark:text-teal-300 dark:ring-teal-400/20'>10</span> Our bus will come {{10}}",
            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-orange-100 text-sm font-extrabold text-orange-700 ring-1 ring-orange-200 dark:bg-orange-500/15 dark:text-orange-300 dark:ring-orange-400/20'>11</span> Can we leave our {{11}}",
        ],

        'answers' => [
            'help you?',
            'check out, please.',
            'passport, please?',
            'stay here?',
            '10 euros.',
            'anything from the minibar?',
            'flight.',
            'great, thank you.',
            'time.',
            'in 2 hours.',
            'bags here?',
        ],
    ];
@endphp

@include('slider.game.drag-and-drop-blanks', ['content' => $content])