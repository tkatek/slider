<?php
$content = [
    'video'          => materialAsset(''),
    'thumbnail'      => materialAsset('slider/B1/Beginner/chapter-4/img/slide17.webp'),
    'isQuiz'         => 1,

    'questions' => [

    ],

    'subtitles' => [
        ['start' => 4,    'end' => 7,    'text' => 'There are some questions on the cards in front of you.'],
        ['start' => 7,    'end' => 10,   'text' => 'In your groups, please answer them together.'],
        ['start' => 13,   'end' => 17,   'text' => 'Okay, Sean. The first question is:'],
        ['start' => 17,   'end' => 21,   'text' => 'What kind of movies do you like?'],
        ['start' => 21,   'end' => 27,   'text' => 'Oh, that’s easy. I love comedy movies and action movies.'],
        ['start' => 27,   'end' => 30,   'text' => 'How about you, Muriel?'],
        ['start' => 30,   'end' => 35,   'text' => 'I prefer horror movies.'],
        ['start' => 35,   'end' => 39,   'text' => 'Why do you like horror movies?'],
        ['start' => 39,   'end' => 45,   'text' => 'Because they’re terrifying. Is that a good thing? For me, it is.'],
        ['start' => 45,   'end' => 50,   'text' => 'I think it’s exciting. How about you, John?'],
        ['start' => 50,   'end' => 58,   'text' => 'I like comedy movies. I saw a really hilarious one recently.'],
        ['start' => 58,   'end' => 62,   'text' => 'To be honest, I prefer reading books.'],
        ['start' => 62,   'end' => 69,   'text' => 'The one I’m reading at the moment is a real page-turner.'],
        ['start' => 69,   'end' => 73,   'text' => 'What’s the next question?'],
        ['start' => 73,   'end' => 77,   'text' => 'What is your favorite kind of music?'],
        ['start' => 77,   'end' => 83,   'text' => 'I like hip-hop because of the rhythm and the lyrics.'],
        ['start' => 83,   'end' => 88,   'text' => 'How about you, Muriel? I enjoy classical music, especially when I’m studying.'],
        ['start' => 88,   'end' => 96,   'text' => 'My favorite classical music was composed by Mozart.'],
        ['start' => 96,   'end' => 100,  'text' => 'How about you, Shawn?'],
        ['start' => 100,  'end' => 105,  'text' => 'My favorite genre is rock.'],
        ['start' => 105,  'end' => 110,  'text' => 'It gives me lots of energy when I go to the gym.'],
        ['start' => 105,  'end' => 110,  'text' => 'Okay, here’s the last question.'],
        ['start' => 110,  'end' => 113,  'text' => 'Do you like art?'],
        ['start' => 113,  'end' => 118,  'text' => 'Sure. It’s always interesting to see new installations at the local gallery.'],
        ['start' => 118,  'end' => 124,  'text' => 'I’m not so interested in paintings.'],
        ['start' => 124,  'end' => 130,  'text' => 'But I think some of the sculptures in the town center are pretty interesting.'],
        ['start' => 130,  'end' => 134,  'text' => 'I’ve seen those. They are really interesting.'],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])