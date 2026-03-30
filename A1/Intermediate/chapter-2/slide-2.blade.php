{{-- resources/views/slider/slide-practice.blade.php --}}
<?php
$content = [
    'uid' => 'practice_' . substr(md5(uniqid('', true)), 0, 10),

    'title'    => 'Warm-up',
    'subtitle' => 'True or False',

    'questions'=> [
        [
            'img'     => '🗓️',
            'prompt'  => 'January is the 1st month of the year.',
            'correct' => 'True',
            'options' => ['True', 'False'],
        ],
        [
            'img'     => '🗓️',
            'prompt'  => 'March is the 4th month of the year.',
            'correct' => 'False',
            'options' => ['True', 'False'],
        ],
        [
            'img'     => '🗓️',
            'prompt'  => 'August is the 8th month of the year.',
            'correct' => 'True',
            'options' => ['True', 'False'],
        ],
        [
            'img'     => '🗓️',
            'prompt'  => 'October is the 9th month of the year.',
            'correct' => 'False',
            'options' => ['True', 'False'],
        ],
        [
            'img'     => '🗓️',
            'prompt'  => 'December is the 12th month of the year.',
            'correct' => 'True',
            'options' => ['True', 'False'],
        ],
    ],
];
?>

@extends('slider.simple-layout')

@section('title', $content['title'])

@section('content')
    @include('slider.game.multi-choice-all-in-one', ['content' => $content])
@endsection