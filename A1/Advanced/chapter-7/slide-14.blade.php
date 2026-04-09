<?php
$content = [
    'page_title' => 'New Language',
    'title'      => 'New Language: Permissions, Obligation, & Prohibitions',
    'subtitle'   => 'What we can & what we can’t do',

    'show_footer_image' => 0,
    'footer_image'      => '',

    'people' => [
        'left'  => [
            'name'  => 'Ryan',
            'image' => materialAsset('slider/A1/Advanced/chapter-5/img/customer.webp'),
        ],
        'right' => [
            'name'  => 'Maya',
            'image' => materialAsset('slider/A1/Advanced/chapter-5/img/clerk.webp'),
        ],
    ],

    'dialogues' => [
        [
            'text'   => 'We <span class="text-red-500 dark:text-red-400 font-extrabold">can</span> park here, <span class="text-violet-600 dark:text-violet-400 font-extrabold">can\'t</span> we?',
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A1/Advanced/chapter-7/audios/slide14/1.mp3'),
        ],
        [
            'text'   => 'Yes, we <span class="text-red-500 dark:text-red-400 font-extrabold">can</span>. But we <span class="text-orange-500 dark:text-orange-400 font-extrabold">must</span> <span class="text-yellow-500 dark:text-yellow-300 font-extrabold">not</span> park in front of the fire station.',
            'side'   => 'right',
            'gender' => 'female',
            'sound'  => materialAsset('slider/A1/Advanced/chapter-7/audios/slide14/2.mp3'),
        ],
        [
            'text'   => 'Oh, right. We <span class="text-orange-500 dark:text-orange-400 font-extrabold">must</span> follow the rules, and we <span class="text-orange-500 dark:text-orange-400 font-extrabold">must</span> <span class="text-yellow-500 dark:text-yellow-300 font-extrabold">not</span> block any exits either.',
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A1/Advanced/chapter-7/audios/slide14/3.mp3'),
        ],
        [
            'text'   => 'Yeah, but we <span class="text-lime-600 dark:text-lime-400 font-extrabold">are allowed to</span> stop for a moment to drop someone off.',
            'side'   => 'right',
            'gender' => 'female',
            'sound'  => materialAsset('slider/A1/Advanced/chapter-7/audios/slide14/4.mp3'),
        ],
    ],
];
?>

@include("slider.vocab.image-conversation", ['content' => $content])