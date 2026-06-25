<?php

$content = [
    'title'    => 'Practice 7',
    'subtitle' => '',

    'instruction'      => 'Complete with the Present Simple or Past Simple form of the verb.',
    'instruction_note' => '',

    'grid_class' => 'grid-cols-1 sm:grid-cols-1',

    'lines' => [
        [
            'speaker' => '1',
            'parts' => [
                ['text' => 'Brands '],
                [
                    'blank' => true,
                    'answer' => 'help',
                    'answers' => ['help'],
                ],
                ['text' => ' (help) people trust products today.'],
            ],
        ],
        [
            'speaker' => '2',
            'parts' => [
                ['text' => 'Farmers '],
                [
                    'blank' => true,
                    'answer' => 'used',
                    'answers' => ['used'],
                ],
                ['text' => ' (use) marks on cattle many years ago.'],
            ],
        ],
        [
            'speaker' => '3',
            'parts' => [
                ['text' => 'Companies '],
                [
                    'blank' => true,
                    'answer' => 'share',
                    'answers' => ['share'],
                ],
                ['text' => ' (share) information with customers now.'],
            ],
        ],
        [
            'speaker' => '4',
            'parts' => [
                ['text' => 'People '],
                [
                    'blank' => true,
                    'answer' => 'put',
                    'answers' => ['put'],
                ],
                ['text' => ' (put) brands on wooden cases in the past.'],
            ],
        ],
        [
            'speaker' => '5',
            'parts' => [
                ['text' => 'Strong brands '],
                [
                    'blank' => true,
                    'answer' => 'create',
                    'answers' => ['create'],
                ],
                ['text' => ' (create) emotions.'],
            ],
        ],
        [
            'speaker' => '6',
            'parts' => [
                ['text' => 'Early companies '],
                [
                    'blank' => true,
                    'answer' => 'guaranteed',
                    'answers' => ['guaranteed'],
                ],
                ['text' => ' (guarantee) quality through branding.'],
            ],
        ],
    ],
];

?>

@include('slider.game.listening-missing-word', ['content' => $content])