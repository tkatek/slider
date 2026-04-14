<?php
$content = [
    'page_title' => 'Reading Comprehension',
    'title'      => 'Reading Comprehension',
    'subtitle'   => 'Read the passage and answer the questions',
    'heading'    => '',
    'passage_title' => '',
    'passage_label' => 'What Do You Do in the Summer?',
    'passage' => [
        'In summer, I enjoy the warm sunshine while swimming and playing outside with my friends. It’s the perfect time for outdoor adventures and making happy memories together under the bright blue sky.',
    ],

    'questions' => [
        'What activities does the author enjoy during summer?',
        'Who does the author spend time with while enjoying these activities?',
        'Extract one activity and one adjective mentioned in the passage.',
    ],
];
?>

@include("slider.other.reading-comprehension", ['content' => $content])
