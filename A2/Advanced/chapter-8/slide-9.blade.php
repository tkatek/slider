<?php
$content = [
    'page_title' => 'Listening',
    'title'      => 'Listening',
    'subtitle'   => 'Feeling tired or losing motivation while learning English?',

    // --- Image Control ---
    'show_footer_image' => 0,
    'footer_image'      => '',

    'people' => [
        'left'  => [
            'name'  => 'Paul',
            'image' => materialAsset('slider/A2/Advanced/chapter-8/img/paul.webp'),
        ],
        'right' => [
            'name'  => 'Emily',
            'image' => materialAsset('slider/A2/Advanced/chapter-8/img/emily.webp'),
        ],
    ],

    'dialogues' => [
        [
            'text'   => "Today’s topic is: “Don’t stop when you’re tired. Stop when you’re done.”",
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A2/Advanced/chapter-8/audios/slide9/1.mp3'),
        ],
        [
            'text'   => "That’s a very important idea. What does “tired” mean?",
            'side'   => 'right',
            'gender' => 'female',
            'sound'  => materialAsset('slider/A2/Advanced/chapter-8/audios/slide9/2.mp3'),
        ],
        [
            'text'   => "Tired means you need rest or sleep.",
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A2/Advanced/chapter-8/audios/slide9/3.mp3'),
        ],
        [
            'text'   => "And “done” means finished.",
            'side'   => 'right',
            'gender' => 'female',
            'sound'  => materialAsset('slider/A2/Advanced/chapter-8/audios/slide9/4.mp3'),
        ],
        [
            'text'   => "Exactly. This idea is important for learning English, exercise, and daily life.",
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A2/Advanced/chapter-8/audios/slide9/5.mp3'),
        ],
        [
            'text'   => "Sometimes I study English and feel tired after a short time.",
            'side'   => 'right',
            'gender' => 'female',
            'sound'  => materialAsset('slider/A2/Advanced/chapter-8/audios/slide9/6.mp3'),
        ],
        [
            'text'   => "Me too. But instead of stopping, you can make a small goal, like reading for 10 minutes.",
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A2/Advanced/chapter-8/audios/slide9/7.mp3'),
        ],
        [
            'text'   => "That sounds easier. Small goals help us continue.",
            'side'   => 'right',
            'gender' => 'female',
            'sound'  => materialAsset('slider/A2/Advanced/chapter-8/audios/slide9/8.mp3'),
        ],
        [
            'text'   => "Yes. When you finish the goal, you feel proud and happy.",
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A2/Advanced/chapter-8/audios/slide9/9.mp3'),
        ],
        [
            'text'   => "I also feel tired when I exercise.",
            'side'   => 'right',
            'gender' => 'female',
            'sound'  => materialAsset('slider/A2/Advanced/chapter-8/audios/slide9/10.mp3'),
        ],
        [
            'text'   => "What do you do then?",
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A2/Advanced/chapter-8/audios/slide9/11.mp3'),
        ],
        [
            'text'   => "I try to continue slowly until I finish my goal.",
            'side'   => 'right',
            'gender' => 'female',
            'sound'  => materialAsset('slider/A2/Advanced/chapter-8/audios/slide9/12.mp3'),
        ],
        [
            'text'   => "Great! Then you feel strong because you finished.",
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A2/Advanced/chapter-8/audios/slide9/13.mp3'),
        ],
        [
            'text'   => "Yes, I do. I also feel tired after dinner when the kitchen is dirty.",
            'side'   => 'right',
            'gender' => 'female',
            'sound'  => materialAsset('slider/A2/Advanced/chapter-8/audios/slide9/14.mp3'),
        ],
        [
            'text'   => "And do you clean it?",
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A2/Advanced/chapter-8/audios/slide9/15.mp3'),
        ],
        [
            'text'   => "Sometimes I want to wait until tomorrow, but cleaning it now makes me feel better later.",
            'side'   => 'right',
            'gender' => 'female',
            'sound'  => materialAsset('slider/A2/Advanced/chapter-8/audios/slide9/16.mp3'),
        ],
        [
            'text'   => "Exactly. Work first, then rest.",
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A2/Advanced/chapter-8/audios/slide9/17.mp3'),
        ],
        [
            'text'   => "So, what are the tips for not giving up?",
            'side'   => 'right',
            'gender' => 'female',
            'sound'  => materialAsset('slider/A2/Advanced/chapter-8/audios/slide9/18.mp3'),
        ],
        [
            'text'   => "First, remember your goal. Second, take small steps. Third, give yourself a reward after finishing.",
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A2/Advanced/chapter-8/audios/slide9/19.mp3'),
        ],
        [
            'text'   => "I like that advice. It helps people keep going.",
            'side'   => 'right',
            'gender' => 'female',
            'sound'  => materialAsset('slider/A2/Advanced/chapter-8/audios/slide9/20.mp3'),
        ],
        [
            'text'   => "Yes. Don’t stop when you’re tired. Stop when you’re done.",
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A2/Advanced/chapter-8/audios/slide9/21.mp3'),
        ],
    ],
];
?>

@include("slider.vocab.image-conversation", ['content' => $content])