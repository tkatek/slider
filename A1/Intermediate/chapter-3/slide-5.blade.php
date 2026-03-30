<?php
$content=[
    'video' => materialAsset('slider/A1/Intermediate/chapter-3/videos/school-encrypted/school.m3u8'),
    'thumbnail' => materialAsset('slider/A1/Intermediate/chapter-3/images/navigating-the-school.webp'),
    'isQuiz'=>0,//1 show question / 0 don't
    'showTranscript'=>0,//the opposite of quiz
    'questions'=>[

    ],
    'subtitles' => [
        ['start' => 0,  'end' => 2,  'text' => 'Today we learn important places at'],
        ['start' => 2,  'end' => 5,  'text' => 'school. Classroom, library, cafeteria,'],
        ['start' => 5,  'end' => 8,  'text' => 'gym and playground. These are the main'],
        ['start' => 8,  'end' => 10, 'text' => 'areas where students spend their time'],
        ['start' => 10, 'end' => 13, 'text' => 'every day.'],

        ['start' => 13, 'end' => 15, 'text' => 'Classroom is where students learn from'],
        ['start' => 15, 'end' => 17, 'text' => 'teachers. It contains desks for'],
        ['start' => 17, 'end' => 19, 'text' => 'students, chairs and whiteboard for'],
        ['start' => 19, 'end' => 22, 'text' => 'teaching. This is the main place for all'],
        ['start' => 22, 'end' => 26, 'text' => 'lessons and classes.'],

        ['start' => 26, 'end' => 28, 'text' => 'Library is a quiet place to read and'],
        ['start' => 28, 'end' => 30, 'text' => 'study. It contains many books,'],
        ['start' => 30, 'end' => 33, 'text' => 'magazines, and computers for research.'],
        ['start' => 33, 'end' => 35, 'text' => 'Students can borrow books and get help'],
        ['start' => 35, 'end' => 38, 'text' => 'from librarians.'],

        ['start' => 38, 'end' => 41, 'text' => 'Cafeteria is where students get meals'],
        ['start' => 41, 'end' => 43, 'text' => 'and eat lunch. Students serve themselves'],
        ['start' => 43, 'end' => 46, 'text' => 'food from counters. It is also a social'],
        ['start' => 46, 'end' => 51, 'text' => 'place to relax and talk with friends.'],

        ['start' => 51, 'end' => 53, 'text' => 'Gym is for physical education and'],
        ['start' => 53, 'end' => 56, 'text' => 'sports. It contains basketball hoops,'],
        ['start' => 56, 'end' => 58, 'text' => 'exercise mats, and sports equipment.'],
        ['start' => 58, 'end' => 61, 'text' => 'Students exercise and play indoor games'],
        ['start' => 61, 'end' => 64, 'text' => 'here.'],

        ['start' => 64, 'end' => 66, 'text' => 'Playground is the outdoor area for'],
        ['start' => 66, 'end' => 68, 'text' => 'sports and play. It contains swings,'],
        ['start' => 68, 'end' => 71, 'text' => 'slides, and soccer field. Students run,'],
        ['start' => 71, 'end' => 74, 'text' => 'play games, and exercise outside.'],

        ['start' => 76, 'end' => 78, 'text' => 'Librarian is the person who works in the'],
        ['start' => 78, 'end' => 81, 'text' => 'library. Librarians help students find'],
        ['start' => 81, 'end' => 84, 'text' => 'books and information. They also teach'],
        ['start' => 84, 'end' => 89, 'text' => 'how to use library resources properly.'],

        ['start' => 89, 'end' => 91, 'text' => 'Auditorium is a large hall for school'],
        ['start' => 91, 'end' => 93, 'text' => 'events. It has seating for many students'],
        ['start' => 93, 'end' => 96, 'text' => 'and teachers. School uses it for'],
        ['start' => 96, 'end' => 101,'text' => 'assemblies, plays and presentations.'],

        ['start' => 101,'end' => 103,'text' => 'Let us review all the school places.'],
        ['start' => 103,'end' => 105,'text' => 'Classroom for learning, library for'],
        ['start' => 105,'end' => 108,'text' => 'reading, cafeteria for eating, gym for'],
        ['start' => 108,'end' => 111,'text' => 'exercise, playground for outdoor play.'],

        ['start' => 113,'end' => 116,'text' => 'You learned key places at school today.'],
        ['start' => 116,'end' => 118,'text' => 'Practice these words when you visit'],
        ['start' => 118,'end' => 120,'text' => 'these places.'],
    ]

];

?>
@include("slider.video.interactive",['content'=>$content])

