<?php
$content = [
    'title' => 'Practice 5',
    'subtitle' => 'Complete the conversation with the second conditional forms of the verbs in brackets.',
    'questions' => [
        [
            'segments' => [
                "A. If ",
                ['answer' => "I were you", 'wrong' => "I am you"],
                ", ",
                ['answer' => "I wouldn’t eat", 'wrong' => "I won’t eat"],
                " those grapes.\n",

                "B. It’s a supermarket. Nobody cares. If ",
                ['answer' => "I didn’t eat them", 'wrong' => "I don’t eat them"],
                ", ",
                ['answer' => "they would throw", 'wrong' => "they will throw"],
                " them away.\n",

                "A. What ",
                ['answer' => "would you do", 'wrong' => "will you do"],
                " if ",
                ['answer' => "a shop assistant saw", 'wrong' => "a shop assistant sees"],
                " you?\n",

                "B. ",
                ['answer' => "I would promise", 'wrong' => "I will promise"],
                " to pay for them at the till.\n",

                "A. What if ",
                ['answer' => "they didn’t believe", 'wrong' => "they don’t believe"],
                " you and ",
                ['answer' => "they called", 'wrong' => "they call"],
                " the police? ",
                ['answer' => "You would go", 'wrong' => "You will go"],
                " to prison for stealing grapes!\n",

                "B. You’re being very silly! If ",
                ['answer' => "the police came", 'wrong' => "the police come"],
                ", ",
                ['answer' => "they wouldn’t send", 'wrong' => "they won’t send"],
                " me to prison. But, ",
                ['answer' => "it would be", 'wrong' => "it will be"],
                " embarrassing.",
            ],
        ],
    ],
];
?>

@include("slider.game.dropdown-blanks", ['content' => $content])