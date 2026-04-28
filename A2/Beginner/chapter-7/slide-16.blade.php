<?php
$content = [
    'title' => 'Practice the conversation',
    'subtitle' => '',

    'people' => [
        'right' => [
            'name' => 'Jenna',
            'image' => materialAsset('slider/A2/Beginner/chapter-7/img/slide16/Jenna.webp'),
        ],
        'left' => [
            'name' => 'Alex',
            'image' => materialAsset('slider/A2/Beginner/chapter-7/img/slide16/Alex.webp'),
        ],
    ],

    'dialogues' => [
        [
            'side' => 'left',
            'text' => 'What does your new boyfriend look like, Jenna?',
            'sound' => materialAsset('slider/A2/Beginner/chapter-7/audios/slide16/one.mpeg'),
        ],
        [
            'side' => 'right',
            'text' => "Well, he's really good looking.",
            'sound' => materialAsset('slider/A2/Beginner/chapter-7/audios/slide16/two.mpeg'),
        ],
        [
            'side' => 'left',
            'text' => 'Oh! Is he tall?',
            'sound' => materialAsset('slider/A2/Beginner/chapter-7/audios/slide16/three.mpeg'),
        ],
        [
            'side' => 'right',
            'text' => "No, he isn't. He's pretty short.",
            'sound' => materialAsset('slider/A2/Beginner/chapter-7/audios/slide16/four.mpeg'),
        ],
        [
            'side' => 'left',
            'text' => 'Really? Are you taller than him?',
            'sound' => materialAsset('slider/A2/Beginner/chapter-7/audios/slide16/five.mpeg'),
        ],
        [
            'side' => 'right',
            'text' => "No, we're about the same height. Let's see... and he has curly brown hair.",
            'sound' => materialAsset('slider/A2/Beginner/chapter-7/audios/slide16/six.mpeg'),
        ],
        [
            'side' => 'left',
            'text' => 'He sounds cute. Is he about your age?',
            'sound' => materialAsset('slider/A2/Beginner/chapter-7/audios/slide16/seven.mpeg'),
        ],
        [
            'side' => 'right',
            'text' => 'Yes, he is. And we have the same birthday!',
            'sound' => materialAsset('slider/A2/Beginner/chapter-7/audios/slide16/eight.mpeg'),
        ],
    ],
];
?>

@include('slider.vocab.image-conversation', ['content' => $content])
