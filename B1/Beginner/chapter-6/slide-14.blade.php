@php
    $content = [
        'page_title' => 'Listen Again',
        'title'      => 'Listen Again',
        'subtitle'   => 'Fill-in the missing words from the list',
        'audio'      => materialAsset('slider/B1/Beginner/chapter-6/audios/slide14.mp3'),

        'script' => [
            'Alfie: Hey Abbi, what do you prefer, indoor or outdoor activities?',
            'Abbi: I would say outdoor activities, for sure. I love hiking and camping.',
            "Alfie: That's cool. I'm more of an indoor person. I like reading and watching movies at home.",
            'Abbi: Yeah, I also like those things, but I feel like I need some fresh air and nature from time to time.',
            'Alfie: I understand that. I just feel more comfortable indoors, I guess.',
            "Abbi: I get it. But you should try some outdoor activities with me sometime. Maybe you'll change your mind.",
            "Alfie: Sure, I'm open to new experiences. Maybe you can show me some good hiking spots.",
        ],

        'sentences' => [
            "<strong class='text-blue-600 dark:text-blue-400'>Alfie:</strong> Hey Abbi, what do you prefer, indoor or outdoor activities?",
            "<strong class='text-pink-600 dark:text-pink-400'>Abbi:</strong> I would say outdoor activities, for sure. I love hiking and camping.",
            "<strong class='text-blue-600 dark:text-blue-400'>Alfie:</strong> That's cool. I'm more of an {{1}} person. I like reading and watching movies at home.",
            "<strong class='text-pink-600 dark:text-pink-400'>Abbi:</strong> Yeah, I also like those things, but I {{2}} like I need some fresh air and nature from {{3}} to time.",
            "<strong class='text-blue-600 dark:text-blue-400'>Alfie:</strong> I understand that. I just feel more comfortable indoors, I guess.",
            "<strong class='text-pink-600 dark:text-pink-400'>Abbi:</strong> I get it. But you should try some outdoor activities with me sometime. Maybe you'll {{4}} your mind.",
            "<strong class='text-blue-600 dark:text-blue-400'>Alfie:</strong> Sure, I'm open to new experiences. Maybe you can show me some good hiking {{5}}.",
        ],

        'answers' => [
            'indoor',
            'feel',
            'time',
            'change',
            'spots',
        ],
    ];
@endphp

@include("slider.game.drag-and-drop-blanks")