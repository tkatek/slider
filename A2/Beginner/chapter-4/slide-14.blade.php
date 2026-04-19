<?php
$content = [
    'page_title' => 'Practice 5',
    'title'      => 'Practice 5',
    'subtitle'   => 'Choose the correct past simple forms to complete the sentences below',

    "questions" => [
        [
            "segments" => [
                "I ",
                ["answer" => "went", "wrong" => ["go", "goed"]],
                " to the park yesterday."
            ]
        ],
        [
            "segments" => [
                "She ",
                ["answer" => "watched", "wrong" => ["watch", "watching"]],
                " TV last night."
            ]
        ],
        [
            "segments" => [
                "They ",
                ["answer" => "bought", "wrong" => ["buy", "buying"]],
                " new clothes last weekend."
            ]
        ],
        [
            "segments" => [
                "We ",
                ["answer" => "played", "wrong" => ["play", "playing"]],
                " tennis on Sunday."
            ]
        ],
        [
            "segments" => [
                "He ",
                ["answer" => "saw", "wrong" => ["see", "seen"]],
                " a movie with his sister."
            ]
        ]
    ]
];
?>

@include("slider.game.dropdown-blanks", ['content' => $content])