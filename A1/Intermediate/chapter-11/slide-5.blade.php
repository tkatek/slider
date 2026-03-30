<?php
$content = [
    'video'          => materialAsset(''),
    'thumbnail'      => materialAsset(''),
    'isQuiz'         => 0, // 1 show question / 0 don't
    'showTranscript' => 0,
    'questions'      => [],

    'subtitles' => [
        ['start' => 0,  'end' => 3,  'text' => "Traveler: Excuse me. Is this the line for security?"],
        ['start' => 3,  'end' => 7,  'text' => "Security Officer: Yes, it is. Please keep your boarding pass ready."],
        ['start' => 7,  'end' => 10, 'text' => "Traveler: Okay."],
        ['start' => 10, 'end' => 11, 'text' => "Security Officer: Laptops and liquids need to come out of your bag."],
        ['start' => 11, 'end' => 15, 'text' => "Traveler: All right. One moment."],
        ['start' => 15, 'end' => 17, 'text' => "Security Officer: Please place your bag in the tray."],
        ['start' => 17, 'end' => 20, 'text' => "Traveler: Do I need to take off my shoes?"],
        ['start' => 20, 'end' => 21, 'text' => "Security Officer: Yes. Shoes and belt, please."],
        ['start' => 21, 'end' => 24, 'text' => "Traveler: Got it."],
        ['start' => 24, 'end' => 25, 'text' => "Security Officer: Step forward when the light turns green."],
        ['start' => 25, 'end' => 26, 'text' => "Traveler: Okay."],
        ['start' => 26, 'end' => 27, 'text' => "Security Officer: Please raise your arms."],
        ['start' => 27, 'end' => 29, 'text' => "Traveler: Sure."],
        ['start' => 29, 'end' => 30, 'text' => "Security Officer: You're all set. You can collect your items."],
        ['start' => 30, 'end' => 34, 'text' => "Traveler: Thank you."],
        ['start' => 34, 'end' => 37, 'text' => "Security Officer: Have a good flight."],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])