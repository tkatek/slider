<?php
$content = [
    'type' => 'reading',
    'page_title' => 'Practice 5',
    'title' => 'Practice 5: Reading comprehension',
    'subtitle' => 'Look at the bus schedule and choose the correct answer',
    'audio' => null,
    'reading_title' => 'Bus Schedule',
    'reading_plain' => true,
    'reading_compact' => true,
    'reading_allow_html' => true,
    'show_reading_badge' => false,
    'title_class' => 'text-3xl md:text-4xl lg:text-5xl',

    'passage' => [
        '<table><thead><tr><th>Bus</th><th>Destination</th><th>Time</th></tr></thead><tbody><tr><td>12</td><td>Airport</td><td>4:30</td></tr><tr><td>18</td><td>City Center</td><td>5:00</td></tr><tr><td>21</td><td>Train Station</td><td>5:20</td></tr></tbody></table>',
    ],

    'questions' => [
        [
            'prompt' => 'Which bus goes to the airport?',
            'correct' => 'Bus 12',
            'options' => [
                'Bus 12',
                'Bus 18',
                'Bus 21',
            ],
        ],
        [
            'prompt' => 'What time does the bus to the city center leave?',
            'correct' => '5:00',
            'options' => [
                '4:30',
                '5:00',
                '5:20',
            ],
        ],
        [
            'prompt' => 'Which bus goes to the train station?',
            'correct' => 'Bus 21',
            'options' => [
                'Bus 12',
                'Bus 18',
                'Bus 21',
            ],
        ],
        [
            'prompt' => 'What time does Bus 12 leave?',
            'correct' => '4:30',
            'options' => [
                '4:30',
                '5:00',
                '5:20',
            ],
        ],
        [
            'prompt' => 'Does Bus 18 go to the airport?',
            'correct' => "No, it doesn't.",
            'options' => [
                'Yes, it does.',
                "No, it doesn't.",
            ],
        ],
    ],
];
?>
@include('slider.game.multi-choice-all-in-one', ['content' => $content])
