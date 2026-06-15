<?php
$content = [
    'page_title' => 'Practice 1',
    'title' => 'Practice 1: Warm-up',
    'subtitle' => 'What should he/she do?<br>Match the picture with the suitable advice',
    'grid_class' => 'grid-cols-2 sm:grid-cols-3 lg:grid-cols-4',
    'show_all_items' => true,
    'question_prompt' => '',
    'items' => [
        [
            'key' => 'toothache',
            'text' => 'You should go to the dentist.',
            'image' => materialAsset('slider/B1/Beginner/chapter-12/img/slide3/toothache.webp'),
            'caption' => '',
        ],
        [
            'key' => 'tired',
            'text' => 'You should go to bed.',
            'image' => materialAsset('slider/B1/Beginner/chapter-12/img/slide3/tired.webp'),
            'caption' => '',
        ],
        [
            'key' => 'sick',
            'text' => 'You should see the doctor.',
            'image' => materialAsset('slider/B1/Beginner/chapter-12/img/slide3/sick.webp'),
            'caption' => '',
        ],
        [
            'key' => 'cold',
            'text' => 'You should put on your sweater.',
            'image' => materialAsset('slider/B1/Beginner/chapter-12/img/slide3/cold.webp'),
            'caption' => '',
        ],
        [
            'key' => 'thirsty',
            'text' => 'You should drink some water.',
            'image' => materialAsset('slider/B1/Beginner/chapter-12/img/slide3/thirsty.webp'),
            'caption' => '',
        ],
        [
            'key' => 'stomachache',
            'text' => 'You shouldn\'t eat hamburgers and chocolate.',
            'image' => materialAsset('slider/B1/Beginner/chapter-12/img/slide3/stomachache.webp'),
            'caption' => '',
        ],
        [
            'key' => 'headache',
            'text' => 'You should take a pill.',
            'image' => materialAsset('slider/B1/Beginner/chapter-12/img/slide3/headache.webp'),
            'caption' => '',
        ],
        [
            'key' => 'sunburn',
            'text' => 'You should sit in the shadow.',
            'image' => materialAsset('slider/B1/Beginner/chapter-12/img/slide3/sunburn.webp'),
            'caption' => '',
        ],
    ],
];
?>

@include('slider.game.image-guess-who', ['content' => $content])