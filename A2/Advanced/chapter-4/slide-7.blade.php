<?php

$content = [
    'page_title' => 'Listening Practice',
    'title'      => 'Listening again',
    'subtitle'   => 'Complete the sentences using the words from the box.',
    'type'       => 'reading',

    'audio' => materialAsset('slider/A2/Advanced/chapter-4/audios/slide6.mp3'),

    'sentences' => [
        '<span class="mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-sky-500 to-cyan-400 px-3 py-1 text-sm font-black text-white">1</span>The woman {{1}} all the Star Wars movies.',
        '<span class="mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-violet-500 to-fuchsia-500 px-3 py-1 text-sm font-black text-white">2</span>The man {{2}} seen the latest Spiderman movie.',
        '<span class="mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-emerald-500 to-teal-400 px-3 py-1 text-sm font-black text-white">3</span>Have you {{3}} the new café?',
        '<span class="mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-amber-500 to-orange-400 px-3 py-1 text-sm font-black text-white">4</span>No, I {{4}}.',
    ],

    'answers' => [
        'has seen',
        'hasn’t',
        'tried',
        'haven’t',
    ],

    'script' => [
        'Conversation 1',
        'Man: Have you seen the new Star Wars movie?',
        'Woman: Yes, I have seen them all.',
        'Man: Have you seen all the Spiderman movies?',
        'Woman: No, I haven’t. Have you?',
        'Man: Yes, I have seen them all except the latest one.',
        'Woman: Oh, I’ve seen that one! It’s good!',

        'Conversation 2',
        'Man: Have you tried the new café?',
        'Woman: No, I haven’t. I haven’t had time. Have you?',
        'Man: I have. It is really nice, but I’ve only been there once.',
        'Woman: I’ve heard it is really nice.',
        'Man: It is! They’ve done a nice job!',
    ],
];

?>

@include('slider.game.drag-and-drop-blanks-v2', ['content' => $content])
