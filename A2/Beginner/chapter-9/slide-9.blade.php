<?php
$highlight = 'text-orange-500 font-black';

$content = [
    'page_title' => 'Grammar',
    'title'      => 'Grammar',
    'subtitle'   => '<span class="font-black text-slate-950 dark:text-white">has got / have got</span>',

    'image'       => materialAsset('slider/A2/Beginner/chapter-7/img/slide13/image.webp'),
    'image_alt'   => 'Appearances lesson', 


    'items'      => [
        [
            'emoji' => '👩',
            'text'  => 'She <span class="' . $highlight . '">has got</span> long hair',
            'sound' => materialAsset('slider/A2/Beginner/chapter-9/audios/slide9/She-has-got-long-hair.mpeg'),
        ],
        [
            'emoji' => '👨',
            'text'  => 'He <span class="' . $highlight . '">has got</span> blue eyes',
            'sound' => materialAsset('slider/A2/Beginner/chapter-9/audios/slide9/He-has-got-blue-eyes.mpeg'),
        ],
        [
            'emoji' => '👥',
            'text'  => 'They <span class="' . $highlight . '">have got</span> brown hair',
            'sound' => materialAsset('slider/A2/Beginner/chapter-9/audios/slide9/They-have-got.mpeg'),
        ],
        [
            'emoji' => '❓',
            'text'  => '<span class="' . $highlight . '">Has</span> she <span class="' . $highlight . '">got</span> long hair?',
            'sound' => materialAsset('slider/A2/Beginner/chapter-9/audios/slide9/Has-she-got-long-hair.mpeg'),
        ],
        [
            'emoji' => '✅',
            'text'  => 'Yes, she <span class="' . $highlight . '">has</span>. / No, she <span class="' . $highlight . '">hasn’t</span>.',
            'sound' => materialAsset('slider/A2/Beginner/chapter-9/audios/slide9/Yes-she-has.mpeg'),
        ],
    ],
];
?>

@include('slider.other.new-language-emoji', ['content' => $content])
