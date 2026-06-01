<?php
$content = [
    'title' => 'Useful Language / Expressions',
    'subtitle' => '',

    'groups' => [
        [
            'key' => 'daily-english-habits-expressions',
            'title' => '',
            'grid_class' => 'grid-cols-2 lg:grid-cols-4',
            'items' => [
                [
                    'text' => 'Speak English every day.',
                    'emoji' => '🗣️',
                    'description' => 'Practise regularly',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-9/audios/slide7/speak-english-every-day.mp3'),
                ],
                [
                    'text' => 'Read aloud.',
                    'emoji' => '📖',
                    'description' => 'Read using your voice',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-9/audios/slide7/read-aloud.mp3'),
                ],
                [
                    'text' => 'Build your confidence.',
                    'emoji' => '💪',
                    'description' => 'Become more confident',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-9/audios/slide7/build-your-confidence.mp3'),
                ],
                [
                    'text' => 'Listen regularly.',
                    'emoji' => '🎧',
                    'description' => 'Listen often',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-9/audios/slide7/listen-regularly.mp3'),
                ],
                [
                    'text' => 'Repeat after native speakers.',
                    'emoji' => '🔁',
                    'description' => 'Copy pronunciation',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-9/audios/slide7/repeat-after-native-speakers.mp3'),
                ],
                [
                    'text' => 'Keep a journal.',
                    'emoji' => '📓',
                    'description' => 'Write regularly',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-9/audios/slide7/keep-a-journal.mp3'),
                ],
                [
                    'text' => 'Don’t be afraid of mistakes.',
                    'emoji' => '✅',
                    'description' => 'Mistakes are normal',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-9/audios/slide7/dont-be-afraid-of-mistakes.mp3'),
                ],
                [
                    'text' => 'Stay consistent.',
                    'emoji' => '📅',
                    'description' => 'Continue regularly',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-9/audios/slide7/stay-consistent.mp3'),
                ],
                [
                    'text' => 'Little by little...',
                    'emoji' => '🌱',
                    'description' => 'Gradually',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-9/audios/slide7/little-by-little.mp3'),
                ],
                [
                    'text' => 'You will see real progress.',
                    'emoji' => '📈',
                    'description' => 'You will improve',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-9/audios/slide7/you-will-see-real-progress.mp3'),
                ],
            ],
        ],
    ],
];
?>

@include('slider.vocab.image-card', ['content' => $content])