<?php
$content = [
    'page_title' => 'Learning Objectives',

    'title'    => 'Learning Objectives',
    'subtitle' => 'By the end of this lesson, you can…',

    'outcomes' => [
        [
            'label' => 'Check in at a hotel',
            'text'  => 'I can say: I have a reservation, give my ID, and answer simple questions.',
        ],
        [
            'label' => 'Ask polite questions',
            'text'  => 'I can use Can I…? and Could I…? to ask for help or services.',
        ],
        [
            'label' => 'Ask about hotel services',
            'text'  => 'I can ask about breakfast time, Wi-Fi, parking, or other facilities.',
        ],
        [
            'label' => 'Understand hotel conversations',
            'text'  => 'I can understand simple information like room number, time, and price.',
        ],
        [
            'label' => 'Write a short hotel message',
            'text'  => 'I can write 4–6 sentences to confirm a reservation or ask for information.',
        ],
    ],
];
?>

@include('slider.objectives.objectives-numbered', ['content' => $content])