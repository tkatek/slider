<?php
$content = [
    'page_title' => 'New vocabulary',
    'title'      => 'New Vocabulary',
    'subtitle'   => '',

    'grid_class' => 'grid-cols-2 sm:grid-cols-4 lg:grid-cols-4',

    'items' => [
        [
            'text'     => 'Risk',
            'subtitle' => 'Doing something difficult or uncertain',
            'emoji'    => '⚠️',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-8/audios/slide6/risk.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-8/img/slide6/risk.webp'),
        ],
        [
            'text'     => 'Fail',
            'subtitle' => 'Not succeed',
            'emoji'    => '❌',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-8/audios/slide6/fail.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-8/img/slide6/fail.webp'),
        ],
        [
            'text'     => 'Failure',
            'subtitle' => 'Lack of success',
            'emoji'    => '📉',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-8/audios/slide6/failure.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-8/img/slide6/failure.webp'),
        ],
        [
            'text'     => 'Passion',
            'subtitle' => 'A very strong love or interest in something',
            'emoji'    => '🔥',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-8/audios/slide6/passion.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-8/img/slide6/passion.webp'),
        ],
        [
            'text'     => 'Audition',
            'subtitle' => 'Trying to get an acting or singing job',
            'emoji'    => '🎭',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-8/audios/slide6/audition.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-8/img/slide6/audition.webp'),
        ],
        [
            'text'     => 'Quit',
            'subtitle' => 'Stop doing something',
            'emoji'    => '🛑',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-8/audios/slide6/quit.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-8/img/slide6/quit.webp'),
        ],
        [
            'text'     => 'Prepare',
            'subtitle' => 'Get ready',
            'emoji'    => '📝',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-8/audios/slide6/prepare.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-8/img/slide6/prepare.webp'),
        ],
        [
            'text'     => 'Success',
            'subtitle' => 'Achieving something',
            'emoji'    => '🏆',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-8/audios/slide6/success.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-8/img/slide6/success.webp'),
        ],
        [
            'text'     => 'Experiment',
            'subtitle' => 'A test to discover something',
            'emoji'    => '🧪',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-8/audios/slide6/experiment.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-8/img/slide6/experiment.webp'),
        ],
        [
            'text'     => 'Invent',
            'subtitle' => 'Create something new',
            'emoji'    => '💡',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-8/audios/slide6/invent.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-8/img/slide6/invent.webp'),
        ],
        [
            'text'     => 'Continue',
            'subtitle' => 'Keep going',
            'emoji'    => '➡️',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-8/audios/slide6/continue.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-8/img/slide6/continue.webp'),
        ],
        [
            'text'     => 'Define',
            'subtitle' => 'Show who you are',
            'emoji'    => '🪞',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-8/audios/slide6/define.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-8/img/slide6/define.webp'),
        ],
    ],
];
?>

@include("slider.vocab.image-card", ['content' => $content])