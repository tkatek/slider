<?php
$content = [
    'badge'     => 'Discussion',
    'title'     => 'Discussion: Practice 2',
    'subtitle'     => 'What do you do to be in good shape?',
    'questions' => [
        'What do you do every day to stay healthy?',
        'How often do you eat fast food?',
        'How often do you eat fast food?',
        'Do you do any sports?',
        'How do you deal with stress?',
        'For how many hours do you sleep a day?',
        'Is it important to exercise? Why?',
    ],
];
?>

@include('slider.game.spin-wheel', ['content' => $content])