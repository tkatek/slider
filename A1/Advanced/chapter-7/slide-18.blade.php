<?php
$content['page_title'] = 'Practice 9';
$content['title'] = 'Practice 9';
$content['subtitle'] = 'Find the match';
$content['type'] = 'grid';
$content['grid_class'] = 'grid-cols-2 md:grid-cols-4';

$content['items'] = [
    [
        'key' => 'swimming-area',
        'text' => 'you can swim here.',
        'image' => materialAsset('slider/A1/Advanced/chapter-7/img/slide18/swimming-area.webp'),
        'caption' => '',
    ],
    [
        'key' => 'no-parking',
        'text' => 'you mustn’t park here.',
        'image' => materialAsset('slider/A1/Advanced/chapter-7/img/slide18/no-parking.webp'),
        'caption' => '',
    ],
    [
        'key' => 'wear-a-helmet',
        'text' => 'you must wear a helmet.',
        'image' => materialAsset('slider/A1/Advanced/chapter-7/img/slide18/wear-helmet.webp'),
        'caption' => '',
    ],
    [
        'key' => 'no-smoking',
        'text' => 'you mustn’t smoke here.',
        'image' => materialAsset('slider/A1/Advanced/chapter-7/img/slide18/no-smoking.webp'),
        'caption' => '',
    ],
    [
        'key' => 'pedestrian-crossing',
        'text' => 'you can cross the road here.',
        'image' => materialAsset('slider/A1/Advanced/chapter-7/img/slide18/crossing.webp'),
        'caption' => '',
    ],
    [
        'key' => 'smoking-area',
        'text' => 'you can smoke here.',
        'image' => materialAsset('slider/A1/Advanced/chapter-7/img/slide18/smoking-area.webp'),
        'caption' => '',
    ],
    [
        'key' => 'no-swimming',
        'text' => 'you mustn’t swim here.',
        'image' => materialAsset('slider/A1/Advanced/chapter-7/img/slide18/no-swim.webp'),
        'caption' => '',
    ],
    [
        'key' => 'parking',
        'text' => 'you can park your car here.',
        'image' => materialAsset('slider/A1/Advanced/chapter-7/img/slide18/parking.webp'),
        'caption' => '',
    ],
];
?>

@include('slider.game.guess-who', ['content' => $content])