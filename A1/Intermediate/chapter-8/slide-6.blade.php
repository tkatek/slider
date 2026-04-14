<?php
$content = [
    'video'      => materialAsset('slider/A1/Intermediate/chapter-8/video/travel-agency-encrypted/travel-agency.m3u8'),
    'thumbnail'  => materialAsset('slider/A1/Intermediate/chapter-8/img/travel-agency.webp'),
    'isQuiz'     => 1,
    'showTranscript' => 0,
    'questions'  => [

        [
            'time' => 9800,
            'type' => 'multiple_choice',
            'question' => '1️⃣ Where does the customer want to go?',
            'options' => ['London', 'Paris', 'Spain', 'Italy'],
            'correct_answer' => 3,
            'points' => 10
        ],

        [
            'time' => 44700,
            'type' => 'multiple_choice',
            'question' => '2️⃣ What does the customer want to book?',
            'options' => ['A restaurant', 'A flight', 'A car', 'A school'],
            'correct_answer' => 1,
            'points' => 10
        ],

        [
            'time' => 37000,
            'type' => 'multiple_choice',
            'question' => '3️⃣ What information does the travel agent give?',
            'options' => ['The weather', 'The hotel name', 'The price', 'The map'],
            'correct_answer' => 2,
            'points' => 10
        ],

        [
            'time' => 30900,
            'type' => 'multiple_choice',
            'question' => '4️⃣ When does the customer want to travel?',
            'options' => ['Next week', 'In June', 'Tomorrow', 'In winter'],
            'correct_answer' => 1,
            'points' => 10
        ],

        [
            'time' => 17800,
            'type' => 'multiple_choice',
            'question' => '5️⃣ What type of holidays does the customer prefer?',
            'options' => ['a city tour', 'a beach holiday', 'A cultural holiday', 'Camping'],
            'correct_answer' => 0,
            'points' => 10
        ],
    ],



    'subtitles' => [
        ['start' => 0,  'end' => 3.5,  'text' => "Customer: Good morning. I'd like some information about holiday tours."],
        ['start' => 4,  'end' => 6.2,  'text' => "Travel Agent: Good morning. Of course. Where would you like to travel?"],
        ['start' => 7.5,  'end' => 9.5,  'text' => "Customer: I'm thinking about Italy."],
        ['start' => 10.3,  'end' => 16, 'text' => "Travel Agent: That's a Great choice. Would you prefer a city tour or maybe a beach holiday?"],
        ['start' => 16, 'end' => 17.5, 'text' => "Customer: A city tour, please."],
        ['start' => 18.5, 'end' => 25, 'text' => "Travel Agent:Alright, We have a 7-day package to Rome and Florence. It includes hotels, transfers, and guided excursions."],
        ['start' => 26, 'end' => 28.2, 'text' => "Customer: That sounds nice. When is it available?"],
        ['start' => 28.7, 'end' => 30.8, 'text' => "Travel Agent: The next group leaves on June 15th."],
        ['start' => 31, 'end' => 33.3, 'text' => "Customer: Okay, and how much does it cost?"],
        ['start' => 33.7, 'end' => 36.5, 'text' => "Travel Agent:It's $1,200 per person."],
        ['start' => 37.5, 'end' => 40, 'text' => "Customer:I see, Does it include breakfast?"],
        ['start' => 40, 'end' => 42, 'text' => "Travel Agent: Yes, breakfast is included every day."],
        ['start' => 43, 'end' => 44.5, 'text' => "Customer: Perfect. I'd like to book one seat."],
        ['start' => 45, 'end' => 48.5, 'text' => "Travel Agent: Certainly. Could you fill out this form, please?"],
        ['start' => 48.5, 'end' => 49, 'text' => "Customer: Of course."],
        ['start' => 54, 'end' => 55, 'text' => "Customer: Here you go."],
        ['start' => 55.2, 'end' => 56, 'text' => "Travel Agent: Thank you."],
        ['start' => 57.7, 'end' => 59, 'text' => "Travel Agent: How would you like to pay?"],
        ['start' => 59.8, 'end' => 61.3, 'text' => "Customer: I'll pay by credit card."],
        ['start' => 62, 'end' => 64.5, 'text' => "Travel Agent: No problem. Please insert your card here."],
        ['start' => 68, 'end' => 69.5, 'text' => "Travel Agent: Perfect, all done."],
        ['start' => 69.5, 'end' => 71, 'text' => "Customer: Great, Thank you."],
        ['start' => 71, 'end' => 73, 'text' => "Travel Agent: Here are your travel documents"],
        ['start' => 73, 'end' => 74.7, 'text' => "Customer: Thank you so much"],
        ['start' => 75, 'end' => 77, 'text' => "Travel Agent: You're very welcome, have a great trip to Italy "],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])
