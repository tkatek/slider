<?php
$content = [
    'page_title' => 'Reading Comprehension',
    'title' => 'Reading Comprehension',
    'subtitle' => '',

    'instruction' => 'Read the text & put the  right adjective in the right column',
    'instruction_note' => '',

    'student_name' => 'Steve, college student',
    'student_text' => 'Well, I am <span class="word-red">tall</span> and <span class="word-red">athletic</span>. I play different sports: basketball, football, and soccer. I have <span class="word-red">brown</span> hair and <span class="word-red">hazel</span> eyes. My friends say I am <span class="word-red">friendly</span> and <span class="word-red">nice</span>. I am very <span class="word-red">open</span>. I love discussing <span class="word-red">interesting</span> ideas and meeting <span class="word-red">new</span> friends.',
    'student_image' => materialAsset('slider/A2/Beginner/chapter-8/img/slide12/sporty.webp'),

    'columns' => [
        ['key' => 'height', 'label' => 'Height'],
        ['key' => 'body', 'label' => 'Body'],
        ['key' => 'hair', 'label' => 'Hair'],
        ['key' => 'skin', 'label' => 'Skin'],
        ['key' => 'eyes', 'label' => 'Eyes'],
        ['key' => 'colors', 'label' => 'Colors'],
        ['key' => 'characters', 'label' => 'Characters'],
        ['key' => 'other', 'label' => 'Other'],
    ],

    'words' => [
        ['id' => 'w1', 'text' => 'tall', 'correct' => ['height']],
        ['id' => 'w2', 'text' => 'athletic', 'correct' => ['body']],
        ['id' => 'w3', 'text' => 'brown', 'correct' => ['hair', 'colors']],
        ['id' => 'w4', 'text' => 'hazel', 'correct' => ['eyes', 'colors']],
        ['id' => 'w5', 'text' => 'friendly', 'correct' => ['characters']],
        ['id' => 'w6', 'text' => 'nice', 'correct' => ['characters']],
        ['id' => 'w7', 'text' => 'open', 'correct' => ['characters']],
        ['id' => 'w8', 'text' => 'different', 'correct' => ['other']],
        ['id' => 'w9', 'text' => 'interesting', 'correct' => ['other']],
        ['id' => 'w10', 'text' => 'new', 'correct' => ['other']],
    ],


];
?>

@include('slider.game.reading-drag-and-drop', ['content' => $content])