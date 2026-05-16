<?php

$content = [
    'title'       => 'Dialogue Practice',
    'subtitle'    => '',
    'instruction' => 'Type suitable words or phrases in the blanks.',

    'dialogue' => [
        ['speaker' => 'A', 'text' => 'Do you think online education is effective?'],
        ['speaker' => 'B', 'text' => '[answer]'],

        ['speaker' => 'A', 'text' => 'That makes sense. Do you think it requires more [word or phrase] from students?'],
        ['speaker' => 'B', 'text' => 'Definitely. Without good time management, it can be hard to stay [adjective].'],

        ['speaker' => 'A', 'text' => 'I agree. However, having recorded lessons makes it easier to [verb] difficult topics.'],
        ['speaker' => 'B', 'text' => 'Exactly. When used properly, online education can be very [adjective].'],
    ],
];

?>

@include('slider.C2.components.dialogue-fill', ['content' => $content])