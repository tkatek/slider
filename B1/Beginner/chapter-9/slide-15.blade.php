<?php
$content = [
    'title'    => 'Listen again',
    'subtitle' => 'Choose the correct answer',
    'type'     => 'audio',

    'audio' => materialAsset('slider/B1/Beginner/chapter-9/audios/slide15.mp3'),


    'script' => [
'Erin: Dad! You’re home. Where have you been?',

        'Dad: I was having a cup of coffee at the cafe.',

        'Erin: Did you completely forget?',

        'Dad: Forget? Forget what?',

        'Erin: It’s mom’s birthday today. We were supposed to have a birthday dinner for her.',

        'Dad: Uh, oh! Where is mom?',

        'Erin: Well, when you didn’t come home she was furious. She said she needed to go for a walk to cool off. You did bring the cake at least?',

        'Dad: The cake? Was I supposed to?',

        'Erin: Yes, you were. She asked you to pick it up this morning before you left for work.',

        'Dad: Oh, that’s right!',

        'Erin: She is going be so angry with you if she finds out that you didn’t even pick up the cake. If I were you, I would drive down to the bakery right away and get a cake before she returns.',

        'Dad: Will do. If she does get back before me, I was never here. Got it?',

        'Erin: Got it. Now go!',
    ],

    'questions' => [
        [
            'prompt'  => 'Choose the best title.',
            'correct' => "Dad Forgets Mom's Birthday",
            'options' => [
                'A Surprise Birthday Party',
                "Dad Forgets Mom's Birthday",
                'A Family Vacation',
                'A Day at the Bakery',
            ],
        ],
        [
            'prompt'  => '1. Where was Dad?',
            'correct' => 'At a cafe',
            'options' => [
                'At work',
                'At a cafe',
                'At the bakery',
                'At home',
            ],
        ],
        [
            'prompt'  => '2. Why was Mom angry?',
            'correct' => 'Dad forgot her birthday dinner',
            'options' => [
                'Dad was late for work',
                'Dad forgot her birthday dinner',
                'Dad lost the gift',
                'Dad forgot Erin',
            ],
        ],
        [
            'prompt'  => "3. What did Mom do when Dad didn't come home?",
            'correct' => 'She went for a walk',
            'options' => [
                'She went shopping',
                'She went to work',
                'She went for a walk',
                'She went to the bakery',
            ],
        ],
        [
            'prompt'  => '4. What was Dad supposed to pick up?',
            'correct' => 'A cake',
            'options' => [
                'Flowers',
                'A gift',
                'A cake',
                'Coffee',
            ],
        ],
        [
            'prompt'  => '5. What advice did Erin give?',
            'correct' => 'Go to the bakery and get a cake',
            'options' => [
                'Buy flowers',
                'Call Mom',
                'Go to the bakery and get a cake',
                'Stay at home',
            ],
        ],
        [
            'prompt'  => "6. Dad remembered Mom's birthday.",
            'correct' => 'False',
            'options' => [
                'True',
                'False',
            ],
        ],
        [
            'prompt'  => '7. Mom went for a walk to cool off.',
            'correct' => 'True',
            'options' => [
                'True',
                'False',
            ],
        ],
        [
            'prompt'  => '8. Dad bought the cake.',
            'correct' => 'False',
            'options' => [
                'True',
                'False',
            ],
        ],
        [
            'prompt'  => '9. Erin advised Dad to get a cake quickly.',
            'correct' => 'True',
            'options' => [
                'True',
                'False',
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])