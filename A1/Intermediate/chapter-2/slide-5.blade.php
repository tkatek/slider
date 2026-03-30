<?php
$content = [
    'page_title' => 'Six Festival Words',
    'title'      => 'Six Festival Words',
    'subtitle'   => '',

    'image'       => materialAsset('slider/A1/Intermediate/chapter-2/img/slide5.webp'),
    'image_alt'   => 'festival vocabulary image',
    'image_fit'   => 'contain',
    'footer_text' => '',

    'items' => [
        [
            'emoji' => '🎉',
            'text'  => '<span class="text-indigo-600 dark:text-indigo-300 font-black">Party:</span> A friendly get-together.',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-2/audios/slide5/party.mp3'),
        ],
        [
            'emoji' => '🥳',
            'text'  => '<span class="text-violet-600 dark:text-violet-300 font-black">Celebration:</span> A day to enjoy something important.',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-2/audios/slide5/celebration.mp3'),
        ],
        [
            'emoji' => '🎺',
            'text'  => '<span class="text-blue-600 dark:text-blue-300 font-black">Parade:</span> A fun walk with music and colors.',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-2/audios/slide5/parade.mp3'),
        ],
        [
            'emoji' => '🎆',
            'text'  => '<span class="text-fuchsia-600 dark:text-fuchsia-300 font-black">Fireworks:</span> Colorful lights that pop in the sky.',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-2/audios/slide5/fireworks.mp3'),
        ],
        [
            'emoji' => '🎁',
            'text'  => '<span class="text-pink-600 dark:text-pink-300 font-black">Gift:</span> Something you give to someone kindly.',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-2/audios/slide5/gift.mp3'),
        ],
        [
            'emoji' => '💌',
            'text'  => '<span class="text-cyan-600 dark:text-cyan-300 font-black">Invitation:</span> A message asking someone to join an event.',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-2/audios/slide5/invitation.mp3'),
        ],
    ],
];
?>
@include("slider.other.new-language-emoji", ['content' => $content])