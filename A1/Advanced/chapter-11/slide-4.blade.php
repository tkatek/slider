<?php
$content = [
    'page_title' => 'Discussion',
    'title'      => 'Discussion',
    'subtitle'   => '',
    'image'      => materialAsset('slider/A1/Advanced/chapter-11/img/discussion.webp'),
    'image_alt'  => 'Fill the tank',
//    'image_size' => 'max-w-[340px] sm:max-w-[440px] lg:h-[560px]',

    'cards' => [
        [
            'emoji' => '🏨',
            'label' => 'Question 1',
            'text'  => 'When do you  Fill Up the Tank?',
            'theme' => 'indigo',
        ],
        [
            'emoji' => '🙂',
            'label' => 'Question 2',
            'text'  => 'How often do you fuel up your tank?',
            'theme' => 'blue',
        ],
    ],
];
?>

@include('slider.other.discussion', ['content' => $content])