<?php

$content = [
    'video'     => materialAsset(''),
    'thumbnail' => materialAsset(''),
    'isQuiz'    => 1,

    'questions' => [
        [
            // Answer: "He likes to save money."
            // Silent gap: 21–22 seconds.
            'time' => 21200,
            'type' => 'multiple_choice',
            'question' => 'Why does English teacher Neeraj do everything himself?',
            'options' => [
                "He doesn't trust other people.",
                'He likes to save money.',
                'He enjoys shopping.',
                'He has many servants.',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            // Answer: "His private chef."
            // Silent gap: 68–69 seconds.
            'time' => 68400,
            'type' => 'multiple_choice',
            'question' => "Who cooks Neerajito's meals?",
            'options' => [
                'His wife',
                'His driver',
                'His private chef',
                'His barber',
            ],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            // The complete list of services ends before this gap.
            // "His bicycle repaired" was not mentioned.
            // Silent gap: 100–101 seconds.
            'time' => 100400,
            'type' => 'multiple_choice',
            'question' => 'Which of these is NOT something Neerajito has done for him?',
            'options' => [
                'His beard trimmed.',
                'His clothes made.',
                'His umbrella held.',
                'His bicycle repaired.',
            ],
            'correct_answer' => 3,
            'points' => 10,
        ],
        [
            // Answer: "He gets his beard trimmed."
            // Silent gap: 120–121 seconds.
            'time' => 120400,
            'type' => 'multiple_choice',
            'question' => 'Which sentence uses the causative structure correctly?',
            'options' => [
                'He trims his beard himself.',
                'He cooks his own meals.',
                'He gets his beard trimmed twice a week.',
                'He painted his apartment himself.',
            ],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            // Answer: "Have or get plus the thing plus a verb in the past participle."
            // Silent gap: 137–138 seconds.
            'time' => 137400,
            'type' => 'multiple_choice',
            'question' => 'The causative structure is formed with:',
            'options' => [
                'Have/Get + person + infinitive',
                'Be + verb + -ing',
                'Have/Get + something + past participle',
                'Have + verb + present participle',
            ],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            // Answer: "Because it's cheaper, faster, or we can't do these things ourselves."
            // Silent gap: 174–175 seconds.
            'time' => 174400,
            'type' => 'multiple_choice',
            'question' => 'Why do people often use the causative structure?',
            'options' => [
                'Because they enjoy doing everything themselves.',
                'Because they are always rich.',
                "Because it can be cheaper, faster, or they can't do the task themselves.",
                "Because they don't like working.",
            ],
            'correct_answer' => 2,
            'points' => 10,
        ],
    ],

    'subtitles' => [
        [
            'start' => 0,
            'end'   => 4,
            'text'  => 'If this is your life, you need to be using the causative.',
        ],
        [
            'start' => 4.5,
            'end'   => 10,
            'text'  => 'Mini English Lessons: What is the causative, and why would you need it?',
        ],
        [
            'start' => 10.5,
            'end'   => 15,
            'text'  => 'Well, to help me, let me introduce you to English teacher Neeraj.',
        ],
        [
            'start' => 15.5,
            'end'   => 21,
            'text'  => 'He is just a regular person, but he likes to do everything himself, and he likes to save money.',
        ],

        [
            'start' => 22,
            'end'   => 25,
            'text'  => 'He trims his own beard.',
        ],
        [
            'start' => 25.5,
            'end'   => 29,
            'text'  => 'He cooks his own meals.',
        ],
        [
            'start' => 29.5,
            'end'   => 35,
            'text'  => 'He painted his apartment last summer. It took him a while.',
        ],
        [
            'start' => 35.5,
            'end'   => 40,
            'text'  => 'He buys his own clothes now and again, even though he hates shopping.',
        ],
        [
            'start' => 40.5,
            'end'   => 44,
            'text'  => 'He goes everywhere by bicycle.',
        ],
        [
            'start' => 44.5,
            'end'   => 48,
            'text'  => 'If it rains, he has to hold his own umbrella.',
        ],

        [
            'start' => 49,
            'end'   => 53,
            'text'  => 'Now let me introduce you to the world-famous Neerajito.',
        ],
        [
            'start' => 53.5,
            'end'   => 57,
            'text'  => 'He is a fabulously wealthy reggaeton artist.',
        ],
        [
            'start' => 57.5,
            'end'   => 63,
            'text'  => 'He has his beard trimmed for him by his personal barber twice a week.',
        ],
        [
            'start' => 63.5,
            'end'   => 68,
            'text'  => 'He has all of his meals cooked for him by his private chef.',
        ],
        [
            'start' => 69,
            'end'   => 74,
            'text'  => 'He recently got one of his mansions repainted pink.',
        ],
        [
            'start' => 74.5,
            'end'   => 79,
            'text'  => 'He gets his clothes made for him by his tailor.',
        ],
        [
            'start' => 79.5,
            'end'   => 84,
            'text'  => 'He gets driven all over the city in his limousine by his driver.',
        ],
        [
            'start' => 84.5,
            'end'   => 89,
            'text'  => 'And when it rains, he has his umbrella held for him by his butler.',
        ],

        [
            'start' => 89.5,
            'end'   => 94,
            'text'  => 'As you can see, our friends have very different lifestyles.',
        ],
        [
            'start' => 94.5,
            'end'   => 100,
            'text'  => 'English teacher Neeraj does everything for himself, whereas Neerajito has everything done for him.',
        ],

        [
            'start' => 101,
            'end'   => 105,
            'text'  => "Did you notice how we described Neerajito's life?",
        ],
        [
            'start' => 105.5,
            'end'   => 108,
            'text'  => 'He gets his beard trimmed.',
        ],
        [
            'start' => 108.5,
            'end'   => 112,
            'text'  => 'He has his meals cooked for him.',
        ],
        [
            'start' => 112.5,
            'end'   => 116,
            'text'  => 'He gets his umbrella held for him.',
        ],
        [
            'start' => 116.5,
            'end'   => 120,
            'text'  => 'And he gets driven all around the city.',
        ],

        [
            'start' => 121,
            'end'   => 128,
            'text'  => 'In a situation where we get somebody to do something for us, we use a structure called the causative structure.',
        ],
        [
            'start' => 128.5,
            'end'   => 137,
            'text'  => 'This structure is formed from have or get, plus the thing, plus a verb in the past participle: have something done.',
        ],
        [
            'start' => 138,
            'end'   => 143,
            'text'  => "It is called the causative because you cause something to happen. You don't do it yourself.",
        ],

        [
            'start' => 143.5,
            'end'   => 149,
            'text'  => 'For example, Neerajito gets his beard trimmed twice a week by his personal barber.',
        ],
        [
            'start' => 149.5,
            'end'   => 153,
            'text'  => 'He gets his umbrella held when it rains.',
        ],
        [
            'start' => 153.5,
            'end'   => 157,
            'text'  => 'Neerajito has his meals cooked for him.',
        ],

        [
            'start' => 158,
            'end'   => 164,
            'text'  => "Now, we don't all have to be rich, famous reggaeton stars to have things done for us.",
        ],
        [
            'start' => 164.5,
            'end'   => 174,
            'text'  => "Most of us need to get things done for us because it's cheaper, because it's faster, or simply because we can't do these things ourselves.",
        ],
        [
            'start' => 175,
            'end'   => 179,
            'text'  => 'So that is when we need to use the causative structure.',
        ],
    ],
];

?>

@include("slider.video.interactive", ['content' => $content])