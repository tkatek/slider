<?php
$content = [
    'page_title' => 'New Vocabulary',
    'title'      => 'New Vocabulary',
    'subtitle'   => '',

    'grid_class' => 'grid-cols-2 sm:grid-cols-4 lg:grid-cols-5',

    'items'      => [

        ['text' => 'Salesperson', 'emoji' => '🧑‍💼', 'sound' => materialAsset("slider/A1/Beginner/chapter-10/audios/slide5/Salesperson.mp3"), 'image' => materialAsset("slider/A1/Beginner/chapter-10/img/slide5/Salesperson.webp")],
        ['text' => 'Customer',    'emoji' => '🧑‍🛍️', 'sound' => materialAsset("slider/A1/Beginner/chapter-10/audios/slide5/Customer.mp3"),    'image' => materialAsset("slider/A1/Beginner/chapter-10/img/slide5/Customer.webp")],
        ['text' => 'Look for',    'emoji' => '🔍', 'sound' => materialAsset("slider/A1/Beginner/chapter-10/audios/slide5/Look-for.mp3"),      'image' => materialAsset("slider/A1/Beginner/chapter-10/img/slide5/Look-for.webp")],
        ['text' => 'Small/Medium/Large', 'emoji' => '', 'sound' => materialAsset("slider/A1/Beginner/chapter-10/audios/slide5/small.mpeg"), 'image' => materialAsset("slider/A1/Beginner/chapter-10/img/slide5/Small.webp")],
        ['text' => 'Bargain',     'emoji' => '💰', 'sound' => materialAsset("slider/A1/Beginner/chapter-10/audios/slide5/Bargain.mp3"),     'image' => materialAsset("slider/A1/Beginner/chapter-10/img/slide5/Bargain.webp")],
        ['text' => 'Price tag',   'emoji' => '🏷️', 'sound' => materialAsset("slider/A1/Beginner/chapter-10/audios/slide5/Price-tag.mp3"),  'image' => materialAsset("slider/A1/Beginner/chapter-10/img/slide5/Price-tag.webp")],
        ['text' => 'Receipt',     'emoji' => '🧾', 'sound' => materialAsset("slider/A1/Beginner/chapter-10/audios/slide5/Receipt.mp3"),    'image' => materialAsset("slider/A1/Beginner/chapter-10/img/slide5/Receipt.webp")],
        ['text' => 'Change',      'emoji' => '💵', 'sound' => materialAsset("slider/A1/Beginner/chapter-10/audios/slide5/Change.mp3"),     'image' => materialAsset("slider/A1/Beginner/chapter-10/img/slide5/Change.webp")],

        // Clothing vocabulary
        ['text' => 'Blouse',     'emoji' => '👚', 'sound' => materialAsset("slider/A1/Beginner/chapter-10/audios/slide5/Blouse.mp3"),    'image' => materialAsset("slider/A1/Beginner/chapter-10/img/slide5/Blouse.webp")],
        ['text' => 'Dress',      'emoji' => '👗', 'sound' => materialAsset("slider/A1/Beginner/chapter-10/audios/slide5/Dress.mp3"),     'image' => materialAsset("slider/A1/Beginner/chapter-10/img/slide5/Dress.webp")],
        ['text' => 'Tracksuit',  'emoji' => '🏃', 'sound' => materialAsset("slider/A1/Beginner/chapter-10/audios/slide5/Tracksuit.mp3"), 'image' => materialAsset("slider/A1/Beginner/chapter-10/img/slide5/Tracksuit.webp")],
        ['text' => 'Skirt',      'emoji' => '👖', 'sound' => materialAsset("slider/A1/Beginner/chapter-10/audios/slide5/Skirt.mp3"),     'image' => materialAsset("slider/A1/Beginner/chapter-10/img/slide5/Skirt.webp")],
        ['text' => 'Pyjamas',    'emoji' => '🛌', 'sound' => materialAsset("slider/A1/Beginner/chapter-10/audios/slide5/Pyjamas.mp3"),   'image' => materialAsset("slider/A1/Beginner/chapter-10/img/slide5/Pyjamas.webp")],
        ['text' => 'T-shirt',    'emoji' => '👕', 'sound' => materialAsset("slider/A1/Beginner/chapter-10/audios/slide5/T-shirt.mp3"),    'image' => materialAsset("slider/A1/Beginner/chapter-10/img/slide5/T-shirt.webp")],
        ['text' => 'Scarf',      'emoji' => '🧣', 'sound' => materialAsset("slider/A1/Beginner/chapter-10/audios/slide5/Scarf.mp3"),     'image' => materialAsset("slider/A1/Beginner/chapter-10/img/slide5/Scarf.webp")],
        ['text' => 'Socks',      'emoji' => '🧦', 'sound' => materialAsset("slider/A1/Beginner/chapter-10/audios/slide5/Socks.mp3"),     'image' => materialAsset("slider/A1/Beginner/chapter-10/img/slide5/Socks.webp")],
        ['text' => 'Jumper',     'emoji' => '🧥', 'sound' => materialAsset("slider/A1/Beginner/chapter-10/audios/slide5/Jumper.mp3"),    'image' => materialAsset("slider/A1/Beginner/chapter-10/img/slide5/Jumper.webp")],
        ['text' => 'Vest',       'emoji' => '👚', 'sound' => materialAsset("slider/A1/Beginner/chapter-10/audios/slide5/Vest.mp3"),      'image' => materialAsset("slider/A1/Beginner/chapter-10/img/slide5/Vest.webp")],
        ['text' => 'Suit',       'emoji' => '🤵', 'sound' => materialAsset("slider/A1/Beginner/chapter-10/audios/slide5/Suit.mp3"),      'image' => materialAsset("slider/A1/Beginner/chapter-10/img/slide5/Suit.webp")],
        ['text' => 'Pants',      'emoji' => '👖', 'sound' => materialAsset("slider/A1/Beginner/chapter-10/audios/slide5/Pants.mp3"),     'image' => materialAsset("slider/A1/Beginner/chapter-10/img/slide5/Pants.webp")],
    ],
];
?>

@include("slider.vocab.image-emoji-audio", ['content' => $content])