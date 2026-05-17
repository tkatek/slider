<?php

$content = [
    'page_title' => 'Warm-Up Revision Activity',
    'title'      => 'Warm-Up Revision Activity',
    'subtitle'   => 'Neighbour Complaints: Drag And Drop What The Tenant Said:',
    'type'       => 'reading',
    'mobile_word_visible_cap' => 3,
    'tablet_word_visible_cap' => 6,
    'mobile_placed_tile_full_width' => true,
    'tile_class' => '!px-2.5 !py-2 !text-[11px] !min-h-[40px] sm:!px-2 sm:!py-1 sm:!text-sm sm:!min-h-[36px]',

    'sentences' => [
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-sky-500 to-cyan-400 px-3 py-1 text-sm font-black text-white\">1</span>Tenant: {{1}}",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-violet-500 to-fuchsia-500 px-3 py-1 text-sm font-black text-white\">2</span>Neighbour: Hi Wilson. I'm Simge. I'm OK, thank you, how about you?",

        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-emerald-500 to-teal-400 px-3 py-1 text-sm font-black text-white\">3</span>Tenant: {{2}}",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-amber-500 to-orange-400 px-3 py-1 text-sm font-black text-white\">4</span>Neighbour: Oh really? Can you describe the noise that you can hear?",

        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-rose-500 to-pink-500 px-3 py-1 text-sm font-black text-white\">5</span>Tenant: {{3}}",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-indigo-500 to-blue-600 px-3 py-1 text-sm font-black text-white\">6</span>Neighbour: I'm so sorry. That is from my flat. I need to repair the washing machine but I haven't had time because I have been working so hard.",

        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-sky-500 to-cyan-400 px-3 py-1 text-sm font-black text-white\">7</span>Tenant: {{4}}",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-violet-500 to-fuchsia-500 px-3 py-1 text-sm font-black text-white\">8</span>Neighbour: Sorry, Wilson I can't because I work in the mornings. But don't worry. I am going to repair washing machine this weekend.",

        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-emerald-500 to-teal-400 px-3 py-1 text-sm font-black text-white\">9</span>Tenant: {{5}}",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-amber-500 to-orange-400 px-3 py-1 text-sm font-black text-white\">10</span>Neighbour: Yes, of course. That is a good idea. I didn't think of it. I am going to try adjust the timer. Thank you for your suggestion.",

        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-rose-500 to-pink-500 px-3 py-1 text-sm font-black text-white\">11</span>Tenant: {{6}}",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-indigo-500 to-blue-600 px-3 py-1 text-sm font-black text-white\">12</span>Neighbour: You too.",
    ],

    'answers' => [
        "Hi, I'm Wilson I live next door to you. I'm your neighbour. How are you?",
        "Thank you, I'm fine. I just want to speak with you about excessive noise. I'm not sure if the noise is coming from your flat.",
        "Every evening at around 10 o'clock. I hear the sound of a washing machine.",
        "Can you use the washing machine in the morning until it is repairs?",
        "May I suggest, can you adjust the timer of the washing machine to start at the morning.",
        "Thank you very much for your listening to me. Have a great night.",
    ],
];

?>

@include('slider.game.drag-and-drop-blanks-v2', ['content' => $content])
