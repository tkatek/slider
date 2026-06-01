<?php

$content = [
    'page_title' => 'Practice 5',
    'title'      => 'Practice 5',
    'subtitle'   => 'Complete the Dialogue',
    'type'       => 'reading',

    'sentences' => [
        '<span class="mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-pink-500 to-rose-500 px-3 py-1 text-sm font-black text-white">Noelia</span>Paul, have you got a {{1}}? I need a favour.',

        '<span class="mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-sky-500 to-blue-500 px-3 py-1 text-sm font-black text-white">Paul</span>I’m a bit busy, but {{2}}. What can I {{3}} you with?',

        '<span class="mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-pink-500 to-rose-500 px-3 py-1 text-sm font-black text-white">Noelia</span>You know the project for Active Arctic?',

        '<span class="mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-sky-500 to-blue-500 px-3 py-1 text-sm font-black text-white">Paul</span>Yes.',

        '<span class="mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-pink-500 to-rose-500 px-3 py-1 text-sm font-black text-white">Noelia</span>I’m really {{4}} about this, but they want some more changes.',

        '<span class="mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-sky-500 to-blue-500 px-3 py-1 text-sm font-black text-white">Paul</span>Really?',

        '<span class="mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-pink-500 to-rose-500 px-3 py-1 text-sm font-black text-white">Noelia</span>Would you be {{5}} to work on it this afternoon?',

        '<span class="mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-sky-500 to-blue-500 px-3 py-1 text-sm font-black text-white">Paul</span>I’m not really sure if I {{6}}.',

        '<span class="mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-pink-500 to-rose-500 px-3 py-1 text-sm font-black text-white">Noelia</span>Is there any {{7}} you could work late tonight?',

        '<span class="mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-sky-500 to-blue-500 px-3 py-1 text-sm font-black text-white">Paul</span>Sorry, Noelia. I would if I {{8}}, but I can’t.',
    ],

    'answers' => [
        'minute',
        'sure',
        'help',
        'sorry',
        'able',
        'can',
        'chance',
        'could',
    ],
];

?>

@include('slider.game.drag-and-drop-blanks-v2', ['content' => $content])