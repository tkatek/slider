<?php
$content = [
    'page_title' => 'Practice 3',
    'title'      => 'Practice 3',
    'subtitle'   => '',
    'question_prompt_label' => 'Choose the correct answers',
    "questions" => [
        [
            "img" => "🏖️",
            "segments" => [
                "I ",
                ["answer" => "am going", "wrong" => ["will go", "go"]],
                " on holiday next Saturday."
            ]
        ],
        [
            "img" => "🚆",
            "segments" => [
                "The train ",
                ["answer" => "leaves", "wrong" => ["is leaving", "is going to leave"]],
                " at 10:45."
            ]
        ],
        [
            "img" => "🤝",
            "segments" => [
                "I ",
                ["answer" => "am meeting", "wrong" => ["meet", "will meet"]],
                " Kate tomorrow morning."
            ]
        ],
        [
            "img" => "🎬",
            "segments" => [
                "The film ",
                ["answer" => "starts", "wrong" => ["is starting", "will start"]],
                " at 8pm."
            ]
        ],
        [
            "img" => "📺",
            "segments" => [
                "'Why are you turning on the TV?' - 'I ",
                ["answer" => "am going to", "wrong" => ["will", "am to"]],
                " watch the news.'"
            ]
        ],
        [
            "img" => "🚗",
            "segments" => [
                "'Why are you filling that bucket with water?' - 'I ",
                ["answer" => "am going to wash", "wrong" => ["will wash", "am washing"]],
                " the car.'"
            ]
        ],
    ],
];
?>

@include("slider.game.dropdown-blanks", ['content' => $content])
