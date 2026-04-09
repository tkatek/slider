<?php
$content['page_title'] = 'Practice 2';
$content['title'] = 'Practice 2';
$content['subtitle'] = 'Let’s check your information!';
$content['professions'] = [
    [
        'id' => 'no-entry',
        'label' => '',
        'img' => materialAsset('slider/A1/Advanced/chapter-7/img/slide4/no-entry.webp'),
        'color' => 'bg-card-pink',
        'desc' => 'you cannot go in.',
    ],
    [
        'id' => 'warning-electricity',
        'label' => '',
        'img' => materialAsset('slider/A1/Advanced/chapter-7/img/slide4/warning-electricity.webp'),
        'color' => 'bg-card-blue',
        'desc' => 'be careful, there is electricity.',
    ],
    [
        'id' => 'wear-safety-boots',
        'label' => '',
        'img' => materialAsset('slider/A1/Advanced/chapter-7/img/slide4/wear-safety-boots.webp'),
        'color' => 'bg-card-orange',
        'desc' => 'you must wear safety boots.',
    ],
    [
        'id' => 'go-straight',
        'label' => '',
        'img' => materialAsset('slider/A1/Advanced/chapter-7/img/slide4/go-straight.webp'),
        'color' => 'bg-card-indigo',
        'desc' => 'you must go straight ahead.',
    ],
    [
        'id' => 'cattle-crossing',
        'label' => '',
        'img' => materialAsset('slider/A1/Advanced/chapter-7/img/slide4/cattle-crossing.webp'),
        'color' => 'bg-card-green',
        'desc' => 'watch out, cows may cross the road.',
    ],
    [
        'id' => 'emergency-exit',
        'label' => '',
        'img' => materialAsset('slider/A1/Advanced/chapter-7/img/slide4/emergency-exit.webp'),
        'color' => 'bg-card-teal',
        'desc' => 'this is the way out in an emergency.',
    ],
    [
        'id' => 'wear-gloves',
        'label' => '',
        'img' => materialAsset('slider/A1/Advanced/chapter-7/img/slide4/wear-gloves.webp'),
        'color' => 'bg-card-orange',
        'desc' => 'you must wear gloves.',
    ],
    [
        'id' => 'no-left-turn',
        'label' => '',
        'img' => materialAsset('slider/A1/Advanced/chapter-7/img/slide4/no-left-turn.webp'),
        'color' => 'bg-card-indigo',
        'desc' => 'you cannot turn left.',
    ],
    [
        'id' => 'no-bicycles',
        'label' => '',
        'img' => materialAsset('slider/A1/Advanced/chapter-7/img/slide4/no-bicycles.webp'),
        'color' => 'bg-card-purple',
        'desc' => 'bicycles are not allowed here.',
    ],
    [
        'id' => 'recycle',
        'label' => '',
        'img' => materialAsset('slider/A1/Advanced/chapter-7/img/slide4/recycle.webp'),
        'color' => 'bg-card-green',
        'desc' => 'put used things in the recycling bin.',
    ],
    [
        'id' => 'children-crossing',
        'label' => '',
        'img' => materialAsset('slider/A1/Advanced/chapter-7/img/slide4/children-crossing.webp'),
        'color' => 'bg-card-pink',
        'desc' => 'watch out, children may cross here.',
    ],
    [
        'id' => 'pedestrian-crossing',
        'label' => '',
        'img' => materialAsset('slider/A1/Advanced/chapter-7/img/slide4/pedestrian-crossing.webp'),
        'color' => 'bg-card-blue',
        'desc' => 'people can cross the road here.',
    ],
    [
        'id' => 'no-parking',
        'label' => '',
        'img' => materialAsset('slider/A1/Advanced/chapter-7/img/slide4/no-parking.webp'),
        'color' => 'bg-card-orange',
        'desc' => 'you cannot park here.',
    ],
    [
        'id' => 'no-smoking',
        'label' => '',
        'img' => materialAsset('slider/A1/Advanced/chapter-7/img/slide4/no-smoking.webp'),
        'color' => 'bg-card-red',
        'desc' => 'smoking is not allowed here.',
    ],
    [
        'id' => 'wear-a-seat-belt',
        'label' => '',
        'img' => materialAsset('slider/A1/Advanced/chapter-7/img/slide4/wear-a-seat-belt.webp'),
        'color' => 'bg-card-teal',
        'desc' => 'you must wear a seat belt.',
    ],
];
?>

@include("slider.game.guess-who", ['content' => $content])