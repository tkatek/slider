<?php
$content = [
    'page_title' => 'Discussion',
    'title'      => 'Discussion',
    'subtitle'   => 'Let\'s Talk About Siblings and Personality',
    'image'      => materialAsset('slider/B1/Intermediate/chapter-7/img/slide5.webp'),

    'cards' => [
        [
            'emoji' => '👨‍👩‍👧‍👦',
            'label' => 'Question 1',
            'text'  => 'Do you have any siblings? Tell your partner about them.',
        ],
        [
            'emoji' => '🔁',
            'label' => 'Question 2',
            'text'  => 'Are you similar or different from your sibling(s)?',
        ],
        [
            'emoji' => '🌟',
            'label' => 'Question 3',
            'text'  => 'What personality traits describe you best?',
        ],
        [
            'emoji' => '🧑‍🤝‍🧑',
            'label' => 'Question 4',
            'text'  => 'What personality traits describe your sibling?',
        ],
        [
            'emoji' => '🏠',
            'label' => 'Question 5',
            'text'  => 'Who is more responsible, organized, or social in your family?',
        ],
        [
            'emoji' => '🧠',
            'label' => 'Question 6',
            'text'  => 'Do you think birth order can influence personality?',
        ],
        [
            'emoji' => '🥇',
            'label' => 'Question 7',
            'text'  => 'What are the advantages of being the oldest, middle, youngest, or only child?',
        ],
    ],
];
?>

@include('slider.other.discussion', ['content' => $content])