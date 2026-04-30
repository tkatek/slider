<?php
$content = [
    'video'     => materialAsset('slider/A1/Advanced/chapter-11/video/comparatives-superlatives-encrypted/comparatives-superlatives.m3u8'),
    'thumbnail' => materialAsset('slider/A1/Advanced/chapter-11/video/adjectives.webp'),

    'isQuiz' => 0,


    'subtitles' => [
        ['start' => 0, 'end' => 4, 'text' => 'Comparative and superlative adjectives.'],

        ['start' => 5, 'end' => 12, 'text' => 'Mount Kilimanjaro is higher than Mount Fuji, but Mount Everest is the highest mountain in the world.'],

        ['start' => 12, 'end' => 23.5, 'text' => 'We use a comparative adjective to compare two things. We use “than” in sentences with comparative adjectives.'],

        ['start' => 24, 'end' => 34, 'text' => 'We use a superlative adjective to compare three or more things. We use “the” before superlative adjectives.'],

        ['start' => 34.5, 'end' => 43, 'text' => 'For many short adjectives, we add -er to make the comparative and -est to make the superlative.'],

        ['start' => 43, 'end' => 46, 'text' => 'Cold, colder, the coldest.'],

        ['start' => 47, 'end' => 53, 'text' => 'When the adjective ends in e, we add -r or -st.'],

        ['start' => 53, 'end' => 57, 'text' => 'Large, larger, the largest.'],

        ['start' => 57, 'end' => 61, 'text' => 'When an adjective ends in one vowel and one consonant,'],

        ['start' => 61, 'end' => 66.5, 'text' => 'we double the consonant and add -er or -est.'],

        ['start' => 66.5, 'end' => 70, 'text' => 'Wet, wetter, the wettest.'],

        ['start' => 70, 'end' => 79.2, 'text' => 'When the adjective ends in one consonant and y, we change the y to i and add -er or -est.'],

        ['start' => 79.5, 'end' => 84, 'text' => 'Cloudy, cloudier, the cloudiest.'],

        ['start' => 85, 'end' => 92, 'text' => 'For long adjectives, we form the comparative with more and the superlative with.'],

        ['start' => 92, 'end' => 98.5, 'text' => 'Most dangerous, more dangerous, the most dangerous.'],

        ['start' => 99, 'end' => 104, 'text' => 'Remember that some adjectives are irregular.'],

        ['start' => 104, 'end' => 110, 'text' => 'Good, better, the best. Bad, worse, the worst.'],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])