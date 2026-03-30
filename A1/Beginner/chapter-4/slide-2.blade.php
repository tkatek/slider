<?php
$content=[
    'video' => materialAsset('slider/A1/Beginner/chapter-3/videos/encrypted/slide5.m3u8'),
    'thumbnail' => materialAsset('slider/A1/Beginner/chapter-3/videos/job-interview.webp'),
    'isQuiz'=>1,//1 show question / 0 don't
    'questions'=>[
        [
            'time' => 14500,
            'type' => 'multiple_choice',
            'question' => 'What kind of job is Mary applying for?',
            'options' => ['a kitchen job', 'a shop', 'a shop assistant job'],
            'correct_answer' => 0,
            'points' => 10
        ],
        [
            'time' => 27500,
            'type' => 'multiple_choice',
            'question' => 'Does she have any experience for that job?',
            'options' => ['No, she doesn\'t.', 'We don\'t know.', 'Yes, she does.'],
            'correct_answer' => 0,
            'points' => 10
        ],
        [
            'time' => 46000,
            'type' => 'multiple_choice',
            'question' => 'Why did her last company give her a special certificate?',
            'options' => ['For working hard', 'For coming to work on time', 'For improving her skills'],
            'correct_answer' => 1,
            'points' => 10
        ],
        [
            'time' => 50000,
            'type' => 'multiple_choice',
            'question' => 'Why is she taking an English class?',
            'options' => ['To improve her reading skills', 'To improve her oral skills', 'To improve her writing skills'],
            'correct_answer' => 2,
            'points' => 10
        ],
        [
            'time' => 65000,
            'type' => 'multiple_choice',
            'question' => 'What hours can she work?',
            'options' => ['From 8 am to 5 pm', 'From 9 am to 5 pm', 'From 8 am to 4 pm'],
            'correct_answer' => 0,
            'points' => 10
        ],
        [
            'time' => 95000,
            'type' => 'multiple_choice',
            'question' => 'When will Mary know if she gets the job?',
            'options' => ['Next week', 'Today', 'Tomorrow'],
            'correct_answer' => 2,
            'points' => 10
        ]
    ],
    'subtitles' => [
        ['start' => 0, 'end' => 1, 'text' => "Mary?"],
        ['start' => 1, 'end' => 3, 'text' => "Yes, coming"],
        ['start' => 5, 'end' => 7, 'text' => "Hi"],
        ['start' => 7, 'end' => 10, 'text' => "Hello. I'm Susan Thompson, Resource Manager here."],
        ['start' => 10, 'end' => 12, 'text' => "Hi. I'm Mary Hansen,"],
        ['start' => 12, 'end' => 15, 'text' => "and I'm applying for one of your kitchen jobs."],
        ['start' => 15, 'end' => 19, 'text' => "Here's a copy of my resume."],
        ['start' => 19, 'end' => 22, 'text' => "Mary, do you have any experience working in the kitchen?"],
        ['start' => 22, 'end' => 24, 'text' => "No, but I want to learn."],
        ['start' => 24, 'end' => 27, 'text' => "I work hard and I cook a lot at home."],
        ['start' => 27, 'end' => 30, 'text' => "Okay, well, tell me about yourself."],
        ['start' => 30, 'end' => 33, 'text' => "Well, I love to learn new things."],
        ['start' => 33, 'end' => 35, 'text' => "I'm very organized,"],
        ['start' => 35, 'end' => 36, 'text' => "and I follow directions exactly."],
        ['start' => 36, 'end' => 40, 'text' => "Uh, That's when my boss at my last job made me a trainer,"],
        ['start' => 40, 'end' => 42, 'text' => "and the company actually gave me a special certificate"],
        ['start' => 42, 'end' => 45, 'text' => "for coming to work on time every day for a year."],
        ['start' => 45, 'end' => 50, 'text' => "And I'm taking an English class to improve my writing skills."],
        ['start' => 50, 'end' => 55, 'text' => "That's great. Why did you leave your last job?"],
        ['start' => 55, 'end' => 58, 'text' => "It was graveyard, and I need to work days."],
        ['start' => 58, 'end' => 61, 'text' => "I see. Well, what hours can you work?"],
        ['start' => 61, 'end' => 64, 'text' => "Um, from 8 a.m. until 5 p.m."],
        ['start' => 64, 'end' => 68, 'text' => "Okay, well, do you have any questions for me, Mary?"],
        ['start' => 68, 'end' => 73, 'text' => "Yes, what kind of training is needed?"],
        ['start' => 73, 'end' => 74, 'text' => "Not a lot."],
        ['start' => 74, 'end' => 75, 'text' => "Most new workers can learn everything the first day."],
        ['start' => 75, 'end' => 78, 'text' => "Do you have any other questions?"],
        ['start' => 78, 'end' => 81, 'text' => "No, I don't think so, but I've heard a lot of good things about your company,"],
        ['start' => 81, 'end' => 83, 'text' => "and I would really like to work here."],
        ['start' => 83, 'end' => 85, 'text' => "Well, I have a few more interviews to do today,"],
        ['start' => 85, 'end' => 88, 'text' => "but I will call you tomorrow if you get the job."],
        ['start' => 88, 'end' => 89, 'text' => "Okay."],
        ['start' => 90, 'end' => 93, 'text' => "It was sure nice to meet you."],
        ['start' => 93, 'end' => 96, 'text' => "Nice meeting you, too. Thank you so much for your time."],
    ]

];

?>
@include("slider.video.interactive",['content'=>$content])

