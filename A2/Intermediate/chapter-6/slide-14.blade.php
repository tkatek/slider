<?php
$content = [
    'page_title' => 'Reading Comprehension',
    'title' => 'Reading Comprehension',
    'compact_layout' => true,
    'subtitle' => '',
    'question_prompt_label' => 'Read the passage and choose the correct verb.',


    'questions' => [
        [
            'segments' => [
                'I had a terrible journey. I ',
                ['answer' => 'was walking', 'wrong' => 'walked'],
                ' to the train station and it started raining. And then the train was twenty minutes late. When it ',
                ['answer' => 'came', 'wrong' => 'was coming'],
                ', I ',
                ['answer' => 'found', 'wrong' => 'was finding'],
                ' a seat by the window. Some girls ',
                ['answer' => 'were playing', 'wrong' => 'played'],
                ' music on their mobiles, but it was great music. That was OK, but I ',
                ['answer' => 'was reading', 'wrong' => 'read'],
                ' my book when the train ',
                ['answer' => 'arrived', 'wrong' => 'was arriving'],
                ' at the next station. Two people got on and a man ',
                ['answer' => 'sat', 'wrong' => 'was sitting'],
                ' down next to me and he started talking loudly on his mobile. He ',
                ['answer' => 'was telling', 'wrong' => 'told'],
                ' someone about his new car, his job - everything! He was still talking when the train ',
                ['answer' => 'got', 'wrong' => 'was getting'],
                ' in to the station.',
            ],
        ],
    ],
];
?>

@include("slider.game.dropdown-blanks", ['content' => $content])
