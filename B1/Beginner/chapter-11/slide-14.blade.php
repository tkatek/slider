<?php
$content = [
    'page_title' => 'Practice 5',
    'title'      => 'Practice 5',
    'subtitle'   => 'Rearrange the words to make correct sentences',
    'type'       => 'sentence',

    'sentences' => [
        "{{1}}",
        "{{2}}",
        "{{3}}",
        "{{4}}",
        "{{5}}",
        "{{6}}",
    ],

    'scramble' => [
        'If he had scored, they would have won.',
        'We wouldn’t have missed the movie if you had been here on time.',
        'Ella would have finished the race if she hadn’t fallen.',
        'If you had gone to the party, you would have enjoyed it.',
        'Would you have married him if he asked you?',
        'What would have happened if you hadn’t missed the train?',
    ],
];
?>

@include('slider.game.unscramble', ['content' => $content])