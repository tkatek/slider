<?php

$content = [
    'page_title' => 'Listening',
    'title'      => 'Listening',
    'subtitle'   => 'Steps to Becoming a Successful Influencer<br>Listen to Maya talking about how to become a successful influencer:',

    'people' => [
        'left'  => [
            'name'  => 'Interviewer',
            'image' => materialAsset('slider/B1/Intermediate/chapter-5/img/interviewer.webp'),
        ],
        'right' => [
            'name'  => 'Maya',
            'image' => materialAsset('slider/B1/Intermediate/chapter-5/img/influencer.webp'),
        ],
    ],

    'dialogues' => [
        [
            'text'   => 'What is an influencer?',
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Intermediate/chapter-5/audios/slide17/1.mp3'),
        ],
        [
            'text'   => 'An influencer is a person who can affect the decisions of their followers because people trust their knowledge and opinions.',
            'side'   => 'right',
            'gender' => 'female',
            'sound'  => materialAsset('slider/B1/Intermediate/chapter-5/audios/slide17/2.mp3'),
        ],
        [
            'text'   => 'Why do companies work with influencers?',
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Intermediate/chapter-5/audios/slide17/3.mp3'),
        ],
        [
            'text'   => 'Many companies work with influencers to promote their products and reach more customers.',
            'side'   => 'right',
            'gender' => 'female',
            'sound'  => materialAsset('slider/B1/Intermediate/chapter-5/audios/slide17/4.mp3'),
        ],
        [
            'text'   => 'What should someone do if they want to become an influencer?',
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Intermediate/chapter-5/audios/slide17/5.mp3'),
        ],
        [
            'text'   => 'First, they should choose a niche that interests them, such as fashion, travel, or technology.',
            'side'   => 'right',
            'gender' => 'female',
            'sound'  => materialAsset('slider/B1/Intermediate/chapter-5/audios/slide17/6.mp3'),
        ],
        [
            'text'   => 'What should they do next?',
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Intermediate/chapter-5/audios/slide17/7.mp3'),
        ],
        [
            'text'   => 'They should choose a social media platform and write an interesting bio that tells people about them.',
            'side'   => 'right',
            'gender' => 'female',
            'sound'  => materialAsset('slider/B1/Intermediate/chapter-5/audios/slide17/8.mp3'),
        ],
        [
            'text'   => 'How can influencers attract more followers?',
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Intermediate/chapter-5/audios/slide17/9.mp3'),
        ],
        [
            'text'   => 'Successful influencers post regularly and create interesting content. They also use hashtags and catchy titles so more people can find their posts.',
            'side'   => 'right',
            'gender' => 'female',
            'sound'  => materialAsset('slider/B1/Intermediate/chapter-5/audios/slide17/10.mp3'),
        ],
        [
            'text'   => 'Is it easy to become an influencer?',
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Intermediate/chapter-5/audios/slide17/11.mp3'),
        ],
        [
            'text'   => "Not always. It takes time and patience, but with consistent effort, an influencer's audience can grow.",
            'side'   => 'right',
            'gender' => 'female',
            'sound'  => materialAsset('slider/B1/Intermediate/chapter-5/audios/slide17/12.mp3'),
        ],
    ],
];

?>

@include("slider.vocab.image-conversation", ['content' => $content])