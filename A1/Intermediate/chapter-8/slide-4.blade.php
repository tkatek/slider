<?php
$content = [
    'video'      => materialAsset('slider/A1/Intermediate/chapter-6/video/emergency-calls.mp4'),
    'thumbnail'  => materialAsset('slider/A1/Intermediate/chapter-6/video/thumbnail-emergency-calls.webp'),
    'isQuiz'     => 0, // 1 show question / 0 don't
    'showTranscript' => 1,
    'questions'  => [],

    'subtitles' => [
        ['start' => 0,  'end' => 4,  'text' => "Customer: Good morning. I'd like some information about holiday tours."],
        ['start' => 4,  'end' => 7,  'text' => "Travel Agent: Good morning. Sure. Where would you like to travel?"],
        ['start' => 7,  'end' => 9,  'text' => "Customer: I'm thinking about Italy."],
        ['start' => 9,  'end' => 13, 'text' => "Travel Agent: Great choice. Do you prefer a city tour or a beach holiday?"],
        ['start' => 13, 'end' => 15, 'text' => "Customer: A city tour, please."],
        ['start' => 15, 'end' => 22, 'text' => "Travel Agent: We have a 7-day Rome and Florence package. It includes hotels, transfers, and excursions."],
        ['start' => 22, 'end' => 25, 'text' => "Customer: Sounds nice. When is it available?"],
        ['start' => 25, 'end' => 29, 'text' => "Travel Agent: The next group leaves on June 15th."],
        ['start' => 29, 'end' => 32, 'text' => "Customer: And how much does it cost?"],
        ['start' => 32, 'end' => 35, 'text' => "Travel Agent: $1,200 per person."],
        ['start' => 35, 'end' => 38, 'text' => "Customer: Does it include breakfast?"],
        ['start' => 38, 'end' => 41, 'text' => "Travel Agent: Yes, breakfast is included every day."],
        ['start' => 41, 'end' => 44, 'text' => "Customer: Perfect. I'd like to book one seat."],
        ['start' => 44, 'end' => 48, 'text' => "Travel Agent: Certainly. Could you fill out this form, please?"],
        ['start' => 48, 'end' => 50, 'text' => "Customer: Of course. Here it is."],
        ['start' => 50, 'end' => 53, 'text' => "Travel Agent: Thank you. How would you like to pay?"],
        ['start' => 53, 'end' => 55, 'text' => "Customer: By credit card."],
        ['start' => 55, 'end' => 58, 'text' => "Travel Agent: No problem. Please insert your card here."],
        ['start' => 58, 'end' => 60, 'text' => "Customer: Done."],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])