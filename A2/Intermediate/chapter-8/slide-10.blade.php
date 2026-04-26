<?php
$content = [
    'title'    => "The Fortune Teller",
    'subtitle' => 'Listen to the dialogue between the Fortune Teller and the Client. Then, answer the questions',
    'type' => 'questions_only',
    'image_panel_col_class'  => 'sm:col-span-0',
    'answer_panel_col_class' => 'sm:col-span-12',
    'audio'   => materialAsset("slider/A2/Intermediate/chapter-8/audios/slide10.mp3"),
    'script'  => [
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
    'questions' => [
        [
            'prompt'  => 'What does the Client want to know about?',
            'correct' => 'Her future',
            'options' => [
                'Her past',
                'Her future',
                'Her present job',
            ],
        ],
        [
            'prompt'  => "What does the Fortune Teller say about the Client's job?",
            'correct' => 'She will change her job soon.',
            'options' => [
                'She will keep her job.',
                'She will change her job soon.',
                'She will start a new business.',
            ],
        ],
        [
            'prompt'  => 'How will the Client feel in the new city at first?',
            'correct' => 'Lonely',
            'options' => [
                'Happy',
                'Lonely',
                'Excited',
            ],
        ],
        [
            'prompt'  => "How will the Client's family be?",
            'correct' => 'They will be fine.',
            'options' => [
                'They will have serious problems.',
                'They will be fine.',
                'They will need a lot of money.',
            ],
        ],
    ],
];
?>
@include('slider.game.multi-choice-all-in-one', ['content' => $content])
