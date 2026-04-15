<?php
$content['page_title'] = 'Let’s practise!';
$content['title'] = 'Let’s practise!';
$content['subtitle'] = 'Read and choose the correct word.';
$content['type'] = 'grid';

$content['items'] = [
    [
        'key' => 'artist',
        'text' => 'a person who draws pictures.',
        'image' => materialAsset('slider/A1/Beginner/chapter-1/img/slide9/artist.webp'),
        'caption' => 'artist',
    ],
    [
        'key' => 'farmer',
        'text' => 'a person who grows food.',
        'image' => materialAsset('slider/A1/Beginner/chapter-1/img/slide9/farmer.webp'),
        'caption' => 'farmer',
    ],
    [
        'key' => 'teacher',
        'text' => 'a person who teaches students.',
        'image' => materialAsset('slider/A1/Beginner/chapter-1/img/slide9/teacher.webp'),
        'caption' => 'teacher',
    ],
    [
        'key' => 'pilot',
        'text' => 'a person who flies the plane.',
        'image' => materialAsset('slider/A1/Beginner/chapter-1/img/slide9/pilot.webp'),
        'caption' => 'pilot',
    ],
    [
        'key' => 'vet',
        'text' => 'a person who helps sick animals.',
        'image' => materialAsset('slider/A1/Beginner/chapter-1/img/slide9/vet.webp'),
        'caption' => 'vet',
    ],
    [
        'key' => 'doctor',
        'text' => 'a person who helps sick people.',
        'image' => materialAsset('slider/A1/Beginner/chapter-1/img/slide9/doctor.webp'),
        'caption' => 'doctor',
    ],
    [
        'key' => 'chef',
        'text' => 'a person who cooks delicious meals.',
        'image' => materialAsset('slider/A1/Beginner/chapter-1/img/slide9/chef.webp'),
        'caption' => 'chef',
    ],
    [
        'key' => 'writer',
        'text' => 'a person who writes.',
        'image' => materialAsset('slider/A1/Beginner/chapter-1/img/slide9/writer.webp'),
        'caption' => 'writer',
    ],
    [
        'key' => 'actor',
        'text' => 'a person who acts in movies.',
        'image' => materialAsset('slider/A1/Beginner/chapter-1/img/slide9/actor.webp'),
        'caption' => 'actor',
    ],
    [
        'key' => 'singer',
        'text' => 'a person who sings songs.',
        'image' => materialAsset('slider/A1/Beginner/chapter-1/img/slide9/singer.webp'),
        'caption' => 'singer',
    ],
];
?>

@include('slider.game.guess-who', ['content' => $content])