<?php
$content = [
    'page_title' => 'New Vocabulary',
    'title'      => 'New Vocabulary',
    'subtitle'   => 'What are you doing? I am...',
    'grid_class' => 'grid-cols-2 sm:grid-cols-3 lg:grid-cols-4',

    'items' => [
        [
            'text'     => 'What are you doing?',
            'subtitle' => 'Question',
            'emoji'    => '❓',
            'sound'    => materialAsset('slider/A1/Advanced/chapter-10/audios/slide6/What-are-you-doing.mpeg'),
            'image'    => materialAsset('slider/A1/Advanced/chapter-10/img/slide4/Discussion.webp'),
        ],
        [
            'text'     => 'I am...',
            'subtitle' => 'Answer starter',
            'emoji'    => '🗣️',
            'sound'    => materialAsset('slider/A1/Advanced/chapter-10/audios/slide6/I-am.mpeg'),
            'image'    => materialAsset('slider/A1/Advanced/chapter-10/img/slide6/am.webp'),
        ],
        [
            'text'     => 'do / ing',
            'subtitle' => 'doing',
            'emoji'    => '🔤',
            'sound'    => materialAsset('slider/A1/Advanced/chapter-10/audios/slide6/do.mpeg'),
            'image'    => materialAsset('slider/A1/Advanced/chapter-10/img/slide4/Discussion.webp'),
        ],
        [
            'text'     => 'exercise / ing',
            'subtitle' => 'exercising',
            'emoji'    => '🏃',
            'sound'    => materialAsset('slider/A1/Advanced/chapter-10/audios/slide6/exercise.mpeg'),
            'image'    => materialAsset('slider/A1/Advanced/chapter-10/img/slide6/i-am-exercising.webp'),
        ],
        [
            'text'     => 'eat / ing',
            'subtitle' => 'eating',
            'emoji'    => '🍽️',
            'sound'    => materialAsset('slider/A1/Advanced/chapter-10/audios/slide6/eat.mpeg'),
            'image'    => materialAsset('slider/A1/Advanced/chapter-10/img/slide3/eating.webp'),
        ],
        [
            'text'     => 'cook / ing',
            'subtitle' => 'cooking',
            'emoji'    => '🍳',
            'sound'    => materialAsset('slider/A1/Advanced/chapter-10/audios/slide6/cook.mpeg'),
            'image'    => materialAsset('slider/A1/Advanced/chapter-10/img/slide6/cooking.webp'),
        ],
        [
            'text'     => 'read / ing',
            'subtitle' => 'reading',
            'emoji'    => '📖',
            'sound'    => materialAsset('slider/A1/Advanced/chapter-10/audios/slide6/read.mpeg'),
            'image'    => materialAsset('slider/A1/Advanced/chapter-10/img/slide3/reading-newspaper.webp'),
        ],
        [
            'text'     => 'snowboard / ing',
            'subtitle' => 'snowboarding',
            'emoji'    => '🏂',
            'sound'    => materialAsset('slider/A1/Advanced/chapter-10/audios/slide6/snowboard.mpeg'),
            'image'    => materialAsset('slider/A1/Advanced/chapter-10/img/slide6/Snowboarder.webp'),
        ],
        [
            'text'     => 'study / ing',
            'subtitle' => 'studying',
            'emoji'    => '📚',
            'sound'    => materialAsset('slider/A1/Advanced/chapter-10/audios/slide6/studying.mpeg'),
            'image'    => materialAsset('slider/A1/Advanced/chapter-10/img/slide3/studying.webp'),
        ],
        [
            'text'     => 'watch / ing',
            'subtitle' => 'watching',
            'emoji'    => '👀',
            'sound'    => materialAsset('slider/A1/Advanced/chapter-10/audios/slide6/watching.mpeg'),
            'image'    => materialAsset('slider/A1/Advanced/chapter-10/img/slide6/watching.webp'),
        ],
        [
            'text'     => 'sleep / ing',
            'subtitle' => 'sleeping',
            'emoji'    => '😴',
            'sound'    => materialAsset('slider/A1/Advanced/chapter-10/audios/slide6/sleep.mpeg'),
            'image'    => materialAsset('slider/A1/Advanced/chapter-10/img/slide3/sleeping-on-couch.webp'),
        ],
        [
            'text'     => 'listen / ing',
            'subtitle' => 'listening',
            'emoji'    => '🎧',
            'sound'    => materialAsset('slider/A1/Advanced/chapter-10/audios/slide6/listen.mpeg'),
            'image'    => materialAsset('slider/A1/Advanced/chapter-10/img/slide3/listening-to-music.webp'),
        ],
    ],
];
?>

@include('slider.vocab.image-card', ['content' => $content])
