<?php

$content = [

    'title'      => 'Listening',
    'subtitle'   => 'If I Were You',

    'people' => [
        'left'  => [
            'name'  => 'Erin',
            'image' => materialAsset('slider/B1/Beginner/chapter-9/img/erin.webp'),
        ],
        'right' => [
            'name'  => 'Dad',
            'image' => materialAsset('slider/B1/Beginner/chapter-9/img/dad.webp'),
        ],
    ],

    'dialogues' => [
        [
            'text'   => "Dad! You’re home. Where have you been?",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset('slider/B1/Beginner/chapter-9/audios/slide14/1.mp3'),
        ],
        [
            'text'   => "I was having a cup of coffee at the cafe.",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Beginner/chapter-9/audios/slide14/2.mp3'),
        ],
        [
            'text'   => "Did you completely forget?",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset('slider/B1/Beginner/chapter-9/audios/slide14/3.mp3'),
        ],
        [
            'text'   => "Forget? Forget what?",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Beginner/chapter-9/audios/slide14/4.mp3'),
        ],
        [
            'text'   => "It’s mom’s birthday today. We were supposed to have a birthday dinner for her.",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset('slider/B1/Beginner/chapter-9/audios/slide14/5.mp3'),
        ],
        [
            'text'   => "Uh, oh! Where is mom?",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Beginner/chapter-9/audios/slide14/6.mp3'),
        ],
        [
            'text'   => "Well, when you didn’t come home she was <span class='text-red-600 font-bold'>furious</span>. She said she needed to go for a walk to <span class='text-red-600 font-bold'>cool off</span>. You did bring the cake at least?",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset('slider/B1/Beginner/chapter-9/audios/slide14/7.mp3'),
        ],
        [
            'text'   => "The cake? Was I supposed to?",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Beginner/chapter-9/audios/slide14/8.mp3'),
        ],
        [
            'text'   => "Yes, you were. She asked you to <span class='text-red-600 font-bold'>pick it up</span> this morning before you left for work.",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset('slider/B1/Beginner/chapter-9/audios/slide14/9.mp3'),
        ],
        [
            'text'   => "Oh, that’s right!",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Beginner/chapter-9/audios/slide14/10.mp3'),
        ],
        [
            'text'   => "She is going be so angry with you if she finds out that you didn’t even pick up the cake. If I were you, I would drive down to the bakery right away and get a cake before she returns.",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset('slider/B1/Beginner/chapter-9/audios/slide14/11.mp3'),
        ],
        [
            'text'   => "Will do. If she does get back before me, I was never here. Got it?",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/B1/Beginner/chapter-9/audios/slide14/12.mp3'),
        ],
        [
            'text'   => "Got it. Now go!",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset('slider/B1/Beginner/chapter-9/audios/slide14/13.mp3'),
        ],
    ],
];

?>

@include("slider.vocab.image-conversation", ['content' => $content])