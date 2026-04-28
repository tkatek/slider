<?php
$content = [
    'page_title' => '',
    'title' => 'Reading',
    'subtitle' => 'Read the passage and choose correct verb form the list',
    'type' => 'reading',
    'sentences' => [
        "Hi! I’m Annie! I live in Michigan, USA. On my last vacation, my family and I {{1}} (travel) to California. We {{2}} (stay) in a beautiful hotel. We {{3}} (go) to the beach every day and {{4}} (swim) in the ocean. My mom {{5}} (take) a lot of photos and sunbathed! My dad and I {{6}} (play) soccer on the beach. On Tuesday, we went fishing. We also {{7}} some museums. I {{8}} (love) them! One day, we went to a restaurant. I {{9}} (eat) pasta, but my dad didn’t; he ate meat. I {{10}} (drink) a soda.",
        "After that, we {{11}} (walk) to the center and {{12}} (buy) some souvenirs. I {{13}} (have) a great time there. I {{14}} (am/is) very sad to come back home.",
    ],
    'answers' => [
        'traveled',
        'stayed',
        'went',
        'swam',
        'took',
        'played',
        'visited',
        'loved',
        'ate',
        'drank',
        'walked',
        'bought',
        'had',
        'was',
    ],
];

?>
@include('slider.game.drag-and-drop-blanks-v2', ['content' => $content])