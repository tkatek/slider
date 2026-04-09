@php
    $content = [
        'page_title' => 'Practice 4',
        'title' => 'Practice 4',
        'subtitle' => 'Fill in using words in the box',

        'sentences' => [
            "<span class='mr-1 inline-block font-extrabold text-pink-600 dark:text-pink-400'>A:</span> Yes, I’d like to {{1}} in, please.",
            "<span class='mr-1 inline-block font-extrabold text-blue-600 dark:text-blue-400'>B:</span> Certainly, do you have a reservation with us?",
            "<span class='mr-1 inline-block font-extrabold text-pink-600 dark:text-pink-400'>A:</span> Yes, the name’s Peter Fox.",
            "<span class='mr-1 inline-block font-extrabold text-blue-600 dark:text-blue-400'>B:</span> That’s funny. I can’t find your name in the computer. Do you have your confirmation number?",
            "<span class='mr-1 inline-block font-extrabold text-pink-600 dark:text-pink-400'>A:</span> Yes, it’s 6913.",
            "<span class='mr-1 inline-block font-extrabold text-blue-600 dark:text-blue-400'>B:</span> Oh, I see. Sorry. Your name was spelled wrong. And {{2}} I see your passport, please?",
            "<span class='mr-1 inline-block font-extrabold text-pink-600 dark:text-pink-400'>A:</span> Here you are.",
            "<span class='mr-1 inline-block font-extrabold text-blue-600 dark:text-blue-400'>B:</span> Okay. How will you be paying for your room?",
            "<span class='mr-1 inline-block font-extrabold text-pink-600 dark:text-pink-400'>A:</span> I’ll pay in {{3}}.",
            "<span class='mr-1 inline-block font-extrabold text-blue-600 dark:text-blue-400'>B:</span> In that case I’ll have to ask you for a {{4}}.",
            "<span class='mr-1 inline-block font-extrabold text-pink-600 dark:text-pink-400'>A:</span> That’s fine.",
        ],

        'answers' => [
            'check',
            'could',
            'cash',
            'deposit',
        ],

    ];
@endphp

@include('slider.game.drag-and-drop-blanks', ['content' => $content])