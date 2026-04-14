@php
    $content = [
        'page_title' => 'Practice 4',
        'title' => 'Practice 4',
        'subtitle' => 'Fill in the blanks',
        'sentences' => [
            "<span class='mr-2 inline-flex h-3 w-3 rounded-full bg-rose-500 align-middle'></span> It snowed a few days ago, so {{1}} would be fantastic today.",
            "<span class='mr-2 inline-flex h-3 w-3 rounded-full bg-orange-500 align-middle'></span> {{2}}, when is your birthday?",
            "<span class='mr-2 inline-flex h-3 w-3 rounded-full bg-amber-500 align-middle'></span> When you are traveling you have to {{3}} the cities to see all the sights.",
            "<span class='mr-2 inline-flex h-3 w-3 rounded-full bg-emerald-500 align-middle'></span> I hate when I eat too much because I feel {{4}}.",
            "<span class='mr-2 inline-flex h-3 w-3 rounded-full bg-sky-500 align-middle'></span> We {{5}} to Indonesia last year.",
            "<span class='mr-2 inline-flex h-3 w-3 rounded-full bg-violet-500 align-middle'></span> He is always really {{6}} in the summer.",
        ],
        'answers' => [
            'snowboarding',
            'by the way',
            'walk around',
            'uncomfortable',
            'went away',
            'sweaty',
        ],
    ];
@endphp

@include('slider.game.drag-and-drop-blanks', ['content' => $content])
