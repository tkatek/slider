<?php
$content = [
    'page_title' => 'Practice 5:  Will or Be going to? ',
    'title'      => 'Practice 5:  Will or Be going to? ',
    'subtitle'   => 'Choose the correct forms of will and be going to to complete the sentences below.',
    "questions" => [
        [
            "img" => "🥖",
            "segments" => [
                "A: We don’t have any bread.<br>B: Yes, I know. I ",
                ["answer" => "'m going to buy", "wrong" => ["going to buy", "'ll buy"]],
                " some. I took some money from your purse."
            ]
        ],
        [
            "img" => "🛒",
            "segments" => [
                "A: We don’t have any bread.<br>B: Really? I ",
                ["answer" => "'ll get", "wrong" => ["'m going to get", "will to get"]],
                " some from the shop then."
            ]
        ],
        [
            "img" => "🧳",
            "segments" => [
                "A: Why do you need to borrow my suitcase?<br>B: Because I ",
                ["answer" => "'m going to visit", "wrong" => ["'ll visit", "going to visit"]],
                " my mother in Scotland next month."
            ]
        ],
        [
            "img" => "🥶",
            "segments" => [
                "A: I’m really cold.<br>B: I ",
                ["answer" => "'ll turn", "wrong" => ["going to turn", "'m going to turn"]],
                " the heating on."
            ]
        ],
        [
            "img" => "🏥",
            "segments" => [
                "A: What are your plans after you leave university?<br>B: I ",
                ["answer" => "'m going to work", "wrong" => ["going to work", "'ll work"]],
                " in a hospital in Africa."
            ]
        ],
        [
            "img" => "💡",
            "segments" => [
                "A: All the lights have gone off!<br>B: Don't worry. I ",
                ["answer" => "'ll take", "wrong" => ["will to take", "'m going to take"]],
                " a look."
            ]
        ],
        [
            "img" => "💻",
            "segments" => [
                "A: Why are you carrying your laptop?<br>B: I ",
                ["answer" => "'m going to do", "wrong" => ["will to do", "will do"]],
                " some homework on the train."
            ]
        ],
        [
            "img" => "🔑",
            "segments" => [
                "A: I can't find my keys.<br>B: I ",
                ["answer" => "'ll help", "wrong" => ["will to help", "'m going to help"]],
                " you look for them."
            ]
        ],
        [
            "img" => "🎟️",
            "segments" => [
                "A: Did you remember to buy the tickets?<br>B: Oh no, I forgot! I ",
                ["answer" => "'ll buy", "wrong" => ["will to buy", "'m going to buy"]],
                " them online now."
            ]
        ],
        [
            "img" => "📉",
            "segments" => [
                "If you take a look at this graphic, you can see that the economy ",
                ["answer" => "is going to get", "wrong" => ["is going get", "will get"]],
                " worse very soon."
            ]
        ],
    ],
];
?>

@include("slider.game.dropdown-blanks", ['content' => $content])