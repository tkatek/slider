<?php
$content = [
    'page_title' => 'New Language',
    'title' => 'New Language',
    'subtitle' => 'Learn how to ask and answer about jobs.',

    'show_footer_image' => 0,
    'footer_image' => '',

    'people' => [
        'left' => [
            'name' => 'Doctor',
            'image' => 'https://static.vecteezy.com/system/resources/thumbnails/026/375/249/small/ai-generative-portrait-of-confident-male-doctor-in-white-coat-and-stethoscope-standing-with-arms-crossed-and-looking-at-camera-photo.jpg',
        ],
        'right' => [
            'name' => 'Teacher',
            'image' => 'https://i.pinimg.com/736x/17/fa/44/17fa44e8d7f0d4a341f078b6c94a31ef.jpg',
        ],
    ],

    'dialogues' => [
        [
            'text' => "What’s your job?",
            'side' => 'left',
            'gender' => 'male',
            'sound' => materialAsset("slider/A1/Beginner/chapter-1/audios/whats-your-job/whats-your-job.mpeg"),
        ],
        [
            'text' => "I am a teacher",
            'side' => 'right',
            'gender' => 'female',
            'sound' => materialAsset("slider/A1/Beginner/chapter-1/audios/whats-your-job/iam-a-teacher.mpeg"),
        ],
        [
            'text' => "Are you a doctor?",
            'side' => 'right',
            'gender' => 'female',
            'sound' => materialAsset("slider/A1/Beginner/chapter-1/audios/whats-your-job/are-you-a-doctor.mpeg"),
        ],
        [
            'text' => "Yes, I am",
            'side' => 'left',
            'gender' => 'male',
            'sound' => materialAsset("slider/A1/Beginner/chapter-1/audios/whats-your-job/yes-iam.mpeg"),
        ],
    ],
];
?>

@include("slider.vocab.image-conversation", ['content' => $content])
