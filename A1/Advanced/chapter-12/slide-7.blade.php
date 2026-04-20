<?php
$content = [
    'page_title' => 'New Language',
    'title'      => 'New Language',
    'subtitle'   => '',
    'grid_class' => 'grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4',

    'items' => [
        [
            'text'  => 'It keeps turning off.',
            'emoji' => '📴',
            'sound' => materialAsset('slider/A1/Advanced/chapter-12/audios/slide8/keeps-turning-off.mp3'),
        ],
        [
            'text'  => 'The battery dies in 5 minutes.',
            'emoji' => '🪫',
            'sound' => materialAsset('slider/A1/Advanced/chapter-12/audios/slide8/battery-dies.mp3'),
        ],
        [
            'text'  => 'Sounds like it’s done.',
            'emoji' => '⚠️',
            'sound' => materialAsset('slider/A1/Advanced/chapter-12/audios/slide8/sounds-done.mp3'),
        ],
        [
            'text'  => 'Do you have any brand in mind?',
            'emoji' => '🏷️',
            'sound' => materialAsset('slider/A1/Advanced/chapter-12/audios/slide8/brand-mind.mp3'),
        ],
        [
            'text'  => 'I recommend this model.',
            'emoji' => '📱',
            'sound' => materialAsset('slider/A1/Advanced/chapter-12/audios/slide8/rec-model.mp3'),
        ],
        [
            'text'  => 'What’s the price?',
            'emoji' => '💵',
            'sound' => materialAsset('slider/A1/Advanced/chapter-12/audios/slide8/price-q.mp3'),
        ],
        [
            'text'  => 'The cheaper one is lighter and easier to hold.',
            'emoji' => '🪶',
            'sound' => materialAsset('slider/A1/Advanced/chapter-12/audios/slide8/cheap-light.mp3'),
        ],
        [
            'text'  => 'I like a lighter phone.',
            'emoji' => '👌',
            'sound' => materialAsset('slider/A1/Advanced/chapter-12/audios/slide8/like-light.mp3'),
        ],
        [
            'text'  => 'Does it have good storage?',
            'emoji' => '💾',
            'sound' => materialAsset('slider/A1/Advanced/chapter-12/audios/slide8/good-store.mp3'),
        ],
        [
            'text'  => 'Does it come in different colors?',
            'emoji' => '🎨',
            'sound' => materialAsset('slider/A1/Advanced/chapter-12/audios/slide8/diff-colors.mp3'),
        ],
        [
            'text'  => 'What about the warranty?',
            'emoji' => '🛡️',
            'sound' => materialAsset('slider/A1/Advanced/chapter-12/audios/slide8/warranty-q.mp3'),
        ],
        [
            'text'  => 'I think I\'ll take the one-year warranty for now.',
            'emoji' => '📅',
            'sound' => materialAsset('slider/A1/Advanced/chapter-12/audios/slide8/take-1y-war.mp3'),
        ],
        [
            'text'  => 'Would you like a phone case or a screen protector?',
            'emoji' => '🧩',
            'sound' => materialAsset('slider/A1/Advanced/chapter-12/audios/slide8/case-or-prot.mp3'),
        ],
        [
            'text'  => 'I\'m terrible with technology.',
            'emoji' => '😅',
            'sound' => materialAsset('slider/A1/Advanced/chapter-12/audios/slide8/bad-tech.mp3'),
        ],
        [
            'text'  => 'Thank you. You\'re very helpful.',
            'emoji' => '🙏',
            'sound' => materialAsset('slider/A1/Advanced/chapter-12/audios/slide8/thanks-help.mp3'),
        ],
    ],
];
?>

@include('slider.vocab.sentence-audio', ['content' => $content])