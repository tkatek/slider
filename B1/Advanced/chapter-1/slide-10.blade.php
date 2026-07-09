<?php
$content = [

    'title'      => 'New Language',
    'subtitle'   => 'Useful Collocations',

    'note_title' => 'Tip: Use these collocations in your speaking and writing to make your English sound more natural!',

    'items' => [
        [
            'emoji' => '🧎',
            'text'  => 'Kneel down',
            'sound' => materialAsset('slider/B1/Advanced/chapter-1/audios/slide10/kneel-down.mp3'),
        ],
        [
            'emoji' => '👣',
            'text'  => 'Muddy footprints',
            'sound' => materialAsset('slider/B1/Advanced/chapter-1/audios/slide10/muddy-footprints.mp3'),
        ],
        [
            'emoji' => '🚪',
            'text'  => 'Force open a door',
            'sound' => materialAsset('slider/B1/Advanced/chapter-1/audios/slide10/force-open-a-door.mp3'),
        ],
        [
            'emoji' => '🔒',
            'text'  => 'Fasten the latch',
            'sound' => materialAsset('slider/B1/Advanced/chapter-1/audios/slide10/fasten-the-latch.mp3'),
        ],
        [
            'emoji' => '🔍',
            'text'  => 'Find a clue',
            'sound' => materialAsset('slider/B1/Advanced/chapter-1/audios/slide10/find-a-clue.mp3'),
        ],
        [
            'emoji' => '📦',
            'text'  => 'Collect evidence',
            'sound' => materialAsset('slider/B1/Advanced/chapter-1/audios/slide10/collect-evidence.mp3'),
        ],
        [
            'emoji' => '💬',
            'text'  => 'Whisper quietly',
            'sound' => materialAsset('slider/B1/Advanced/chapter-1/audios/slide10/whisper-quietly.mp3'),
        ],
        [
            'emoji' => '👤',
            'text'  => 'Cast a shadow',
            'sound' => materialAsset('slider/B1/Advanced/chapter-1/audios/slide10/cast-a-shadow.mp3'),
        ],
        [
            'emoji' => '🕵️',
            'text'  => 'Solve a mystery',
            'sound' => materialAsset('slider/B1/Advanced/chapter-1/audios/slide10/solve-a-mystery.mp3'),
        ],
        [
            'emoji' => '🔎',
            'text'  => 'Examine the scene',
            'sound' => materialAsset('slider/B1/Advanced/chapter-1/audios/slide10/examine-the-scene.mp3'),
        ],
    ],
];
?>

@include('slider.other.new-language-emoji', ['content' => $content])