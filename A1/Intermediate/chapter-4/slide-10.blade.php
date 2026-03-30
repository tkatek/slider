<?php
$content=[
    'video'=>materialAsset('slider/A1/Intermediate/chapter-4/videos/at-the-doctor.mp4'),
    'thumbnail'=>materialAsset('slider/A1/Intermediate/chapter-4/videos/thumbnail-at-the-doctor.webp'),
    'isQuiz' => 1,
    'questions' => [
        [
            'time' => 18000,
            'type' => 'multiple_choice',
            'question' => "What is the patient’s full name?",
            'options' => ['John Gray', 'John Burke', 'Dr Burke', 'Mr Gray'],
            'correct_answer' => 1,
            'points' => 10
        ],
        [
            'time' => 50000,
            'type' => 'multiple_choice',
            'question' => 'How does the patient feel?',
            'options' => ['I have the flu.', 'I feel terrible.', 'I need medicine.', 'I have an allergy.'],
            'correct_answer' => 1,
            'points' => 10
        ],
        [
            'time' => 52000,
            'type' => 'multiple_choice',
            'question' => 'Which symptom does the patient mention?',
            'options' => ['Stomachache', 'Sore throat', 'Ear pain', 'Runny nose'],
            'correct_answer' => 3,
            'points' => 10
        ],
        [
            'time' => 70000,
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
        ['start' => 5,  'end' => 16, 'text' => 'Hi, my name is John Burke.'],
        ['start' => 16, 'end' => 30, 'text' => 'I have an appointment to see Dr Gray.'],
        ['start' => 30, 'end' => 33, 'text' => 'Of course.'],
        ['start' => 33, 'end' => 41, 'text' => 'Please take a seat, Mr Burke.'],
        ['start' => 41, 'end' => 42, 'text' => 'The doctor will see you soon.'],
        ['start' => 42, 'end' => 43, 'text' => 'Mr Burke?'],
        ['start' => 43, 'end' => 44, 'text' => 'The doctor will see you now.'],
        ['start' => 44, 'end' => 45, 'text' => 'Great, thanks.'],
        ['start' => 45, 'end' => 46, 'text' => 'Dr Gray: What seems to be the trouble, Mr Burke?'],
        ['start' => 46, 'end' => 55, 'text' => 'I feel terrible. My body aches, I have a runny nose and a bad cough.'],
        ['start' => 55, 'end' => 56, 'text' => 'I see.'],
        ['start' => 56, 'end' => 63, 'text' => 'Yes, your temperature is very high, too.'],
        ['start' => 63, 'end' => 66, 'text' => 'You have a fever.'],
        ['start' => 66, 'end' => 70, 'text' => 'It looks like you have the flu.'],
        ['start' => 70, 'end' => 71, 'text' => 'Do you have any allergies?'],
        ['start' => 71, 'end' => 73, 'text' => 'I don’t think so.'],
        ['start' => 73, 'end' => 75, 'text' => 'OK, great.'],
        ['start' => 75, 'end' => 80, 'text' => 'I’m going to prescribe some medicine.'],
        ['start' => 80, 'end' => 88, 'text' => 'Please take it twice every day.'],
        ['start' => 88, 'end' => 91, 'text' => 'Once in the morning and once before bed.'],
        ['start' => 91, 'end' => 93, 'text' => 'You should feel better in a few days.'],
        ['start' => 93, 'end' => 96, 'text' => 'Great, thank you.'],
    ]


];

?>
@include("slider.video.interactive",['content'=>$content])

