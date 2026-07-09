<?php
$content = [
    'type' => 'emoji',
    'title'    => 'Practice 6',
    'subtitle' => 'Choose the correct option to complete the sentences',

    'questions' => [
        [
            'emoji'   => '🤒',
            'prompt'  => "Sorry, I don't know if she's here or not. She was feeling ill so she . . . . .  gone home.",
            'correct' => 'must have',
            'options' => [
                'must have',
                'might have',
                "can't have",
            ],
        ],
        [
            'emoji'   => '🧹',
            'prompt'  => 'She . . . . .  cleaned the whole house on her own in two hours. She must have had some help.',
            'correct' => "can't have",
            'options' => [
                'must have',
                'might have',
                "can't have",
            ],
        ],
        [
            'emoji'   => '😋',
            'prompt'  => 'Wow! Have you finished all that already? You . . . . .  been hungry!',
            'correct' => 'must have',
            'options' => [
                'must have',
                'may have',
                "can't have",
            ],
        ],
        [
            'emoji'   => '🚿',
            'prompt'  => "He wasn't answering the phone before. Maybe he went to the shop or he . . . . .  been in the shower.",
            'correct' => 'might have',
            'options' => [
                'must have',
                'might have',
                "couldn't have",
            ],
        ],
        [
            'emoji'   => '🎒',
            'prompt'  => "Where's Clare? Her bag's here and her computer's still on so she . . . . .  gone home.",
            'correct' => "can't have",
            'options' => [
                'must have',
                'might have',
                "can't have",
            ],
        ],
        [
            'emoji'   => '🔐',
            'prompt'  => "I can't remember my password! But I . . . . .  written it in my notebook as sometimes I do that.",
            'correct' => 'may have',
            'options' => [
                'must have',
                'may have',
                "couldn't have",
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])