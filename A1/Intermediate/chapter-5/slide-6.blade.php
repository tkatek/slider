<?php
$content = [
    'page_title'    => 'New Vocabulary',
    'title'         => 'New Vocabulary',
    'subtitle'      => '',
    'default_tone'  => 'play',
    'default_group' => 'violet',
    'use_objectives_typography' => true,
    'show_sentence_pill' => false,
    'show_item_group_badge' => true,

    'sentences' => [
        [ 
            'text'  => 'That will be 1$',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-5/audios/slide6/that-will-be.mp3'),
        ],
        [
            'text'  => 'I hope you feel better soon.',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-5/audios/slide6/i-hope-you-feel-better-soon.mp3'),
        ],
        [
            'text'  => 'I need something for the...',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-5/audios/slide6/i-need-something-for-the.mp3'),
        ],
        [
            'text'  => 'For how long should I take it?',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-5/audios/slide6/for-how-long-should-i-take-it.mp3'),
        ],
        [
            'text'  => 'Over-the-counter medicine',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-5/audios/slide6/over-the-counter-medicine.mp3'),
        ],
        [
            'text'  => 'How often do I have to take it?',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-5/audios/slide6/how-often-do-i-have-to-take-it.mp3'),
        ],
    ],

    'grid_class' => 'grid-cols-2 sm:grid-cols-4 lg:grid-cols-6 xl:grid-cols-6',

    'items' => [
        [
            'text'  => 'Customer',
            'emoji' => '🧑‍💼',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-5/audios/slide6/customer.mp3'),
            'image' => materialAsset('slider/A1/Intermediate/chapter-5/slide6/customer.webp'),
            'group' => 'violet',
            'group_label' => 'People & Places',
        ],
        [
            'text'  => 'Pharmacist',
            'emoji' => '🧑‍⚕️',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-5/audios/slide6/pharmacist.mp3'),
            'image' => materialAsset('slider/A1/Intermediate/chapter-5/slide6/pharmacist.webp'),
            'group' => 'violet',
            'group_label' => 'People & Places',
        ],
        [
            'text'  => 'Prescription',
            'emoji' => '🧾',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-5/audios/slide6/prescription.mp3'),
            'image' => materialAsset('slider/A1/Intermediate/chapter-5/slide6/prescription.webp'),
            'group' => 'violet',
            'group_label' => 'People & Places',
        ],
        [
            'text'  => 'Cough syrup',
            'emoji' => '🧴',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-5/audios/slide6/cough-syrup.mp3'),
            'image' => materialAsset('slider/A1/Intermediate/chapter-5/slide6/cough-syrup.webp'),
            'group' => 'go',
            'group_label' => 'Medicine Types',
        ],
        [
            'text'  => 'Antibiotic',
            'emoji' => '💊',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-5/audios/slide6/antibiotic.mp3'),
            'image' => materialAsset('slider/A1/Intermediate/chapter-5/slide6/antibiotic.webp'),
            'group' => 'go',
            'group_label' => 'Medicine Types',
        ],
        [
            'text'  => 'Painkiller',
            'emoji' => '💊',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-5/audios/slide6/painkiller.mp3'),
            'image' => materialAsset('slider/A1/Intermediate/chapter-5/slide6/painkiller.webp'),
            'group' => 'go',
            'group_label' => 'Medicine Types',
        ],
        [
            'text'  => 'Lozenge',
            'emoji' => '🍬',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-5/audios/slide6/lozenge.mp3'),
            'image' => materialAsset('slider/A1/Intermediate/chapter-5/slide6/lozenge.webp'),
            'group' => 'go',
            'group_label' => 'Medicine Types',
        ],
        [
            'text'  => 'Over the counter',
            'emoji' => '🏷️',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-5/audios/slide6/over-the-counter.mp3'),
            'image' => materialAsset('slider/A1/Intermediate/chapter-5/slide6/over-the-counter.webp'),
            'group' => 'go',
            'group_label' => 'Medicine Types',
        ],
        [
            'text'  => 'Dosage',
            'emoji' => '📏',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-5/audios/slide6/dosage.mp3'),
            'image' => materialAsset('slider/A1/Intermediate/chapter-5/slide6/dosage.webp'),
            'group' => 'do',
            'group_label' => 'Instructions',
        ],
        [
            'text'  => 'Teaspoon',
            'emoji' => '🥄',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-5/audios/slide6/teaspoon.mp3'),
            'image' => materialAsset('slider/A1/Intermediate/chapter-5/slide6/teaspoon.webp'),
            'group' => 'do',
            'group_label' => 'Instructions',
        ],

        [
            'text'  => 'Drowsiness / Dizziness',
            'emoji' => '😴',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-5/audios/slide6/drowsiness-dizziness.mp3'),
            'image' => materialAsset('slider/A1/Intermediate/chapter-5/slide6/drowsiness-dizziness.webp'),
            'group' => 'do',
            'group_label' => 'Instructions',
        ],
    ],
];
?>

@include('slider.vocab.vocabulary-grid', ['content' => $content])
