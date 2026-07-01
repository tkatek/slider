<?php
$content = [
    'video'     => materialAsset(''),
    'thumbnail' => materialAsset(''),
    'isQuiz'    => 1,

    'questions' => [
        [
            'time'           => 18000,
            'type'           => 'multiple_choice',
            'question'       => '1. Which word means "showing courage"?',
            'options'        => [
                'Ashamed',
                'Bravery',
                'Bully',
                'Hesitation',
            ],
            'correct_answer' => 1,
            'points'         => 1,
        ],
        [
            'time'           => 16000,
            'type'           => 'multiple_choice',
            'question'       => '2. If someone is fascinated by superheroes, they are:',
            'options'        => [
                'Bored',
                'Very interested',
                'Afraid',
                'Confused',
            ],
            'correct_answer' => 1,
            'points'         => 1,
        ],
        [
            'time'           => 45000,
            'type'           => 'multiple_choice',
            'question'       => '3. Emily felt ______ after walking away.',
            'options'        => [
                'Proud',
                'Excited',
                'Guilty',
                'Relaxed',
            ],
            'correct_answer' => 2,
            'points'         => 1,
        ],
        [
            'time'           => 93000,
            'type'           => 'multiple_choice',
            'question'       => '4. To lend a hand means to:',
            'options'        => [
                'Wave',
                'Help someone',
                'Shake hands',
                'Ask for help',
            ],
            'correct_answer' => 1,
            'points'         => 1,
        ],
        [
            'time'           => 145000,
            'type'           => 'multiple_choice',
            'question'       => '5. Which word means "not giving up"?',
            'options'        => [
                'Determination',
                'Shame',
                'Fear',
                'Hesitation',
            ],
            'correct_answer' => 0,
            'points'         => 1,
        ],
    ],

    'subtitles' => [
        ['start' => 0, 'end' => 6, 'text' => 'Once upon a time, in a small town in the heart of America, there lived a young girl named Emily.'],
        ['start' => 6, 'end' => 12, 'text' => 'She was a shy and introverted girl who loved spending her time reading books and watching her favorite movies and TV shows.'],
        ['start' => 12, 'end' => 18, 'text' => 'She had a particular fascination with stories about superheroes and their heroic deeds.'],
        ['start' => 18, 'end' => 23, 'text' => 'She would often daydream about becoming one herself.'],

        ['start' => 23, 'end' => 29, 'text' => 'One day, as she was walking home from school, she noticed a group of boys bullying a smaller boy.'],
        ['start' => 29, 'end' => 34, 'text' => 'Emily knew she had to do something, but she was scared.'],
        ['start' => 34, 'end' => 40, 'text' => 'She did not know how to stand up to them and feared that they would turn on her too.'],
        ['start' => 40, 'end' => 46, 'text' => 'She decided to walk away, feeling guilty and ashamed for not doing anything.'],

        ['start' => 46, 'end' => 52, 'text' => 'That night, Emily could not sleep.'],
        ['start' => 52, 'end' => 59, 'text' => 'As she watched the heroes on the screen, she realized that they were just like her.'],
        ['start' => 59, 'end' => 65, 'text' => 'They were afraid, but they still found the strength to do what was right.'],

        ['start' => 65, 'end' => 72, 'text' => 'The next day, when Emily saw the same group of boys bullying the same boy, she knew she had to act.'],
        ['start' => 72, 'end' => 78, 'text' => 'She took a deep breath, walked up to them, and told them to stop.'],
        ['start' => 78, 'end' => 84, 'text' => 'To her surprise, they did. They were taken aback by her bravery.'],
        ['start' => 84, 'end' => 89, 'text' => 'The smaller boy thanked her for standing up for him.'],

        ['start' => 89, 'end' => 95, 'text' => 'From that day on, Emily became known as a hero in her small town.'],
        ['start' => 95, 'end' => 101, 'text' => 'People would come to her for help, and she would never hesitate to lend a hand.'],
        ['start' => 101, 'end' => 107, 'text' => 'She realized that being a hero did not mean having superpowers.'],
        ['start' => 107, 'end' => 113, 'text' => 'It meant having the courage to do what was right, even when it was difficult.'],

        ['start' => 113, 'end' => 119, 'text' => 'The message of this story is that everyone has the potential to be a hero.'],
        ['start' => 119, 'end' => 125, 'text' => 'It does not matter who you are or where you come from.'],
        ['start' => 125, 'end' => 131, 'text' => 'All it takes is the courage to stand up for what is right.'],
        ['start' => 131, 'end' => 138, 'text' => 'This story is a reminder that we can all make a difference in the world, no matter how small it may seem.'],

        ['start' => 138, 'end' => 145, 'text' => 'As Emily’s story spread, people across America were inspired by her bravery and determination.'],
        ['start' => 145, 'end' => 151, 'text' => 'The story was shared on social media, and soon it went viral.'],
        ['start' => 151, 'end' => 157, 'text' => 'People all over the country were talking about the young girl who became a hero.'],

        ['start' => 157, 'end' => 164, 'text' => 'This story is a tribute to all the everyday heroes out there who go unnoticed and unrecognized.'],
        ['start' => 164, 'end' => 170, 'text' => 'Their actions make a big difference in the lives of others.'],
        ['start' => 170, 'end' => 177, 'text' => 'It is a call to action for all of us to be the hero we want to see in the world.'],
        ['start' => 177, 'end' => 183, 'text' => 'It is also a call to inspire others to do the same.'],

        ['start' => 183, 'end' => 190, 'text' => 'So the next time you see someone in need, do not be afraid to lend a hand.'],
        ['start' => 190, 'end' => 195, 'text' => 'Remember, you too have the potential to be a hero.'],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])