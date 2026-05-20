<?php

$content = [

    'title'      => 'New Vocabulary',
    'subtitle'   => '',
    'image_text_style' => 'overlay',

    'groups' => [
        [
            'key'        => 'useful-phrases',
            'title'      => '',
            'grid_class' => 'grid-cols-2 sm:grid-cols-6 ',
            'items'      => [
                [
                    'text'  => 'That will be $1',
                    'emoji' => '💵',
                    'sound' => materialAsset('slider/A1/Intermediate/chapter-5/audios/slide6/that-will-be.mp3'),
                ],
                [
                    'text'  => 'I hope you feel better soon.',
                    'emoji' => '🙂',
                    'sound' => materialAsset('slider/A1/Intermediate/chapter-5/audios/slide6/i-hope-you-feel-better-soon.mp3'),
                ],
                [
                    'text'  => 'I need something for the...',
                    'emoji' => '💬',
                    'sound' => materialAsset('slider/A1/Intermediate/chapter-5/audios/slide6/i-need-something-for-the.mp3'),
                ],
                [
                    'text'  => 'For how long should I take it?',
                    'emoji' => '⏳',
                    'sound' => materialAsset('slider/A1/Intermediate/chapter-5/audios/slide6/for-how-long-should-i-take-it.mp3'),
                ],
                [
                    'text'  => 'Over-the-counter medicine',
                    'emoji' => '🏷️',
                    'sound' => materialAsset('slider/A1/Intermediate/chapter-5/audios/slide6/over-the-counter-medicine.mp3'),
                ],
                [
                    'text'  => 'How often do I have to take it?',
                    'emoji' => '⏰',
                    'sound' => materialAsset('slider/A1/Intermediate/chapter-5/audios/slide6/how-often-do-i-have-to-take-it.mp3'),
                ],
            ],
        ],
        [
            'key'        => 'people-places',
            'title'      => '🧑‍⚕️ People & Places',
            'grid_class' => 'grid-cols-2 sm:grid-cols-5 ',
            'items'      => [
                [
                    'text'  => 'Customer',
                    'emoji' => '🧑‍💼',
                    'sound' => materialAsset('slider/A1/Intermediate/chapter-5/audios/slide6/customer.mp3'),
                    'image' => materialAsset('slider/A1/Intermediate/chapter-5/slide6/customer.webp'),
                ],
                [
                    'text'  => 'Pharmacist',
                    'emoji' => '🧑‍⚕️',
                    'sound' => materialAsset('slider/A1/Intermediate/chapter-5/audios/slide6/pharmacist.mp3'),
                    'image' => materialAsset('slider/A1/Intermediate/chapter-5/slide6/pharmacist.webp'),
                ],
                [
                    'text'  => 'Prescription',
                    'emoji' => '🧾',
                    'sound' => materialAsset('slider/A1/Intermediate/chapter-5/audios/slide6/prescription.mp3'),
                    'image' => materialAsset('slider/A1/Intermediate/chapter-5/slide6/prescription.webp'),
                ],
            ],
        ],
        [
            'key'        => 'medicine-types',
            'title'      => '💊 Medicine Types',
            'grid_class' => 'grid-cols-2 sm:grid-cols-5 ',
            'items'      => [
                [
                    'text'  => 'Cough syrup',
                    'emoji' => '🧴',
                    'sound' => materialAsset('slider/A1/Intermediate/chapter-5/audios/slide6/cough-syrup.mp3'),
                    'image' => materialAsset('slider/A1/Intermediate/chapter-5/slide6/cough-syrup.webp'),
                ],
                [
                    'text'  => 'Antibiotic',
                    'emoji' => '💊',
                    'sound' => materialAsset('slider/A1/Intermediate/chapter-5/audios/slide6/antibiotic.mp3'),
                    'image' => materialAsset('slider/A1/Intermediate/chapter-5/slide6/antibiotic.webp'),
                ],
                [
                    'text'  => 'Painkiller',
                    'emoji' => '💊',
                    'sound' => materialAsset('slider/A1/Intermediate/chapter-5/audios/slide6/painkiller.mp3'),
                    'image' => materialAsset('slider/A1/Intermediate/chapter-5/slide6/painkiller.webp'),
                ],
                [
                    'text'  => 'Lozenge',
                    'emoji' => '🍬',
                    'sound' => materialAsset('slider/A1/Intermediate/chapter-5/audios/slide6/lozenge.mp3'),
                    'image' => materialAsset('slider/A1/Intermediate/chapter-5/slide6/lozenge.webp'),
                ],
                [
                    'text'  => 'Over the counter',
                    'emoji' => '🏷️',
                    'sound' => materialAsset('slider/A1/Intermediate/chapter-5/audios/slide6/over-the-counter.mp3'),
                    'image' => materialAsset('slider/A1/Intermediate/chapter-5/slide6/over-the-counter.webp'),
                ],
            ],
        ],
        [
            'key'        => 'instructions',
            'title'      => '📋 Instructions',
            'grid_class' => 'grid-cols-2 sm:grid-cols-5',
            'items'      => [
                [
                    'text'  => 'Dosage',
                    'emoji' => '📏',
                    'sound' => materialAsset('slider/A1/Intermediate/chapter-5/audios/slide6/dosage.mp3'),
                    'image' => materialAsset('slider/A1/Intermediate/chapter-5/slide6/dosage.webp'),
                ],
                [
                    'text'  => 'Teaspoon',
                    'emoji' => '🥄',
                    'sound' => materialAsset('slider/A1/Intermediate/chapter-5/audios/slide6/teaspoon.mp3'),
                    'image' => materialAsset('slider/A1/Intermediate/chapter-5/slide6/teaspoon.webp'),
                ],
                [
                    'text'  => 'Drowsiness / Dizziness',
                    'emoji' => '😴',
                    'sound' => materialAsset('slider/A1/Intermediate/chapter-5/audios/slide6/drowsiness-dizziness.mp3'),
                    'image' => materialAsset('slider/A1/Intermediate/chapter-5/slide6/drowsiness-dizziness.webp'),
                ],
            ],
        ],
    ],
];

?>

@include('slider.vocab.image-card', ['content' => $content])