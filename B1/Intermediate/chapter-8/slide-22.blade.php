<?php

$content = [
    'title'    => 'Speaking',
    'subtitle' => '',

    'grid_class' => 'grid-cols-2 sm:grid-cols-4',

    'items' => [
        [
            'question' => 'They called a doctor. He lived nearby.',
            'answer'   => 'They called a doctor who lived nearby.',
            'image'    => materialAsset('slider/B1/Intermediate/chapter-8/img/slide22/doctor.webp'),
        ],
        [
            'question' => 'A teacher is someone. He helps students learn.',
            'answer'   => 'A teacher is someone who helps students learn.',
            'image'    => materialAsset('slider/B1/Intermediate/chapter-8/img/slide22/teacher.webp'),
        ],
        [
            'question' => 'I know three people. They collect fossils.',
            'answer'   => 'I know three people who collect fossils.',
            'image'    => materialAsset('slider/B1/Intermediate/chapter-8/img/slide22/collect-fossils.webp'),
        ],
        [
            'question' => 'I have a friend. He is afraid of dogs.',
            'answer'   => 'I have a friend who is afraid of dogs.',
            'image'    => materialAsset('slider/B1/Intermediate/chapter-8/img/slide22/afraid-of-dogs.webp'),
        ],
        [
            'question' => 'A comedian is a person. He tells jokes.',
            'answer'   => 'A comedian is a person who tells jokes.',
            'image'    => materialAsset('slider/B1/Intermediate/chapter-8/img/slide22/comedian.webp'),
        ],
        [
            'question' => 'My brother is a good swimmer. He loves diving.',
            'answer'   => 'My brother is a good swimmer who loves diving.',
            'image'    => materialAsset('slider/B1/Intermediate/chapter-8/img/slide22/swimmer-diving.webp'),
        ],
        [
            'question' => 'I have a friend. She speaks four languages.',
            'answer'   => 'I have a friend who speaks four languages.',
            'image'    => materialAsset('slider/B1/Intermediate/chapter-8/img/slide22/speaks-four-languages.webp'),
        ],
        [
            'question' => 'Pablo is a boy. He is good at Math.',
            'answer'   => 'Pablo is a boy who is good at Math.',
            'image'    => materialAsset('slider/B1/Intermediate/chapter-8/img/slide22/good-at-math.webp'),
        ],
        [
            'question' => 'There is a girl in my class. She collects seashells.',
            'answer'   => 'There is a girl in my class who collects seashells.',
            'image'    => materialAsset('slider/B1/Intermediate/chapter-8/img/slide22/collects-seashells.webp'),
        ],
        [
            'question' => 'A cook is a person. He makes delicious cakes.',
            'answer'   => 'A cook is a person who makes delicious cakes.',
            'image'    => materialAsset('slider/B1/Intermediate/chapter-8/img/slide22/cook-cakes.webp'),
        ],
        [
            'question' => 'I have an older brother. He loves video games.',
            'answer'   => 'I have an older brother who loves video games.',
            'image'    => materialAsset('slider/B1/Intermediate/chapter-8/img/slide22/loves-video-games.webp'),
        ],
        [
            'question' => 'The customer liked the waitress. She was very friendly.',
            'answer'   => 'The customer liked the waitress who was very friendly.',
            'image'    => materialAsset('slider/B1/Intermediate/chapter-8/img/slide22/friendly-waitress.webp'),
        ],
    ],
];

?>

@include('slider.game.question-answer', ['content' => $content])