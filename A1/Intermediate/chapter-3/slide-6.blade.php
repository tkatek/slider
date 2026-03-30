<?php
$content = [
    'page_title' => 'New Vocabulary',
    'title'      => 'New Vocabulary',
    'subtitle'   => '',

    'grid_class' => 'grid-cols-2 sm:grid-cols-2 lg:grid-cols-5',

    'items' => [

        [
            'text' => 'Classroom',
            'subtitle' => 'Is where students learn from teachers. It contains desks for students, chairs and whiteboard for teaching. This is the main place for all lessons and classes',
            'emoji' => '🏫',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-3/audios/slide-7-classroom.mp3'),
            'image' => materialAsset('slider/A1/Intermediate/chapter-3/images/slide-7-classroom.webp'),
        ],

        [
            'text' => 'Library',
            'subtitle' => 'Is a quiet place to read and study. It contains many books, magazines, and computers for research. Students can borrow books and get help from librarians.',
            'emoji' => '📚',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-3/audios/slide-7-library.mp3'),
            'image' => materialAsset('slider/A1/Intermediate/chapter-3/images/slide-7-library.webp'),
        ],

        [
            'text' => 'Cafeteria',
            'subtitle' => 'Is where students get meals and eat lunch. Students serve themselves food from counters. It is also a social place to relax and talk with friends.',
            'emoji' => '🍽️',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-3/audios/slide-7-cafeteria.mp3'),
            'image' => materialAsset('slider/A1/Intermediate/chapter-3/images/slide-7-cafeteria.webp'),
        ],

        [
            'text' => 'Gym',
            'subtitle' => 'Is for physical education and sports. It contains basketball hoops, exercise mats, and sports equipment. Students exercise and play indoor games.',
            'emoji' => '🏀',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-3/audios/slide-7-gym.mp3'),
            'image' => materialAsset('slider/A1/Intermediate/chapter-3/images/slide-7-gym.webp'),
        ],

        [
            'text' => 'Playground',
            'subtitle' => 'Playground is the outdoor area for sports and play. It contains swings, slides, and soccer field. Students run,play games, and exercise outside.',
            'emoji' => '🛝',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-3/audios/slide-7-playground.mp3'),
            'image' => materialAsset('slider/A1/Intermediate/chapter-3/images/slide-7-playground.webp'),
        ],

        [
            'text' => 'Librarian',
            'subtitle' => 'Help students find books and information. They also teach how to use library resources properly',
            'emoji' => '👩‍💼',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-3/audios/slide-8-librarian.mp3'),
            'image' => materialAsset('slider/A1/Intermediate/chapter-3/images/slide-8-librarian.webp'),
        ],

        [
            'text' => 'Auditorium',
            'subtitle' => 'Is a large hall for school events. It has seating for many students and teachers. School uses it for assemblies, plays and presentations',
            'emoji' => '🎭',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-3/audios/slide-8-auditorium.mp3'),
            'image' => materialAsset('slider/A1/Intermediate/chapter-3/images/slide-8-auditorium.webp'),
        ],

        [
            'text' => 'Principal',
            'subtitle' => 'The one who leads and manages the school.',
            'emoji' => '👨‍🏫',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-3/audios/slide-8-principal.mp3'),
            'image' => materialAsset('slider/A1/Intermediate/chapter-3/images/slide-8-principal.webp'),
        ],

        [
            'text' => 'Homeroom Teacher',
            'subtitle' => 'He guides and supports a certain class every day.',
            'emoji' => '🧑‍🏫',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-3/audios/slide-8-homeroom-teacher.mp3'),
            'image' => materialAsset('slider/A1/Intermediate/chapter-3/images/slide-8-homeroom-teacher.webp'),
        ],

        [
            'text' => 'Guidance Counsellor',
            'subtitle' => 'Helps students with their future plans',
            'emoji' => '🧠',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-3/audios/slide-8-guidance-counsellor.mp3'),
            'image' => materialAsset('slider/A1/Intermediate/chapter-3/images/slide-8-guidance-counsellor.webp'),
        ],

    ],
];
?>

@include("slider.vocab.image-card", ['content' => $content])