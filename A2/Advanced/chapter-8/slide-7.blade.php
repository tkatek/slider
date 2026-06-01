<?php
$content = [
    'title' => 'New Language',
    'subtitle' => '',
    'groups' => [
        [
            'key' => 'useful-never-give-up-expressions',
            'title' => '',
            'grid_class' => 'grid-cols-2 lg:grid-cols-4',
            'items' => [
                [
                    'text' => 'Take risks',
                    'emoji' => '⚠️',
                    'description' => 'Try something difficult or new',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-8/audios/slide7/take-risks.mp3'),
                ],
                [
                    'text' => 'Play small',
                    'emoji' => '📉',
                    'description' => 'Not try your best',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-8/audios/slide7/play-small.mp3'),
                ],
                [
                    'text' => 'I did not quit.',
                    'emoji' => '💪',
                    'description' => 'I continued trying',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-8/audios/slide7/i-did-not-quit.mp3'),
                ],
                [
                    'text' => 'Keep trying',
                    'emoji' => '🔁',
                    'description' => 'Continue making effort',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-8/audios/slide7/keep-trying.mp3'),
                ],
                [
                    'text' => 'Move closer to success',
                    'emoji' => '🏁',
                    'description' => 'Get nearer to achieving goals',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-8/audios/slide7/move-closer-to-success.mp3'),
                ],
                [
                    'text' => 'Learn from failure',
                    'emoji' => '📚',
                    'description' => 'Improve after mistakes',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-8/audios/slide7/learn-from-failure.mp3'),
                ],
                [
                    'text' => 'Believe in yourself',
                    'emoji' => '🌟',
                    'description' => 'Trust yourself',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-8/audios/slide7/believe-in-yourself.mp3'),
                ],
                [
                    'text' => "Don't be afraid to fail",
                    'emoji' => '🛡️',
                    'description' => 'Failure is okay',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-8/audios/slide7/dont-be-afraid-to-fail.mp3'),
                ],
                [
                    'text' => 'Fall forward',
                    'emoji' => '➡️',
                    'description' => 'Learn and continue after failure',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-8/audios/slide7/fall-forward.mp3'),
                ],
                [
                    'text' => 'Never give up',
                    'emoji' => '🔥',
                    'description' => 'Continue trying',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-8/audios/slide7/never-give-up.mp3'),
                ],
            ],
        ],
    ],
];
?>

@include('slider.vocab.image-card', ['content' => $content])