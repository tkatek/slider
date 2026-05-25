@php
    $content = [
        'page_title' => 'Practice 3',
        'title' => 'Practice 3',
        'subtitle' => 'Drag & drop the right word to fill in the sentences',
        'sentences' => [
            "<span class='mr-3 inline-flex h-7 w-7 items-center justify-center rounded-full bg-pink-500 text-sm font-black text-white shadow-sm'>1</span> I {{1}} my coffee.",
            "<span class='mr-3 inline-flex h-7 w-7 items-center justify-center rounded-full bg-orange-500 text-sm font-black text-white shadow-sm'>2</span> I {{2}} my phone.",
            "<span class='mr-3 inline-flex h-7 w-7 items-center justify-center rounded-full bg-emerald-500 text-sm font-black text-white shadow-sm'>3</span> I {{3}} my keys.",
            "<span class='mr-3 inline-flex h-7 w-7 items-center justify-center rounded-full bg-sky-500 text-sm font-black text-white shadow-sm'>4</span> I {{4}} the bus.",
            "<span class='mr-3 inline-flex h-7 w-7 items-center justify-center rounded-full bg-violet-500 text-sm font-black text-white shadow-sm'>5</span> I {{5}} my finger.",
            "<span class='mr-3 inline-flex h-7 w-7 items-center justify-center rounded-full bg-rose-500 text-sm font-black text-white shadow-sm'>6</span> I {{6}} my head.",
            "<span class='mr-3 inline-flex h-7 w-7 items-center justify-center rounded-full bg-teal-500 text-sm font-black text-white shadow-sm'>7</span> I {{7}} my bag.",
        ],
        'answers' => [
            'spilled',
            'dropped',
            'lost',
            'missed',
            'cut',
            'hit',
            'lost',
        ],
    ];
@endphp

@include('slider.game.drag-and-drop-blanks', ['content' => $content])