<?php
$content = [
    'video'     => materialAsset(''),
    'thumbnail' => materialAsset('slider/B1/Beginner/chapter-9/img/slide5.webp'),
    'isQuiz'   => 0,

    'questions' => [
        [
            'prompt'  => 'Why is the speaker upset?',
            'correct' => 'Her friend keeps cancelling plans at the last minute.',
            'options' => [
                'Her friend is moving away.',
                'Her friend keeps cancelling plans at the last minute.',
                'Her friend forgot her birthday.',
                'Her friend borrowed money.',
            ],
        ],
        [
            'prompt'  => 'What advice does the other person give first?',
            'correct' => 'Talk to her friend about her feelings.',
            'options' => [
                'End the friendship.',
                'Ignore the problem.',
                'Talk to her friend about her feelings.',
                'Cancel future plans.',
            ],
        ],
        [
            'prompt'  => 'What should the speaker do if her friend becomes defensive?',
            'correct' => 'Stay calm and listen to her perspective.',
            'options' => [
                'Stop talking immediately.',
                'Stay calm and listen to her perspective.',
                'Get angry.',
                'Avoid her friend.',
            ],
        ],
        [
            'prompt'  => 'If I were you, I would _____________ about how I feel.',
            'correct' => 'talk to her',
            'options' => [
                'talk to her',
            ],
        ],
        [
            'prompt'  => "Maybe something is going on in her life that's causing her to _____________ so much.",
            'correct' => 'cancel plans',
            'options' => [
                'cancel plans',
            ],
        ],
    ],

    'subtitles' => [
        ['start' => 0,    'end' => 5,    'text' => "I'm not sure what to do about this situation with my friend."],
        ['start' => 5.5,  'end' => 7,    'text' => "What's wrong?"],
        ['start' => 7.5,  'end' => 13,   'text' => "She keeps cancelling our plans at the last minute and it's really upsetting."],
        ['start' => 13.5, 'end' => 22,   'text' => "If I were you I would talk to her about how I feel."],
        ['start' => 22.5, 'end' => 33,   'text' => "Let her know that you understand that things come up but you need her to value your time and respecting each other's schedules."],
        ['start' => 33.5, 'end' => 43,   'text' => "That's a good idea and let her know that if this continues to happen you might not be able to make plans with her anymore."],
        ['start' => 43.5, 'end' => 50,   'text' => "But isn't that a bit serious? What if she gets upset or defensive when I bring it up?"],
        ['start' => 50.5, 'end' => 58,   'text' => "If I were you I would try to approach the conversation calmly."],
        ['start' => 58.5, 'end' => 69,   'text' => "Let her know that you're coming from a place of concern and that you value your friendship be open to hearing her perspective too."],
        ['start' => 69.5, 'end' => 78,   'text' => "Maybe something is going on in her life that's causing her to cancel so much."],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])