@php
    $content = [
        'page_title' => 'Practice 8: Writing',
        'title'      => 'Practice 8: Writing',
        'subtitle'   => 'Drag & Drop the suitable word in the text',
        'audio'      => materialAsset('slider/A1/Advanced/chapter-2/audios/slide15.mp3'),
        'script'     => [
            "Receptionist: Good morning, sir. How may I help you?",
            "Guest: Hello. I think I’ve got some problems in my room.",
            "Receptionist: Certainly, sir. What’s your room number, please?",
            "Guest: Oh, yes. It’s 447.",
            "Receptionist: Right. What’s the problem, Mr. Peterson?",
            "Guest: The thing is that the air conditioning doesn’t work, it is really hot.",
            "Receptionist: OK. I’m sorry, Mr. Peterson. Would you like me to send you the engineer and check it?",
            "Guest: Well, it would be better to change rooms because this one is noisy and small for me. And the shower doesn’t work.",
            "Receptionist: Please accept my apologies for the inconvenience.",
            "Guest: So, is it possible to have another room for me today?",
            "Receptionist: Let me see… Yes. We can offer you room 205. It is larger and not noisy at all.",
            "Guest: That sounds perfect. But please check that the room is clean and there are towels and a hair-dryer in the bathroom.",
            "Receptionist: Certainly, sir.",
            "Guest: Thanks for your help.",
        ],

        'desktop_game_width' => 60,
        'desktop_pool_width' => 40,

        'sentences' => [
            "<strong class='text-blue-600 dark:text-blue-400'>Receptionist:</strong> Good morning, sir. How may I help you?",
            "<strong class='text-pink-600 dark:text-pink-400'>Guest:</strong> Hello. I think I’ve got some {{1}} in my room.",
            "<strong class='text-blue-600 dark:text-blue-400'>Receptionist:</strong> {{2}}, sir. What’s your room number, please?",
            "<strong class='text-pink-600 dark:text-pink-400'>Guest:</strong> Oh, yes. It’s 447.",
            "<strong class='text-blue-600 dark:text-blue-400'>Receptionist:</strong> Right. What’s the {{3}}, Mr. Peterson?",
            "<strong class='text-pink-600 dark:text-pink-400'>Guest:</strong> The thing is that the air {{4}} doesn’t work, it is really hot.",
            "<strong class='text-blue-600 dark:text-blue-400'>Receptionist:</strong> OK. I’m sorry, Mr. Peterson. Would you like me to {{5}} you the engineer and check it?",
            "<strong class='text-pink-600 dark:text-pink-400'>Guest:</strong> Well, it would be better to {{6}} rooms because this one is {{7}} and small for me. And the shower doesn’t {{8}}.",
            "<strong class='text-blue-600 dark:text-blue-400'>Receptionist:</strong> Please accept my {{9}} for the inconvenience.",
            "<strong class='text-pink-600 dark:text-pink-400'>Guest:</strong> So, is it possible to {{10}} another room for me today?",
            "<strong class='text-blue-600 dark:text-blue-400'>Receptionist:</strong> Let me see… Yes. We can {{11}} you room 205. It is larger and not noisy at all.",
            "<strong class='text-pink-600 dark:text-pink-400'>Guest:</strong> That sounds perfect. But please {{12}} that the room is {{13}} and there are towels and a hair-dryer in the bathroom.",
            "<strong class='text-blue-600 dark:text-blue-400'>Receptionist:</strong> {{14}}, sir.",
            "<strong class='text-pink-600 dark:text-pink-400'>Guest:</strong> Thanks for your help.",
        ],

        'answers' => [
            'problems',
            'Certainly',
            'problem',
            'conditioning',
            'send',
            'change',
            'noisy',
            'work',
            'apologies',
            'have',
            'offer',
            'check',
            'clean',
            'Certainly',
        ],
    ];
@endphp

@include("slider.game.drag-and-drop-blanks")