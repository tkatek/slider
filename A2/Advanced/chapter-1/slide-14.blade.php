<?php
$content = [
    'title' => 'Practice 5',
    'subtitle' => '',

    'instruction' => 'Listen again',
    'instruction_note' => 'Complete the sentences',

    'audio' => materialAsset('slider/A2/Advanced/chapter-1/audios/slide13.mp3'),

    'transcript' => [
        'I’m from Senegal and I work as a cleaner. I’m on my feet all day, but I don’t mind because I’m fit and strong and the work isn’t too hard. But I have to clean the same offices every day, six days a week. The same offices! That’s very boring. And I only get about £7 an hour, which isn’t much at all. Britain is expensive and it’s difficult to live on so little money.',
        '',
        'I’m a programmer. I work for a software company in London. I love my job. I often have to solve quite difficult problems, which is difficult, and takes a lot of time, but I really enjoy it. I love the feeling at the end of the day when I have solved a really difficult problem',
    ],

    'script' => [
        'I’m from Senegal and I work as a cleaner. I’m on my feet all day, but I don’t mind because I’m fit and strong and the work isn’t too hard. But I have to clean the same offices every day, six days a week. The same offices! That’s very boring. And I only get about £7 an hour, which isn’t much at all. Britain is expensive and it’s difficult to live on so little money.',
        '',
        'I’m a programmer. I work for a software company in London. I love my job. I often have to solve quite difficult problems, which is difficult, and takes a lot of time, but I really enjoy it. I love the feeling at the end of the day when I have solved a really difficult problem',
    ],

    'lines' => [
        [
            'speaker' => '1',
            'parts' => [
                ['text' => '“I don’t '],
                ['blank' => true, 'answer' => 'mind'],
                ['text' => ' because I’m '],
                ['blank' => true, 'answer' => 'fit'],
                ['text' => ' and strong.”'],
            ],
        ],
        [
            'speaker' => '2',
            'parts' => [
                ['text' => '“That’s very '],
                ['blank' => true, 'answer' => 'boring'],
                ['text' => '.”'],
            ],
        ],
        [
            'speaker' => '3',
            'parts' => [
                ['text' => '“I '],
                ['blank' => true, 'answer' => 'love'],
                ['text' => ' my job.”'],
            ],
        ],
        [
            'speaker' => '4',
            'parts' => [
                ['text' => '“I really '],
                ['blank' => true, 'answer' => 'enjoy'],
                ['text' => ' it.”'],
            ],
        ],
    ],
];
?>

@include('slider.game.listening-missing-word', ['content' => $content])