<?php
    $content=[
        'title'=>'Greeting forms',
        'subtitle'=>'Formal / Informal Greetings',
        'card1Title'=>'Formal Greetings',
        'card2Title'=>'Informal Greetings',
        'card1'=>[
                [
                    'label' => 'Good Morning',
                    'sound' => materialAsset('slider/A1/Beginner/chapter-1/audios/greeting/gm.mpeg'),
                ],
                [
                    'label' => 'Good afternoon',
                    'sound' => materialAsset('slider/A1/Beginner/chapter-1/audios/greeting/gf.mpeg'),
                ],
                [
                    'label' => 'Good evening',
                    'sound' => materialAsset('slider/A1/Beginner/chapter-1/audios/greeting/gev.mpeg'),
                ],
                [
                    'label' => 'How do you do?',
                    'sound' => materialAsset('slider/A1/Beginner/chapter-1/audios/greeting/hdyd.mpeg'),
                ],
                [
                    'label' => 'Nice to meet you',
                    'sound' => materialAsset('slider/A1/Beginner/chapter-1/audios/greeting/nicetomeet.mpeg'),
                ],
            ],
        'card2'=>[
                [
                    'label' => 'Hi !',
                    'sound' => materialAsset('slider/A1/Beginner/chapter-1/audios/greeting/hi.mpeg'),
                ],
                [
                    'label' => 'Hey !',
                    'sound' => materialAsset('slider/A1/Beginner/chapter-1/audios/greeting/hey.mpeg'),
                ],
                [
                    'label' => 'Hello !',
                    'sound' => materialAsset('slider/A1/Beginner/chapter-1/audios/greeting/hello.mpeg'),
                ],
                [
                    'label' => "What's up?",
                    'sound' => materialAsset('slider/A1/Beginner/chapter-1/audios/greeting/WhatsApp.mpeg'),
                ],
                [
                    'label' => "How's it going?",
                    'sound' => materialAsset('slider/A1/Beginner/chapter-1/audios/greeting/howItGoing.mpeg'),
                ],
            ]
    ];

?>

@include("slider.cards.two-cards-with-audio",['content'=>$content])
