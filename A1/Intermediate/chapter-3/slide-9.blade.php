<?php
$content = [
    'page_title' => 'Formal vs. Informal Interactions',
    'title'      => 'Formal vs. Informal Interactions',
    'subtitle'   => 'Notice the difference?',

    'shorts'     => [
        [
            'src'       => materialAsset('slider/A1/Intermediate/chapter-3/videos/joining-school-encrypted/joining-school.m3u8'),
            'thumbnail' => materialAsset('slider/A1/Intermediate/chapter-3/videos/short1.webp'),
            'showCC'    => false,
            'subtitles' => [
                ['start' => 0,  'end' => 3,  'text' => 'Good morning, sir. Please have a seat.'],
                ['start' => 3,  'end' => 4,  'text' => 'Thank you'],
                ['start' => 9,  'end' => 12,  'text' => 'How can I help you today?'],
                ['start' => 12,  'end' => 15,  'text' => 'Good morning, ma\'am. I want admission for my daughter in your school.'],
                ['start' => 16.5,  'end' => 21, 'text' => 'Of course. What is her name and which class are you looking for?'],
                ['start' => 21.5, 'end' => 24.8, 'text' => 'Her name is Emma, and I want her to join class 3.'],
                ['start' => 25, 'end' => 28, 'text' => 'Okay, that is a good age for class 3.'],
                ['start' => 28, 'end' => 30, 'text' => 'Does she like studying?'],
                ['start' => 30, 'end' => 35, 'text' => 'Yes, ma\'am. She is very active and loves reading books.'],
                ['start' => 35, 'end' => 40, 'text' => 'That\'s wonderful. We have very good teachers and many activities here.'],
                ['start' => 40, 'end' => 43, 'text' => 'I heard your school has a strong English program.'],
                ['start' => 43, 'end' => 48, 'text' => 'Yes, we focus on communication skills and confidence building.'],
                ['start' => 48, 'end' => 51, 'text' => 'That is exactly what I want for my daughter.'],
                ['start' => 51.5, 'end' => 55, 'text' => 'Do you have her previous school documents?'],
                ['start' => 55, 'end' => 58, 'text' => 'Yes, ma\'am. I brought everything with me.'],
                ['start' => 60, 'end' => 64, 'text' => 'Great. You can fill out the admission form today.'],
                ['start' => 64, 'end' => 67, 'text' => 'Thank you, ma\'am. I am happy with this school.'],
                ['start' => 67, 'end' => 71, 'text' => 'We will take good care of her. Welcome to our school.'],
                ['start' => 71,  'end' => 73,  'text' => 'Thank you'],
                ],

        ],
        [
            'src'       => materialAsset('slider/A1/Intermediate/chapter-3/videos/parents-day-encrypted/parents-day.m3u8'),
            'thumbnail' => materialAsset('slider/A1/Intermediate/chapter-3/videos/short2.webp'),
            'showCC'    => false,
            'subtitles' => [
                ['start' => 0,  'end' => 4.5,  'text' => 'Hi there! Are you here for the Parents\' Day meeting too?'],
                ['start' => 5,  'end' => 8,  'text' => 'Hey! Yes, I am. I’m Mark'],
                ['start' => 8,  'end' => 10,  'text' => 'Chloe’s dad. Nice to meet you.'],
                ['start' => 10, 'end' => 13, 'text' => 'Nice to meet you, Mark. I\'m Sarah.'],
                ['start' => 13, 'end' => 15, 'text' => 'Is Chloe enjoying the new playground this year?'],

                ['start' => 15.5, 'end' => 19, 'text' => 'She loves it! She spends all her time on the swings.'],
                ['start' => 19.5, 'end' => 22, 'text' => 'Is your son excited about Sports Day next week?'],
                ['start' => 22.5, 'end' => 23.5, 'text' => 'Definitely.'],
                ['start' => 23.5, 'end' => 28, 'text' => 'He’s been practicing his basketball skills in the gym every afternoon.'],
                ['start' => 28.5, 'end' => 29, 'text' => 'That’s great.'],
                ['start' => 29, 'end' => 32.5, 'text' => 'It’s such a special day for us to support the kids and celebrate together.'],

            ],
        ],
    ],
];
?>

@include("slider.video.short-video", ['content' => $content])