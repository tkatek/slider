<?php

$content = [
    'title'    => 'Listen again',
    'subtitle' => 'Listen to the conversation. Choose True or False.',
    'type'     => 'audio',

    'audio' => materialAsset('slider/B1/Intermediate/chapter-11/audios/slide17.mp3'),

    'script' => [
        'Sarah: Omar, have you ever watched a film and suddenly looked away during a scene?',
        'Omar: Yes, definitely! Why do you think that happens?',
        'Sarah: It can happen because of empathy. Sometimes we imagine how another person feels, and it affects us emotionally.',
        'Omar: Can you give me an example?',
        "Sarah: Sure. Imagine you're watching a film and something horrible is about to happen to a character. For example, someone is about to have their arm injured or their hand crushed.",
        'Omar: Oh, I know what you mean! I usually go, "Ugh!" and turn my head away.',
        "Sarah: Exactly. That's because your empathy is so strong that you can imagine what that experience might feel like if it happened to you.",
        "Omar: So, even though it isn't happening to me, I still react as if I can feel the pain?",
        "Sarah: That's right. Your brain helps you put yourself in the other person's situation.",
        'Omar: Are there any other examples of this?',
        'Sarah: Yes. Think about getting an injection or a vaccination.',
        'Omar: You mean when the needle goes into your arm?',
        'Sarah: Exactly. Some people feel uncomfortable even when they are just watching someone else get an injection.',
        "Omar: That's true! Sometimes I feel nervous just seeing the needle.",
        "Sarah: That's another example of empathy being triggered by something we see.",
        "Omar: So visual triggers can make us imagine another person's feelings or pain.",
        "Sarah: Yes, and that's one of the ways empathy works.",
    ],

    'questions' => [
        [
            'prompt'  => 'Empathy can be triggered by things we see.',
            'correct' => 'True',
            'options' => ['True', 'False'],
        ],
        [
            'prompt'  => 'Omar enjoys watching painful scenes in films.',
            'correct' => 'False',
            'options' => ['True', 'False'],
        ],
        [
            'prompt'  => "Sarah explains that empathy helps us imagine another person's feelings.",
            'correct' => 'True',
            'options' => ['True', 'False'],
        ],
        [
            'prompt'  => 'Some people feel uncomfortable watching someone get an injection.',
            'correct' => 'True',
            'options' => ['True', 'False'],
        ],
        [
            'prompt'  => 'Empathy only happens when something happens directly to us.',
            'correct' => 'False',
            'options' => ['True', 'False'],
        ],
    ],
];

?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])