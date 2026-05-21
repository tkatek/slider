<?php
$content = [

    'title'      => 'Travel Vocabulary',
    'subtitle'   => 'Airport Security',

    'grid_class' => 'grid-cols-2 sm:grid-cols-4',

    'items' => [

        ['text'=>'Boarding pass','subtitle'=>'The document or QR code you need to board','emoji'=>'🎫',
            'sound'=>materialAsset('slider/A1/Intermediate/chapter-11/audios/slide7/boarding-pass.mp3'),
            'image'=>materialAsset('slider/A1/Intermediate/chapter-11/img/slide7/boarding-pass.webp')],

        ['text'=>'Take off shoes','subtitle'=>'Remove your shoes from your feet','emoji'=>'👟',
            'sound'=>materialAsset('slider/A1/Intermediate/chapter-11/audios/slide7/take-off-shoes.mp3'),
            'image'=>materialAsset('slider/A1/Intermediate/chapter-11/img/slide7/take-off-shoes.webp')],

        ['text'=>'Liquids','subtitle'=>'Drinks, creams, gels, perfumes, toothpaste — anything that can pour or squeeze','emoji'=>'🧴',
            'sound'=>materialAsset('slider/A1/Intermediate/chapter-11/audios/slide7/liquids.mp3'),
            'image'=>materialAsset('slider/A1/Intermediate/chapter-11/img/slide7/liquids.webp')],

        ['text'=>'Belt','subtitle'=>'The leather or cloth strip you wear around your trousers to hold them up','emoji'=>'👖',
            'sound'=>materialAsset('slider/A1/Intermediate/chapter-11/audios/slide7/belt.mp3'),
            'image'=>materialAsset('slider/A1/Intermediate/chapter-11/img/slide7/belt.webp')],

        ['text'=>'Scanner','subtitle'=>'The big machine that checks your body for metal or dangerous things','emoji'=>'🚪',
            'sound'=>materialAsset('slider/A1/Intermediate/chapter-11/audios/slide7/scanner.mp3'),
            'image'=>materialAsset('slider/A1/Intermediate/chapter-11/img/slide7/scanner.webp')],

        ['text'=>'Take out','subtitle'=>'Remove something from inside your bag or pocket','emoji'=>'👜',
            'sound'=>materialAsset('slider/A1/Intermediate/chapter-11/audios/slide7/take-out.mp3'),
            'image'=>materialAsset('slider/A1/Intermediate/chapter-11/img/slide7/take-out.webp')],

        ['text'=>'Step forward','subtitle'=>'Walk one or two steps ahead into the machine or area','emoji'=>'🚶',
            'sound'=>materialAsset('slider/A1/Intermediate/chapter-11/audios/slide7/step-forward.mp3'),
            'image'=>materialAsset('slider/A1/Intermediate/chapter-11/img/slide7/step-forward.webp')],

        ['text'=>'The line','subtitle'=>'The queue of people waiting to do something','emoji'=>'👥',
            'sound'=>materialAsset('slider/A1/Intermediate/chapter-11/audios/slide7/the-line.mp3'),
            'image'=>materialAsset('slider/A1/Intermediate/chapter-11/img/slide7/the-line.webp')],
    ],
];
?>

@include("slider.vocab.image-card", ['content' => $content])