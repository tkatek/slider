<?php
$content = [
    'page_title' => 'Listen & practise!',
    'title'      => 'Conversation Corner: <br>Listen & practise!',
    'subtitle'   => 'A Healthy Lifestyle',

    'show_footer_image' => 0,
    'footer_image'      => '',

    'people' => [
        'left'  => [
            'name'  => 'Woman',
            'image' => materialAsset('slider/A2/Beginner/chapter11/img/slide16/Woman.webp'),
        ],
        'right' => [
            'name'  => 'Man',
            'image' => materialAsset('slider/A2/Beginner/chapter11/img/slide16/Man.webp'),
        ],
    ],

    'dialogues' => [
        [
            'text'   => 'This burger is delicious! Do you want some?',
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset("slider/A2/Beginner/chapter11/audios/slide16/one.mpeg"),
        ],
        [
            'text'   => 'No, thank you. I’m <span class="text-red-500 font-black">working out</span> at the gym these days. I want to be healthy, so I’ve also started eating good, fresh food.',
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset("slider/A2/Beginner/chapter11/audios/slide16/two.mpeg"),
        ],
        [
            'text'   => 'You’re exercising? That’s fantastic! When did you start thinking about your weight and <span class="text-red-500 font-black">staying in shape</span>?',
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset("slider/A2/Beginner/chapter11/audios/slide16/three.mpeg"),
        ],
        [
            'text'   => 'Last month I had <span class="text-red-500 font-black">a check-up</span>. My doctor told me that I should be leading a much healthier lifestyle now that I’m getting older. Now, I try to eat small, regular meals instead of one or two big meals a day.',
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset("slider/A2/Beginner/chapter11/audios/slide16/four.mpeg"),
        ],
        [
            'text'   => 'I see. What types of food do you usually eat now?',
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset("slider/A2/Beginner/chapter11/audios/slide16/five.mpeg"),
        ],
        [
            'text'   => 'I eat lots of fruit and vegetables. I try to <span class="text-red-500 font-black">limit</span> carbohydrates like bread, rice, and pasta. I also try not to eat <span class="text-red-500 font-black">sugary foods</span>.',
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset("slider/A2/Beginner/chapter11/audios/slide16/six.mpeg"),
        ],
        [
            'text'   => 'Oh dear! I love sugary foods, especially cakes.',
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset("slider/A2/Beginner/chapter11/audios/slide16/seven.mpeg"),
        ],
        [
            'text'   => 'Well, try to eat food that is good for you. You need to take care of yourself.',
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset("slider/A2/Beginner/chapter11/audios/slide16/eight.mpeg"),
        ],
        [
            'text'   => 'You’re right. I should start thinking about a healthier lifestyle. But first, I’m going to finish my burger!',
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset("slider/A2/Beginner/chapter11/audios/slide16/nine.mpeg"),
        ],
    ],
];
?>

@include("slider.vocab.image-conversation", ['content' => $content])
