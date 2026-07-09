<?php

$content = [
    'page_title' => 'Listening',
    'title'      => 'Listening',
    'subtitle'   => 'Listen & practise',

    'people' => [
        'left'  => [
            'name'  => 'Chris',
            'image' => materialAsset('slider/B1/Advanced/chapter-1/img/chris.webp'),
        ],
        'right' => [
            'name'  => 'Ava',
            'image' => materialAsset('slider/B1/Advanced/chapter-1/img/ava.webp'),
        ],
    ],

    'dialogues' => [
        [
            'text'   => "Didn’t Tyler ask us to come at 7:30?",
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Advanced/chapter-1/audios/slide16/1.mp3'),
        ],
        [
            'text'   => "Yes, and it’s almost 8:00 now. Why don’t we ring the bell again? He must not have heard it.",
            'side'   => 'right',
            'gender' => 'female',
            'sound'  => materialAsset('slider/B1/Advanced/chapter-1/audios/slide16/2.mp3'),
        ],
        [
            'text'   => "That’s impossible. We’ve been ringing the bell for more than 10 minutes.",
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Advanced/chapter-1/audios/slide16/3.mp3'),
        ],
        [
            'text'   => "He must have fallen asleep. You know Tyler has been working so hard on his new project.",
            'side'   => 'right',
            'gender' => 'female',
            'sound'  => materialAsset('slider/B1/Advanced/chapter-1/audios/slide16/4.mp3'),
        ],
        [
            'text'   => "Or he might have forgotten about our dinner and just gone out.",
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Advanced/chapter-1/audios/slide16/5.mp3'),
        ],
        [
            'text'   => "No, he couldn’t have forgotten. I just talked to him about it this morning. Besides, the lights are on. He could have had an emergency. He might not have had time to call us.",
            'side'   => 'right',
            'gender' => 'female',
            'sound'  => materialAsset('slider/B1/Advanced/chapter-1/audios/slide16/6.mp3'),
        ],
        [
            'text'   => "Yeah, maybe. I’ll call him and find out.",
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Advanced/chapter-1/audios/slide16/7.mp3'),
        ],
        [
            'text'   => "And?",
            'side'   => 'right',
            'gender' => 'female',
            'sound'  => materialAsset('slider/B1/Advanced/chapter-1/audios/slide16/8.mp3'),
        ],
        [
            'text'   => "He’s not answering... Now I’m getting worried.",
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Advanced/chapter-1/audios/slide16/9.mp3'),
        ],
    ],
];

?>

@include("slider.vocab.image-conversation", ['content' => $content])