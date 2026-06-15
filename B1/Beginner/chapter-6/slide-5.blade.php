<?php

$content = [
    'title'      => 'Practice 2',
    'subtitle'   => 'Indoor Or Outdoor Activities?',
    'grid_class' => 'grid-cols-2 sm:grid-cols-4 ',

    'items' => [
        [
            'question' => 'Study for the exam',
            'answer'   => 'Indoor activity',
            'image'    => materialAsset('slider/B1/Beginner/chapter-6/img/slide5/study-for-the-exam.webp'),
        ],
        [
            'question' => 'Make crafts',
            'answer'   => 'Indoor activity',
            'image'    => materialAsset('slider/B1/Beginner/chapter-6/img/slide5/make-crafts.webp'),
        ],
        [
            'question' => 'Play computer games',
            'answer'   => 'Indoor activity',
            'image'    => materialAsset('slider/B1/Beginner/chapter-6/img/slide5/play-computer-games.webp'),
        ],
        [
            'question' => 'Have a barbecue',
            'answer'   => 'Outdoor activity',
            'image'    => materialAsset('slider/B1/Beginner/chapter-6/img/slide5/have-a-barbecue.webp'),
        ],
        [
            'question' => 'Go hiking',
            'answer'   => 'Outdoor activity',
            'image'    => materialAsset('slider/B1/Beginner/chapter-6/img/slide5/go-hiking.webp'),
        ],
        [
            'question' => 'Football',
            'answer'   => 'Outdoor activity',
            'image'    => materialAsset('slider/B1/Beginner/chapter-6/img/slide5/football.webp'),
        ],
        [
            'question' => 'Read a book or magazine',
            'answer'   => 'Indoor activity',
            'image'    => materialAsset('slider/B1/Beginner/chapter-6/img/slide5/read-a-book-or-magazine.webp'),
        ],
        [
            'question' => 'Fly a kite',
            'answer'   => 'Outdoor activity',
            'image'    => materialAsset('slider/B1/Beginner/chapter-6/img/slide5/fly-a-kite.webp'),
        ],
        [
            'question' => 'Build a sandcastle',
            'answer'   => 'Outdoor activity',
            'image'    => materialAsset('slider/B1/Beginner/chapter-6/img/slide5/build-a-sandcastle.webp'),
        ],
        [
            'question' => 'Go shopping',
            'answer'   => 'Outdoor activity',
            'image'    => materialAsset('slider/B1/Beginner/chapter-6/img/slide5/go-shopping.webp'),
        ],
        [
            'question' => 'Watch TV or cartoons',
            'answer'   => 'Indoor activity',
            'image'    => materialAsset('slider/B1/Beginner/chapter-6/img/slide5/watch-tv-or-cartoons.webp'),
        ],
        [
            'question' => 'Have a picnic',
            'answer'   => 'Outdoor activity',
            'image'    => materialAsset('slider/B1/Beginner/chapter-6/img/slide5/have-a-picnic.webp'),
        ],

    ],
];

?>

@include('slider.game.question-answer', ['content' => $content])