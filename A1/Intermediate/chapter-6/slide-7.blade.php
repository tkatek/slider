<?php
$content = [
    'page_title'    => 'New Vocabulary',
    'title'         => 'Emergency Calls',
    'subtitle'      => 'New Vocabulary',
    'default_tone'  => 'play',
    'default_group' => 'violet',
    'use_objectives_typography' => true,
    'show_sentence_pill' => false,
    'show_item_group_badge' => false,

    'sentence_grid_class' => 'grid-cols-2 sm:grid-cols-4 lg:grid-cols-4 xl:grid-cols-4',
    'sentences' => [
        [
            'text'  => 'call <span class="text-red-500 font-black">911</span>',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-6/audios/slide7/call-911.mp3'),
        ],
        [
            'text'  => "what's your emergency?",
            'sound' => materialAsset('slider/A1/Intermediate/chapter-6/audios/slide7/whats-your-emergency.mp3'),
        ],
        [
            'text'  => 'stay on the line',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-6/audios/slide7/stay-on-the-line.mp3'),
        ],
        [
            'text'  => 'describe the situation',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-6/audios/slide7/describe-the-situation.mp3'),
        ],
        [
            'text'  => 'is anyone injured?',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-6/audios/slide7/is-anyone-injured.mp3'),
        ],
        [
            'text'  => 'paramedics are on their way',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-6/audios/slide7/paramedics-are-on-their-way.mp3'),
        ],
        [
            'text'  => 'what is your location?',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-6/audios/slide7/what-is-your-location.mp3'),
        ],
    ],

    'grid_class' => 'grid-cols-2 sm:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3',


    'items' => [
        [
            'text'  => '<span class="text-red-500 font-black">Emergency</span>',
            'emoji' => '',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-6/audios/slide7/emergency.mp3'),
            'image' => materialAsset('slider/A1/Intermediate/chapter-6/img/slide7/emergency.webp'),
        ],
        [
            'text'  => '<span class="text-red-500 font-black">Ambulance</span>',
            'emoji' => '',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-6/audios/slide7/ambulance.mp3'),
            'image' => materialAsset('slider/A1/Intermediate/chapter-6/img/slide7/ambulance.webp'),
        ],
        [
            'text'  => '<span class="text-red-500 font-black">Injured</span>',
            'emoji' => '',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-6/audios/slide7/injured.mp3'),
            'image' => materialAsset('slider/A1/Intermediate/chapter-6/img/slide7/injured.webp'),
        ],
        [
            'text'  => '<span class="text-red-500 font-black">Unconscious</span>',
            'emoji' => '',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-6/audios/slide7/unconscious.mp3'),
            'image' => materialAsset('slider/A1/Intermediate/chapter-6/img/slide7/unconscious.webp'),
        ],
        [
            'text'  => '<span class="text-red-500 font-black">Breathe</span>',
            'emoji' => '',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-6/audios/slide7/breathe.mp3'),
            'image' => materialAsset('slider/A1/Intermediate/chapter-6/img/slide7/breathe.webp'),
        ],
        [
            'text'  => '<span class="text-red-500 font-black">Paramedic</span>',
            'emoji' => '',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-6/audios/slide7/paramedic.mp3'),
            'image' => materialAsset('slider/A1/Intermediate/chapter-6/img/slide7/paramedic.webp'),
        ],
    ],
];
?>

@include('slider.vocab.vocabulary-grid', ['content' => $content])
