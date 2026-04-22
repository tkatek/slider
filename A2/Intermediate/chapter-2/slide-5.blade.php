<?php
$content = [

    'title'      => 'What does the world eat for breakfast?',
    'subtitle'   => 'What is eaten for breakfast in your country?',
    'shorts'     => [
        [
            'src' => materialAsset(''),
            'thumbnail' => materialAsset(''),
            'showCC' => false,
            'subtitles' => [
                ['start' => 0,  'end' => 4,  'text' => 'This is what breakfast looks like around the world.'],
                ['start' => 4,  'end' => 9,  'text' => 'So in the United States we eat pancakes, eggs and bacon.'],
                ['start' => 9,  'end' => 12, 'text' => 'White rice, miso soup and pickled vegetables are eaten in Japan.'],
                ['start' => 12, 'end' => 15, 'text' => 'In India, dosa, sambar and chutney are eaten for breakfast.'],
                ['start' => 15, 'end' => 18, 'text' => 'Germany eats a bread roll, hard-boiled eggs and sausages.'],
                ['start' => 18, 'end' => 23, 'text' => 'Brazilians eat fruit, toast and ham.'],
                ['start' => 23, 'end' => 29, 'text' => 'The United Kingdom opts for sausages, grilled tomatoes, eggs and bacon.'],
                ['start' => 29, 'end' => 32, 'text' => 'Russia goes for rye bread, porridge and sausage.'],
                ['start' => 32, 'end' => 35, 'text' => 'Bread, cold cuts, a hard-boiled egg, cucumber and tomatoes are eaten in Sweden.'],
                ['start' => 35, 'end' => 40, 'text' => 'Mexicans have tortillas, fried eggs, beans and salsa.'],
                ['start' => 40, 'end' => 47, 'text' => 'And perhaps the worst of them all is Australia, who eats corn flakes, toast and Vegemite.'],
                ['start' => 47, 'end' => 52, 'text' => "So what's your favorite?"],
            ],
        ],
    ],
];
?>

@include("slider.video.short-video", ['content' => $content])
