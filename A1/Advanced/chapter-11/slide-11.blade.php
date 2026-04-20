<?php
$content = [
    'title'    => 'Practice 6',
    'subtitle' => 'Listening: Listen and choose the correct answer:',
    'type'     => 'audio',

    'audio' => materialAsset('slider/A1/Advanced/chapter-11/audios/slide11/Real-English-Conversation.mpeg'),

    'image_panel_col_class'  => 'sm:col-span-0',
    'answer_panel_col_class' => 'sm:col-span-12',

    'script' => [
        'Jimmy: Excuse me, could you help me fill up my car with gas?',
        'Attendant: Of course, sir. Which pump are you parked at?',
        'Jimmy: Pump number three.',
        'Attendant: Alright, let me grab the pump and I\'ll be right there.',
        'Jimmy: Thanks, I appreciate it.',
        'Attendant: No problem, sir. Is this your first time filling up here?',
        'Jimmy: Yeah, I just moved to the area.',
        'Attendant: Well, we\'re happy to have you as a customer. Do you know what kind of gas your car takes?',
        'Jimmy: Yeah, it takes regular unleaded.',
        'Attendant: Great, I\'ll set the pump to regular unleaded then. Is there anything else I can help you with?',
        'Jimmy: No, that\'s it. Thank you again.',
        'Attendant: You\'re welcome. Do you need a receipt?',
        'Jimmy: No, thank you.',
        'Attendant: Alright, have a good day!',
        'Jimmy: You too.',
        'Jimmy: Hey, excuse me, could you help me? I\'m not sure how to use this pump.',
        'Attendant: Sure thing, sir. What do you need help with?',
        'Jimmy: I\'m not sure how to turn it on.',
        'Attendant: Oh, okay. You just need to insert your credit card here and follow the instructions on the screen.',
        'Jimmy: Got it. Thank you so much.',
    ],
    'questions' => [
        [
            'prompt'  => 'What does Jimmy need help with at the gas station?',
            'correct' => 'Filling up his car with gas',
            'options' => [
                'Filling up his car with gas',
                'Changing a tire',
                'Cleaning his windshield',
                'Buying a snack',
            ],
        ],
        [
            'prompt'  => 'What pump is Jimmy parked at?',
            'correct' => 'Pump number three',
            'options' => [
                'Pump number one',
                'Pump number two',
                'Pump number three',
                'Pump number four',
            ],
        ],
        [
            'prompt'  => 'What type of gas does Jimmy\'s car take?',
            'correct' => 'Regular unleaded',
            'options' => [
                'Diesel',
                'Premium',
                'Regular unleaded',
                'Ethanol',
            ],
        ],
        [
            'prompt'  => 'Does Jimmy need a receipt?',
            'correct' => 'No, he doesn\'t need a receipt.',
            'options' => [
                'Yes, he needs a receipt.',
                'No, he doesn\'t need a receipt.',
                'He hasn\'t decided yet.',
                'The conversation doesn\'t mention a receipt.',
            ],
        ],
        [
            'prompt'  => 'What is the attendant\'s attitude toward Jimmy?',
            'correct' => 'Friendly and helpful',
            'options' => [
                'Impatient and rude',
                'Friendly and helpful',
                'Indifferent and uninterested',
                'The conversation doesn\'t give enough information to determine the attendant\'s attitude.',
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])
