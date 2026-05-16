<?php

$content = [
    'page_title' => 'New Vocabulary',
    'title'      => 'Useful Language',
    'subtitle'   => '',
    'grid_class' => 'grid-cols-2 sm:grid-cols-3 lg:grid-cols-3',

    'items' => [
        [
            'text'             => 'React in real time',
            'subtitle'         => 'Respond immediately',
            'example_subtitle' => 'Try to react in real time.',
            'sound'            => materialAsset('slider/C2/Beginner/chapter-11/audios/slide4/react-in-real-time.mp3'),
            'image'            => materialAsset('slider/C2/Beginner/chapter-11/img/slide4/react-in-real-time.webp'),
        ],
        [
            'text'             => 'Hesitation',
            'subtitle'         => 'Pause or uncertainty',
            'example_subtitle' => 'His hesitation sounded natural.',
            'sound'            => materialAsset('slider/C2/Beginner/chapter-11/audios/slide4/hesitation.mp3'),
            'image'            => materialAsset('slider/C2/Beginner/chapter-11/img/slide4/hesitation.webp'),
        ],
        [
            'text'             => 'Filler words',
            'subtitle'         => 'Words used while thinking',
            'example_subtitle' => '"Well", "um", "you know"',
            'sound'            => materialAsset('slider/C2/Beginner/chapter-11/audios/slide4/filler-words.mp3'),
            'image'            => materialAsset('slider/C2/Beginner/chapter-11/img/slide4/filler-words.webp'),
        ],
        [
            'text'             => 'Concise',
            'subtitle'         => 'Short and clear',
            'example_subtitle' => 'Keep your answers concise.',
            'sound'            => materialAsset('slider/C2/Beginner/chapter-11/audios/slide4/concise.mp3'),
            'image'            => materialAsset('slider/C2/Beginner/chapter-11/img/slide4/concise.webp'),
        ],
        [
            'text'             => 'Natural pause',
            'subtitle'         => 'Comfortable silence',
            'example_subtitle' => 'A natural pause is okay.',
            'sound'            => materialAsset('slider/C2/Beginner/chapter-11/audios/slide4/natural-pause.mp3'),
            'image'            => materialAsset('slider/C2/Beginner/chapter-11/img/slide4/natural-pause.webp'),
        ],
    ],
];

?>

@include('slider.vocab.image-card', ['content' => $content])