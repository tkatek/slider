<?php

$content = [
    'page_title' => 'Task 2',
    'title' => 'Task 2',
    'subtitle' => 'Listen again. What sport does each person want to try?',
    'activity_title' => 'Match each person with the sport they want to try.',
    'left_label' => 'People',
    'right_label' => 'Sports',
    'audio' => materialAsset("slider/A2/Beginner/chapter11/audios/slide11/dialogue.mp3"),
    'script' => [
        'I was a big athlete in high school. All I did was swimming, swimming, and more swimming! But I work now, and I never go swimming. I know that I should exercise more, but I’m just too lazy. Jogging? That’s way too much work, and it really makes my knees hurt. A lot of people I know are into bicycling, but I don’t have a bike. I guess there’s tennis, though. My wife loves it, and wants to teach me how to play. I’d like to play, I think.',
        'After my husband got sick last year, the doctor told him to lose 20 kilos. Since then, I’ve been trying to help him lose the weight by exercising with him. There isn’t much we can do together, though. We sometimes jog in the morning, but when he works late, he doesn’t want to wake up early. Our community center has an aerobics class in the evening, but he won’t go. He says it’s just for women, so neither of us does that. He wanted to try weightlifting, but the doctor said it was too dangerous. So, now I’m thinking about getting him golf lessons – for both of us, actually. The walking might be good exercise, and it might even be a little romantic, too!',
        'I may be retired, but I stay very active. I play tennis with my daughters every weekend, and I go golfing every day. I used to lift weights, too – and I’m talking about heavy weights. But I had to stop recently, because I had to have an operation on my back. Now I’m really worried that I’ll have to stop playing tennis and golf, too. I don’t really have a lot of hobbies or interests besides sports, so I really need to keep doing them. The doctor said swimming would help my back improve, so maybe I’ll try that.',
    ],

    'pairs' => [
        [
            'id' => 'brandon',
            'left' => [
                'type' => 'word',
                'text' => '1. Brandon',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'tennis',
            ],
        ],
        [
            'id' => 'alicia',
            'left' => [
                'type' => 'word',
                'text' => '2. Alicia',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'golf',
            ],
        ],
        [
            'id' => 'ian',
            'left' => [
                'type' => 'word',
                'text' => '3. Ian',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'swimming',
            ],
        ],
    ],

    'right_order' => ['ian', 'brandon', 'alicia'],
];

?>

@include('slider.game.matching-pairs', ['content' => $content])
