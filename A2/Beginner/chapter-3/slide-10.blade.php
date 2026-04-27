<?php
$content = [
    'page_title' => 'New Language',
    'title'      => 'New Language',
    'subtitle'   => 'Sample Weather Report Phrases',
    'cards_grid_class' => 'mt-7 grid grid-cols-1 gap-4 md:grid-cols-2',

    'cards' => [
        [
            'type' => 'table',
            'title' => '',
            'tone' => 'from-slate-500 to-gray-600',
            'table_variant' => 'simple',
            'table_size' => 'xlarge',
            'mobile_cards' => true,
            'table_headers' => ['Weather Type', 'Example Phrases'],
            'table_rows' => [
                [
                    'Sunny',
                    [
                        'text' => '&ldquo;It&rsquo;s a beautiful sunny day!&rdquo;',
                        'speech' => 'It’s a beautiful sunny day!',
                        'sound' => materialAsset('slider/A2/Beginner/chapter-3/audios/slide10/sunny.mp3'),
                    ],
                ],
                [
                    'Cloudy',
                    [
                        'text' => '&ldquo;The sky is partly cloudy today.&rdquo;',
                        'speech' => 'The sky is partly cloudy today.',
                        'sound' => materialAsset('slider/A2/Beginner/chapter-3/audios/slide10/cloudy.mp3'),
                    ],
                ],
                [
                    'Rainy',
                    [
                        'text' => '&ldquo;We&rsquo;re expecting light rain this afternoon.&rdquo;',
                        'speech' => 'We’re expecting light rain this afternoon.',
                        'sound' => materialAsset('slider/A2/Beginner/chapter-3/audios/slide10/rainy.mp3'),
                    ],
                ],
                [
                    'Snowy',
                    [
                        'text' => '&ldquo;Heavy snow is falling right now.&rdquo;',
                        'speech' => 'Heavy snow is falling right now.',
                        'sound' => materialAsset('slider/A2/Beginner/chapter-3/audios/slide10/snowy.mp3'),
                    ],
                ],
                [
                    'Windy',
                    [
                        'text' => '&ldquo;Strong winds are blowing from the north.&rdquo;',
                        'speech' => 'Strong winds are blowing from the north.',
                        'sound' => materialAsset('slider/A2/Beginner/chapter-3/audios/slide10/windy.mp3'),
                    ],
                ],
            ],
        ],
        [
            'type' => 'table',
            'title' => '',
            'tone' => 'from-slate-500 to-gray-600',
            'table_variant' => 'simple',
            'table_size' => 'xlarge',
            'mobile_cards' => true,
            'table_headers' => ['Weather Type', 'Example Phrases'],
            'table_rows' => [
                [
                    'Hot',
                    [
                        'text' => '&ldquo;It&rsquo;s extremely hot - 35 degrees!&rdquo;',
                        'speech' => 'It’s extremely hot - 35 degrees!',
                        'sound' => materialAsset('slider/A2/Beginner/chapter-3/audios/slide10/hot.mp3'),
                    ],
                ],
                [
                    'Cold',
                    [
                        'text' => '&ldquo;Bundle up! It&rsquo;s freezing cold outside.&rdquo;',
                        'speech' => 'Bundle up! It’s freezing cold outside.',
                        'sound' => materialAsset('slider/A2/Beginner/chapter-3/audios/slide10/cold.mp3'),
                    ],
                ],
                [
                    'Mild',
                    [
                        'text' => '&ldquo;The weather is mild and pleasant.&rdquo;',
                        'speech' => 'The weather is mild and pleasant.',
                        'sound' => materialAsset('slider/A2/Beginner/chapter-3/audios/slide10/mild.mp3'),
                    ],
                ],
                [
                    'Foggy',
                    [
                        'text' => '&ldquo;Thick fog is reducing visibility.&rdquo;',
                        'speech' => 'Thick fog is reducing visibility.',
                        'sound' => materialAsset('slider/A2/Beginner/chapter-3/audios/slide10/foggy.mp3'),
                    ],
                ],
                [
                    'Stormy',
                    [
                        'text' => '&ldquo;A thunderstorm is approaching.&rdquo;',
                        'speech' => 'A thunderstorm is approaching.',
                        'sound' => materialAsset('slider/A2/Beginner/chapter-3/audios/slide10/stormy.mp3'),
                    ],
                ],
                [
                    'Humid',
                    [
                        'text' => '&ldquo;It&rsquo;s very humid and sticky today.&rdquo;',
                        'speech' => 'It’s very humid and sticky today.',
                        'sound' => materialAsset('slider/A2/Beginner/chapter-3/audios/slide10/humid.mp3'),
                    ],
                ],
            ],
        ],
    ],
];
?>

@include("slider.other.grammar-info-cards", ['content' => $content])
