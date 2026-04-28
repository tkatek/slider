<?php
$content = [
    'mode' => 'choice_table',
    'page_title' => 'Listening task',
    'title' => 'Practice 5: Listening',
    'subtitle' => '',
    'instruction' => 'People are describing other people. Are they describing age, height, or hair? Listen and check (✓) the correct column',
    'instruction_note' => '',
    'audio' => materialAsset('slider/A2/Beginner/chapter-7/audios/slide12/listening.mpeg'),

    'transcript' => [
        'So is your boss young? He’s in his thirties, I guess. About 35.',
        'It’s pretty long. What color is it? It’s light brown. And it’s a little curly.',
        'He’s really not very tall, about 5 feet 8 inches. Oh yeah. That’s not so tall.',
        'He looks about 17. No, he’s older than that. He’s almost 25. No, I don’t believe it. He doesn’t look that old.',
        'She likes to wear it really short. Yeah? And is it straight or curly? Curly. Really curly. You can’t miss her when you see her.',
        'Is she short? No, she’s really tall. About 6 feet.',
        'Is she in her teens or her twenties? I think she’s in her twenties. She’s really nice. Do you want to meet her? Yeah, sure.',
        'It’s not very long but it is very straight. And sometimes it’s green! Green! Yeah. He sings in a rock band, I think.',
    ],

    'row_heading' => 'Number',

    'options' => [
        'age' => 'Age',
        'height' => 'Height',
        'hair' => 'Hair',
    ],

    'rows' => [
        ['number' => 1, 'item' => '', 'correct' => 'age'],
        ['number' => 2, 'item' => '', 'correct' => 'hair'],
        ['number' => 3, 'item' => '', 'correct' => 'height'],
        ['number' => 4, 'item' => '', 'correct' => 'age'],
        ['number' => 5, 'item' => '', 'correct' => 'hair'],
        ['number' => 6, 'item' => '', 'correct' => 'height'],
        ['number' => 7, 'item' => '', 'correct' => 'age'],
        ['number' => 8, 'item' => '', 'correct' => 'hair'],
    ],
];
?>

@include('slider.game.listening-table', ['content' => $content])