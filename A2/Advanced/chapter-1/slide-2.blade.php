<?php
$content = [
    'page_title' => '',

    'title'    => 'Learning Objectives',
    'subtitle' => 'By the end of the lesson, students will be able to:',
    'cards_grid' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-2',

    'outcomes' => [
        [
            'label' => 'Vocabulary',
            'text'  => 'Use common adjectives to describe jobs <br> (interesting, boring, difficult, easy) <br><br>
                        Use: <br>
                        • like / love / hate / don’t mind <br>
                        • because to give reasons <br>
                        • but to show contrast',
        ],
        [
            'label' => 'Express opinions about jobs',
            'text'  => 'Use: <br>
                • like / love / hate / don’t mind ',
        ],
        [
            'label' => 'Listening',
            'text'  => 'Identify: <br>
                        • job type <br>
                        • opinion (like / don’t like) <br>
                        • reason',
        ],
        [
            'label' => 'Writing',
            'text'  => 'Write a short paragraph (4–5 sentences) about a job: <br>
                        • what it is <br>
                        • like/dislike <br>
                        • reason <br>
                        • contrast',
        ],
    ],
];
?>

@include('slider.objectives.objectives-numbered', ['content' => $content])