<?php

$content = [
    'page_title' => 'Practice 4',
    'title'      => 'Practice 4',
    'subtitle'   => 'Match the arrangements and how they were organised',
    'type'       => 'reading',
    'blank_width_mode' => 'full',

    'sentences' => [
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-sky-500 to-cyan-400 px-3 py-1 text-sm font-black text-white\">1</span>I'm flying to Spain for a holiday soon. {{1}}",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-violet-500 to-fuchsia-500 px-3 py-1 text-sm font-black text-white\">2</span>He's staying at his friend's house tonight. {{2}}",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-emerald-500 to-teal-400 px-3 py-1 text-sm font-black text-white\">3</span>She's going to the dentist next week. {{3}}",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-amber-500 to-orange-400 px-3 py-1 text-sm font-black text-white\">4</span>I'm meeting my friend after school. {{4}}",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-rose-500 to-pink-500 px-3 py-1 text-sm font-black text-white\">5</span>They're having a barbecue at the weekend. {{5}}",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-indigo-500 to-blue-500 px-3 py-1 text-sm font-black text-white\">6</span>We're watching the new Superman film tonight. {{6}}",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-orange-500 to-red-400 px-3 py-1 text-sm font-black text-white\">7</span>My mum is helping me make a cake tomorrow. {{7}}",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-blue-500 to-cyan-400 px-3 py-1 text-sm font-black text-white\">8</span>Our class is visiting a museum next week. {{8}}",
    ],

    'answers' => [
        "I've got the plane tickets!",
        "His parents said it's OK.",
        "She's got an appointment",
        "We agreed to meet at the park.",
        "They've invited lots of people.",
        "We have tickets for 18.30.",
        "We've bought the ingredients.",
        "Our teacher has booked a bus!",
    ],
];

?>

@include('slider.game.drag-and-drop-blanks-v2', ['content' => $content])