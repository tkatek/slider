<?php
$content=[
    'video'=>materialAsset('slider/A1/Intermediate/chapter-4/videos/at-doctor-encrypted/at-doctor.m3u8'),
    'thumbnail'=>materialAsset('slider/A1/Intermediate/chapter-4/videos/thumbnail-at-the-doctor.webp'),
    'isQuiz' => 1,
    'questions' => [
        [
            'time' => 18000,
            'type' => 'multiple_choice',
            'question' => "What is the patient’s full name?",
            'options' => ['Carl Gray', 'Carl Walker', 'Dr Burke', 'Mr Gray'],
            'correct_answer' => 1,
            'points' => 10
        ],
        [
            'time' => 51500,
            'type' => 'multiple_choice',
            'question' => 'How does the patient feel?',
            'options' => ['I have the flu.', 'I feel terrible.', 'I need medicine.', 'I have an allergy.'],
            'correct_answer' => 1,
            'points' => 10
        ],
        [
            'time' => 55000,
            'type' => 'multiple_choice',
            'question' => 'Which symptom does the patient mention?',
            'options' => ['Stomachache', 'Sore throat', 'Ear pain', 'Runny nose'],
            'correct_answer' => 3,
            'points' => 10
        ],
        [
            'time' => 72000,
            'type' => 'multiple_choice',
            'question' => 'What does the doctor say the patient has?',
            'options' => ['The flu', 'A cold', 'An allergy', 'Only a fever'],
            'correct_answer' => 0,
            'points' => 10
        ],
        [
            'time' => 90000,
            'type' => 'multiple_choice',
            'question' => 'How should the patient take the medicine?',
            'options' => [
                'Once every day',
                'Twice every day – once in the morning and once before bed',
                'Three times every day',
                'Only when he feels bad'
            ],
            'correct_answer' => 1,
            'points' => 10
        ],
    ],
    'subtitles' => [
        ['start' => 7,  'end' => 9, 'text' => 'Hi, my name is Carl Walker.'],
        ['start' => 9, 'end' => 11, 'text' => 'I have an appointment with Dr White.'],
        ['start' => 11.5, 'end' => 14.5, 'text' => 'Of course Mr Walker please take a seat'],
        ['start' => 14.5, 'end' => 17, 'text' => 'The doctor will see you soon.'],
        ['start' => 24, 'end' => 26, 'text' => 'First time here?'],
        ['start' => 33.5, 'end' => 34.5, 'text' => 'Mr Walker?'],
        ['start' => 34.5, 'end' => 37, 'text' => 'The doctor will see you now.'],
        ['start' => 37, 'end' => 38, 'text' => 'Great.'],
        ['start' => 43, 'end' => 46, 'text' => 'What seems to be the trouble, Mr Walker?'],
        ['start' => 48.5, 'end' => 51, 'text' => 'I feel terrible. My body aches'],
        ['start' => 52, 'end' => 54.5, 'text' => 'I have a runny nose and a bad cough.'],
        ['start' => 57.5, 'end' => 58, 'text' => 'I see.'],
        ['start' => 63, 'end' => 66, 'text' => 'Yes, your temperature is very high, too.'],
        ['start' => 68, 'end' => 69, 'text' => 'You have a fever.'],
        ['start' => 69.5, 'end' => 71, 'text' => 'It looks like you have the flu.'],
        ['start' => 72, 'end' => 74, 'text' => 'Do you have any allergies?'],
        ['start' => 75.5, 'end' => 77, 'text' => 'I don’t think so.'],
        ['start' => 79, 'end' => 81, 'text' => 'OK, great.'],
        ['start' => 81, 'end' => 83.5, 'text' => 'I’m going to prescribe some medicine.'],
        ['start' => 83.5, 'end' => 86, 'text' => 'Please take it twice every day.'],
        ['start' => 87, 'end' => 90, 'text' => 'Once in the morning and once before bed.'],
        ['start' => 93, 'end' => 95, 'text' => 'You should feel better in a few days.'],
        ['start' => 96, 'end' => 98, 'text' => 'Great, thank you.'],
    ]


];

?>
@include("slider.video.interactive",['content'=>$content])

