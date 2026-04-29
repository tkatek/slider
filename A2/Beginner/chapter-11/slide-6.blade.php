<?php
$content = [
    'page_title' => 'New Vocabulary',
    'title'      => 'New Vocabulary',
    'subtitle'   => '',
    'grid_class' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-4',

    'items' => [
        [
            'text'     => 'lose weight',
            'subtitle' => 'become thinner',
            'emoji'    => '',
            'sound'    => materialAsset('slider/A2/Beginner/chapter11/audios/slide6/lose-weight.mpeg'),
            'image'    => materialAsset('slider/A2/Beginner/chapter11/img/slide6/lose-weight.webp'),
        ],
        [
            'text'     => 'exercise',
            'subtitle' => 'move your body (walk, run, gym)',
            'emoji'    => '',
            'sound'    => materialAsset('slider/A2/Beginner/chapter11/audios/slide6/exercise.mpeg'),
            'image'    => materialAsset('slider/A2/Beginner/chapter11/img/slide6/exercise.webp'),
        ],
        [
            'text'     => 'healthy food',
            'subtitle' => 'good food for your body',
            'emoji'    => '',
            'sound'    => materialAsset('slider/A2/Beginner/chapter11/audios/slide6/healthy-food.mpeg'),
            'image'    => materialAsset('slider/A2/Beginner/chapter11/img/slide6/healthy-food.webp'),
        ],
        [
            'text'     => 'feel better',
            'subtitle' => 'feel happier and stronger',
            'emoji'    => '',
            'sound'    => materialAsset('slider/A2/Beginner/chapter11/audios/slide6/feel-better.mpeg'),
            'image'    => materialAsset('slider/A2/Beginner/chapter11/img/slide6/feel-better.webp'),
        ],
        [
            'text'     => 'Atkins diet',
            'subtitle' => 'eat less carbohydrates (bread, rice), more protein',
            'emoji'    => '',
            'sound'    => materialAsset('slider/A2/Beginner/chapter11/audios/slide6/atkins-diet.mpeg'),
            'image'    => materialAsset('slider/A2/Beginner/chapter11/img/slide6/Atkins-diet.webp'),
        ],
        [
            'text'     => 'vegan diet',
            'subtitle' => 'no meat, no milk, no eggs',
            'emoji'    => '',
            'sound'    => materialAsset('slider/A2/Beginner/chapter11/audios/slide6/vegan-diet.mpeg'),
            'image'    => materialAsset('slider/A2/Beginner/chapter11/img/slide6/vegan-diet.webp'),
        ],
        [
            'text'     => 'paleo diet',
            'subtitle' => 'eat like people in the past (natural food only)',
            'emoji'    => '',
            'sound'    => materialAsset('slider/A2/Beginner/chapter11/audios/slide6/paleo-diet.mpeg'),
            'image'    => materialAsset('slider/A2/Beginner/chapter11/img/slide6/paleo-diet.webp'),
        ],
        [
            'text'     => 'processed food',
            'subtitle' => 'food from factories (chips, sweets, fast food)',
            'emoji'    => '',
            'sound'    => materialAsset('slider/A2/Beginner/chapter11/audios/slide6/processed-food.mpeg'),
            'image'    => materialAsset('slider/A2/Beginner/chapter11/img/slide6/processed-food.webp'),
        ],
        [
            'text'     => '5:2 diet',
            'subtitle' => 'eat normal 5 days, eat very little 2 days',
            'emoji'    => '',
            'sound'    => materialAsset('slider/A2/Beginner/chapter11/audios/slide6/five-two-diet.mpeg'),
            'image'    => materialAsset('slider/A2/Beginner/chapter11/img/slide6/5-2-diet.webp'),
        ],
        [
            'text'     => 'calories',
            'subtitle' => 'units of energy in food',
            'emoji'    => '',
            'sound'    => materialAsset('slider/A2/Beginner/chapter11/audios/slide6/calories.mpeg'),
            'image'    => materialAsset('slider/A2/Beginner/chapter11/img/slide6/calories.webp'),
        ],
        [
            'text'     => 'muscles',
            'subtitle' => 'the strong parts in your arms and legs',
            'emoji'    => '',
            'sound'    => materialAsset('slider/A2/Beginner/chapter11/audios/slide6/muscles.mpeg'),
            'image'    => materialAsset('slider/A2/Beginner/chapter11/img/slide6/muscles.webp'),
        ],
        [
            'text'     => 'consult a doctor',
            'subtitle' => 'ask the doctor for advice',
            'emoji'    => '',
            'sound'    => materialAsset('slider/A2/Beginner/chapter11/audios/slide6/consult-a-doctor.mpeg'),
            'image'    => materialAsset('slider/A2/Beginner/chapter11/img/slide6/consult-a-doctor.webp'),
        ],
    ],
];
?>

@include('slider.vocab.image-card', ['content' => $content])