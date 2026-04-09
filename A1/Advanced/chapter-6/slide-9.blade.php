<?php
$content = [
    'page_title' => 'Asking for Information',
    'title'      => 'New Language',
    'subtitle'   => '2️⃣ Asking for Information',

    'image'      => materialAsset('slider/A1/Advanced/chapter-6/img/slide9.webp'),
    'image_alt'  => 'Asking for information at the railway station',

    'footer_text' => null,
    'play_label'  => 'Play sentence',

    'items'      => [
        [
            'emoji' => '🙋',
            'text'  => 'Excuse me.',
            'sound' => materialAsset('slider/A1/Advanced/chapter-6/audios/slide9/1.mp3'),
        ],
        [
            'emoji' => '🚉',
            'text'  => '<span class="text-red-500 font-black">Is</span> this the right platform?',
            'sound' => materialAsset('slider/A1/Advanced/chapter-6/audios/slide9/2.mp3'),
        ],
        [
            'emoji' => '✅',
            'text'  => 'Yes, <span class="text-emerald-500 font-black">it is</span>. / No, <span class="text-emerald-500 font-black">it isn’t</span>.',
            'sound' => materialAsset('slider/A1/Advanced/chapter-6/audios/slide9/3.mp3'),
        ],
        [
            'emoji' => '❓',
            'text'  => 'Which platform <span class="text-red-500 font-black">does</span> our train <span class="text-red-500 font-black">leave</span> from?',
            'sound' => materialAsset('slider/A1/Advanced/chapter-6/audios/slide9/4.mp3'),
        ],
        [
            'emoji' => '9️⃣',
            'text'  => 'Platform 9.',
            'sound' => materialAsset('slider/A1/Advanced/chapter-6/audios/slide9/5.mp3'),
        ],
    ],
];
?>
@include('slider.other.new-language-emoji', ['content' => $content])