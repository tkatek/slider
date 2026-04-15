<?php
$content = [
    'page_title' => 'Listening',
    'title'      => 'Practice 3',
    'subtitle'   => 'Listen to the audio. Match each conversation to the correct picture. Type the conversation number in each gap.',
    'audio'      => materialAsset('slider/A1/Advanced/chapter-4/audios/slide9.mp3'),


    'script' => [
        '1',
        'A: Are all your subways this nice?',
        'B: Yeah. The city replaced all the subway cars last year.',
        'A: Wow!',
        '2',
        'A: How much is the fare?',
        'B: It\'s $2.50. Just put your money in the box right there.',
        'A: Oh, do you have change?',
        'B: No, you need the exact change.',
        '3',
        'A: Are you free?',
        'B: Sure. Hop in. Where to?',
        'A: The Central Hotel. Do you know where that is?',
        'B: Yeah. It\'s not far from here. About a 10-minute ride.',
        'A: Okay.',
        '4',
        'A: One ticket to Chicago, please.',
        'B: Yeah. Okay. That\'s $120.',
        'A: Does this one have a dining car?',
        'B: Yeah, there\'s a dining car and a snack bar. Here\'s your change.',
        'A: Thanks.',
        '5',
        'A: What time is the next shuttle flight to Boston?',
        'B: It leaves in 30 minutes.',
        'A: Is it too late to get a ticket?',
        'B: No, you still have plenty of time to make it.',
        'A: Great. And how long is the flight?',
        'B: It\'s about 45 minutes.',
        '6',
        'A: Is that our ferry?',
        'B: I think so.',
        'A: Wow! I didn\'t think it would be so big.',
        'B: Neither did I.',
    ],

    'grid_class' => 'grid-cols-2 sm:grid-cols-4 lg:grid-cols-6',
    'square_images' => true,

    'items' => [
        [
            'image'       => materialAsset('slider/A1/Advanced/chapter-4/img/slide9/bus.webp'),
            'prefix'      => 'A. ',
            'answer'      => '2',
            'placeholder' => '',
        ],
        [
            'image'       => materialAsset('slider/A1/Advanced/chapter-4/img/slide9/subway.webp'),
            'prefix'      => 'B. ',
            'answer'      => '1',
            'placeholder' => '',
        ],
        [
            'image'       => materialAsset('slider/A1/Advanced/chapter-4/img/slide9/train.webp'),
            'prefix'      => 'C. ',
            'answer'      => '4',
            'placeholder' => '',
        ],
        [
            'image'       => materialAsset('slider/A1/Advanced/chapter-4/img/slide9/plane.webp'),
            'prefix'      => 'D. ',
            'answer'      => '5',
            'placeholder' => '',
        ],
        [
            'image'       => materialAsset('slider/A1/Advanced/chapter-4/img/slide9/ferry.webp'),
            'prefix'      => 'E. ',
            'answer'      => '6',
            'placeholder' => '',
        ],
        [
            'image'       => materialAsset('slider/A1/Advanced/chapter-4/img/slide9/taxi.webp'),
            'prefix'      => 'F. ',
            'answer'      => '3',
            'placeholder' => '',
        ],
    ],
];
?>

@include('slider.game.image-missing-words', ['content' => $content])
