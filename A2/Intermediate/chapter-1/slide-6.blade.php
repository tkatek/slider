<?php
$content = [
    'page_title' => 'New Vocabulary',
    'title'      => 'New Vocabulary',
    'subtitle'   => '🤝 Greeting Actions (Verbs & Phrases)',

    'grid_class' => 'grid-cols-2 sm:grid-cols-4 xl:grid-cols-5',

    'items' => [

        [
            'text'     => 'Stick out (your tongue)',
            'subtitle' => 'Show your tongue',
            'emoji'    => '😛',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-1/audios/slide6/stick-out.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-1/img/slide6/stick-out-your-tongue.webp'),
        ],

        [
            'text'     => 'Bump (noses)',
            'subtitle' => 'Touch noses lightly',
            'emoji'    => '👃',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-1/audios/slide6/bump.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-1/img/slide6/bump-noses.webp'),
        ],

        [
            'text'     => 'Fist bump',
            'subtitle' => 'Greet by touching fists',
            'emoji'    => '👊',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-1/audios/slide6/fist-bump.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-1/img/slide6/fist-bump.webp'),
        ],

        [
            'text'     => 'Wave',
            'subtitle' => 'Move your hand to greet someone',
            'emoji'    => '👋',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-1/audios/slide6/wave.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-1/img/slide6/wave.webp'),
        ],

        [
            'text'     => 'Air kiss',
            'subtitle' => 'Pretend to kiss (no contact)',
            'emoji'    => '😘',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-1/audios/slide6/air-kiss.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-1/img/slide6/air-kiss.webp'),
        ],

        [
            'text'     => 'Rub (noses/foreheads)',
            'subtitle' => 'Move gently against',
            'emoji'    => '🤝',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-1/audios/slide6/rub.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-1/img/slide6/rub-noses.webp'),
        ],

        [
            'text'     => 'Clap (hands)',
            'subtitle' => 'Hit your hands together',
            'emoji'    => '👏',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-1/audios/slide6/clap.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-1/img/slide6/clap-hands.webp'),
        ],

        [
            'text'     => 'Bow',
            'subtitle' => 'Bend your body forward',
            'emoji'    => '🙇',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-1/audios/slide6/bow.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-1/img/slide6/bow.webp'),
        ],

        [
            'text'     => 'Press (palms together)',
            'subtitle' => 'Put hands together',
            'emoji'    => '🙏',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-1/audios/slide6/press-palms.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-1/img/slide6/press-palms-together.webp'),
        ],

        [
            'text'     => 'Nod',
            'subtitle' => 'Move your head up and down',
            'emoji'    => '🙂',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-1/audios/slide6/nod.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-1/img/slide6/nod.webp'),
        ],

        [
            'text'     => 'Sniff (someone’s face)',
            'subtitle' => 'Smell gently',
            'emoji'    => '👃',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-1/audios/slide6/sniff.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-1/img/slide6/sniff-someones-face.webp'),
        ],

        [
            'text'     => 'Snap (fingers)',
            'subtitle' => 'Make a clicking sound with fingers',
            'emoji'    => '🫰',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-1/audios/slide6/snap.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-1/img/slide6/snap-fingers.webp'),
        ],

        [
            'text'     => 'Shake hands / handshaking',
            'subtitle' => 'Greet by holding hands',
            'emoji'    => '🤝',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-1/audios/slide6/shake-hands.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-1/img/slide6/shake-hands.webp'),
        ],

        [
            'text'     => 'Press (knuckles to forehead)',
            'subtitle' => 'Touch your head with your hand',
            'emoji'    => '🫱',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-1/audios/slide6/press-knuckels.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-1/img/slide6/press-knuckles-to-forehead.webp'),
        ],

    ],
];
?>

@include("slider.vocab.image-card", ['content' => $content])