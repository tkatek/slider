<?php

$content = [
    'page_title' => 'Warm-Up Revision Activity',
    'title'      => 'Warm-Up Revision Activity',
    'subtitle'   => 'Neighbour Complaints: Match the Complaints with the Responses:',
    'type'       => 'reading',

    'sentences' => [
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-sky-500 to-cyan-400 px-3 py-1 text-sm font-black text-white\">1</span>{{1}} Neighbour: I'm so sorry. That is from my flat. I need to repair the washing machine but I haven't had time because I have been working so hard.",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-violet-500 to-fuchsia-500 px-3 py-1 text-sm font-black text-white\">2</span>{{2}} Neighbour: Sorry, Wilson I can't because I work in the mornings. But don't worry. I am going to repair washing machine this weekend.",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-emerald-500 to-teal-400 px-3 py-1 text-sm font-black text-white\">3</span>{{3}} Neighbour: Hi Wilson. I'm Simge. I'm OK, thank you, how about you?",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-amber-500 to-orange-400 px-3 py-1 text-sm font-black text-white\">4</span>{{4}} Neighbour: You too.",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-rose-500 to-pink-500 px-3 py-1 text-sm font-black text-white\">5</span>{{5}} Neighbour: Oh really? Can you describe the noise that you can hear?",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-indigo-500 to-blue-600 px-3 py-1 text-sm font-black text-white\">6</span>{{6}} Neighbour: Yes, of course. That is a good idea. I didn't think of it. I am going to try adjust the timer. Thank you for your suggestion.",
    ],

    'answers' => [
        "Tenant: Every evening at around 10 o'clock. I hear the sound of a washing machine.",
        "Tenant: Can you use the washing machine in the morning until it is repairs?",
        "Tenant: Hi, I'm Wilson I live next door to you. I'm your neighbour. How are you?",
        "Tenant: Thank you very much for your listening to me. Have a great night.",
        "Tenant: Thank you, I'm fine. I just want to speak with you about excessive noise. I'm not sure if the noise is coming from your flat.",
        "Tenant: May I suggest, can you adjust the timer of the washing machine to start at the morning.",
    ],
];

?>

@include('slider.game.drag-and-drop-blanks-v2', ['content' => $content])