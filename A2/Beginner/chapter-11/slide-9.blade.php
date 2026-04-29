<?php

$content = [
    'mode' => 'choice_table',
    'page_title' => 'Listening',
    'title' => 'Listening',
    'subtitle' => 'Do you do any exercise to keep fit?!',
    'instruction' => 'People are talking about exercise. Listen and check the activities they do or do not do now.',
    'instruction_note' => '',
    'audio' => materialAsset("slider/A2/Beginner/chapter11/audios/slide11/dialogue.mp3"),
    'transcript' => [
        'I was a big athlete in high school. All I did was swimming, swimming, and more swimming! But I work now, and I never go swimming. I know that I should exercise more, but I’m just too lazy. Jogging? That’s way too much work, and it really makes my knees hurt. A lot of people I know are into bicycling, but I don’t have a bike. I guess there’s tennis, though. My wife loves it, and wants to teach me how to play. I’d like to play, I think.',
        'After my husband got sick last year, the doctor told him to lose 20 kilos. Since then, I’ve been trying to help him lose the weight by exercising with him. There isn’t much we can do together, though. We sometimes jog in the morning, but when he works late, he doesn’t want to wake up early. Our community center has an aerobics class in the evening, but he won’t go. He says it’s just for women, so neither of us does that. He wanted to try weightlifting, but the doctor said it was too dangerous. So, now I’m thinking about getting him golf lessons – for both of us, actually. The walking might be good exercise, and it might even be a little romantic, too!',
        'I may be retired, but I stay very active. I play tennis with my daughters every weekend, and I go golfing every day. I used to lift weights, too – and I’m talking about heavy weights. But I had to stop recently, because I had to have an operation on my back. Now I’m really worried that I’ll have to stop playing tennis and golf, too. I don’t really have a lot of hobbies or interests besides sports, so I really need to keep doing them. The doctor said swimming would help my back improve, so maybe I’ll try that.',
    ],

    'row_heading' => '',

    'options' => [
        'does' => 'Does',
        'doesnt' => "Doesn’t do",
    ],

    'rows' => [
        ['key' => 'brandon-swimming', 'label' => '1. Brandon', 'item' => 'a. swimming', 'correct' => 'doesnt'],
        ['key' => 'brandon-jogging', 'label' => '', 'item' => 'b. jogging', 'correct' => 'doesnt'],
        ['key' => 'brandon-bicycling', 'label' => '', 'item' => 'c. bicycling', 'correct' => 'doesnt'],

        ['key' => 'alicia-jogging', 'label' => '2. Alicia', 'item' => 'a. jogging', 'correct' => 'does'],
        ['key' => 'alicia-aerobics', 'label' => '', 'item' => 'b. aerobics', 'correct' => 'doesnt'],
        ['key' => 'alicia-weightlifting', 'label' => '', 'item' => 'c. weightlifting', 'correct' => 'doesnt'],

        ['key' => 'ian-tennis', 'label' => '3. Ian', 'item' => 'a. tennis', 'correct' => 'does'],
        ['key' => 'ian-golf', 'label' => '', 'item' => 'b. golf', 'correct' => 'does'],
        ['key' => 'ian-weightlifting', 'label' => '', 'item' => 'c. weightlifting', 'correct' => 'doesnt'],
    ],
];

?>

@include('slider.game.listening-table', ['content' => $content])
