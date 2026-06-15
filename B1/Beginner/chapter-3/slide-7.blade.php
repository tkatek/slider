<?php
$content = [
    'title'      => 'New Language',
    'subtitle'   => '',

    'groups' => [
        [
            'key'        => 'apologizing-expressions',
            'title'      => 'Apologizing Expressions',
            'grid_class' => 'grid-cols-2 sm:grid-cols-4',
            'items'      => [
                [
                    'text'  => 'I apologize for...',
                    'emoji' => '🙏',
                    'sound' => materialAsset('slider/B1/Beginner/chapter-3/audios/slide7/i-apologize-for.mp3'),
                ],
                [
                    'text'  => 'I am sorry.',
                    'emoji' => '😔',
                    'sound' => materialAsset('slider/B1/Beginner/chapter-3/audios/slide7/i-am-sorry.mp3'),
                ],
                [
                    'text'  => 'It’s all my fault.',
                    'emoji' => '⚠️',
                    'sound' => materialAsset('slider/B1/Beginner/chapter-3/audios/slide7/its-all-my-fault.mp3'),
                ],
                [
                    'text'  => 'I’d like to apologize for...',
                    'emoji' => '🙇',
                    'sound' => materialAsset('slider/B1/Beginner/chapter-3/audios/slide7/id-like-to-apologize-for.mp3'),
                ],
                [
                    'text'  => 'I’m terribly sorry for...',
                    'emoji' => '😢',
                    'sound' => materialAsset('slider/B1/Beginner/chapter-3/audios/slide7/im-terribly-sorry-for.mp3'),
                ],
                [
                    'text'  => 'Please forgive me.',
                    'emoji' => '🤝',
                    'sound' => materialAsset('slider/B1/Beginner/chapter-3/audios/slide7/please-forgive-me.mp3'),
                ],
                [
                    'text'  => 'Pardon me for...',
                    'emoji' => '💬',
                    'sound' => materialAsset('slider/B1/Beginner/chapter-3/audios/slide7/pardon-me-for.mp3'),
                ],
                [
                    'text'  => 'I am truly sorry.',
                    'emoji' => '🕊️',
                    'sound' => materialAsset('slider/B1/Beginner/chapter-3/audios/slide7/i-am-truly-sorry.mp3'),
                ],
            ],
        ],
        [
            'key'        => 'accepting-apologies-expressions',
            'title'      => 'Accepting Apologies Expressions',
            'grid_class' => 'grid-cols-2 sm:grid-cols-4',
            'items'      => [
                [
                    'text'  => 'Don’t worry about it.',
                    'emoji' => '🙂',
                    'sound' => materialAsset('slider/B1/Beginner/chapter-3/audios/slide7/dont-worry-about-it.mp3'),
                ],
                [
                    'text'  => 'No worries.',
                    'emoji' => '👌',
                    'sound' => materialAsset('slider/B1/Beginner/chapter-3/audios/slide7/no-worries.mp3'),
                ],
                [
                    'text'  => 'It’s all right.',
                    'emoji' => '✅',
                    'sound' => materialAsset('slider/B1/Beginner/chapter-3/audios/slide7/its-all-right.mp3'),
                ],
                [
                    'text'  => 'It doesn’t matter.',
                    'emoji' => '👍',
                    'sound' => materialAsset('slider/B1/Beginner/chapter-3/audios/slide7/it-doesnt-matter.mp3'),
                ],
                [
                    'text'  => 'Forget about it.',
                    'emoji' => '💬',
                    'sound' => materialAsset('slider/B1/Beginner/chapter-3/audios/slide7/forget-about-it.mp3'),
                ],
                [
                    'text'  => 'No harm done.',
                    'emoji' => '🟢',
                    'sound' => materialAsset('slider/B1/Beginner/chapter-3/audios/slide7/no-harm-done.mp3'),
                ],
                [
                    'text'  => 'It’s fine now.',
                    'emoji' => '😊',
                    'sound' => materialAsset('slider/B1/Beginner/chapter-3/audios/slide7/its-fine-now.mp3'),
                ],
                [
                    'text'  => 'That’s OK.',
                    'emoji' => '✨',
                    'sound' => materialAsset('slider/B1/Beginner/chapter-3/audios/slide7/thats-ok.mp3'),
                ],
            ],
        ],
    ],
];
?>

@include('slider.vocab.image-card', ['content' => $content])