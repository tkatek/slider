<?php
$content = [
    'video'     => materialAsset('slider/A1/Advanced/chapter-11/video/station-encrypted/station.m3u8'),
    'thumbnail' => materialAsset('slider/A2/Beginner/chapter11/img/station.webp'),

    'isQuiz' => 1,
    'questions' => [
        [
            // After: "My car is running out of fuel."
            'time' => 8600,
            'type' => 'multiple_choice',
            'question' => "The driver’s car is __________ out of petrol.",
            'options' => ['moving', 'running', 'going'],
            'correct_answer' => 1,
            'points' => 10
        ],
        [
            // After: "Regular petrol is a cost-effective option..."
            'time' => 35200,
            'type' => 'multiple_choice',
            'question' => "Premium fuel is cost-effective.",
            'options' => ['true', 'false'],
            'correct_answer' => 1,
            'points' => 10
        ],
        [
            // After: "premium petrol... is a bit more expensive than the regular petrol"
            'time' => 51600,
            'type' => 'multiple_choice',
            'question' => "Regular fuel is cheaper than Premium one.",
            'options' => ['true', 'false'],
            'correct_answer' => 0,
            'points' => 10
        ],
        [
            // After: "I'll opt for the premium petrol then."
            'time' => 55600,
            'type' => 'multiple_choice',
            'question' => "The driver gets __________ fuel.",
            'options' => ['premium', 'regular', 'diesel'],
            'correct_answer' => 0,
            'points' => 10
        ],
    ],

    'subtitles' => [
        ['start' => 0, 'end' => 7.5, 'text' => 'Oh no, gosh! My car is running out of fuel. Now I have to fill the tank from the nearest fuel station.'],

        ['start' => 7.5, 'end' => 8.5, 'text' => 'Attendant: Good morning!'],

        ['start' => 8.8, 'end' => 13.5, 'text' => 'Driver: Good morning, sir. It\'s a fine day, isn’t it? How may I assist you today?'],

        ['start' => 13.7, 'end' => 18.7, 'text' => 'Driver: Yes, indeed it is. I need a full tank of petrol for my car, please.'],

        ['start' => 19.1, 'end' => 25.4, 'text' => 'Attendant: Certainly, sir. We offer both regular and premium petrol here. Which one would you prefer?'],

        ['start' => 26, 'end' => 28.7, 'text' => 'Driver: I am not sure. Could you tell me the difference?'],

        ['start' => 29.3, 'end' => 35, 'text' => 'Attendant: Of course, sir. Regular petrol is a cost-effective option for everyday use.'],
        ['start' => 35.5, 'end' => 41, 'text' => 'On the other hand, our premium petrol is refined further and contains additives'],
        ['start' => 41, 'end' => 45, 'text' => 'Which help to clean the engine and improve fuel efficiency to some extent.'],
        ['start' => 45.5, 'end' => 51.5, 'text' => 'Attendant: Although it\'s a bit more expensive than the regular petrol, many customers find the benefits worth the cost.'],

        ['start' => 51.7, 'end' => 55.5, 'text' => 'Driver: That\'s good to know. I\'ll opt for the premium petrol then.'],

        ['start' => 55.7, 'end' => 60, 'text' => 'Attendant: Excellent choice, sir. Premium petrol indeed has its advantages.'],
        ['start' => 61, 'end' => 65, 'text' => 'While I\'m at this, would you like me to check your oil and tire pressure as well?'],
        ['start' => 65, 'end' => 69, 'text' => 'It\'s a complimentary service we offer to our valued customers.'],

        ['start' => 69, 'end' => 71.5, 'text' => 'Driver: That sounds good. Please go ahead.'],

        ['start' => 71.8, 'end' => 77, 'text' => 'Attendant: Your car is in good shape, sir. The oil level is perfect and the tire pressure is optimal.'],

        ['start' => 77, 'end' => 79, 'text' => 'Driver: Thank you. How much is it?'],

        ['start' => 79, 'end' => 83.5, 'text' => 'Attendant: The total for the petrol comes to 45$.'],

        ['start' => 83.5, 'end' => 84.5, 'text' => 'Driver: Here you go.'],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])