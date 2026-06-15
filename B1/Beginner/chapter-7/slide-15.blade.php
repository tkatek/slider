<?php

$content = [
    'page_title' => 'Reading Comprehension',
    'title' => 'Reading Comprehension',
    'compact_layout' => true,
    'subtitle' => 'Read Mary’s e-mail to her mother. Then,  complete it with the right word from the list:',

    'questions' => [
        [
            'segments' => [
                "Dear Mum,<br>I feel really unhappy! I wish I ",
                [
                    'answer' => "hadn’t accepted",
                    'wrong' => ["didn’t accept", "wouldn’t accept"],
                ],
                " this job. If only I ",
                [
                    'answer' => "had listened",
                    'wrong' => ["listened", "would listen"],
                ],
                " to you before I made the decision to come here. The people here are unfriendly. I wish they ",
                [
                    'answer' => "were",
                    'wrong' => ["would be", "had been"],
                ],
                " more friendly. And I don't even have breaks! If only I ",
                [
                    'answer' => "had",
                    'wrong' => ["would have", "had had"],
                ],
                " longer breaks.<br><br>Looking at a computer screen all day is tiring; I wish my computer ",
                [
                    'answer' => "would explode",
                    'wrong' => ["explode", "will explode"],
                ],
                "! And I wish my boss ",
                [
                    'answer' => "would stop",
                    'wrong' => ["stopped", "had stopped"],
                ],
                " yelling at me all the time. He's always in a bad mood. It's so annoying! Also, I wish there ",
                [
                    'answer' => "were",
                    'wrong' => ["had been", "would be"],
                ],
                " someone here I could talk to, but there is no one I can talk to. I haven't made any friends. If only I ",
                [
                    'answer' => "had made",
                    'wrong' => ["made", "would have made"],
                ],
                " some friends when I arrived here, but meeting new people is very difficult. I wish you ",
                [
                    'answer' => "lived",
                    'wrong' => ["would live", "had lived"],
                ],
                " nearer to me. If only I ",
                [
                    'answer' => "could see",
                    'wrong' => ["would see", "could have seen"],
                ],
                " you more often!<br><br>Please write soon. I miss you!<br><br>Love,<br>Mary",
            ],
        ],
    ],
];

?>

@include("slider.game.dropdown-blanks", ['content' => $content])