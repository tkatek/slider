<?php
$content = [
    'title' => '',
    'subtitle' => 'Subject pronouns / Possessive adjectives',
    'card1Title' => 'Subject pronouns',
    'card2Title' => 'Possessive adjectives',
    'card1' => [
        [
            'label' => 'I',
            'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/slide8/i.mp3'),
        ],
        [
            'label' => 'you',
            'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/slide8/you.mp3'),
        ],
        [
            'label' => 'he',
            'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/slide8/he.mp3'),
        ],
        [
            'label' => 'she',
            'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/slide8/she.mp3'),
        ],
        [
            'label' => 'it',
            'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/slide8/it.mp3'),
        ],
        [
            'label' => 'we',
            'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/slide8/we.mp3'),
        ],
        [
            'label' => 'they',
            'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/slide8/they.mp3'),
        ],
    ],
    'card2' => [
        [
            'label' => 'my',
            'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/slide8/my.mp3'),
        ],
        [
            'label' => 'your',
            'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/slide8/your.mp3'),
        ],
        [
            'label' => 'his',
            'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/slide8/his.mp3'),
        ],
        [
            'label' => 'her',
            'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/slide8/her.mp3'),
        ],
        [
            'label' => 'its',
            'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/slide8/its.mp3'),
        ],
        [
            'label' => 'our',
            'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/slide8/our.mp3'),
        ],
        [
            'label' => 'their',
            'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/slide8/their.mp3'),
        ],
    ],
];
?>

@include('slider.cards.two-cards-with-audio', ['content' => $content])
