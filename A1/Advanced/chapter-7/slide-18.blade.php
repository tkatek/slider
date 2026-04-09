<?php
$content['page_title'] = 'Practice 9';
$content['title'] = 'Practice 9';
$content['subtitle'] = '';
$content['grid_class'] = 'grid-cols-2 md:grid-cols-4';
$content['professions'] = [
    [
        'id' => 'swimming-area',
        'label' => '',
        'img' => materialAsset('slider/A1/Advanced/chapter-7/img/slide18/swimming-area.webp'),
        'color' => 'bg-card-orange',
        'desc' => 'you can swim here.',
    ],
    [
        'id' => 'no-parking',
        'label' => '',
        'img' => materialAsset('slider/A1/Advanced/chapter-7/img/slide18/no-parking.webp'),
        'color' => 'bg-card-green',
        'desc' => 'you mustn’t park here.',
    ],
    [
        'id' => 'wear-a-helmet',
        'label' => '',
        'img' => materialAsset('slider/A1/Advanced/chapter-7/img/slide18/wear-helmet.webp'),
        'color' => 'bg-card-red',
        'desc' => 'you must wear a helmet.',
    ],
    [
        'id' => 'no-smoking',
        'label' => '',
        'img' => materialAsset('slider/A1/Advanced/chapter-7/img/slide18/no-smoking.webp'),
        'color' => 'bg-card-purple',
        'desc' => 'you mustn’t smoke here.',
    ],
    [
        'id' => 'pedestrian-crossing',
        'label' => '',
        'img' => materialAsset('slider/A1/Advanced/chapter-7/img/slide18/crossing.webp'),
        'color' => 'bg-card-blue',
        'desc' => 'you can cross the road here.',
    ],
    [
        'id' => 'smoking-area',
        'label' => '',
        'img' => materialAsset('slider/A1/Advanced/chapter-7/img/slide18/smoking-area.webp'),
        'color' => 'bg-card-green',
        'desc' => 'you can smoke here.',
    ],
    [
        'id' => 'no-swimming',
        'label' => '',
        'img' => materialAsset('slider/A1/Advanced/chapter-7/img/slide18/no-swim.webp'),
        'color' => 'bg-card-blue',
        'desc' => 'you mustn’t swim here.',
    ],
    [
        'id' => 'parking',
        'label' => '',
        'img' => materialAsset('slider/A1/Advanced/chapter-7/img/slide18/parking.webp'),
        'color' => 'bg-card-orange',
        'desc' => 'you can park your car here.',
    ],
];
?>

@include("slider.game.guess-who", ['content' => $content])
