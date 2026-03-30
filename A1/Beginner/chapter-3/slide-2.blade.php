<?php
$content=[
    'title'=>'Warm Up',
    'type'=>'audio',
    'subtitle' => "Choose the correct answer",
    'audio'=>materialAsset('slider/A1/Beginner/chapter-3/audio/slide-2.mp3'),
    'status_row_width' => 'max-w-4xl',
    'game_card_width' => 'max-w-4xl',
    'script' => [
        'Receptionist: Good morning! Welcome to our language school. Can I have your name, please?',
        'Emelia: Good morning! Yes, uh, my name is Emelia Stiehler.',
        'Receptionist: Stiehler. Uh, could you spell that name for me, please?',
        'Emelia: Yeah, of course. Uh, the first name is spelled Emelia. E-M-E-L-I-A. [Okay and . . .] [The] last name is S-T-I-E-H-L-E-R.',
        "Receptionist: Oh, that's a little unusual.",
        'Emelia: Yeah. Nobody asked my opinion about it.',
        'Receptionist: [Laughing] Thank you. [Laughing] Thank you. I just want to be sure. Your first name is Emelia with an E, right?',
        'Emelia: Yeah.',
        'Receptionist: I just, I just want to get that down right.',
        "Emelia: Yeah, yeah. That's what I said. You got it.",
        'Receptionist: Okay. Great! And your phone number?',
        "Emelia: It's 555-1234.",
        "Receptionist: . . . 1234. Okay, and do you have an email address as well?",
        "Emelia: Yes. So its e.stiehler@email.com.",
        "Receptionist: Excellent. And here's your school registration form. And you can double-check your information and then sign at the bottom.",
        'Emelia: Yeah. That all looks good. Thank you!',
        "Receptionist: You're welcome! And once we're finished, I'll show you where to take the language placement test. Okay?",
        'Emelia: Cool.',
    ],
    'questions'=>[
        [
            'prompt' => 'Where does the conversation take place?',
            'correct' => 'At a language school',
            'options' => ['At a language school', 'At a hotel', 'At a restaurant']
        ],
        [
            'prompt' => "What is the woman's name?",
            'correct' => "Emelia Stiehler",
            'options' => ['Amelia Stiller', 'Emilia Steeler', 'Emelia Stiehler']
        ],
        [
            'prompt' => "What is the woman's phone number?",
            'correct' => '555-1234',
            'options' => ['555-1243', '555-2143', '555-1234']
        ],
        [
            'prompt' => 'What does the receptionist give the woman?',
            'correct' => 'A registration form',
            'options' => ['An ID card', 'A test paper', 'A registration form']
        ],
        [
            'prompt' => 'What will the woman do next?',
            'correct' => 'Take a placement test',
            'options' => ['Begin office training', 'Take a placement test', 'Pay school fees']
        ],
    ],
];
?>
@include('slider.game.multi-choice-all-in-one', ['content' => $content])
