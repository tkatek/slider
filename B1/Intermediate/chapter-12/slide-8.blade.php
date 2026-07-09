<?php

$content = [
    'page_title' => 'Key Language & Expressions',
    'title'      => 'Key Language & Expressions',
    'subtitle'   => '',
    'grid_class' => 'grid-cols-2 lg:grid-cols-3',

    'items' => [
        [
            'emoji'    => '🌍',
            'text'     => 'Be open-minded.',
            'subtitle' => '',
            'sound'    => materialAsset('slider/B1/Intermediate/chapter-12/audios/slide8/open.mp3'),
        ],
        [
            'emoji'    => '🚫',
            'text'     => 'Be closed-minded.',
            'subtitle' => '',
            'sound'    => materialAsset('slider/B1/Intermediate/chapter-12/audios/slide8/closed.mp3'),
        ],
        [
            'emoji'    => '💡',
            'text'     => 'Consider new ideas.',
            'subtitle' => '',
            'sound'    => materialAsset('slider/B1/Intermediate/chapter-12/audios/slide8/ideas.mp3'),
        ],
        [
            'emoji'    => '👀',
            'text'     => 'See another perspective.',
            'subtitle' => '',
            'sound'    => materialAsset('slider/B1/Intermediate/chapter-12/audios/slide8/perspective.mp3'),
        ],
        [
            'emoji'    => '📚',
            'text'     => 'Learn from others.',
            'subtitle' => '',
            'sound'    => materialAsset('slider/B1/Intermediate/chapter-12/audios/slide8/learn.mp3'),
        ],
        [
            'emoji'    => '🤝',
            'text'     => 'Build stronger friendships.',
            'subtitle' => '',
            'sound'    => materialAsset('slider/B1/Intermediate/chapter-12/audios/slide8/friendships.mp3'),
        ],
        [
            'emoji'    => '🧩',
            'text'     => 'Solve problems together.',
            'subtitle' => '',
            'sound'    => materialAsset('slider/B1/Intermediate/chapter-12/audios/slide8/solve.mp3'),
        ],
        [
            'emoji'    => '❓',
            'text'     => 'Ask questions.',
            'subtitle' => '',
            'sound'    => materialAsset('slider/B1/Intermediate/chapter-12/audios/slide8/questions.mp3'),
        ],
        [
            'emoji'    => '👂',
            'text'     => 'Show interest in others.',
            'subtitle' => '',
            'sound'    => materialAsset('slider/B1/Intermediate/chapter-12/audios/slide8/interest.mp3'),
        ],
        [
            'emoji'    => '⚖️',
            'text'     => 'Avoid quick judgments.',
            'subtitle' => '',
            'sound'    => materialAsset('slider/B1/Intermediate/chapter-12/audios/slide8/judgments.mp3'),
        ],
        [
            'emoji'    => '🙏',
            'text'     => 'Appreciate differences.',
            'subtitle' => '',
            'sound'    => materialAsset('slider/B1/Intermediate/chapter-12/audios/slide8/differences.mp3'),
        ],
        [
            'emoji'    => '❤️',
            'text'     => "Think about another person’s feelings.",
            'subtitle' => '',
            'sound'    => materialAsset('slider/B1/Intermediate/chapter-12/audios/slide8/feelings.mp3'),
        ],
    ],
];

?>

@include('slider.vocab.image-card', ['content' => $content])