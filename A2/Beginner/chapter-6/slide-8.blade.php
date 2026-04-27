<?php
$content = [
    'type' => 'reading',
    'page_title'      => 'Reading Comprehension',
    'title'           => 'Reading Comprehension',
    'subtitle'        => 'Read and answer the questions',
    'reading_title'   => 'My First Day at School',
    'reading_align'   => 'left',
    'reading_plain'   => true,
    'reading_compact' => true,

    'passage' => "I remember my first day at school. My sister Sandy went to the same school. Every day, I saw her at the school gate. She ran out with her friends and carried paintings. I felt jealous because I wanted to paint too. I started school when I was five. I was excited. I wore a new uniform and had a new red bag. My dad took me to school. I was nervous and didn't talk to the other children. In the classroom, many children looked at me, and I started to cry. But later, I felt better. The teacher read us a story, and we drew pictures. At break time, I made a new friend. At the end of the day, I ran to the gate with my picture, just like my sister.",

    'questions' => [
        [
            'prompt'  => 'How did the writer feel on the first day at school? Why?',
            'correct' => 'She felt excited and nervous because it was her first day.',
            'options' => [
                'She felt excited and nervous because it was her first day.',
                'She felt angry because she did not like her teacher.',
                'She felt bored because there was nothing to do.',
                'She felt tired because she walked to school.',
            ],
        ],
        [
            'prompt'  => 'What happened at the end of the school day?',
            'correct' => 'She ran to the gate with her picture, just like her sister.',
            'options' => [
                'She ran to the gate with her picture, just like her sister.',
                'She went home without speaking to anyone.',
                'She cried because she lost her red bag.',
                'She stayed in the classroom with the teacher.',
            ],
        ],
        [
            'prompt'  => 'Why did the writer feel jealous?',
            'correct' => 'Because her sister could paint',
            'options' => [
                'Because she had no friends',
                'Because her sister could paint',
                'Because she didn’t like school',
                'Because she was late',
            ],
        ],
        [
            'prompt'  => 'What did the writer do when the children looked at her?',
            'correct' => 'She cried',
            'options' => [
                'She laughed',
                'She talked to them',
                'She cried',
                'She left the class',
            ],
        ],
        [
            'prompt'  => 'What did the writer do during break time?',
            'correct' => 'She made a friend',
            'options' => [
                'She went home',
                'She made a friend',
                'She slept',
                'She called her dad',
            ],
        ],
    ],
];
?>
@include('slider.game.multi-choice-all-in-one', ['content' => $content])
