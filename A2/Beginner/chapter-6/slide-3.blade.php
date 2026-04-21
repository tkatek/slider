<?php

$content = array_replace_recursive([
    'page_title' => 'Practice 1',
    'title'      => 'Warmp-up: Practice 1',
    'subtitle'   => 'My Last holiday',

    'grid' => [
        'cols' => [
            'base' => 2,
            'sm'   => 5,
            'md'   => 5,
            'lg'   => 5,
        ],
    ],

    'items' => [
        [
            'question' => 'Where did you go on your last holiday?',
            'answer'   => 'I went to...',
            'image'    => materialAsset('slider/A1/Intermediate/chapter-8/img/slide5/destination.webp'),
        ],
        [
            'question' => 'Who did you go with?',
            'answer'   => 'I went with...',
            'image'    => materialAsset('slider/A1/Intermediate/chapter-8/img/slide5/per-person.webp'),
        ],
        [
            'question' => 'How did you get there?',
            'answer'   => 'I went by... / I travelled by...',
            'image'    => materialAsset('slider/A1/Intermediate/chapter-8/img/slide5/flight.webp'),
        ],
        [
            'question' => 'Where did you stay?',
            'answer'   => 'I stayed in a hotel / in my holiday home / with my family...',
            'image'    => materialAsset('slider/A1/Intermediate/chapter-8/img/slide5/accommodation.webp'),
        ],
        [
            'question' => 'How long did you stay?',
            'answer'   => 'I stayed for 2 weeks / one month / a few days...',
            'image'    => materialAsset('slider/A1/Intermediate/chapter-8/img/slide5/departure-return.webp'),
        ],
        [
            'question' => 'What was the weather like?',
            'answer'   => 'It was sunny / hot / cold / rainy...',
            'image'    => materialAsset('slider/A1/Advanced/chapter-11/img/slide10/Weather.webp'),
        ],
        [
            'question' => 'What did you do on your holiday?',
            'answer'   => 'I played sports / went to the beach / went shopping...',
            'image'    => materialAsset('slider/A1/Intermediate/chapter-8/img/slide5/excursion.webp'),
        ],
        [
            'question' => 'Did you stay in a hotel?',
            'answer'   => 'Yes, I did. / No, I stayed in...',
            'image'    => materialAsset('slider/A1/Advanced/chapter-1/img/slide4/hotel-reception.webp'),
        ],
        [
            'question' => 'How often do you usually go on holiday?',
            'answer'   => 'I usually go on holiday twice a year: once in the summer and once in the winter.',
            'image'    => materialAsset('slider/A1/Intermediate/chapter-8/img/slide5/vacation-holiday.webp'),
        ],
        [
            'question' => 'How long did you stay?',
            'answer'   => 'I stayed for...',
            'image'    => materialAsset('slider/A1/Intermediate/chapter-8/img/slide5/package-holiday.webp'),
        ],
    ],

], $content ?? []);
?>

@include("slider.game.question-answer", ['content' => $content])
