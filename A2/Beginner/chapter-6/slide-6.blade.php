<?php
$content = [
    'video'      => materialAsset('slider/A2/Beginner/chapter-6/video/'),
    'thumbnail'  => materialAsset('slider/A2/Beginner/chapter-6/img/slide5.webp'),
    'isQuiz'     => 0,
    'questions'  => [

    ],
    'subtitles'  => [
        ['start' => 0,  'end' => 2,  'text' => 'Life events'],
        ['start' => 2,  'end' => 5,  'text' => 'Be born'],
        ['start' => 5,  'end' => 6,  'text' => 'To walk'],
        ['start' => 6,  'end' => 12, 'text' => 'Start school. Emigrate.'],
        ['start' => 12, 'end' => 17, 'text' => 'Graduate from high school. Go to college.'],
        ['start' => 17, 'end' => 19, 'text' => 'Rent an apartment'],
        ['start' => 19, 'end' => 22, 'text' => 'Get a job'],
        ['start' => 22, 'end' => 24, 'text' => 'Date'],
        ['start' => 24, 'end' => 27, 'text' => 'Fall in love'],
        ['start' => 27, 'end' => 29, 'text' => 'Get engaged'],
        ['start' => 29, 'end' => 31, 'text' => 'Get married'],
        ['start' => 31, 'end' => 36, 'text' => 'Buy a house. Be pregnant.'],
        ['start' => 36, 'end' => 39, 'text' => 'Have a baby'],
        ['start' => 39, 'end' => 42, 'text' => 'Raise a family'],
        ['start' => 42, 'end' => 44, 'text' => 'Move'],
        ['start' => 44, 'end' => 47, 'text' => 'Get sick'],
        ['start' => 47, 'end' => 51, 'text' => 'Take a vacation. Celebrate a birthday.'],
        ['start' => 51, 'end' => 57, 'text' => 'Become a grandparent. Retire.'],
        ['start' => 57, 'end' => 59, 'text' => 'Travel'],
        ['start' => 59, 'end' => 61, 'text' => 'Die'],
        ['start' => 61, 'end' => 64, 'text' => 'Pass away'],
        ['start' => 64, 'end' => 67, 'text' => 'Infant'],
        ['start' => 67, 'end' => 69, 'text' => 'Baby'],
        ['start' => 69, 'end' => 72, 'text' => 'Child'],
        ['start' => 72, 'end' => 74, 'text' => 'Teenager'],
        ['start' => 74, 'end' => 77, 'text' => 'Adult'],
        ['start' => 77, 'end' => 80, 'text' => 'Senior citizen'],
    ],
];
?>
@include("slider.video.interactive", ['content' => $content])