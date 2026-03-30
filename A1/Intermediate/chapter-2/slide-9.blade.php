
<?php
$content = [
    'page_title' => 'New vocabulary',
    'title'      => 'New vocabulary',
    'subtitle'   => '',
    'image'      => materialAsset('slider/A1/Intermediate/chapter-2/img/slide9.webp'), // 800x800

    'items'      => [
        ['emoji' => '🕯️', 'text' => 'blow out', 'sound' => materialAsset('slider/A1/Intermediate/chapter-2/audios/slide14/blow-out.mp3')],
        ['emoji' => '🚶', 'text' => 'go out', 'sound' => materialAsset('slider/A1/Intermediate/chapter-2/audios/slide14/go-out.mp3')],
        ['emoji' => '📣', 'text' => 'shout', 'sound' => materialAsset('slider/A1/Intermediate/chapter-2/audios/slide14/shout.mp3')],
        ['emoji' => '🎓', 'text' => 'wear a cap and gown / a costume', 'sound' => materialAsset('slider/A1/Intermediate/chapter-2/audios/slide14/cap-costume.mp3')],
        ['emoji' => '🥂', 'text' => 'have a reception', 'sound' => materialAsset('slider/A1/Intermediate/chapter-2/audios/slide14/have-a-reception.mp3')],
        ['emoji' => '💍', 'text' => 'exchange rings', 'sound' => materialAsset('slider/A1/Intermediate/chapter-2/audios/slide14/exchange-rings.mp3')],
        ['emoji' => '📜', 'text' => 'get a degree', 'sound' => materialAsset('slider/A1/Intermediate/chapter-2/audios/slide14/get-a-degree.mp3')],
    ],
];
?>


@include("slider.other.new-language-emoji", ['content' => $content])