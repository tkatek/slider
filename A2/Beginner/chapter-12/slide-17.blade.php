@php
    $content = [
        'page_title' => 'Practice 6',
        'title' => 'Practice 6',
        'subtitle' => 'Fill in with the suitable word',
        'sentences' => [
            "<span class='inline-flex h-7 w-7 items-center justify-center rounded-full bg-pink-500 text-sm font-black text-white shadow-sm'>1</span> This seafood {{1}} is really tasty.",
            "<span class='inline-flex h-7 w-7 items-center justify-center rounded-full bg-orange-500 text-sm font-black text-white shadow-sm'>2</span> I can’t eat spicy {{2}}.",
            "<span class='inline-flex h-7 w-7 items-center justify-center rounded-full bg-emerald-500 text-sm font-black text-white shadow-sm'>3</span> I don't enjoy preparing three {{3}} a day every day.",
            "<span class='inline-flex h-7 w-7 items-center justify-center rounded-full bg-sky-500 text-sm font-black text-white shadow-sm'>4</span> Doctors recommend at least 3 {{4}} a day.",
            "<span class='inline-flex h-7 w-7 items-center justify-center rounded-full bg-violet-500 text-sm font-black text-white shadow-sm'>5</span> The typical {{5}} in the UK is fish and chips.",
            "<span class='inline-flex h-7 w-7 items-center justify-center rounded-full bg-rose-500 text-sm font-black text-white shadow-sm'>6</span> The chef specializes in French {{6}}.",
        ],
        'answers' => [
            'dish',
            'food',
            'meals',
            'meals',
            'dish',
            'cuisine',
        ],
    ];
@endphp

@include('slider.game.drag-and-drop-blanks', ['content' => $content])