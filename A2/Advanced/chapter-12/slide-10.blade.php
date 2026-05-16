<?php

$content = [
    'page_title' => 'Conversation Corner: Describing people',
    'title'      => 'Conversation Corner',
    'subtitle'   => 'Describing people<br>Listen to the conversation. Write the missing words. Then, Practice the conversation with a partner',
    'type'       => 'reading',
    'audio' => materialAsset('slider/A2/Advanced/chapter-12/audios/slide8.mp3'),

    'sentences' => [
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-sky-500 to-cyan-400 px-3 py-1 text-sm font-black text-white\">A</span>How do you like your new roommate?",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-violet-500 to-fuchsia-500 px-3 py-1 text-sm font-black text-white\">B</span>I don’t know... She’s {{1}}!",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-sky-500 to-cyan-400 px-3 py-1 text-sm font-black text-white\">A</span>What do you mean?",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-violet-500 to-fuchsia-500 px-3 py-1 text-sm font-black text-white\">B</span>She’s {{2}} at night. She watches TV and sings in her room.",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-sky-500 to-cyan-400 px-3 py-1 text-sm font-black text-white\">A</span>So she’s not as nice as your last roommate?",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-violet-500 to-fuchsia-500 px-3 py-1 text-sm font-black text-white\">B</span>No. My last roommate was {{3}} and considerate.",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-sky-500 to-cyan-400 px-3 py-1 text-sm font-black text-white\">A</span>So what are you going to do?",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-violet-500 to-fuchsia-500 px-3 py-1 text-sm font-black text-white\">B</span>Well, you know me... I’m {{4}}. I guess I won’t do anything!",
    ],

    'answers' => [
        'Annoying',
        'Loud',
        'Quiet',
        'Non-confrontational',
    ],
];

?>

@include('slider.game.drag-and-drop-blanks-v2', ['content' => $content])