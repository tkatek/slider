@php
    $content = [
        'page_title' => 'Practice 4',
        'title' => 'Practice 4',
        'subtitle' => 'Fill in using words in the box',


        'sentences' => [
            "<span class='mr-1 inline-block font-extrabold text-pink-600 dark:text-pink-400'>A:</span> How is he doing in class? {{1}}",
            "<span class='mr-1 inline-block font-extrabold text-blue-600 dark:text-blue-400'>B:</span> How is his behaviour? {{2}}",
            "<span class='mr-1 inline-block font-extrabold text-pink-600 dark:text-pink-400'>C:</span> Does he need help with anything? {{3}}",
            "<span class='mr-1 inline-block font-extrabold text-blue-600 dark:text-blue-400'>D:</span> Are there any school events soon? {{4}}",
        ],

        'answers' => [
            'He is doing well.',
            'He is friendly and polite.',
            'He needs more practice in writing.',
            'Yes, we have Sports Day next week.',
        ],


    ];
@endphp

@include('slider.game.drag-and-drop-blanks', ['content' => $content])