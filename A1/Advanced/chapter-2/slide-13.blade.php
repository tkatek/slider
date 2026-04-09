<?php
$content = [
    'title' => '',
    'subtitle' => 'New Vocabulary',
    'mobile_two_cols' => true,
    'compact_mobile' => true,
    'title_class' => 'text-3xl md:text-4xl lg:text-5xl xl:text-6xl',

    'card1Title' => 'English Phrase',
    'card2Title' => 'When to use',

    'card1' => [
        [
            'label' => 'I have a problem in my room.',
            'sound' => materialAsset('slider/A1/Advanced/chapter-2/audios/slide13/1.mp3'),
        ],
        [
            'label' => 'What seems to be the issue?',
            'sound' => materialAsset('slider/A1/Advanced/chapter-2/audios/slide13/2.mp3'),
        ],
        [
            'label' => "The air conditioner isn't working properly.",
            'sound' => materialAsset('slider/A1/Advanced/chapter-2/audios/slide13/3.mp3'),
        ],
        [
            'label' => 'The TV has no signal.',
            'sound' => materialAsset('slider/A1/Advanced/chapter-2/audios/slide13/4.mp3'),
        ],
        [
            'label' => "There's no Wi-Fi in the room.",
            'sound' => materialAsset('slider/A1/Advanced/chapter-2/audios/slide13/5.mp3'),
        ],
        [
            'label' => "The hot water in the shower isn't working either.",
            'sound' => materialAsset('slider/A1/Advanced/chapter-2/audios/slide13/6.mp3'),
        ],
        [
            'label' => "It's been a bit noisy next door.",
            'sound' => materialAsset('slider/A1/Advanced/chapter-2/audios/slide13/7.mp3'),
        ],
        [
            'label' => 'Would you like a temporary room…?',
            'sound' => materialAsset('slider/A1/Advanced/chapter-2/audios/slide13/8.mp3'),
        ],
        [
            'label' => 'Shall I prepare it for you?',
            'sound' => materialAsset('slider/A1/Advanced/chapter-2/audios/slide13/9.mp3'),
        ],
    ],

    'card2' => [
        [
            'label' => 'Start the complaint',
            'sound' => materialAsset('slider/A1/Advanced/chapter-2/audios/slide13/10.mp3'),
        ],
        [
            'label' => 'Staff asking',
            'sound' => materialAsset('slider/A1/Advanced/chapter-2/audios/slide13/11.mp3'),
        ],
        [
            'label' => 'Report AC problem',
            'sound' => materialAsset('slider/A1/Advanced/chapter-2/audios/slide13/12.mp3'),
        ],
        [
            'label' => 'Report TV problem',
            'sound' => materialAsset('slider/A1/Advanced/chapter-2/audios/slide13/13.mp3'),
        ],
        [
            'label' => 'Report internet problem',
            'sound' => materialAsset('slider/A1/Advanced/chapter-2/audios/slide13/14.mp3'),
        ],
        [
            'label' => 'Report shower problem',
            'sound' => materialAsset('slider/A1/Advanced/chapter-2/audios/slide13/15.mp3'),
        ],
        [
            'label' => 'Report noise complaint',
            'sound' => materialAsset('slider/A1/Advanced/chapter-2/audios/slide13/16.mp3'),
        ],
        [
            'label' => 'Staff offering solution',
            'sound' => materialAsset('slider/A1/Advanced/chapter-2/audios/slide13/17.mp3'),
        ],
        [
            'label' => 'Polite offer',
            'sound' => materialAsset('slider/A1/Advanced/chapter-2/audios/slide13/18.mp3'),
        ],
    ],
];
?>

@include('slider.cards.two-cards-with-audio', ['content' => $content])