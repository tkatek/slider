<?php
$content = [
    'video'      => materialAsset('slider/A2/Beginner/chapter-6/video/life-events-encrypted/life-events.m3u8'),
    'thumbnail'  => materialAsset('slider/A2/Beginner/chapter-6/img/slide5.webp'),
    'isQuiz'     => 0,
    'questions'  => [

    ],
    'subtitles'  => [
        ['start' => 0,  'end' => 3.7,  'text' => 'Major life events in our life'],
        ['start' => 5.5,  'end' => 7,  'text' => 'Be born'],
        ['start' => 8.5,  'end' => 10,  'text' => 'Learn to walk'],
        ['start' => 12,  'end' => 13.5, 'text' => 'Start school.'],
        ['start' => 15.3,  'end' => 17, 'text' => 'Immigrate.'],
        ['start' => 19, 'end' => 21, 'text' => 'Graduate from high school.'],
        ['start' => 22.3, 'end' => 24, 'text' => 'Go to college.'],
        ['start' => 26, 'end' => 28, 'text' => 'Rent an apartment'],
        ['start' => 29.5, 'end' => 31, 'text' => 'Get a job'],
        ['start' => 33, 'end' => 35, 'text' => 'Date'],
        ['start' => 36.5, 'end' => 38, 'text' => 'Fall in love'],
        ['start' => 40, 'end' => 42, 'text' => 'Get engaged'],
        ['start' => 43, 'end' => 44.5, 'text' => 'Get married'],
        ['start' => 46.5, 'end' => 48, 'text' => 'Buy a house.'],
        ['start' => 50, 'end' => 51.5, 'text' => 'Be pregnant.'],
        ['start' => 53.8, 'end' => 55, 'text' => 'Have a baby'],
        ['start' => 57.5, 'end' => 58.5, 'text' => 'Raise a family'],
        ['start' => 60.5, 'end' => 61.5, 'text' => 'Move'],
        ['start' => 64, 'end' => 65.5, 'text' => 'Get sick'],
        ['start' => 67.5, 'end' => 69.5, 'text' => 'Take a vacation.'],
        ['start' => 70.5, 'end' => 72.5, 'text' => 'Celebrate a birthday.'],
        ['start' => 74.5, 'end' => 76.3, 'text' => 'Become a grandparent.'],
        ['start' => 78, 'end' => 79.5, 'text' => 'Retire.'],
        ['start' => 81.5, 'end' => 83, 'text' => 'Travel'],
        ['start' => 85, 'end' => 87, 'text' => 'Die/Pass away'],
        ['start' => 88.5, 'end' => 90, 'text' => 'Infant'],
        ['start' => 91.5, 'end' => 93, 'text' => 'Baby'],
        ['start' => 95, 'end' => 97, 'text' => 'Child'],
        ['start' => 98.5, 'end' => 100, 'text' => 'Teenager'],
        ['start' => 102, 'end' => 104, 'text' => 'Adult'],
        ['start' => 106, 'end' => 108, 'text' => 'Senior citizen'],
    ],
];
?>
@include("slider.video.interactive", ['content' => $content])