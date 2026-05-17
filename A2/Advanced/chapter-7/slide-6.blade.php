<?php
$content = [
    'page_title' => 'Useful Language',
    'title' => 'Useful Language',
    'subtitle' => 'New Language',
    'grid_class' => 'grid-cols-2 sm:grid-cols-3 lg:grid-cols-3',

    'groups' => [
        [
            'key' => 'useful-goals-expressions',
            'title' => '',
            'grid_class' => 'grid-cols-2 sm:grid-cols-3 lg:grid-cols-3',
            'items' => [
                [
                    'text' => 'Set goals',
                    'emoji' => '🎯',
                    'description' => 'Decide on goals',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-7/audios/slide6/set-goals.mp3'),
                ],
                [
                    'text' => 'Work towards goals',
                    'emoji' => '🚶‍♂️',
                    'description' => 'Try to achieve goals',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-7/audios/slide6/work-towards-goals.mp3'),
                ],
                [
                    'text' => 'Increase productivity',
                    'emoji' => '⚡',
                    'description' => 'Become more productive',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-7/audios/slide6/increase-productivity.mp3'),
                ],
                [
                    'text' => 'Reach your goal',
                    'emoji' => '🏁',
                    'description' => 'Achieve your goal',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-7/audios/slide6/reach-your-goal.mp3'),
                ],
                [
                    'text' => 'Within your ability',
                    'emoji' => '💪',
                    'description' => 'Possible for you to do',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-7/audios/slide6/within-your-ability.mp3'),
                ],
                [
                    'text' => 'Impact your life',
                    'emoji' => '🌟',
                    'description' => 'Affect your life',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-7/audios/slide6/impact-your-life.mp3'),
                ],
                [
                    'text' => 'Create a sense of urgency',
                    'emoji' => '⏰',
                    'description' => 'Make you feel you must act quickly',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-7/audios/slide6/create-a-sense-of-urgency.mp3'),
                ],
                [
                    'text' => 'Complete a goal',
                    'emoji' => '✅',
                    'description' => 'Finish achieving a goal',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-7/audios/slide6/complete-a-goal.mp3'),
                ],
                [
                    'text' => 'Set the next goal',
                    'emoji' => '🎉',
                    'description' => 'Choose another goal after success',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-7/audios/slide6/set-the-next-goal.mp3'),
                ],
            ],
        ],
    ],
];
?>

@include('slider.vocab.image-card', ['content' => $content])