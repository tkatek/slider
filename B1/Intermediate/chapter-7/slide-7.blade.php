<?php
$content = [
    'video'     => materialAsset(''),
    'thumbnail' => materialAsset('slider/B1/Intermediate/chapter-7/img/slide7.webp'),
    'isQuiz'   => 0,

    'questions' => [],

    'subtitles' => [
        [
            'start' => 0,
            'end' => 6,
            'text' => 'People often believe that birth order can influence personality.',
        ],
        [
            'start' => 6.5,
            'end' => 15,
            'text' => 'Firstborn children usually get full attention from parents at the beginning.',
        ],
        [
            'start' => 15.5,
            'end' => 25,
            'text' => 'They often become responsible, organized, and good leaders. They may also feel more pressure because parents expect a lot from them.',
        ],
        [
            'start' => 25.5,
            'end' => 33,
            'text' => 'Firstborns sometimes teach their younger siblings, which helps them become more confident.',
        ],
        [
            'start' => 33.5,
            'end' => 41,
            'text' => 'Middle children often feel less noticed. Because of this, they learn to understand people well and solve problems.',
        ],
        [
            'start' => 41.5,
            'end' => 50,
            'text' => 'They are usually good at getting along with others and can be flexible and creative.',
        ],
        [
            'start' => 50.5,
            'end' => 57,
            'text' => 'However, they may sometimes feel unsure about their role in the family.',
        ],
        [
            'start' => 57.5,
            'end' => 66,
            'text' => 'Youngest children grow up with fewer strict rules. They often learn from older siblings and become social, funny, and open to new experiences.',
        ],
        [
            'start' => 66.5,
            'end' => 73,
            'text' => 'They may enjoy taking risks. However, they can sometimes depend too much on others.',
        ],
        [
            'start' => 73.5,
            'end' => 82,
            'text' => 'Only children get all their parents’ attention. They often develop strong thinking and language skills and become independent.',
        ],
        [
            'start' => 82.5,
            'end' => 91,
            'text' => 'They are used to spending time alone and focusing on their goals. However, they may need to learn teamwork and sharing later in life.',
        ],
        [
            'start' => 91.5,
            'end' => 100,
            'text' => 'Twins grow up together and share a very close bond. They often understand each other very well and develop strong emotional skills.',
        ],
        [
            'start' => 100.5,
            'end' => 107,
            'text' => 'Sometimes, they may find it hard to develop a separate identity.',
        ],
        [
            'start' => 107.5,
            'end' => 116,
            'text' => 'Gap children are born many years after their siblings. They often behave like a mix between an only child and a younger child.',
        ],
        [
            'start' => 116.5,
            'end' => 126,
            'text' => 'They may mature quickly and learn from older siblings, but they may not share many childhood experiences with them.',
        ],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])