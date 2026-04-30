<?php
$content = [
    'video'      => materialAsset(''),
    'thumbnail'  => materialAsset(''),
    'isQuiz'     => 0,

    'subtitles'  => [
        ['start' => 0,  'end' => 4,  'text' => 'Let’s watch this video.'],
        ['start' => 4,  'end' => 8,  'text' => 'What are food groups?'],
        ['start' => 8,  'end' => 12, 'text' => 'How many food groups do we have?'],

        ['start' => 12, 'end' => 23, 'text' => 'Eating a variety of foods from all five food groups is important for good health because it gives your body many important nutrients.'],

        ['start' => 23, 'end' => 25, 'text' => 'Let’s take a closer look at all five food groups.'],

        ['start' => 25, 'end' => 39, 'text' => 'First is grains. Bread, cereal, pasta, rice, and other grains like oats and barley are all grains. They give your body energy.'],

        ['start' => 39, 'end' => 59, 'text' => 'Second is protein. Meat, fish, eggs, tofu, beans, nuts, and seeds are protein foods. They help build and repair your body and keep you healthy.'],

        ['start' => 59, 'end' => 69, 'text' => 'Third is vegetables. Carrots, peppers, broccoli, cabbage, beets, and leafy greens are vegetables.'],

        ['start' => 69, 'end' => 93, 'text' => 'Fourth is fruits. Apples, oranges, berries, mango, and pineapple are fruits. Fruits and vegetables are full of vitamins and help keep your body strong and healthy.'],

        ['start' => 93, 'end' => 100, 'text' => 'Finally, dairy. Milk, cheese, and yogurt give you calcium for strong bones and teeth.'],

        ['start' => 100, 'end' => 110, 'text' => 'To stay healthy, eat foods from all five groups every day: grains, protein, vegetables, fruits, and dairy.'],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])