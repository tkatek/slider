<?php
$content = [
    'title'    => 'Listening',
    'subtitle' => 'Listen to a short story of bravery and answer the questions.',
    'type'     => 'audio',

    'audio' => materialAsset('slider/B1/Intermediate/chapter-10/audios/slide17.mp3'),

    'question_prompt_label' => 'Choose the correct answer',

    'script' => [
        "Welcome. Today you'll hear a true story about courage and teamwork.

In 2019, Jessica and Mark were enjoying a peaceful morning walk in New York City when a dangerous truck suddenly lost control and headed toward the sidewalk. People panicked and tried to get to safety.

Luckily, several bystanders reacted quickly. A shopkeeper warned the crowd, a woman called emergency services, and police officers rushed to the scene. Soon, firefighters and paramedics arrived and guided everyone away from danger.

Jessica and Mark were frightened, but they stayed calm and followed the rescuers' instructions. Thanks to the teamwork and bravery of ordinary people and emergency workers, everyone remained safe.

This story teaches us that courage is not the absence of fear. It is staying calm, helping others, and working together during difficult times. Even small acts of kindness can make a big difference and help save lives.",
    ],

    'questions' => [
        [
            'prompt'  => 'Where did the story happen?',
            'correct' => 'New York City',
            'options' => ['London', 'New York City', 'Paris', 'Chicago'],
        ],
        [
            'prompt'  => 'What caused the danger?',
            'correct' => 'A truck lost control',
            'options' => ['A fire', 'A flood', 'A truck lost control', 'A storm'],
        ],
        [
            'prompt'  => 'Who warned the crowd first?',
            'correct' => 'A shopkeeper',
            'options' => ['A firefighter', 'A shopkeeper', 'A paramedic', 'A teacher'],
        ],
        [
            'prompt'  => 'How did Jessica and Mark react during the emergency?',
            'correct' => 'They stayed calm and followed instructions.',
            'options' => [
                'They ran away alone.',
                'They ignored the rescuers.',
                'They stayed calm and followed instructions.',
                'They left the city.',
            ],
        ],
        [
            'prompt'  => 'What is the main lesson of the story?',
            'correct' => 'Courage and teamwork can help in difficult situations.',
            'options' => [
                'Cities are dangerous.',
                'Trucks should drive slowly.',
                'Courage and teamwork can help in difficult situations.',
                'People should avoid crowded places.',
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])