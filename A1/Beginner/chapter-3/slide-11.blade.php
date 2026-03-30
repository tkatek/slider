<?php
$content = [
    'page_title' => 'Tips for Success',

    'title'      => 'Tips for Success',
    'subtitle'   => 'Simple advice for job interview beginners',
    'top_badge'  => '',

    'outcomes' => [
        [
            'number' => '01',
            'badge'  => 'from-blue-500 to-blue-600',
            'title'  => 'Speak Slowly',
            'description' => 'This helps others understand you better.',
            'sound' => materialAsset('slider/A1/Beginner/chapter-3/audio/slide11/speak-slowly.mp3'),
        ],
        [
            'number' => '02',
            'badge'  => 'from-violet-500 to-violet-600',
            'title'  => 'Smile Friendly',
            'description' => 'A smile makes you look welcoming and warm.',
            'sound' => materialAsset('slider/A1/Beginner/chapter-3/audio/slide11/smile-friendly.mp3'),
        ],
        [
            'number' => '03',
            'badge'  => 'from-emerald-500 to-teal-500',
            'title'  => 'Listen Carefully',
            'description' => 'Listening is important to answer questions correctly.',
            'sound' => materialAsset('slider/A1/Beginner/chapter-3/audio/slide11/listen-carefully.mp3'),
        ],
        [
            'number' => '04',
            'badge'  => 'from-amber-500 to-orange-500',
            'title'  => 'Practice Often',
            'description' => 'Regular practice builds confidence and reduces anxiety.',
            'sound' => materialAsset('slider/A1/Beginner/chapter-3/audio/slide11/practice-often.mp3'),
        ],
    ],
];
?>
@include("slider.other.tips",['content'=>$content])

