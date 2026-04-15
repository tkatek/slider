<?php
$content = [
    'type' => 'reading',
    'page_title'      => 'Reading',
    'title'           => 'Reading',
    'subtitle'        => '',
    'audio'           => materialAsset('slider/A1/Advanced/chapter-4/audios/slide17.mp3'),
    'reading_title'   => 'A Taxi Ride to the Station',
    'reading_align'   => 'left',
    'reading_plain'   => true,
    'reading_compact' => true,

    'passage' => "Tom is in the city for one day. He needs to go to the main station to catch a train. He takes a taxi from his hotel. He asks the driver, “Can you take me to the main station?” The driver says yes. Traffic is not bad, so they arrive quickly. Tom asks, “How much is the ride?” The driver says, “It is about \$12.” Tom pays in cash. The driver is friendly and helpful. Tom is happy because he arrives at the station on time.",

    'questions' => [
        [
            'prompt'  => 'Where does Tom want to go?',
            'correct' => 'The main station',
            'options' => [
                'The airport',
                'The main station',
                'The bus stop',
            ],
        ],
        [
            'prompt'  => 'How is the traffic?',
            'correct' => 'Not bad',
            'options' => [
                'Very bad',
                'Not bad',
                'Terrible',
            ],
        ],
        [
            'prompt'  => 'How much is the ride?',
            'correct' => '$12',
            'options' => [
                '$10',
                '$12',
                '$20',
            ],
        ],
        [
            'prompt'  => 'Is Tom happy at the end of the ride?',
            'correct' => 'Yes, he is.',
            'options' => [
                'Yes, he is.',
                'No, he isn’t.',
            ],
        ],
        [
            'prompt'  => 'Does Tom pay by card?',
            'correct' => 'No, he doesn’t.',
            'options' => [
                'Yes, he does.',
                'No, he doesn’t.',
            ],
        ],
    ],
];
?>
@include('slider.game.multi-choice-all-in-one', ['content' => $content])