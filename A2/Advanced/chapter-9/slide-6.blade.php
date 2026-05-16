<?php
$content = [
    'page_title' => 'New vocabulary',
    'title'      => 'New Vocabulary',
    'subtitle'   => '',

    'grid_class' => 'grid-cols-2 sm:grid-cols-5 lg:grid-cols-5',

    'items' => [
        [
            'text'     => 'Fluent',
            'subtitle' => 'Able to speak easily and well',
            'emoji'    => '🗣️',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-9/audios/slide6/fluent.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-9/img/slide6/fluent.webp'),
        ],
        [
            'text'     => 'Overwhelming',
            'subtitle' => 'Very difficult or stressful',
            'emoji'    => '😵‍💫',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-9/audios/slide6/overwhelming.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-9/img/slide6/overwhelming.webp'),
        ],
        [
            'text'     => 'Habit',
            'subtitle' => 'Something you do regularly',
            'emoji'    => '🔁',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-9/audios/slide6/habit.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-9/img/slide6/habit.webp'),
        ],
        [
            'text'     => 'Confidence',
            'subtitle' => 'Belief in yourself',
            'emoji'    => '💪',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-9/audios/slide6/confidence.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-9/img/slide6/confidence.webp'),
        ],
        [
            'text'     => 'Pronunciation',
            'subtitle' => 'The way words are spoken',
            'emoji'    => '🔊',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-9/audios/slide6/pronunciation.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-9/img/slide6/pronunciation.webp'),
        ],
        [
            'text'     => 'Mirror',
            'subtitle' => 'Glass where you see yourself',
            'emoji'    => '🪞',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-9/audios/slide6/mirror.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-9/img/slide6/mirror.webp'),
        ],
        [
            'text'     => 'Immerse yourself',
            'subtitle' => 'Surround yourself with the language',
            'emoji'    => '🌊',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-9/audios/slide6/immerse-yourself.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-9/img/slide6/immerse-yourself.webp'),
        ],
        [
            'text'     => 'Conversational',
            'subtitle' => 'Similar to natural speaking',
            'emoji'    => '💬',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-9/audios/slide6/conversational.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-9/img/slide6/conversational.webp'),
        ],
        [
            'text'     => 'Consistent',
            'subtitle' => 'Regular and continuous',
            'emoji'    => '📅',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-9/audios/slide6/consistent.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-9/img/slide6/consistent.webp'),
        ],
        [
            'text'     => 'Imitate',
            'subtitle' => 'Copy someone’s speech or actions',
            'emoji'    => '🗣️',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-9/audios/slide6/imitate.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-9/img/slide6/imitate.webp'),
        ],
        [
            'text'     => 'Native speaker',
            'subtitle' => 'A person who speaks a language from birth',
            'emoji'    => '🌍',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-9/audios/slide6/native-speaker.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-9/img/slide6/native-speaker.webp'),
        ],
        [
            'text'     => 'Journal',
            'subtitle' => 'A notebook for regular writing',
            'emoji'    => '📓',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-9/audios/slide6/journal.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-9/img/slide6/journal.webp'),
        ],
        [
            'text'     => 'Intimidating',
            'subtitle' => 'Making you feel nervous or afraid',
            'emoji'    => '😟',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-9/audios/slide6/intimidating.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-9/img/slide6/intimidating.webp'),
        ],
        [
            'text'     => 'Progress',
            'subtitle' => 'Improvement over time',
            'emoji'    => '📈',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-9/audios/slide6/progress.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-9/img/slide6/progress.webp'),
        ],
        [
            'text'     => 'Aloud',
            'subtitle' => 'In a loud voice',
            'emoji'    => '📢',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-9/audios/slide6/aloud.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-9/img/slide6/aloud.webp'),
        ],
    ],
];
?>

@include("slider.vocab.image-card", ['content' => $content])