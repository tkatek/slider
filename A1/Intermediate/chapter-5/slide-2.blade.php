<?php

$content = array_replace_recursive([
    'page_title' => 'Warm-up',
    'title'      => 'Warm-up',
    'subtitle'   => '',
    'items' => [
        [
            'question' => 'What is this?',
            'answer'   => 'An earache.',
            'image'    => materialAsset('slider/A1/Intermediate/chapter-5/slide2/earache.webp'),
        ],
        [
            'question' => 'What is this?',
            'answer'   => 'A cold / the flu.',
            'image'    => materialAsset('slider/A1/Intermediate/chapter-5/slide2/cold.webp'),
        ],
        [
            'question' => 'What is this?',
            'answer'   => 'A headache.',
            'image'    => materialAsset('slider/A1/Intermediate/chapter-5/slide2/headache.webp'),
        ],
        [
            'question' => 'What is this?',
            'answer'   => 'Feeling dizzy.',
            'image'    => materialAsset('slider/A1/Intermediate/chapter-5/slide2/dizzy.webp'),
        ],
        [
            'question' => 'What is this?',
            'answer'   => 'A fever / a temperature.',
            'image'    => materialAsset('slider/A1/Intermediate/chapter-5/slide2/fever.webp'),
        ],
        [
            'question' => 'What is this?',
            'answer'   => 'A cough.',
            'image'    => materialAsset('slider/A1/Intermediate/chapter-5/slide2/cough.webp'),
        ],
        [
            'question' => 'What is this?',
            'answer'   => 'A toothache.',
            'image'    => materialAsset('slider/A1/Intermediate/chapter-5/slide2/toothache.webp'),
        ],
    ],
], $content ?? []);
?>

@include("slider.game.question-answer", ['content' => $content])
