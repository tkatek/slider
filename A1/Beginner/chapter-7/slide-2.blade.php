<?php

$content = array_replace_recursive([
    'page_title' => 'Let’s Refresh Our Memory',
    'title'      => 'Let’s Refresh Our Memory',
    'subtitle'   => '',
    'theme'      => '#6366f1',

    'grid' => [
        'cols' => [
            'base' => 1,
            'sm'   => 1,
            'md'   => 2,
            'lg'   => 3,
        ],
        'gap' => 'gap-3 sm:gap-4 lg:gap-5',
        'card_height' => 'h-24 sm:h-28 lg:h-32',
    ],

    'sounds' => [
        'click' => materialAsset('slider/sounds/tap.wav'),
        'done'  => materialAsset('slider/sounds/correct.wav'),
        'skip'  => materialAsset('slider/sounds/click.wav'),
    ],

    'items' => [
        [
            'question' => 'What time do you usually wake up?',
            'answer'   => 'I usually wake up at 7:00 AM.',
            'image'    => materialAsset('slider/A1/Beginner/chapter-7/img/slide2/question1.webp'),
        ],
        [
            'question' => 'What do you usually have for breakfast?',
            'answer'   => 'I usually have bread, eggs, and tea for breakfast.',
            'image'    => materialAsset('slider/A1/Beginner/chapter-7/img/slide2/question2.webp'),
        ],
        [
            'question' => 'What time do you go to work?',
            'answer'   => 'I usually go to work at 8:00 AM.',
            'image'    => materialAsset('slider/A1/Beginner/chapter-7/img/slide2/question3.webp'),
        ],
        [
            'question' => 'When do you go back home?',
            'answer'   => 'I usually go back home at 6:00 PM.',
            'image'    => materialAsset('slider/A1/Beginner/chapter-7/img/slide2/question4.webp'),
        ],
        [
            'question' => 'What do you usually do at the weekend?',
            'answer'   => 'I usually relax and spend time with my family at the weekend.',
            'image'    => materialAsset('slider/A1/Beginner/chapter-7/img/slide2/question5.webp'),
        ],
    ],
], $content ?? []);
?>

@include("slider.game.question-answer", ['content' => $content])