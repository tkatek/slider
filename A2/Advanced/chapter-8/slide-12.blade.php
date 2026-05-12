<?php
$content = [
    'page_title' => 'New vocabulary',
    'title'      => 'New Vocabulary',
    'subtitle'   => '',

    'grid_class' => 'grid-cols-2 sm:grid-cols-4 lg:grid-cols-5',

    'items' => [
        [
            'text'     => 'Vocabulary',
            'subtitle' => 'The words in a language',
            'emoji'    => '📚',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-8/audios/slide12/vocabulary.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-8/img/slide12/vocabulary.webp'),
        ],
        [
            'text'     => 'Accent',
            'subtitle' => 'The way people pronounce words',
            'emoji'    => '🗣️',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-8/audios/slide12/accent.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-8/img/slide12/accent.webp'),
        ],
        [
            'text'     => 'Define',
            'subtitle' => 'To explain the meaning',
            'emoji'    => '🔎',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-8/audios/slide12/define.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-8/img/slide12/define.webp'),
        ],
        [
            'text'     => 'Sentence',
            'subtitle' => 'A group of words with complete meaning',
            'emoji'    => '✍️',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-8/audios/slide12/sentence.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-8/img/slide12/sentence.webp'),
        ],
        [
            'text'     => 'Opposite',
            'subtitle' => 'Completely different',
            'emoji'    => '↔️',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-8/audios/slide12/opposite.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-8/img/slide12/opposite.webp'),
        ],
        [
            'text'     => 'Communicate',
            'subtitle' => 'To talk and share ideas with others',
            'emoji'    => '💬',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-8/audios/slide12/communicate.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-8/img/slide12/communicate.webp'),
        ],
        [
            'text'     => 'Comprehend',
            'subtitle' => 'To understand',
            'emoji'    => '🧠',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-8/audios/slide12/comprehend.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-8/img/slide12/comprehend.webp'),
        ],
        [
            'text'     => 'Synonyms',
            'subtitle' => 'Words with similar meanings',
            'emoji'    => '🔁',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-8/audios/slide12/synonyms.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-8/img/slide12/synonyms.webp'),
        ],
        [
            'text'     => 'Build a sentence',
            'subtitle' => 'Put words together correctly',
            'emoji'    => '🧩',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-8/audios/slide12/build-a-sentence.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-8/img/slide12/build-a-sentence.webp'),
        ],
        [
            'text'     => 'Big words',
            'subtitle' => 'Difficult or advanced words',
            'emoji'    => '🔤',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-8/audios/slide12/big-words.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-8/img/slide12/big-words.webp'),
        ],
    ],
];
?>

@include("slider.vocab.image-card", ['content' => $content])