<?php

$content = [
    'page_title' => 'New Vocabulary',
    'title'      => 'New Vocabulary',
    'subtitle'   => '',
    'image_text_style' => 'overlay',

    'groups' => [
        [
            'key'        => 'family-basics',
            'title'      => '🏠 Family Basics',
            'grid_class' => 'grid-cols-2 sm:grid-cols-4 lg:grid-cols-6',
            'items'      => [
                [
                    'text'  => 'Father',
                    'emoji' => '👨',
                    'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/Father.mp3'),
                    'image' => materialAsset('slider/A1/Beginner/chapter-4/img/slide5/father.webp'),
                ],
                [
                    'text'  => 'Mother',
                    'emoji' => '👩',
                    'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/Mother.mp3'),
                    'image' => materialAsset('slider/A1/Beginner/chapter-4/img/slide5/mother.webp'),
                ],
                [
                    'text'  => 'Brother',
                    'emoji' => '👦',
                    'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/Brother.mp3'),
                    'image' => materialAsset('slider/A1/Beginner/chapter-4/img/slide5/brother.webp'),
                ],
                [
                    'text'  => 'Sister',
                    'emoji' => '👧',
                    'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/Sister.mp3'),
                    'image' => materialAsset('slider/A1/Beginner/chapter-4/img/slide5/sister.webp'),
                ],
                [
                    'text'  => 'Daughter',
                    'emoji' => '👧',
                    'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/Daughter.mp3'),
                    'image' => materialAsset('slider/A1/Beginner/chapter-4/img/slide5/daughter.webp'),
                ],
                [
                    'text'  => 'Son',
                    'emoji' => '👦',
                    'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/Son.mp3'),
                    'image' => materialAsset('slider/A1/Beginner/chapter-4/img/slide5/son.webp'),
                ],
            ],
        ],
        [
            'key'        => 'other-family-words',
            'title'      => '🌿 Other Family Words',
            'grid_class' => 'grid-cols-2 sm:grid-cols-4 xl:grid-cols-6',
            'items'      => [
                [
                    'text'  => 'Grandfather',
                    'emoji' => '👴',
                    'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/Grandfather.mp3'),
                    'image' => materialAsset('slider/A1/Beginner/chapter-4/img/slide5/grandfather.webp'),
                ],
                [
                    'text'  => 'Grandmother',
                    'emoji' => '👵',
                    'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/Grandmother.mp3'),
                    'image' => materialAsset('slider/A1/Beginner/chapter-4/img/slide5/grandmother.webp'),
                ],
                [
                    'text'  => 'Uncle',
                    'emoji' => '🧔',
                    'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/Uncle.mp3'),
                    'image' => materialAsset('slider/A1/Beginner/chapter-4/img/slide5/uncle.webp'),
                ],
                [
                    'text'  => 'Aunt',
                    'emoji' => '👩',
                    'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/Aunt.mp3'),
                    'image' => materialAsset('slider/A1/Beginner/chapter-4/img/slide5/aunt.webp'),
                ],
                [
                    'text'  => 'Cousin',
                    'emoji' => '🧑‍🤝‍🧑',
                    'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/Cousin.mp3'),
                    'image' => materialAsset('slider/A1/Beginner/chapter-4/img/slide5/cousin.webp'),
                ],
                [
                    'text'  => 'Niece',
                    'emoji' => '👧',
                    'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/Niece.mp3'),
                    'image' => materialAsset('slider/A1/Beginner/chapter-4/img/slide5/niece.webp'),
                ],
                [
                    'text'  => 'Nephew',
                    'emoji' => '👦',
                    'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/Nephew.mp3'),
                    'image' => materialAsset('slider/A1/Beginner/chapter-4/img/slide5/nephew.webp'),
                ],
                [
                    'text'  => 'Stepmother',
                    'emoji' => '👩‍🍼',
                    'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/Stepmother.mp3'),
                    'image' => materialAsset('slider/A1/Beginner/chapter-4/img/slide5/stepmother.webp'),
                ],
                [
                    'text'  => 'Stepfather',
                    'emoji' => '🧔‍♂️',
                    'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/Stepfather.mp3'),
                    'image' => materialAsset('slider/A1/Beginner/chapter-4/img/slide5/stepfather.webp'),
                ],
                [
                    'text'  => 'Brother-in-law',
                    'emoji' => '🤝',
                    'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/Brother-in-law.mp3'),
                    'image' => materialAsset('slider/A1/Beginner/chapter-4/img/slide5/brother-in-law.webp'),
                ],
                [
                    'text'  => 'Sister-in-law',
                    'emoji' => '🤝',
                    'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/Sister-in-law.mp3'),
                    'image' => materialAsset('slider/A1/Beginner/chapter-4/img/slide5/sister-in-law.webp'),
                ],
            ],
        ],
    ],
];

?>

@include('slider.vocab.image-card', ['content' => $content])