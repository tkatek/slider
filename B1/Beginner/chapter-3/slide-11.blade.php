<?php
$content = [
    'title'    => 'Listening',
    'subtitle' => 'People are apologizing. What are they apologizing for?<br> Listen and circle the correct answer.',
    'type'     => 'audio',

    'audio' => materialAsset('slider/B1/Beginner/chapter-3/audios/slide11.mp3'),

    'image_panel_col_class'  => 'sm:col-span-0',
    'answer_panel_col_class' => 'sm:col-span-12',

    'script' => [
        '1',
        'A: Oh, I’m so sorry. I didn’t mean to hit you.',
        'B: Don’t worry about it. It’s just a little scratch.',
        'A: Here, let me give you my insurance information.',
        'B: That’s okay. It’s a really old car. It has dozens of dents and scratches already.',

        '2',
        'A: So, what did you do this weekend, Carrie?',
        'B: Well, I went out to dinner at Sabrina’s with my family on Saturday night.',
        'A: Wow, Sabrina’s! It’s such a nice restaurant. What was the occasion?',
        'B: Um, it was my birthday.',
        'A: Oh, no! Did I forget again this year? I feel terrible. It won’t happen again.',
        'B: That’s all right. I always forget people’s birthdays.',

        '3',
        'A: Hi, Gina. I don’t want to bother you. I just came by to see if you’re finished with that CD I loaned you.',
        'B: Oh, sure. Come on in, and I’ll get it... Let’s see, I had it in my book bag... Uh-oh.',
        'A: Is something wrong?',
        'B: I can’t find it. I must have lost it this morning. I’m sorry.',
        'A: Oh, well, that’s all right.',
        'B: I’ll go buy you a new copy right now.',
    ],

    'questions' => [
        [
            'prompt'  => 'What is he apologizing for?',
            'correct' => 'He hit her car.',
            'options' => [
                'He hit her car.',
                'He scratched her bicycle.',
            ],
        ],
        [
            'prompt'  => 'What is he apologizing for?',
            'correct' => 'He forgot her birthday.',
            'options' => [
                'He forgot their date.',
                'He forgot her birthday.',
            ],
        ],
        [
            'prompt'  => 'What is she apologizing for?',
            'correct' => 'She lost his CD.',
            'options' => [
                'She left his CD at school.',
                'She lost his CD.',
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])