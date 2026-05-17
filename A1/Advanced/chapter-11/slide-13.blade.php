<?php
$content = [
    'page_title' => 'Practice.7',
    'title' => 'Practice.7',
    'subtitle' => 'Put the sentences in order',
    'type' => 'reading',
    'blank_width_mode' => 'full',
    'sentences' => [
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-sky-500 to-cyan-400 px-3 py-1 text-sm font-black text-white\">1</span>{{1}}",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-violet-500 to-fuchsia-500 px-3 py-1 text-sm font-black text-white\">2</span>{{2}}",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-emerald-500 to-teal-400 px-3 py-1 text-sm font-black text-white\">3</span>{{3}}",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-amber-500 to-orange-400 px-3 py-1 text-sm font-black text-white\">4</span>{{4}}",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-rose-500 to-pink-500 px-3 py-1 text-sm font-black text-white\">5</span>{{5}}",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-indigo-500 to-blue-500 px-3 py-1 text-sm font-black text-white\">6</span>{{6}}",
    ],
    'answers' => [
        "Select the correct fuel type for your vehicle.",
        "Stop fuelling when the tank is full.",
        "Pull up to the pump and park safely.",
        "Turn off the engine before starting the refuelling process.",
        "Insert the nozzle into the tank and begin fuelling.",
        "Pay for the fuel and collect the receipt .",
    ],
];

?>
@include('slider.game.drag-and-drop-blanks-v2', ['content' => $content])
