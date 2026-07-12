<?php

$content = [
    'title'    => 'True or False',
    'subtitle' => '',
    'type'     => 'audio',

    'audio' => materialAsset(
        'slider/B1/Advanced/chapter-1/audios/slide17.mp3'
    ),

    'image_panel_col_class'  => 'sm:col-span-0',
    'answer_panel_col_class' => 'sm:col-span-12',

    'script' => [
        'Beautician: Hi! How can I help you today?',
        "Customer: I'd like to get my hair trimmed a little. Just a basic trim.",
        "Beautician: Today's special includes a shampoo, haircut, styling, and a back massage for only $9.99.",
        "Customer: I don't have much time, but... okay. I'll have the complete service. Just don't cut too much.",
        "Beautician: No problem. Relax. You're in good hands.",
        "Customer: You know what you're doing, right?",
        "Beautician: Of course! Relax. So, what do you do?",
        "Customer: I'm a lawyer, and I have an important job interview today.",
        'Beautician: Oops...',
        'Customer: Oops? What do you mean "oops"? Can I see a mirror?',
        "Beautician: Nothing to worry about. I'm just making a few adjustments.",
        'Customer: Ow! That hurt! Look at all my hair on the floor!',
        'Beautician: Time for the shampoo. Lean back and relax.',
        "Customer: You mean what's left of my hair?",
        "Beautician: Relax. I'm almost finished.",
        "Customer: You got shampoo in my eyes! I can't see!",
        "Beautician: All done! Now let's dry your hair... and... voilà!",
        "Customer: What happened to my hair? You butchered it! It's too short—and it's purple! Are you even a licensed beautician?",
        "Beautician: We offer a money-back guarantee if you're not satisfied.",
        "Customer: I'm definitely not satisfied! I want to speak to the manager.",
        "Beautician: I'm sorry. He's on vacation.",
        'Customer: I have a job interview today! Is there anywhere in this town that can fix this?',
        'Beautician: My brother works next door...',
        "Customer: No thanks! I've had enough!",
    ],

    'questions' => [
        [
            'prompt'  => 'The customer wants a completely new hairstyle.',
            'correct' => '🔴 False',
            'options' => [
                '🟢 True',
                '🔴 False',
            ],
        ],
        [
            'prompt'  => 'The customer has an important job interview.',
            'correct' => '🟢 True',
            'options' => [
                '🟢 True',
                '🔴 False',
            ],
        ],
        [
            'prompt'  => 'The beautician accidentally hurts the customer.',
            'correct' => '🟢 True',
            'options' => [
                '🟢 True',
                '🔴 False',
            ],
        ],
        [
            'prompt'  => "The customer's hair turns purple.",
            'correct' => '🟢 True',
            'options' => [
                '🟢 True',
                '🔴 False',
            ],
        ],
        [
            'prompt'  => 'The manager is available.',
            'correct' => '🔴 False',
            'options' => [
                '🟢 True',
                '🔴 False',
            ],
        ],
    ],
];

?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])