<?php
$content = [
    'video'          => materialAsset(''),
    'thumbnail'      => materialAsset(''),
    'isQuiz'         => 0,
    'showTranscript' => 0,

    'questions'      => [

    ],

    'subtitles' => [
        ['start' => 0,  'end' => 3,  'text' => "Traveler: Good morning. I'd like to check in for my flight."],
        ['start' => 3,  'end' => 7,  'text' => "Check-in Agent: Good morning. Can I see your passport and ticket, please?"],
        ['start' => 7,  'end' => 9,  'text' => "Traveler: Sure. Here you go."],
        ['start' => 9,  'end' => 12, 'text' => "Check-in Agent: Thank you. Are you checking in any luggage?"],
        ['start' => 12, 'end' => 15, 'text' => "Traveler: Yes, I have one suitcase."],
        ['start' => 15, 'end' => 18, 'text' => "Check-in Agent: Please put it on the scale."],
        ['start' => 18, 'end' => 20, 'text' => "Traveler: Okay, here it is."],
        ['start' => 20, 'end' => 24, 'text' => "Check-in Agent: Great. Your bag is within the weight limit."],
        ['start' => 24, 'end' => 27, 'text' => "Traveler: That's good. Can I have a window seat, please?"],
        ['start' => 27, 'end' => 31, 'text' => "Check-in Agent: Let me check. Yes, I found one for you."],
        ['start' => 31, 'end' => 33, 'text' => "Traveler: Perfect. Thank you."],
        ['start' => 33, 'end' => 37, 'text' => "Check-in Agent: Here's your boarding pass. Your gate number is 12."],
        ['start' => 37, 'end' => 40, 'text' => "Traveler: What time does boarding start?"],
        ['start' => 40, 'end' => 44, 'text' => "Check-in Agent: Boarding begins at 10:30. Don't be late."],
        ['start' => 44, 'end' => 47, 'text' => "Traveler: Got it. Thanks for your help."],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])