<?php
$content = [
    'video'     => materialAsset('slider/A1/Advanced/chapter-gas/video/encrypted/gas-station.m3u8'),
    'thumbnail' => materialAsset('slider/A1/Advanced/chapter-gas/img/video-thumbnail.webp'),

    'isQuiz' => 1,

    'questions' => [
        [
            'time' => 11000,
            'type' => 'multiple_choice',
            'question' => "The driver’s car is __________ out of petrol.",
            'options' => ['moving', 'running', 'going'],
            'correct_answer' => 1,
            'points' => 10
        ],
        [
            'time' => 46000,
            'type' => 'multiple_choice',
            'question' => "The driver gets __________ fuel.",
            'options' => ['premium', 'regular', 'diesel'],
            'correct_answer' => 0,
            'points' => 10
        ],
        [
            'time' => 60000,
            'type' => 'multiple_choice',
            'question' => "Premium fuel is cost-effective.",
            'options' => ['true', 'false'],
            'correct_answer' => 1,
            'points' => 10
        ],
        [
            'time' => 70000,
            'type' => 'multiple_choice',
            'question' => "Regular fuel is cheaper than Premium one.",
            'options' => ['true', 'false'],
            'correct_answer' => 0,
            'points' => 10
        ],
    ],

    'subtitles' => [
        ['start' => 11, 'end' => 22, 'text' => 'Oh no, gosh! My car is running out of fuel. Now I have to fill the tank from the nearest fuel station.'],
        ['start' => 22, 'end' => 26, 'text' => 'Attendant: Good morning!'],
        ['start' => 26, 'end' => 31, 'text' => 'Driver: Good morning, sir. It\'s a fine day, isn’t it? How may I assist you today?'],
        ['start' => 31, 'end' => 36, 'text' => 'Driver: Yes, indeed it is. I need a full tank of petrol for my car, please.'],
        ['start' => 36, 'end' => 46, 'text' => 'Attendant: Certainly, sir. We offer both regular and premium petrol here. Which one would you prefer?'],
        ['start' => 46, 'end' => 50, 'text' => 'Driver: I am not sure. Could you tell me the difference?'],
        ['start' => 50, 'end' => 77, 'text' => 'Attendant: Of course, sir. Regular petrol is a cost-effective option for everyday use. On the other hand, our premium petrol is refined further and contains additives which help to clean the engine and improve fuel efficiency to some extent. Although it\'s a bit more expensive than the regular petrol, many customers find the benefits worth the cost.'],
        ['start' => 77, 'end' => 82, 'text' => 'Driver: That\'s good to know. I\'ll opt for the premium petrol then.'],
        ['start' => 82, 'end' => 102, 'text' => 'Attendant: Excellent choice, sir. Premium petrol indeed has its advantages. While I\'m at this, would you like me to check your oil and tire pressure as well? It\'s a complimentary service we offer to our valued customers.'],
        ['start' => 102, 'end' => 104, 'text' => 'Driver: That sounds good. Please go ahead.'],
        ['start' => 104, 'end' => 113, 'text' => 'Attendant: Your car is in good shape, sir. The oil level is perfect and the tire pressure is optimal.'],
        ['start' => 113, 'end' => 116, 'text' => 'Driver: Thank you. How much is it?'],
        ['start' => 116, 'end' => 122, 'text' => 'Attendant: The total for the petrol comes to 45$.'],
        ['start' => 122, 'end' => 125, 'text' => 'Driver: Here you go.'],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])