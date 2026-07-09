<?php

$content = [

    'title'      => 'Listening',
    'subtitle'   => 'What is a green initiative? Listen to four people talking about green initiatives in their companies. Match the speakers to the pictures.',


    'speakers' => [
        [
            'id'     => 'speaker-1',
            'name'   => 'Speaker 1',
            'audio'  => materialAsset('slider/B1/Advanced/chapter-5/audios/slide14/1.mp3'),
            'photo'  => materialAsset('slider/B1/Advanced/chapter-5/img/slide14/male.webp'),
            'answer' => 'cans',
            'script' => [
                'Speaker 1',
                'We’ve got some rather unusual drinks machines in our office which recycle metal cans. They’re called reverse vending machines. When you’ve finished your drink, you just put the can back into the machine and the cans are collected once a week. It’s a great way to reduce waste and make us think about protecting the environment.',
            ],
        ],
        [
            'id'     => 'speaker-2',
            'name'   => 'Speaker 2',
            'audio'  => materialAsset('slider/B1/Advanced/chapter-5/audios/slide14/2.mp3'),
            'photo'  => materialAsset('slider/B1/Advanced/chapter-5/img/slide14/female.webp'),
            'answer' => 'office-lights',
            'script' => [
                'Speaker 2',
                'Someone in our company started an initiative to turn off lights. We have a lot of rooms that aren’t used very often. Our electricity comes from fossil fuels, so every time you leave a light on, you’re polluting the environment. We consume a lot less electricity now. You’d be surprised how much we save on our bill!',
            ],
        ],
        [
            'id'     => 'speaker-3',
            'name'   => 'Speaker 3',
            'audio'  => materialAsset('slider/B1/Advanced/chapter-5/audios/slide14/3.mp3'),
            'photo'  => materialAsset('slider/B1/Advanced/chapter-5/img/slide14/male.webp'),
            'answer' => 'glass-cups',
            'script' => [
                'Speaker 3',
                'They’ve made two big changes in our work’s canteen. Firstly, they don’t throw away food at the end of the day. They keep it for the next day and sell it at a reduced price. Secondly, they’ve stopped using plastic knives, forks and spoons and they’ve gone back to metal. It’s the same for cups and glasses. It’s much better to have glasses you can reuse than plastic cups you have to throw away.',
            ],
        ],
        [
            'id'     => 'speaker-4',
            'name'   => 'Speaker 4',
            'audio'  => materialAsset('slider/B1/Advanced/chapter-5/audios/slide14/4.mp3'),
            'photo'  => materialAsset('slider/B1/Advanced/chapter-5/img/slide14/female.webp'),
            'answer' => 'carpooling',
            'script' => [
                'Speaker 4',
                'We’ve started a carpooling system in my office, and about half the staff do it now. At least two people travel in each car, which means we’re reducing our emissions by more than 50%. It’s nice to know that we’re not polluting the air so much, and it’s also nice to chat to colleagues in the car before and after work.',
            ],
        ],
    ],

    'choices' => [
        [
            'id'    => 'glass-cups',
            'label' => 'A',
            'title' => 'Reusable glasses',
            'image' => materialAsset('slider/B1/Advanced/chapter-5/img/slide14/glass-cups.webp'),
        ],
        [
            'id'    => 'office-lights',
            'label' => 'B',
            'title' => 'Turning off lights',
            'image' => materialAsset('slider/B1/Advanced/chapter-5/img/slide14/office-lights.webp'),
        ],
        [
            'id'    => 'carpooling',
            'label' => 'C',
            'title' => 'Carpooling',
            'image' => materialAsset('slider/B1/Advanced/chapter-5/img/slide14/carpooling.webp'),
        ],
        [
            'id'    => 'cans',
            'label' => 'D',
            'title' => 'Recycling cans',
            'image' => materialAsset('slider/B1/Advanced/chapter-5/img/slide14/cans.webp'),
        ],
    ],
];

?>

@include('slider.game.drag-and-drop-audio-image', ['content' => $content])