<?php
$content = [
    'type' => 'reading',
    'title' => 'Reading Practice',
    'subtitle' => 'Read and answer',
    'reading_title' => 'At the Pharmacy',
    'passage' => [
        'Ahmed has a bad cold. He has a headache and a sore throat. He goes to the pharmacy near his house. The pharmacist says, "Hello. How can I help you?" Ahmed says, "I have a headache and a sore throat. I need some medicine." The pharmacist gives him some tablets and throat syrup. She says, "Take one tablet twice a day and drink the syrup after meals." Ahmed asks, "How much is it?" The pharmacist says, "It\'s $10." Ahmed pays and says, "Thank you."',
    ],
    'questions' => [
        [
            'prompt' => 'Why does Ahmed go to the pharmacy?',
            'correct' => 'He has a cold.',
            'options' => [
                'He wants vitamins.',
                'He has a cold.',
                'He needs a bandage.',
                'He is buying food.',
            ],
        ],
        [
            'prompt' => 'What are Ahmed\'s symptoms?',
            'correct' => 'Headache and sore throat',
            'options' => [
                'Fever and stomachache',
                'Headache and sore throat',
                'Back pain and cough',
                'Toothache and cold',
            ],
        ],
        [
            'prompt' => 'What does the pharmacist give him?',
            'correct' => 'Tablets and syrup',
            'options' => [
                'Cream and drops',
                'Vitamins and bandage',
                'Tablets and syrup',
                'Tea and water',
            ],
        ],
        [
            'prompt' => 'How often should Ahmed take the tablet?',
            'correct' => 'Twice a day',
            'options' => [
                'Once a day',
                'Twice a day',
                'Three times a day',
                'Every hour',
            ],
        ],
        [
            'prompt' => 'How much does the medicine cost?',
            'correct' => '$10',
            'options' => [
                '$5',
                '$8',
                '$10',
                '$15',
            ],
        ],
    ],
];
?>
@include('slider.game.multi-choice-all-in-one', ['content' => $content])