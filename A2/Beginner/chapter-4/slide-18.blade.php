<?php
$content = [
    'page_title' => 'Practice 7',
    'title' => 'Practice 7: Reading',
    'subtitle' => 'Read the paragrapgh and fill in with the correct word from the list:',
    'type' => 'reading',
    'sentences' => [
        "Yesterday I {{1}} to the park with my brother. We {{2}} football and laughed a lot. After that, we {{3}} some pizza and {{4}} fresh juice. Finally, we {{5}} the zoo. We {{6}} a lot of exotic animals there. I {{7}} a lot of pictures and shared with everyone. We {{8}} some beautiful birds. {{9}} you visit a zoo last summer? Did you {{10}} a good time there?",
    ],
    'answers' => [
        'went',
        'played',
        'ate',
        'drank',
        'visited', 
        'saw',
        'took',
        'saw',
        'Did',
        'have',
    ],
];

?>
@include('slider.game.drag-and-drop-blanks-v2', ['content' => $content])
