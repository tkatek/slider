<?php
$content = [
    'page_title' => 'Reading',
    'title' => 'Reading',
    'subtitle' => 'Read the sentences & fill in with the right word from the list',
    'type' => 'reading',
    'sentences' => [
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-sky-500 to-cyan-400 px-3 py-1 text-sm font-black text-white\">1</span>It only snows in the {{1}}.",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-violet-500 to-fuchsia-500 px-3 py-1 text-sm font-black text-white\">2</span>Come outside, it’s warm and {{2}}.",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-emerald-500 to-teal-400 px-3 py-1 text-sm font-black text-white\">3</span>I can’t see anything because it’s so {{3}}.",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-amber-500 to-orange-400 px-3 py-1 text-sm font-black text-white\">4</span>It feels cold outside because it’s so {{4}}.",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-rose-500 to-pink-500 px-3 py-1 text-sm font-black text-white\">5</span>My favourite season is {{5}} when the leaves fall from the trees.",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-indigo-500 to-blue-500 px-3 py-1 text-sm font-black text-white\">6</span>Oh no! It’s {{6}} outside and I don’t have an umbrella.",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-lime-500 to-green-400 px-3 py-1 text-sm font-black text-white\">7</span>It’s {{7}}, so I’m wearing shorts.",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-red-500 to-orange-500 px-3 py-1 text-sm font-black text-white\">8</span>It’s a lovely day and the sky is blue. It feels like {{8}}, but it’s only February!",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-cyan-500 to-blue-500 px-3 py-1 text-sm font-black text-white\">9</span>At the moment it’s hot in the day, but it’s very {{9}} at night.",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-purple-500 to-indigo-500 px-3 py-1 text-sm font-black text-white\">10</span>It was very sunny this morning, but now the sky is {{10}}.",
    ],
    'answers' => [
        'winter',
        'sunny',
        'foggy',
        'windy',
        'autumn',
        'raining',
        'hot',
        'spring',
        'cold',
        'cloudy',
    ],
];

?>
@include('slider.game.drag-and-drop-blanks-v2', ['content' => $content])
