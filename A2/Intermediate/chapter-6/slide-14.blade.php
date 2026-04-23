<?php
$content = [
    'page_title' => 'Reading Comprehension',
    'title' => 'Reading Comprehension',
    'subtitle' => 'Read the passage & choose the correct verb',
    'type' => 'reading',
    'sentences' => [
        'I had a terrible journey. I {{1}} to the train station and it started raining.',
        'And then the train was twenty minutes late. When it {{2}}, I {{3}} a seat by the window.',
        'Some girls {{4}} music on their mobiles, but it was great music.',
        'That was OK, but I {{5}} my book when the train {{6}} at the next station.',
        'Two people got on and a man {{7}} down next to me and he started talking loudly on his mobile.',
        'He {{8}} someone about his new car, his job - everything!',
        'He was still talking when the train {{9}} in to the station.',
    ],
    'answers' => [
        'was walking',
        'came',
        'found',
        'were playing',
        'was reading',
        'arrived',
        'sat',
        'was telling',
        'got',
    ],
];

?>
@include('slider.game.drag-and-drop-blanks-v2', ['content' => $content])
