<?php
$content = [
    'page_title' => 'Introduce Yourself',
    'title' => 'Introduce Yourself',
    'subtitle' => 'Match each answer with the correct introduction question.',

    // Use caption mode instead of image mode
    'mode' => 'caption',

    'grid_class' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4',
    'show_all_items' => true,
    'question_prompt' => '',

    'items' => [
        [
            'key' => 'whats-your-name',
            'text' => 'What’s your name?',
            'caption' => 'My name is Sean Lee.',
        ],
        [
            'key' => 'how-old-are-you',
            'text' => 'How old are you?',
            'caption' => 'I’m thirty-six.',
        ],
        [
            'key' => 'where-are-you-from',
            'text' => 'Where are you from?',
            'caption' => 'I’m from France.',
        ],
        [
            'key' => 'how-are-you',
            'text' => 'How are you?',
            'caption' => 'I’m great, thanks.',
        ],
        [
            'key' => 'are-you-studying-here',
            'text' => 'Are you studying here?',
            'caption' => 'Yes, I’m on an English course.',
        ],
        [
            'key' => 'hi-im-alice',
            'text' => 'Hi, I’m Alice.',
            'caption' => 'Nice to meet you. I’m Simon.',
        ],
        [
            'key' => 'spell-your-last-name',
            'text' => 'How do you spell your last name?',
            'caption' => 'S-I-L-V-A',
        ],
        [
            'key' => 'have-a-good-day',
            'text' => 'Have a good day!',
            'caption' => 'You too.',
        ],
        [
            'key' => 'how-are-you-doing',
            'text' => 'How are you doing?',
            'caption' => 'I’m doing good, thanks! What about you?',
        ],
        [
            'key' => 'see-you-next-week',
            'text' => 'See you next week!',
            'caption' => 'Bye, see you!',
        ],
    ],
];
?>

@include('slider.game.image-guess-who', ['content' => $content])