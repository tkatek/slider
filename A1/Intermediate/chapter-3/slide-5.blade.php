<?php
$content=[
    'video' => materialAsset('slider/A1/Intermediate/chapter-3/videos/school-encrypted/school.m3u8'),
    'thumbnail' => materialAsset('slider/A1/Intermediate/chapter-3/images/navigating-the-school.webp'),
    'isQuiz'=>0,//1 show question / 0 don't
    'showTranscript'=>0,//the opposite of quiz
    'questions'=>[

    ],
    'subtitles' => [
        ['start' => 0,  'end' => 3,  'text' => 'Today we learn important places at school.'],
        ['start' => 6.5,  'end' => 8,  'text' => 'Classroom'],
        ['start' => 8.5,  'end' => 10,  'text' => 'library'],
        ['start' => 11.5,  'end' => 13,  'text' => 'Cafeteria'],
        ['start' => 14.5,  'end' => 16,  'text' => 'Gym'],
        ['start' => 17.5,  'end' => 18.5,  'text' => 'and playground'],
        ['start' => 20.5,  'end' => 24, 'text' => 'These are the main areas where students spend their time every day'],
        ['start' => 25, 'end' => 29, 'text' => 'Classroom is where students learn from teachers'],
        ['start' => 30, 'end' => 32, 'text' => 'It contains desks for students'],
        ['start' => 32.5, 'end' => 35.5, 'text' => 'Chairs and whiteboard for teaching'],
        ['start' => 38, 'end' => 42, 'text' => 'This is the main place for all lessons and classes.'],

        ['start' => 43, 'end' => 46, 'text' => 'Library is a quiet place to read and study'],
        ['start' => 47, 'end' => 49, 'text' => 'It contains many books'],
        ['start' => 49, 'end' => 50, 'text' => 'Magazines.'],
        ['start' => 51.2, 'end' => 53.5, 'text' => 'and computers for research.'],
        ['start' => 55.5, 'end' => 59, 'text' => 'Students can borrow books and get help from librarians'],

        ['start' => 60, 'end' => 64, 'text' => 'Cafeteria is where students get meals and eat lunch.'],
        ['start' => 65.5, 'end' => 69, 'text' => 'Students serve themselves food from counters'],
        ['start' => 69, 'end' => 73, 'text' => 'It is also a social place to relax and talk with friends.'],

        ['start' => 74.7, 'end' => 78, 'text' => 'Gym is for physical education and sports'],
        ['start' => 79, 'end' => 81, 'text' => 'It contains basketball hoops'],
        ['start' => 82, 'end' => 85.5, 'text' => 'exercise mats, and sports equipment'],
        ['start' => 87.5, 'end' => 90, 'text' => 'Students exercise and play indoor games here'],

        ['start' => 92.7,  'end' => 96, 'text' => 'Playground is the outdoor area for sports and play.'],
        ['start' => 96.7,  'end' => 102, 'text' => 'It contains swings, slides, and soccer field.'],
        ['start' => 103,  'end' => 108,'text' => 'Students run, play games, and exercise outside.'],

        ['start' => 109.5, 'end' => 113,'text' => 'Librarian is the person who works in the library.'],
        ['start' => 113.5, 'end' => 117,'text' => 'Librarians help students find books and information.'],
        ['start' => 117, 'end' => 121,'text' => 'They also teach how to use library resources properly.'],

        ['start' => 122, 'end' => 126,'text' => 'Auditorium is a large hall for school events.'],
        ['start' => 127.7, 'end' => 131,'text' => 'It has seating for many students and teachers.'],
        ['start' => 131.5, 'end' => 137,'text' => 'School uses it for assemblies, plays and presentations.'],

        ['start' => 140, 'end' => 143,'text' => 'Let us review all the school places.'],
        ['start' => 143.5, 'end' => 145.5,'text' => 'Classroom for learning'],
        ['start' => 147, 'end' => 149,'text' => 'library for reading'],
        ['start' => 150, 'end' => 152,'text' => 'Cafeteria for eating'],
        ['start' => 154, 'end' => 156,'text' => 'Gym for exercise,'],
        ['start' => 157, 'end' => 160,'text' => 'playground for outdoor play.'],

        ['start' => 163, 'end' => 166,'text' => 'You learned key places at school today.'],
        ['start' => 166, 'end' => 169,'text' => 'Practice these words when you visit these places.'],
    ]

];

?>
@include("slider.video.interactive",['content'=>$content])