@php
    $content = [
        'page_title' => 'Practice 4',
        'title'      => 'Practice 4: Listening 2',
        'subtitle'   => 'Listen to the conversation. Write the missing words.',
        'audio'      => materialAsset('slider/A1/Intermediate/chapter-1/audio/slide-12.mp3'),
        'script'     => [
            "Adam: How about going to a movie on Saturday night?",
            "Sara: Saturday night? Sorry, I can't. I have to work.",
            "Adam: Oh, that's too bad.",
            "Sara: Yeah. I can go to the movies Friday night, though. Are you free then?",
            "Adam: Yes, I think so. Can you check what's playing? I can't find my phone.",
            "Sara: Okay, let's see... How about The Monster's Return? There's a 7:30 show.",
            "Adam: That sounds good. Think you can give me a ride?",
            "Sara: Sure. I'll pick you up around seven. See you Friday.",
        ],

        'desktop_game_width' => 60,
        'desktop_pool_width' => 40,

        'sentences' => [
            "<strong class='text-blue-600 dark:text-blue-400'>Adam:</strong> How {{1}} going to a movie on Saturday night?",
            "<strong class='text-pink-600 dark:text-pink-400'>Sara:</strong> Saturday night? {{2}}, I {{3}}. I have to work.",
            "<strong class='text-blue-600 dark:text-blue-400'>Adam:</strong> Oh, that's too bad.",
            "<strong class='text-pink-600 dark:text-pink-400'>Sara:</strong> Yeah. I {{4}} {{5}} to the movies Friday night, though. Are you free then?",
            "<strong class='text-blue-600 dark:text-blue-400'>Adam:</strong> Yes, I {{6}} {{7}}. Can you check what's playing? I can't find my phone.",
            "<strong class='text-pink-600 dark:text-pink-400'>Sara:</strong> Okay, let's see... How about The Monster's Return? There's a 7:30 show.",
            "<strong class='text-blue-600 dark:text-blue-400'>Adam:</strong> That sounds good. Think you can give me a ride?",
            "<strong class='text-pink-600 dark:text-pink-400'>Sara:</strong> Sure. I'll pick you up around seven. See you Friday.",
        ],

        'answers' => [
            'about',
            'sorry',
            "can't",
            'can',
            'go',
            'think',
            'so',
        ],

        'sfx' => [
            'correct' => materialAsset('slider/sounds/correct.wav'),
            'wrong'   => materialAsset('slider/sounds/wrong.wav'),
        ],
    ];
@endphp

@include("slider.game.drag-and-drop-blanks")
