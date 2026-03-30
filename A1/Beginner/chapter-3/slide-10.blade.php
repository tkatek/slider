<?php

$content = [
    'title' => 'Practice 3',
    'subtitle' => 'Listen to the audio, then switch tabs to complete each activity',
    'audio' => materialAsset('slider/A1/Beginner/chapter-3/audio/slide-10.mpeg'),
    'tabs'=>[
        ['id' => 'empty', 'label' => 'Listen'],
        ['id' => 'script', 'label' => 'Script'],
        ['id' => 'grammar', 'label' => 'Grammar'],
        ['id' => 'quiz', 'label' => 'Quiz'],
        ['id' => 'puzzle', 'label' => 'Puzzle'],
    ],

    // Full Transcript (Answer & Transcript section on the site)
    'script' => [
        [
            'topic' => '1) Bill – Boring but well-paid job',
            'dialogue' => [
                ['speaker' => 'A', 'text' => 'So how do you like your job, Bill?'],
                ['speaker' => 'B', 'text' => "Well, it was okay at first, but now, after two years, I don't like it."],
                ['speaker' => 'A', 'text' => "Oh, why's that?"],
                ['speaker' => 'B', 'text' => "It's boring. I do the same thing every day. I'm really sick of it."],
                ['speaker' => 'A', 'text' => "So why don't you change jobs?"],
                ['speaker' => 'B', 'text' => "I'm well-paid. I like the money!"],
                ['speaker' => 'A', 'text' => "Oh, I see. But you should leave if you're not happy."],
                ['speaker' => 'B', 'text' => 'Yeah, maybe I should.'],
            ],
        ],
        [
            'topic' => '2) Christine – Teaching children',
            'dialogue' => [
                ['speaker' => 'A', 'text' => 'Do you like teaching children, Christine?'],
                ['speaker' => 'B', 'text' => 'Oh, yes! I love working with kids. They\'re so much fun.'],
                ['speaker' => 'A', 'text' => 'Well, I guess you have the perfect job!'],
                ['speaker' => 'B', 'text' => "Yeah, I like it a lot. There's just one thing I don't like."],
                ['speaker' => 'A', 'text' => "What's that?"],
                ['speaker' => 'B', 'text' => "The distance to school. It's too far away. It takes me an hour to drive there every day."],
                ['speaker' => 'A', 'text' => 'Wow. That must be awful!'],
                ['speaker' => 'B', 'text' => 'It is, but the schools that are near me are not as good.'],
            ],
        ],
        [
            'topic' => '3) Anna – New job with a lot of travel',
            'dialogue' => [
                ['speaker' => 'A', 'text' => 'How is your new job going, Anna?'],
                ['speaker' => 'B', 'text' => 'Good, thanks. I really like it.'],
                ['speaker' => 'A', 'text' => 'What do you like best about it?'],
                ['speaker' => 'B', 'text' => "I think it's the people I work with. They are so nice."],
                ['speaker' => 'A', 'text' => "People make all the difference in a job, don't they?"],
                ['speaker' => 'B', 'text' => 'They sure do. The only trouble is, I have to travel a lot. I\'m away from home for about two weeks every month.'],
                ['speaker' => 'A', 'text' => 'Yeah, that can be difficult.'],
                ['speaker' => 'B', 'text' => "It is. I hope I won't have to travel so much next year."],
            ],
        ],
        [
            'topic' => '4) Nancy – Salesperson',
            'dialogue' => [
                ['speaker' => 'A', 'text' => 'Do you enjoy being a salesperson, Nancy?'],
                ['speaker' => 'B', 'text' => 'Yes, I do like it. I get to meet so many people.'],
                ['speaker' => 'A', 'text' => 'Is it hard work?'],
                ['speaker' => 'B', 'text' => "Yes, it can be. I don't like the long hours. I'm always really tired when I get home at night."],
                ['speaker' => 'A', 'text' => "That's too bad. Why don't you quit?"],
                ['speaker' => 'B', 'text' => 'Because I think my boss is great to work for.'],
            ],
        ],
        [
            'topic' => '5) Martin – Restaurant job',
            'dialogue' => [
                ['speaker' => 'A', 'text' => 'How long have you been working in a restaurant, Martin?'],
                ['speaker' => 'B', 'text' => 'For more than five years.'],
                ['speaker' => 'A', 'text' => 'Wow. You must really enjoy it.'],
                ['speaker' => 'B', 'text' => "Oh no, I don't enjoy it at all! It's hard work and pretty tiring, too. I'm on my feet all night."],
                ['speaker' => 'A', 'text' => 'Oh, I see.'],
                ['speaker' => 'B', 'text' => 'But the tips are great. I really should find a better job soon, though.'],
            ],
        ],
    ],

    'grammar' => [
        [
            'title' => 'Point 1: Talking About Likes and Dislikes at Work',
            'explanation' => 'Use these expressions to say how you feel about a job.',
            'examples' => [
                'I like it a lot.',
                "I don't like it.",
                'I love working with kids.',
                "I don't enjoy it at all!",
            ],
        ],
        [
            'title' => 'Point 2: Giving Reasons',
            'explanation' => 'Use because / it is / there is / the only trouble is to explain your opinion.',
            'examples' => [
                "It's boring.",
                "I'm well-paid.",
                "The distance to school is too far.",
                'The only trouble is, I have to travel a lot.',
            ],
        ],
        [
            'title' => 'Point 3: Talking About Pros and Cons',
            'explanation' => 'People often like one part of a job and dislike another part.',
            'examples' => [
                [
                    'question' => 'Bill',
                    'answers' => ['Likes the money.', 'Dislikes the boring routine.'],
                ],
                [
                    'question' => 'Christine',
                    'answers' => ['Loves working with kids.', 'Dislikes the long drive.'],
                ],
                [
                    'question' => 'Anna',
                    'answers' => ['Likes her coworkers.', 'Dislikes traveling so much.'],
                ],
                [
                    'question' => 'Nancy / Martin',
                    'answers' => ['Nancy likes people and her boss; Martin likes the tips.', 'They both dislike tiring work conditions.'],
                ],
            ],
            'note' => 'This listening focuses on job satisfaction: what people enjoy and what they want to change.',
        ],
    ],

    // Task 1 + Task 2 (multiple choice)
    'quiz' => [
        // Task 1: Yes / No
        [
            'question' => 'Task 1 – Conversation 1: Does Bill like his job now?',
            'options' => ['Yes', 'No'],
            'correct_answer' => 1,
        ],
        [
            'question' => 'Task 1 – Conversation 2: Does Christine like her job?',
            'options' => ['Yes', 'No'],
            'correct_answer' => 0,
        ],
        [
            'question' => 'Task 1 – Conversation 3: Does Anna like her new job?',
            'options' => ['Yes', 'No'],
            'correct_answer' => 0,
        ],
        [
            'question' => 'Task 1 – Conversation 4: Does Nancy enjoy being a salesperson?',
            'options' => ['Yes', 'No'],
            'correct_answer' => 0,
        ],
        [
            'question' => 'Task 1 – Conversation 5: Does Martin enjoy working in a restaurant?',
            'options' => ['Yes', 'No'],
            'correct_answer' => 1,
        ],

        // Task 2: What they like / dislike (multiple choice)
        [
            'question' => 'Task 2 – Conversation 1: What does Bill dislike about his job?',
            'options' => ['It is boring and repetitive.', 'His boss is not nice.', 'The pay is low.'],
            'correct_answer' => 0,
        ],
        [
            'question' => 'Task 2 – Conversation 2: What does Christine dislike?',
            'options' => ['Working with children', 'The long distance to school', 'Her coworkers'],
            'correct_answer' => 1,
        ],
        [
            'question' => 'Task 2 – Conversation 3: What does Anna like best?',
            'options' => ['The salary', 'The people she works with', 'The travel'],
            'correct_answer' => 1,
        ],
        [
            'question' => 'Task 2 – Conversation 4: Why does Nancy stay in her job?',
            'options' => ['She has short hours', 'She loves driving', 'Her boss is great to work for'],
            'correct_answer' => 2,
        ],
        [
            'question' => 'Task 2 – Conversation 5: What does Martin like about the restaurant job?',
            'options' => ['The tips', 'The easy work', 'The short shifts'],
            'correct_answer' => 0,
        ],
    ],

    'puzzle' => [
        'instruction' => 'Drag the boxes onto the matching gaps.',
        'activities' => [
            [
                'title' => 'Conversation 1 (Bill)',
                'word_bank' => ['So how', "I don't like it", "It's boring", "well-paid", 'the money', 'maybe I should'],
                'gaps' => [
                    ['sentence' => 'A: {{1}} do you like your job, Bill?', 'correct' => 'So how'],
                    ['sentence' => "B: Well, it was okay at first, but now, after two years, {{2}}.", 'correct' => "I don't like it"],
                    ['sentence' => "B: {{3}}. I do the same thing every day.", 'correct' => "It's boring"],
                    ['sentence' => "B: I'm {{4}}.", 'correct' => 'well-paid'],
                    ['sentence' => 'B: I like {{5}}!', 'correct' => 'the money'],
                    ['sentence' => 'B: Yeah, {{6}}.', 'correct' => 'maybe I should'],
                ],
            ],
            [
                'title' => 'Conversation 2 (Christine)',
                'word_bank' => ['teaching children', 'working with kids', 'one thing', 'distance to school', 'an hour', 'not as good'],
                'gaps' => [
                    ['sentence' => 'A: Do you like {{1}}, Christine?', 'correct' => 'teaching children'],
                    ['sentence' => 'B: Oh, yes! I love {{2}}.', 'correct' => 'working with kids'],
                    ['sentence' => "B: There's just {{3}} I don't like.", 'correct' => 'one thing'],
                    ['sentence' => 'B: The {{4}} is too far away.', 'correct' => 'distance to school'],
                    ['sentence' => 'B: It takes me {{5}} to drive there every day.', 'correct' => 'an hour'],
                    ['sentence' => 'B: The schools near me are {{6}}.', 'correct' => 'not as good'],
                ],
            ],
        ],
    ],
];

?>

@include("slider.game.audio-multi-activities",['content'=>$content])
