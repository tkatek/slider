<?php
$content = [
    'title'    => "Listening",
    'subtitle' => 'Listen to three people talking about text messages. Practice reading the transcript',
    'question_prompt_label' => 'Listen again and write true or false',
    'type' => 'questions_only',
    'image_panel_col_class'  => 'sm:col-span-0',
    'answer_panel_col_class' => 'sm:col-span-12',
    'audio'   => materialAsset("slider/A2/Intermediate/chapter-10/audios/slide8.mp3"),
    'script'  => [
        "I sometimes send text messages, usually to my parents to say when I’m coming home, but I usually chat on social networking sites. It’s easier if you’re online anyway – and it’s cheaper! I always have my phone with me, so I can see what my friends are doing. It’s really good to know what people are doing. I chat to everybody all the time and we send each other pictures.",
        "I only really send text messages when I’m travelling. I text my family to tell them when I arrive somewhere new or tell them when I’ll be back. It’s useful because I’m often away on business trips and of course it’s cheaper than phoning. But usually I don’t send text messages. I prefer to talk to people on the phone. It’s easier and you can say more.",
        "I don’t really like texting much. I think it’s better to talk on the phone. It’s friendlier. I sometimes send a text if I’m meeting a friend, but that’s about all.",

    ],
    'questions' => [
        [
            'prompt'  => "Speaker 1 prefers sending text messages more than chatting online.",
            'correct' => 'False',
            'options' => ['True', 'False'],
        ],
        [
            'prompt'  => "Speaker 1 likes knowing what their friends are doing.",
            'correct' => 'True',
            'options' => ['True', 'False'],
        ],
        [
            'prompt'  => "Speaker 2 often sends text messages when travelling.",
            'correct' => 'True',
            'options' => ['True', 'False'],
        ],
        [
            'prompt'  => "Speaker 2 prefers texting because it is easier to express ideas.",
            'correct' => 'False',
            'options' => ['True', 'False'],
        ],
        [
            'prompt'  => "Speaker 3 thinks texting is friendlier than talking on the phone.",
            'correct' => 'False',
            'options' => ['True', 'False'],
        ],
    ],
];
?>
@include('slider.game.multi-choice-all-in-one', ['content' => $content])
