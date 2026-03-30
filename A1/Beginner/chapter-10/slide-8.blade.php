<?php
$content = [
    'page_title' => 'New Language',
    'title'      => 'New Language',
    'subtitle'   => 'Asking About the Price',

    'show_footer_image' => 0,
    'footer_image'      => '',

    'people' => [
        'left' => [
            'name'  => 'Customer',
            'image' => materialAsset('slider/A1/Beginner/chapter-10/img/customer.webp'),
        ],
        'right' => [
            'name'  => 'Salesperson',
            'image' => materialAsset('slider/A1/Beginner/chapter-10/img/salesperson.webp'),
        ],
    ],

    'dialogues' => [
        [
            'text'   => 'How much <span class="text-[#5a36ff] font-bold">is</span> this jacket?!',
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset("slider/A1/Beginner/chapter-10/audios/slide8/1.mp3"),
        ],
        [
            'text'   => '<span class="text-[#ff4444] font-bold">This</span> <span class="text-[#5a36ff] font-bold">is</span> 150$',
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset("slider/A1/Beginner/chapter-10/audios/slide8/2.mp3"),
        ],
        [
            'text'   => 'How much <span class="text-[#5a36ff] font-bold">is</span> that T-shirt?',
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset("slider/A1/Beginner/chapter-10/audios/slide8/3.mp3"),
        ],
        [
            'text'   => '<span class="text-[#ff4444] font-bold">That</span> <span class="text-[#5a36ff] font-bold">is</span> 50$',
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset("slider/A1/Beginner/chapter-10/audios/slide8/4.mp3"),
        ],
        [
            'text'   => 'How much <span class="text-[#4f7c82] font-bold">are</span> these shoes?',
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset("slider/A1/Beginner/chapter-10/audios/slide8/5.mp3"),
        ],
        [
            'text'   => '<span class="text-[#ff4444] font-bold">These</span> <span class="text-[#4f7c82] font-bold">are</span> 200$',
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset("slider/A1/Beginner/chapter-10/audios/slide8/6.mp3"),
        ],
        [
            'text'   => 'How much <span class="text-[#4f7c82] font-bold">are</span> those pants?',
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset("slider/A1/Beginner/chapter-10/audios/slide8/7.mp3"),
        ],
        [
            'text'   => '<span class="text-[#ff4444] font-bold">Those</span> <span class="text-[#4f7c82] font-bold">are</span> 230$',
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset("slider/A1/Beginner/chapter-10/audios/slide8/8.mp3"),
        ],
    ],
];
?>
@include("slider.vocab.image-conversation", ['content' => $content])