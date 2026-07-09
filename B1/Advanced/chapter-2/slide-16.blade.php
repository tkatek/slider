<?php

$content = [
    'title'    => 'Practice 8',
    'subtitle' => 'Use the suitable modal of certainty to recreate the sentences.',

    'items' => [
        [
            'question' => "I'm sure she is at home today. (PRESENT)",
            'answer'   => 'She must be at home today.',
            'image'    => materialAsset('slider/B1/Advanced/chapter-2/img/slide16/at-home.webp'),
        ],
        [
            'question' => "I'm sure you didn't forget about your homework. (PAST)",
            'answer'   => "You can't have forgotten about your homework.",
            'image'    => materialAsset('slider/B1/Advanced/chapter-2/img/slide16/homework.webp'),
        ],
        [
            'question' => "I'm sure they aren't at work today. (PRESENT)",
            'answer'   => "They can't be at work today.",
            'image'    => materialAsset('slider/B1/Advanced/chapter-2/img/slide16/at-work.webp'),
        ],
        [
            'question' => 'Perhaps he left the car unlocked. (PAST)',
            'answer'   => 'He might/could/may have left the car unlocked.',
            'image'    => materialAsset('slider/B1/Advanced/chapter-2/img/slide16/car-unlocked.webp'),
        ],
        [
            'question' => 'It is impossible that he is 65 years old. (PRESENT)',
            'answer'   => "He can't be 65 years old.",
            'image'    => materialAsset('slider/B1/Advanced/chapter-2/img/slide16/sixty-five.webp'),
        ],
    ],
];

?>

@include('slider.game.question-answer', ['content' => $content])