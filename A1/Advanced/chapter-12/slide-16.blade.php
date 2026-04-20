@php
    $content = [
        'page_title'    => 'Writing',
        'title'         => 'Writing',
        'subtitle'      => 'Read the dialogue & fill in the missing word from the box',
        'audio'         => '',
        'script'        => [
            'Woman: Hello sir, is there anything I can help you with?',
            'Man: Um, yeah, I was just looking at phones.',
            'Woman: What kind of features were you looking for?',
            'Man: I want a touchscreen smart phone, with a high-res screen.',
            'Woman: What do you think of this one?',
            'Man: Looks nice. How’s the battery life?',
            'Woman: It depends how you use it. It lasts from one to three days.',
            'Man: Hmmm, OK, I think I’ll take it.',
            'Woman: Do you just want the handset, or do you want a contract with it? If you take out a contract, you only pay £50 for the phone.',
            'Man: I don’t really want a contract, but I would like a pay-as-you-go SIM card. Do you have any?',
            'Woman: Yes. The card’s free, but you have to buy £10 credit.',
            'Man: OK, that’s fine.',
            'Woman: Also, with this deal, if you top up every month, you get 50 free minutes and 100 texts.',
            'Man: Sounds good. Where do I pay?',
            'Woman: Right this way, please.',
        ],

        'desktop_game_width' => 60,
        'desktop_pool_width' => 40,

        'sentences' => [
            "<strong class='text-pink-600 dark:text-pink-400'>Woman:</strong> Hello sir, is there anything I can help you with?",
            "<strong class='text-blue-600 dark:text-blue-400'>Man:</strong> Um, yeah, I was just looking at phones.",
            "<strong class='text-pink-600 dark:text-pink-400'>Woman:</strong> What kind of features were you looking for?",
            "<strong class='text-blue-600 dark:text-blue-400'>Man:</strong> I want a touchscreen {{1}} phone, with a high-res screen.",
            "<strong class='text-pink-600 dark:text-pink-400'>Woman:</strong> What do you think of this one?",
            "<strong class='text-blue-600 dark:text-blue-400'>Man:</strong> Looks nice. How’s the {{2}} life?",
            "<strong class='text-pink-600 dark:text-pink-400'>Woman:</strong> It depends how you use it. It lasts from one to three days.",
            "<strong class='text-blue-600 dark:text-blue-400'>Man:</strong> Hmmm, OK, I think I’ll take it.",
            "<strong class='text-pink-600 dark:text-pink-400'>Woman:</strong> Do you just want the handset, or do you want a contract with it? If you take out a {{3}}, you only pay £50 for the phone.",
            "<strong class='text-blue-600 dark:text-blue-400'>Man:</strong> I don’t really want a contract, but I would like a pay-as-you-go {{4}} card. Do you have any?",
            "<strong class='text-pink-600 dark:text-pink-400'>Woman:</strong> Yes. The card’s free, but you have to buy £10 credit.",
            "<strong class='text-blue-600 dark:text-blue-400'>Man:</strong> OK, that’s fine.",
            "<strong class='text-pink-600 dark:text-pink-400'>Woman:</strong> Also, with this deal, if you top up every month, you get 50 free minutes and 100 texts.",
            "<strong class='text-blue-600 dark:text-blue-400'>Man:</strong> Sounds good. Where do I {{5}}",
            "<strong class='text-pink-600 dark:text-pink-400'>Woman:</strong> Right this way, please.",
        ],

        'answers' => [
            'smart',
            'battery',
            'contract',
            'sim',
            'pay?',
        ],
    ];
@endphp

@include("slider.game.drag-and-drop-blanks")