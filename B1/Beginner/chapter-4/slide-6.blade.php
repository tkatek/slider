<?php
$content = [
    'video'          => materialAsset(''),
    'thumbnail'      => materialAsset('slider/B1/Beginner/chapter-4/img/slide6.webp'),
    'isQuiz'         => 0,

    'questions' => [
        [
            'time' => 32800,
            'type' => 'multiple_choice',
            'question' => 'What kind of movies make people laugh?',
            'options' => [
                'Horror movies',
                'Comedies',
                'Action movies',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 76000,
            'type' => 'multiple_choice',
            'question' => 'What does a stuntman do?',
            'options' => [
                'Writes movie stories',
                'Performs dangerous scenes',
                'Sells movie tickets',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 111800,
            'type' => 'multiple_choice',
            'question' => 'What is a trailer?',
            'options' => [
                'The movie ending',
                'A short preview of a movie',
                'A movie review',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 100200,
            'type' => 'fill_blank',
            'question' => 'A documentary shows real people and __________.',
            'correct_answer' => 'events',
            'points' => 10,
        ],
        [
            'time' => 107800,
            'type' => 'fill_blank',
            'question' => 'The plot is the main __________ of a movie.',
            'correct_answer' => 'story',
            'points' => 10,
        ],
    ],

    'subtitles' => [
        ['start' => 0,    'end' => 4,    'text' => 'What do you usually do in your free time?'],
        ['start' => 4.5,  'end' => 7,    'text' => 'We like watching movies!'],
        ['start' => 8,    'end' => 12.5, 'text' => 'Movies can be divided into several different genres.'],
        ['start' => 13,   'end' => 18,   'text' => 'There are exciting action movies with gun fights and car chases.'],
        ['start' => 18.8, 'end' => 23,   'text' => 'Horror movies make us jump in our seats.'],
        ['start' => 24,   'end' => 28.5, 'text' => 'There are comedies that make us laugh, and dramas that make us cry.'],
        ['start' => 30,   'end' => 36,   'text' => 'Sci-fi movies show us what the future might be like.'],
        ['start' => 36.5, 'end' => 41.5, 'text' => 'Historical films tell us stories from the past.'],
        ['start' => 42.5, 'end' => 47,   'text' => 'Documentaries show us real people and events.'],
        ['start' => 48.5, 'end' => 54,   'text' => 'We like to see our favorite actors in lead roles, or main roles.'],
        ['start' => 54.5, 'end' => 60,   'text' => 'We also like to see actors in supporting roles, which are not main roles.'],
        ['start' => 61,   'end' => 68,   'text' => 'If a character is involved in a dangerous scene, a stuntman is used instead of the actor.'],
        ['start' => 69.5, 'end' => 77,   'text' => 'Extras are the actors who play people in a crowd, often without a speaking part.'],
        ['start' => 78,   'end' => 86,   'text' => 'We like reading the film credits, to see who’s in the cast.'],
        ['start' => 86.5, 'end' => 94,   'text' => 'We also check if there’s a special appearance by a famous actor who is only in the film for a couple of minutes.'],
        ['start' => 95,   'end' => 102,  'text' => 'Then we like to see who the director, producer, and screenwriter are.'],
        ['start' => 102.5,'end' => 107,  'text' => 'We also like to know who composed the soundtrack.'],
        ['start' => 108,  'end' => 114,  'text' => 'We read film reviews to find out more about the plot, or storyline.'],
        ['start' => 115,  'end' => 122,  'text' => 'We watch a trailer, a short extract from the film, to see the special effects.'],
        ['start' => 123,  'end' => 130,  'text' => 'Finally, here are some useful words and phrases dealing with cinematography.'],
        ['start' => 131,  'end' => 139,  'text' => "Subscribe to our channel if you like this video and don't forget to give it a big thumbs up."],
        ['start' => 140,  'end' => 142,  'text' => 'Have a nice day!'],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])