<?php
$content = [
    'video'      => materialAsset(''),
    'thumbnail'  => materialAsset('slider/B1/Beginner/chapter-2/img/slide6.webp'),
    'isQuiz'     => 0,
    'subtitles'  => [
        ['start' => 0,    'end' => 3,    'text' => 'When Jake found a shivering stray on the roadside,'],
        ['start' => 3,    'end' => 5.5,  'text' => 'he named her Hope.'],
        ['start' => 5.5,  'end' => 7,    'text' => 'He gently nursed her back to health, and'],

        ['start' => 7,    'end' => 10,   'text' => 'soon she was his little shadow,'],
        ['start' => 10,   'end' => 13,   'text' => 'a constant companion on every walk'],
        ['start' => 13,   'end' => 16,   'text' => 'and every quiet evening at home. Hope wasn\'t'],

        ['start' => 16,   'end' => 18.5, 'text' => 'just a pet.'],
        ['start' => 18.5, 'end' => 21.5, 'text' => 'She was a friend with a heartbeat,'],
        ['start' => 21.5, 'end' => 23.5, 'text' => 'a furry reminder of the good in the world.'],
        ['start' => 23.5, 'end' => 25,   'text' => 'One morning, during his usual jog, Jake suddenly collapsed.'],

        ['start' => 25,   'end' => 28,   'text' => 'Before anyone else even noticed,'],
        ['start' => 28,   'end' => 30.5, 'text' => 'Hope sprang into action.'],
        ['start' => 30.5, 'end' => 33,   'text' => 'She raced to the nearest house, barking relentlessly'],
        ['start' => 33,   'end' => 35,   'text' => 'until the door opened and help was called.'],

        ['start' => 35,   'end' => 38.5, 'text' => 'The doctors later said that Jake had been'],
        ['start' => 38.5, 'end' => 42,   'text' => 'just minutes away from a life-threatening event.'],
        ['start' => 42,   'end' => 44.5, 'text' => 'Hope didn\'t just find a home that day she was rescued.'],

        ['start' => 44.5, 'end' => 47,   'text' => 'In the end, she saved the very man'],
        ['start' => 47,   'end' => 50,   'text' => 'who once saved her.'],
        ['start' => 50,   'end' => 53,   'text' => 'It\'s a beautiful reminder that sometimes'],
        ['start' => 53,   'end' => 56,   'text' => 'the kindness you put out into the world'],
        ['start' => 56,   'end' => 58.5, 'text' => 'comes back to you,'],
        ['start' => 58.5, 'end' => 61,   'text' => 'often with four paws and a whole lot of love.'],
        ['start' => 61,   'end' => 65,   'text' => 'Have a wonderful week everyone'],
        ['start' => 65,   'end' => 69,   'text' => 'and don\'t forget to like and subscribe for more stories.'],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])