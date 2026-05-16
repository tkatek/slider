<?php
$content = [
    'video'     => materialAsset('slider/A2/Advanced/chapter-12'),
    'thumbnail' => materialAsset('slider/A2/Advanced/chapter-12/img/slide3.webp'),
    'isQuiz'    => 1,

    'questions' => [
        [
            'time' => 12000,
            'type' => 'multiple_choice',
            'question' => 'The Customer Has Been Trying To ...... The Product.',
            'options' => [
                'Return',
                'Buy',
                'Sell',
            ],
            'correct_answer' => 0,
            'points' => 10,
        ],
        [
            'time' => 20000,
            'type' => 'multiple_choice',
            'question' => 'The Customer Service Wants The Customer To ...... Them.',
            'options' => [
                'Call',
                'E-mail',
                'Chat With',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 51000,
            'type' => 'multiple_choice',
            'question' => 'The Customer Service Is:',
            'options' => [
                'Rude',
                'Helpful',
                'Cheerful',
            ],
            'correct_answer' => 0,
            'points' => 10,
        ],
        [
            'time' => 83000,
            'type' => 'multiple_choice',
            'question' => 'The Customer Wants A ..... For The Item.',
            'options' => [
                'Refund',
                'Re-sell',
                'Re-buy',
            ],
            'correct_answer' => 0,
            'points' => 10,
        ],
        [
            'time' => 97000,
            'type' => 'multiple_choice',
            'question' => 'The Customer Service Is:',
            'options' => [
                'Impolite',
                'Helpful',
                'Rude',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
    ],

    'subtitles' => [
        ['start' => 5,   'end' => 12,  'text' => 'Hi, I’ve been trying to get in touch with your office to return these, but nobody seems to be happy to reply to emails.'],
        ['start' => 12,  'end' => 20,  'text' => 'Yes, I have emails. Okay, well, that’s what you can do. You have to email it through and someone will get back to you when they can.'],
        ['start' => 20,  'end' => 27,  'text' => 'Right. What would be the time frame? Well, that’s not in my department. I can’t help you. You need to do it online.'],
        ['start' => 27,  'end' => 35,  'text' => 'Is there someone that you might be able to help? It was very late. I can’t help you. It’s all done online within our online team.'],
        ['start' => 35,  'end' => 43,  'text' => 'I don’t know what more you want me to do. Maybe you can ask somebody if they could help? We won’t know because I’m the only one here.'],
        ['start' => 43,  'end' => 51,  'text' => 'I haven’t had lunch and I can’t leave, so you’re just going to have to go back online, wait for someone to call you, and go from there.'],
        ['start' => 51,  'end' => 60,  'text' => 'This isn’t my area. If you want to buy something, I can help you. Okay, this is terrible customer service. Is there not a manager or someone I could talk to?'],
        ['start' => 60,  'end' => 66,  'text' => 'We do have an online chat room that you can lodge your dispute with, but I don’t have anyone here that you can speak with.'],
        ['start' => 66,  'end' => 74,  'text' => 'Okay, well, I’ll need to follow this up with someone. Thank you for not being helpful. Okay, great. Thank you very much. Have a lovely day. Bye.'],

        ['start' => 74,  'end' => 83,  'text' => 'Hello, how are you? Thanks, how are you? Thank you. I’m just returning this, please. I bought one for my husband on the weekend.'],
        ['start' => 83,  'end' => 93,  'text' => 'He’s already received it, so is it possible that I could get a refund for that? Yeah, absolutely. Have you lodged something online?'],
        ['start' => 93,  'end' => 101, 'text' => 'I did, but nobody seems to have gotten back to me yet, so I thought I’d just pop into the office. Okay, sorry about that.'],
        ['start' => 101, 'end' => 109, 'text' => 'Usually our turnaround is 24 hours, but I can definitely help you with that. Thankfully, I’ll just look up some of your details here.'],
        ['start' => 109, 'end' => 117, 'text' => 'What was your name? Cherie Montgomery. Perfect. I can see you purchased that on the weekend with the credit card.'],
        ['start' => 117, 'end' => 127, 'text' => 'Would you like that refund back onto the credit card? That would be wonderful. Wonderful. I can take care of that from here.'],
        ['start' => 127, 'end' => 137, 'text' => 'You will see that within 10 business days. Is there anything else I can help you with? No, that’s wonderful. Thank you. Hope you have a great day.'],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])