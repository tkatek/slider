<?php
$content = [
    'title' => 'Listening',
    'subtitle' => 'Practice the conversation',

    'instruction' => 'Listen to the conversation',
    'instruction_note' => 'Write the missing words',

    'audio' => materialAsset('slider/A2/Beginner/chapter-8/audios/slide15/practice.mpeg'),

    'transcript' => [
        'A: So, tell me about your new neighbor.',
        'B: He’s really funny and nice. And we found out we have a lot in common.',
        'A: Oh, really? Like what?',
        'B: Well, he’s about the same age as I am. And he used to live in the same neighborhood as I did in New York.',
        'A: Wow! What kinds of things does he like to do?',
        'B: He told me that he always plays soccer on Saturdays. And he likes to go hiking and bike riding. And he loves movies.',
    ],

    'lines' => [
        [
            'speaker' => 'A',
            'parts' => [
                ['text' => 'So, tell me about your new neighbor.'],
            ],
        ],
        [
            'speaker' => 'B',
            'parts' => [
                ['text' => 'He’s really '],
                ['blank' => true, 'answer' => 'funny'],
                ['blank' => true, 'answer' => 'and'],
                ['blank' => true, 'answer' => 'nice'],
                ['text' => '. And we found out we have a lot in common.'],
            ],
        ],
        [
            'speaker' => 'A',
            'parts' => [
                ['text' => 'Oh, really? Like what?'],
            ],
        ],
        [
            'speaker' => 'B',
            'parts' => [
                ['text' => 'Well, he’s about the same age '],
                ['blank' => true, 'answer' => 'as'],
                ['blank' => true, 'answer' => 'I'],
                ['blank' => true, 'answer' => 'am'],
                ['text' => '. And he used to live in the same neighborhood as I did in New York.'],
            ],
        ],
        [
            'speaker' => 'A',
            'parts' => [
                ['text' => 'Wow! What kinds of things does he like to do?'],
            ],
        ],
        [
            'speaker' => 'B',
            'parts' => [
                ['text' => 'He told me that '],
                ['blank' => true, 'answer' => 'he'],
                ['blank' => true, 'answer' => 'always'],
                ['blank' => true, 'answer' => 'plays'],
                ['text' => ' soccer on Saturdays. And he likes to go hiking and bike riding. And he loves movies.'],
            ],
        ],
    ],


];
?>

@include('slider.game.listening-missing-word', ['content' => $content])
