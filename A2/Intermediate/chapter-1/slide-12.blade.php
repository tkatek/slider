@php
    $content = [
        'page_title'    => 'Listen again',
        'title'         => 'Listen again',
        'subtitle'      => 'Fill in the missing words',
        'audio'         => materialAsset('slider/A2/Intermediate/chapter-1/audios/slide11.mp3'),
        'script'        => [
            'In Korea, when two male friends meet, they usually just say, "Yes," or they say, "Hello."',
            "But when two female friends meet, they hug, but they don't kiss usually.",
            'Um, when male and female friends meet, they also just say, "Hello."',
        ],

        'desktop_game_width' => 60,
        'desktop_pool_width' => 40,

        'sentences' => [
            'In Korea, when two male friends {{1}}, they usually just say, "Yes," or they say, "Hello."',
            "But when two female friends meet, they {{2}}, but they don't kiss usually.",
            'Um, when male and female friends meet, they also just say, "{{3}}."',
        ],

        'answers' => [
            'meet',
            'hug',
            'Hello',
        ],
    ];
@endphp

@include("slider.game.drag-and-drop-blanks")
