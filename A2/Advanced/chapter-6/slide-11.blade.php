<?php

$content = [
    'page_title' => 'Reading Comprehension',
    'title'      => 'Reading Comprehension',
    'subtitle'   => 'Read & complete the passage with the suitable word from the list.',
    'type'       => 'reading',

    'sentences' => [
        'Long before Columbus arrived, millions of people lived in the Americas. Columbus called them {{1}}, but today we say {{2}}.',
        'Now, the USA is a nation of {{3}} because people moved there from many different countries.',
        'For example, many {{4}} live in San Francisco. Their ancestors worked on railways and in mines.',
        'Many {{5}} have {{6}} who passed through Ellis Island to enter the country.',
        'These people were often {{7}} and wanted a better life.',
        'The story for {{8}} is sadder.',
        'In the past, people captured {{9}} and brought them to America to work as {{10}} on farms.',
        'They did not get any money for their work. Fortunately, slavery is not legal today.',
    ],

    'answers' => [
        'Indians',
        'Native Americans',
        'Immigrants',
        'Chinese',
        'Americans',
        'Ancestors',
        'Poor',
        'African Americans',
        'Africans',
        'Slaves',
    ],
];

?>

@include('slider.game.drag-and-drop-blanks-v2', ['content' => $content])
