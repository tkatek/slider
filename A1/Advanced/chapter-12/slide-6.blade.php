<?php
$content = [
    'page_title' => 'New Vocabulary',
    'title'      => 'Key Vocabulary',
    'subtitle'   => 'Buying a Cell Phone',

    'grid_class' => 'grid-cols-2 sm:grid-cols-4 lg:grid-cols-5',

    'items' => [

        [
            'text'     => 'stopped working',
            'subtitle' => 'it does not function anymore',
            'emoji'    => '📵',
            'sound'    => materialAsset('slider/A1/Advanced/chapter-12/audios/slide7/stopped-working.mp3'),
            'image'    => materialAsset('slider/A1/Advanced/chapter-12/img/slide7/stopped-working.webp'),
        ],

        [
            'text'     => 'turn on/off',
            'subtitle' => 'switch it to start or stop',
            'emoji'    => '⏻',
            'sound'    => materialAsset('slider/A1/Advanced/chapter-12/audios/slide7/turn-on-off.mp3'),
            'image'    => materialAsset('slider/A1/Advanced/chapter-12/img/slide7/turn-on.webp'),
        ],

        [
            'text'     => 'The battery dies',
            'subtitle' => 'it loses all power',
            'emoji'    => '🪫',
            'sound'    => materialAsset('slider/A1/Advanced/chapter-12/audios/slide7/The-battery-dies.mp3'),
            'image'    => materialAsset('slider/A1/Advanced/chapter-12/img/slide7/The-battery-dies.webp'),
        ],

        [
            'text'     => 'retire',
            'subtitle' => 'put it away and stop using it',
            'emoji'    => '📦',
            'sound'    => materialAsset('slider/A1/Advanced/chapter-12/audios/slide7/retire.mp3'),
            'image'    => materialAsset('slider/A1/Advanced/chapter-12/img/slide7/retire.webp'),
        ],

        [
            'text'     => 'Brand',
            'subtitle' => 'the name of the company',
            'emoji'    => '🏷️',
            'sound'    => materialAsset('slider/A1/Advanced/chapter-12/audios/slide7/Brand.mp3'),
            'image'    => materialAsset('slider/A1/Advanced/chapter-12/img/slide7/Brand.webp'),
        ],

        [
            'text'     => 'Battery life',
            'subtitle' => 'how long you can use it before charging',
            'emoji'    => '🔋',
            'sound'    => materialAsset('slider/A1/Advanced/chapter-12/audios/slide7/Battery-life.mp3'),
            'image'    => materialAsset('slider/A1/Advanced/chapter-12/img/slide7/Battery-life.webp'),
        ],

        [
            'text'     => 'Version',
            'subtitle' => 'the type or model',
            'emoji'    => '📱',
            'sound'    => materialAsset('slider/A1/Advanced/chapter-12/audios/slide7/Version.mp3'),
            'image'    => materialAsset('slider/A1/Advanced/chapter-12/img/slide7/version.webp'),
        ],

        [
            'text'     => 'Storage',
            'subtitle' => 'place where information is kept',
            'emoji'    => '💾',
            'sound'    => materialAsset('slider/A1/Advanced/chapter-12/audios/slide7/Storage.mp3'),
            'image'    => materialAsset('slider/A1/Advanced/chapter-12/img/slide7/storage.webp'),
        ],

        [
            'text'     => 'Warranty',
            'subtitle' => 'covers repairs for a set time',
            'emoji'    => '🛡️',
            'sound'    => materialAsset('slider/A1/Advanced/chapter-12/audios/slide7/Warranty.mp3'),
            'image'    => materialAsset('slider/A1/Advanced/chapter-12/img/slide7/Warranty.webp'),
        ],

        [
            'text'     => 'Phone Case',
            'subtitle' => 'protects the outside of the phone',
            'emoji'    => '📲',
            'sound'    => materialAsset('slider/A1/Advanced/chapter-12/audios/slide7/Phone-Case.mp3'),
            'image'    => materialAsset('slider/A1/Advanced/chapter-12/img/slide7/Phone-Case.webp'),
        ],

        [
            'text'     => 'Screen protector',
            'subtitle' => 'guards the phone screen',
            'emoji'    => '🛡️',
            'sound'    => materialAsset('slider/A1/Advanced/chapter-12/audios/slide7/Screen-protector.mp3'),
            'image'    => materialAsset('slider/A1/Advanced/chapter-12/img/slide7/Screen-protector.webp'),
        ],

        [
            'text'     => 'Bestselling',
            'subtitle' => 'bought more than others',
            'emoji'    => '🔥',
            'sound'    => materialAsset('slider/A1/Advanced/chapter-12/audios/slide7/Bestselling.mp3'),
            'image'    => materialAsset('slider/A1/Advanced/chapter-12/img/slide7/Bestselling.webp'),
        ],

        [
            'text'     => 'Ring it up',
            'subtitle' => 'complete the purchase',
            'emoji'    => '🧾',
            'sound'    => materialAsset('slider/A1/Advanced/chapter-12/audios/slide7/Ring-it-up.mp3'),
            'image'    => materialAsset('slider/A1/Advanced/chapter-12/img/slide7/Ring-it-up.webp'),
        ],

        [
            'text'     => 'Transfer Data',
            'subtitle' => 'send files to another device',
            'emoji'    => '🔄',
            'sound'    => materialAsset('slider/A1/Advanced/chapter-12/audios/slide7/Transfer-Data.mp3'),
            'image'    => materialAsset('slider/A1/Advanced/chapter-12/img/slide7/Transfert-data.webp'),
        ],

        [
            'text'     => 'Good choice',
            'subtitle' => 'a positive selection',
            'emoji'    => '👍',
            'sound'    => materialAsset('slider/A1/Advanced/chapter-12/audios/slide7/Good-choice.mp3'),
            'image'    => materialAsset('slider/A1/Advanced/chapter-12/img/slide7/Good-choice.webp'),
        ],
    ],
];
?>

@include("slider.vocab.image-card", ['content' => $content])