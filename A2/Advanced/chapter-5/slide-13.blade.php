<?php
$content = [
    'page_title' => 'Listening',
    'title'      => 'Listening',
    'subtitle'   => 'Listen to 2 conversations. Match activities 1 and 2 with pictures, One picture is extra.',
    'theme'      => '#6366f1',

    'audio' => materialAsset('slider/A2/Advanced/chapter-5/audios/slide12/listening.mp3'),
    'speakers' => [
        [
            'id'     => 'conversation-1',
            'name'   => 'Activity 1',
            'audio'  => materialAsset('slider/A2/Advanced/chapter-5/audios/slide13/1.mp3'),
            'photo'  => materialAsset('slider/A2/Advanced/chapter-5/img/slide13/listening.webp'),
            'answer' => 'helicopter-skiing',
        ],
        [
            'id'     => 'conversation-2',
            'name'   => 'Activity 2',
            'audio'  => materialAsset('slider/A2/Advanced/chapter-5/audios/slide13/2.mp3'),
            'photo'  => materialAsset('slider/A2/Advanced/chapter-5/img/slide13/listening.webp'),
            'answer' => 'karaoke',
        ],
    ],


    'choices' => [
        [
            'id'    => 'helicopter-skiing',
            'label' => 'A',
            'title' => 'Helicopter skiing',
            'image' => materialAsset('slider/A2/Advanced/chapter-5/img/slide13/helicopter.webp'),
        ],
        [
            'id'    => 'karaoke',
            'label' => 'B',
            'title' => 'Karaoke',
            'image' => materialAsset('slider/A2/Advanced/chapter-5/img/slide13/karaoke.webp'),
        ],
        [
            'id'    => 'roller-coaster',
            'label' => 'C',
            'title' => 'Roller coaster',
            'image' => materialAsset('slider/A2/Advanced/chapter-5/img/slide13/roller-coaster.webp'),
        ],
    ],

    'script' => [
        'Conversation 1',
        'A: Have you ever flown in a helicopter?',
        'B: No, I haven’t. Have you?',
        'A: Yes, I have. Just once, when I went helicopter skiing five years ago.',
        'B: That sounds interesting. What’s helicopter skiing?',
        'A: A helicopter takes you up the mountain, and you ski from there.',
        'B: And how was it?',
        'A: It was fun. I enjoyed it.',

        'Conversation 2',
        'A: Matt, have you ever sung in a karaoke club?',
        'B: No, but I’ve sung at a party. It was last year sometime. No, two years ago. At a birthday party.',
        'A: What did you sing?',
        'B: I can’t remember... Oh, yes, I did It My Way. It was fun. I can’t sing, but it was a good laugh. Why are you asking?',
        'A: I’m going to a karaoke club tonight, and I’m feeling very nervous about it.',
        'B: You’ll be all right. Just relax and enjoy it!',
    ],
];
?>

@include('slider.game.drag-and-drop-audio-image', ['content' => $content])
