<?php
$content = [
    'page_title' => 'New Language',
    'title'      => 'New Language',
    'subtitle'   => '',

    'image'      => materialAsset('slider/A2/Beginner/chapter-7/img/slide13/image.webp'),
    'image_alt'  => 'Appearances lesson',
   // 'note_label' => 'Useful Language',
    'note_title' => 'Notice the use of "How + adjective".',
    'note_content' => [
        'How old❓',
        'How tall❓',
        'How long❓',
    ],


    'items'      => [
        [
            'emoji' => '🎂',
            'text'  => "He's in his thirties.",
            'sound' => materialAsset('slider/A2/Beginner/chapter-7/audios/slide13/one.mpeg'),
        ],
        [
            'emoji' => '🤔',
            'text'  => "He doesn't look that old.",
            'sound' => materialAsset('slider/A2/Beginner/chapter-7/audios/slide13/two.mpeg'),
        ],
        [
            'emoji' => '👀',
            'text'  => "You can't miss her when you see her.",
            'sound' => materialAsset('slider/A2/Beginner/chapter-7/audios/slide13/three.mpeg'),
        ],
        [
            'emoji' => '🧑‍🎓',
            'text'  => 'Is she in her teens or her twenties?',
            'sound' => materialAsset('slider/A2/Beginner/chapter-7/audios/slide13/four.mpeg'),
        ],
        [
            'emoji' => '📏',
            'text'  => "He's medium height.",
            'sound' => materialAsset('slider/A2/Beginner/chapter-7/audios/slide13/five.mpeg'),
        ],
    ],
];
?>

@include('slider.other.new-language-emoji', ['content' => $content])
