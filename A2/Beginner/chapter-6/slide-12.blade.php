<?php
$content = [
    'page_title' => 'Grammar',
    'title'      => 'Grammar',
    'subtitle'   => 'Used to + base verb',

    'image'      => materialAsset('slider/A2/Beginner/chapter-6/img/slide12.webp'),



    'items'      => [
        [
            'emoji' => '✅',
            'text'  => '<span class="text-emerald-500 font-black">Positive:</span>
                        I used to play football.',
            'sound' => materialAsset('slider/A2/Beginner/chapter-6/audios/slide12/positive.mp3'),
        ],
        [
            'emoji' => '❌',
            'text'  => '<span class="text-rose-500 font-black">Negative:</span>
                        I didn’t use to play football.',
            'sound' => materialAsset('slider/A2/Beginner/chapter-6/audios/slide12/negative.mp3'),
        ],
        [
            'emoji' => '❓',
            'text'  => '<span class="text-blue-500 font-black">Question:</span>
                        Did you use to play football?',
            'sound' => materialAsset('slider/A2/Beginner/chapter-6/audios/slide12/question.mp3'),
        ],
    ],
];
?>
@include('slider.other.new-language-emoji', ['content' => $content])
