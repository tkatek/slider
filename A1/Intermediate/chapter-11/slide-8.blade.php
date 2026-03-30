<?php
$content = [
    'page_title'  => 'New Language',
    'title'       => 'New Language',
    'subtitle'    => 'Giving Instructions:',

    'image'       => materialAsset('slider/A1/Intermediate/chapter-11/img/slide7/step-forward.webp'),
    'image_alt'   => 'airport security instructions',
    'image_fit'   => 'contain',
    'footer_below_image' => true,
    'footer_text' => '',
    'footer_items' => [
        '<span class="text-indigo-600 dark:text-indigo-300 font-black">Form focus:</span>',
        '- Please + base verb',
        '- Leave your bag in the tray',
        '<span class="text-indigo-600 dark:text-indigo-300 font-black">Negative form:</span>',
        '- Do not leave your bag
unattended',

    ],

    'items' => [
        [
            'emoji' => '🎫',
            'text'  => 'Please <span class="text-orange-500 dark:text-orange-300 font-black">keep</span> your boarding pass ready.',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-11/audios/slide8/1.mp3'),
        ],
        [
            'emoji' => '🧺',
            'text'  => 'Please <span class="text-orange-500 dark:text-orange-300 font-black">place</span> your bag in the tray.',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-11/audios/slide8/2.mp3'),
        ],
        [
            'emoji' => '🚦',
            'text'  => '<span class="text-orange-500 dark:text-orange-300 font-black">Step</span> forward when the light turns green.',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-11/audios/slide8/3.mp3'),
        ],
        [
            'emoji' => '🙌',
            'text'  => 'Please <span class="text-orange-500 dark:text-orange-300 font-black">raise</span> your arms.',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-11/audios/slide8/4.mp3'),
        ],
        [
            'emoji' => '✅',
            'text'  => 'You’re all set.',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-11/audios/slide8/5.mp3'),
        ],
        [
            'emoji' => '🧳',
            'text'  => 'You can collect your items.',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-11/audios/slide8/6.mp3'),
        ],
        [
            'emoji' => '✈️',
            'text'  => 'Have a good flight.',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-11/audios/slide8/7.mp3'),
        ],
    ],
];
?>

@include("slider.other.new-language-emoji", ['content' => $content])
