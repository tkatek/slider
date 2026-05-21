<?php
$content = [

    'title'      => 'Airport Locations',
    'subtitle'   => 'New Vocabulary',
    'image_text_style' => 'overlay',
    'grid_class' => 'grid-cols-2 sm:grid-cols-4',

    'items' => [

        ['text'=>'The restroom','emoji'=>'🚻',
            'sound'=>materialAsset('slider/A1/Intermediate/chapter-11/audios/slide13/restroom.mp3'),
            'image'=>materialAsset('slider/A1/Intermediate/chapter-11/img/slide13/restroom.webp')],

        ['text'=>'The bookstore','emoji'=>'📚',
            'sound'=>materialAsset('slider/A1/Intermediate/chapter-11/audios/slide13/bookstore.mp3'),
            'image'=>materialAsset('slider/A1/Intermediate/chapter-11/img/slide13/bookstore.webp')],

        ['text'=>'The shuttle bus stop','emoji'=>'🚌',
            'sound'=>materialAsset('slider/A1/Intermediate/chapter-11/audios/slide13/shuttle-bus-stop.mp3'),
            'image'=>materialAsset('slider/A1/Intermediate/chapter-11/img/slide13/shuttle-bus-stop.webp')],

        ['text'=>'The departure gate','emoji'=>'🛫',
            'sound'=>materialAsset('slider/A1/Intermediate/chapter-11/audios/slide13/departure-gate.mp3'),
            'image'=>materialAsset('slider/A1/Intermediate/chapter-11/img/slide13/departure-gate.webp')],

        ['text'=>'The arrivals area','emoji'=>'🛬',
            'sound'=>materialAsset('slider/A1/Intermediate/chapter-11/audios/slide13/arrivals-area.mp3'),
            'image'=>materialAsset('slider/A1/Intermediate/chapter-11/img/slide13/arrivals-area.webp')],

        ['text'=>'The souvenir shop','emoji'=>'🎁',
            'sound'=>materialAsset('slider/A1/Intermediate/chapter-11/audios/slide13/souvenir-shop.mp3'),
            'image'=>materialAsset('slider/A1/Intermediate/chapter-11/img/slide13/souvenir-shop.webp')],

        ['text'=>'The newsstand','emoji'=>'📰',
            'sound'=>materialAsset('slider/A1/Intermediate/chapter-11/audios/slide13/the-newsstand.mp3'),
            'image'=>materialAsset('slider/A1/Intermediate/chapter-11/img/slide13/newsstand.webp')],

        ['text'=>'The baggage-claim area','emoji'=>'🧳',
            'sound'=>materialAsset('slider/A1/Intermediate/chapter-11/audios/slide13/baggage-claim-area.mp3'),
            'image'=>materialAsset('slider/A1/Intermediate/chapter-11/img/slide13/baggage-claim-area.webp')],
    ],
];
?>

@include("slider.vocab.image-card", ['content' => $content])