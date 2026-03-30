<?php
$content['page_title'] = 'Let’s practise!';
$content['title'] = 'Let’s practise!';
$content['subtitle'] = 'Read and choose the correct word.';
$content['professions']=[
    [
        'id' => 'artist',
        'label' => 'artist',
        'img' => materialAsset('slider/A1/Beginner/chapter-1/img/slide9/artist.webp'),
        'color' => 'bg-card-pink',
        'desc' => 'a person who draws pictures.',
    ],
    [
        'id' => 'farmer',
        'label' => 'farmer',
        'img' => materialAsset('slider/A1/Beginner/chapter-1/img/slide9/farmer.webp'),
        'color' => 'bg-card-blue',
        'desc' => 'a person who grows food.',
    ],
    [
        'id' => 'teacher',
        'label' => 'teacher',
        'img' => materialAsset('slider/A1/Beginner/chapter-1/img/slide9/teacher.webp'),
        'color' => 'bg-card-orange',
        'desc' => 'a person who teaches students.',
    ],
    [
        'id' => 'pilot',
        'label' => 'pilot',
        'img' => materialAsset('slider/A1/Beginner/chapter-1/img/slide9/pilot.webp'),
        'color' => 'bg-card-indigo',
        'desc' => 'a person who flies the plane.',
    ],
    [
        'id' => 'vet',
        'label' => 'vet',
        'img' => materialAsset('slider/A1/Beginner/chapter-1/img/slide9/vet.webp'),
        'color' => 'bg-card-green',
        'desc' => 'a person who helps sick animals.',
    ],
    [
        'id' => 'doctor',
        'label' => 'doctor',
        'img' => materialAsset('slider/A1/Beginner/chapter-1/img/slide9/doctor.webp'),
        'color' => 'bg-card-teal',
        'desc' => 'a person who helps sick people.',
    ],
    [
        'id' => 'chef',
        'label' => 'chef',
        'img' => materialAsset('slider/A1/Beginner/chapter-1/img/slide9/chef.webp'),
        'color' => 'bg-card-orange',
        'desc' => 'a person who cooks delicious meals.',
    ],
    [
        'id' => 'writer',
        'label' => 'writer',
        'img' => materialAsset('slider/A1/Beginner/chapter-1/img/slide9/writer.webp'),
        'color' => 'bg-card-indigo',
        'desc' => 'a person who writes.',
    ],
    [
        'id' => 'actor',
        'label' => 'actor',
        'img' => materialAsset('slider/A1/Beginner/chapter-1/img/slide9/actor.webp'),
        'color' => 'bg-card-purple',
        'desc' => 'a person who acts in movies.',
    ],
    [
        'id' => 'singer',
        'label' => 'singer',
        'img' => materialAsset('slider/A1/Beginner/chapter-1/img/slide9/singer.webp'),
        'color' => 'bg-card-green',
        'desc' => 'a person who sings songs.',
    ],
];
?>


@include("slider.game.guess-who",['content'=>$content])
