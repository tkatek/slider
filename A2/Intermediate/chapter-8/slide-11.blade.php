<?php

$content = [
    'page_title' => 'Listening',
    'title'      => 'Listening',
    'subtitle'   => '',
    'audio'      => materialAsset('slider/A2/Intermediate/chapter-8/audios/slide10.mp3'),

    'instruction'      => 'Listen again and complete the sentences',
    'instruction_note' => '',
    'transcript'  => [
        'Fortune Teller: Come in and sit down. What would you like to know?',
        'Client: I want to know about my future. Will I change my job soon?',
        'Fortune Teller: Yes, you will. It may happen in the next three months. You might even move to a new city.',
        'Client: A new city? Will I be happy there?',
        'Fortune Teller: You will feel lonely at first, but things will get better. You will meet new friends if you go out more.',
        'Client: What about love? Will I find someone?',
        'Fortune Teller: Yes. You will meet someone interesting. Love may grow slowly, but it will be real.',
        'Client: One last question: will my family be okay?',
        'Fortune Teller: Your family will be fine. You will help them, and they will be happy.',
        'Fortune Teller: The future is not always easy, but you are stronger than you think.',
        'Client: Thank you. You were very kind.',
    ],
    'grid_class' => 'grid-cols-1 lg:grid-cols-2',

    'lines' => [
        [
            'speaker' => '1',
            'parts' => [
                ['text' => 'She will feel '],
                [
                    'blank' => true,
                    'answer' => 'lonely',
                    'answers' => ['lonely'],
                ],
                ['text' => ' at first in the new city.'],
            ],
        ],
        [
            'speaker' => '2',
            'parts' => [
                ['text' => 'She will meet new friends if she '],
                [
                    'blank' => true,
                    'answer' => 'goes out',
                    'answers' => ['goes out'],
                ],
                ['text' => ' more.'],
            ],
        ],
        [
            'speaker' => '3',
            'parts' => [
                ['text' => 'Her family will be '],
                [
                    'blank' => true,
                    'answer' => 'fine',
                    'answers' => ['fine'],
                ],
                ['text' => '.'],
            ],
        ],
    ],
];

?>

@include('slider.game.listening-missing-word', ['content' => $content])