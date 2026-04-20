<?php
$content = [
    'type'       => 'audio',
    'page_title' => 'Listening',
    'title'      => 'Listening',
    'subtitle'   => 'Listen to two people talking about what they are doing and choose the correct answers.',

    'audio'      => materialAsset('slider/A1/Advanced/chapter-10/audios/slide12/listening.mpeg'),

    'script' => [
        'MUM: Hi Jack, how are you doing?',
        "JACK: Hi Mum. We're OK. How are you and Dad?",
        "MUM: We're fine. Your dad is washing his car in the garage and listening to music, and I'm studying Japanese.",
        'JACK: Why are you studying Japanese?',
        'MUM: Because we want to travel to Japan next year, and I want to learn some phrases.',
        "JACK: Cool! I didn't know that.",
        'MUM: What about you? What are you all doing?',
        "JACK: Well, we decided to stay home all day today and relax, so that's what we are doing.",
        "MUM: Aren't the children doing their homework?",
        'JACK: No, they finished all their homework yesterday. Emily is watching TV in the living room and eating popcorn.',
        'MUM: What is she watching?',
        "JACK: I'm not sure. I guess she's watching some comedy because she is laughing.",
        'MUM: What about Daniel?',
        "JACK: He's in the kitchen making lunch.",
        'MUM: What is he cooking?',
        "JACK: He's making a new pasta recipe he found on the internet. I think he's cooking it with carrots and chicken.",
        'MUM: How nice to have a 12-year-old chef at home!',
        "JACK: Yes, it's great that he loves cooking!",
        "MUM: And what's Anna doing?",
        "JACK: Anna is outside in the garden. She's planting some vegetables.",
        "MUM: I didn't know she liked that.",
        "JACK: She didn't, but she's watching a TV show about organic food and vegetable gardening these days, and she loves it.",
        "MUM: That's nice. If you grow vegetables, Daniel can use them for his recipes.",
        'JACK: Of course.',
        'MUM: And what are you doing?',
        "JACK: I'm having some tea and watching some old recordings on my computer.",
        'MUM: What recordings?',
        'JACK: Videos of Emily and Daniel when they were little.',
        'MUM: Oh. How cute!',
        'JACK: Yes! It seems it was yesterday.',
        "MUM: OK, Jack, have a fun day. I'm going back to learning Japanese.",
        'JACK: You too, mum. Bye!',
        'MUM: Bye!',
    ],

    'questions' => [
        [
            'prompt'  => "What is Jack's dad doing?",
            'correct' => "He's listening to music.",
            'options' => [
                "He's listening to music.",
                "He's repairing his car.",
                "He's learning a language.",
            ],
        ],
        [
            'prompt'  => "What is Jack's mum doing?",
            'correct' => "She's learning a language.",
            'options' => [
                "She's listening to music.",
                "She's washing their car.",
                "She's learning a language.",
            ],
        ],
        [
            'prompt'  => 'What is Emily doing?',
            'correct' => "She's laughing.",
            'options' => [
                "She's doing homework.",
                "She's laughing.",
                "She's watching sports.",
            ],
        ],
        [
            'prompt'  => 'What is Daniel doing?',
            'correct' => "He's cooking.",
            'options' => [
                "He's doing homework.",
                "He's on the internet.",
                "He's cooking.",
            ],
        ],
        [
            'prompt'  => 'What is Anna doing?',
            'correct' => "She's gardening.",
            'options' => [
                "She's gardening.",
                "She's watching TV.",
                "She's cooking.",
            ],
        ],
        [
            'prompt'  => 'What is Jack doing?',
            'correct' => "He's working on his computer.",
            'options' => [
                "He's watching videos.",
                "He's working on his computer.",
                "He's studying Japanese.",
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])
