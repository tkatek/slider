<?php

$content = [
    'page_title' => 'Language Patterns & Phrases',
    'title'      => 'Language Patterns & Phrases',
    'subtitle'   => '',
    'grid_class' => 'grid-cols-2 md:grid-cols-4',

    'items' => [
        [
            'text'             => 'Maybe you felt...',
            'subtitle'         => 'Used to suggest or empathize with possible emotions.',
            'example_subtitle' => 'Maybe you felt excited. Maybe you felt nervous.',
            'sound'            => materialAsset('slider/A2/Advanced/chapter-6/audios/slide7/maybe-you-felt.mp3'),
            'image'            => materialAsset('slider/A2/Advanced/chapter-6/img/slide7/maybe-you-felt.webp'),
        ],
        [
            'text'             => 'Mix of feelings',
            'subtitle'         => 'Describes experiencing several different emotions at once.',
            'example_subtitle' => 'That mix of feelings is pretty common...',
            'sound'            => materialAsset('slider/A2/Advanced/chapter-6/audios/slide7/mix-of-feelings.mp3'),
            'image'            => materialAsset('slider/A2/Advanced/chapter-6/img/slide7/mix-of-feelings.webp'),
        ],
        [
            'text'             => 'Use your noggin',
            'subtitle'         => 'An informal idiom meaning "use your brain" or "think."',
            'example_subtitle' => 'Use your noggin to think about these two questions...',
            'sound'            => materialAsset('slider/A2/Advanced/chapter-6/audios/slide7/use-your-noggin.mp3'),
            'image'            => materialAsset('slider/A2/Advanced/chapter-6/img/slide7/use-your-noggin.webp'),
        ],
        [
            'text'             => 'Loved ones',
            'subtitle'         => 'Refers to family and close friends you care about.',
            'example_subtitle' => '...to join loved ones, find new opportunities...',
            'sound'            => materialAsset('slider/A2/Advanced/chapter-6/audios/slide7/loved-ones.mp3'),
            'image'            => materialAsset('slider/A2/Advanced/chapter-6/img/slide7/loved-ones.webp'),
        ],
        [
            'text'             => 'No matter where...',
            'subtitle'         => 'Emphasizes that the following statement is universally true.',
            'example_subtitle' => 'No matter where someone comes from...',
            'sound'            => materialAsset('slider/A2/Advanced/chapter-6/audios/slide7/no-matter-where.mp3'),
            'image'            => materialAsset('slider/A2/Advanced/chapter-6/img/slide7/no-matter-where.webp'),
        ],
        [
            'text'             => 'Starting somewhere new',
            'subtitle'         => 'Describes the act of beginning life in a different place.',
            'example_subtitle' => 'Starting somewhere new can feel scary sometimes...',
            'sound'            => materialAsset('slider/A2/Advanced/chapter-6/audios/slide7/starting-somewhere-new.mp3'),
            'image'            => materialAsset('slider/A2/Advanced/chapter-6/img/slide7/starting-somewhere-new.webp'),
        ],
        [
            'text'             => 'At the same time',
            'subtitle'         => 'Used to show that two things are happening simultaneously.',
            'example_subtitle' => 'And at the same time, you might feel hopeful...',
            'sound'            => materialAsset('slider/A2/Advanced/chapter-6/audios/slide7/at-the-same-time.mp3'),
            'image'            => materialAsset('slider/A2/Advanced/chapter-6/img/slide7/at-the-same-time.webp'),
        ],
        [
            'text'             => 'Feel like they belong',
            'subtitle'         => 'To have the sense of being accepted in a community.',
            'example_subtitle' => 'What can you do to help them feel like they belong?',
            'sound'            => materialAsset('slider/A2/Advanced/chapter-6/audios/slide7/feel-like-they-belong.mp3'),
            'image'            => materialAsset('slider/A2/Advanced/chapter-6/img/slide7/feel-like-they-belong.webp'),
        ],
    ],
];

?>

@include('slider.vocab.image-card', ['content' => $content])