<?php
$content = [
    'page_title' => 'New vocabulary',
    'title'      => 'New vocabulary',
    'subtitle'   => '',

    'grid_class' => 'grid-cols-2 sm:grid-cols-3 lg:grid-cols-3',

    'items' => [
        [
            'text'     => 'Point at someone or something',
            'subtitle' => 'To show where something or someone is with your finger.',
            'emoji'    => '👉',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-12/audios/slide6/point-at-someone.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-12/img/slide6/point-at.webp'),
        ],
        [
            'text'     => 'Nod your head',
            'subtitle' => 'To move your head up and down to say yes or agree.',
            'emoji'    => '🙂',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-12/audios/slide6/nod-your-head.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-12/img/slide6/nod-your-head.webp'),
        ],
        [
            'text'     => 'Shake your head',
            'subtitle' => 'To move your head side to side to say no or disagree.',
            'emoji'    => '🙅',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-12/audios/slide6/shake-your-head.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-12/img/slide6/shake-your-head.webp'),
        ],
        [
            'text'     => 'Fold your arms',
            'subtitle' => 'To cross your arms over your chest.',
            'emoji'    => '🧍',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-12/audios/slide6/fold-your-arms.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-12/img/slide6/fold-your-arms.webp'),
        ],
        [
            'text'     => 'Wink at someone',
            'subtitle' => 'To quickly close and open one eye as a secret signal.',
            'emoji'    => '😉',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-12/audios/slide6/wink-at-someone.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-12/img/slide6/wink-at-someone.webp'),
        ],
        [
            'text'     => 'Shrug your shoulders',
            'subtitle' => 'To lift and drop your shoulders to show you don\'t know or don\'t care.',
            'emoji'    => '🤷',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-12/audios/slide6/shrug-your-shoulders.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-12/img/slide6/shrug-your-shoulders.webp'),
        ],
        [
            'text'     => 'Beckon to someone',
            'subtitle' => 'To make a hand signal for someone to come closer.',
            'emoji'    => '🫴',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-12/audios/slide6/beckon-to-someone.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-12/img/slide6/beckon-to-someone.webp'),
        ],
        [
            'text'     => 'Clench your fist',
            'subtitle' => 'To tightly close your hand into a ball.',
            'emoji'    => '✊',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-12/audios/slide6/clench-your-fist.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-12/img/slide6/clench-your-fist.webp'),
        ],
        [
            'text'     => 'Crack your knuckles',
            'subtitle' => 'To make a popping sound by bending your finger joints.',
            'emoji'    => '🤌',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-12/audios/slide6/crack-your-knuckles.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-12/img/slide6/crack-your-knuckles.webp'),
        ],
    ],
];
?>

@include("slider.vocab.image-card", ['content' => $content])