@php
    $content = [
        'page_title'    => 'Listening',
        'title'         => 'Listening',
        'subtitle' => 'Listen to a police officer interviewing Lucille Carrington about her husband’s death
and practise the conversation',
'subtitle_bubble' => 'Fill in the Dialogue with words from the list',
        'audio'         => materialAsset('slider/A2/Intermediate/chapter-6/audios/slide13.mp3'),
        'script'        => [
            'Detective: Mrs. Carrington, where were you on June 5th?',
            'Mrs. Carrington: I was staying with a friend in a village. She was ill, and I was looking after her.',
            'Detective: What were you doing that afternoon?',
            'Mrs. Carrington: I went into the city to buy tea for her. I have the receipts.',
            'Detective: Did you go alone?',
            'Mrs. Carrington: Yes.',
            'Detective: Your neighbor says she saw you at your house. She heard a man and a woman arguing.',
            'Mrs. Carrington: It wasn’t me.',
            'Detective: Then who was it?',
            'Mrs. Carrington: I think my husband had a lover. I found perfume and a dinner receipt for two.',
            'Detective: Maybe she killed him… or maybe you did.',
            'Mrs. Carrington: No!',
            'Detective: We will find the truth.',
        ],

        'desktop_game_width' => 60,
        'desktop_pool_width' => 40,

        'sentences' => [
            "<strong class='text-blue-700 dark:text-blue-200'>Detective:</strong> Mrs. Carrington, where were you on June 5th?",
            "<strong class='text-rose-700 dark:text-rose-300'>Mrs. Carrington:</strong> I was {{1}} with a friend. She was ill, and I was {{2}} after her.",
            "<strong class='text-blue-700 dark:text-blue-200'>Detective:</strong> What did you do that afternoon?",
            "<strong class='text-rose-700 dark:text-rose-300'>Mrs. Carrington:</strong> I {{3}} into the city to {{4}} some tea.",
            "<strong class='text-blue-700 dark:text-blue-200'>Detective:</strong> Did you go {{5}}?",
            "<strong class='text-rose-700 dark:text-rose-300'>Mrs. Carrington:</strong> Yes, I did.",
            "<strong class='text-blue-700 dark:text-blue-200'>Detective:</strong> Your neighbor says she {{6}} loud voices. A man and a woman were {{7}}.",
            "<strong class='text-rose-700 dark:text-rose-300'>Mrs. Carrington:</strong> I think my husband had a {{8}}. I {{9}} a receipt for dinner for two.",
            "<strong class='text-blue-700 dark:text-blue-200'>Detective:</strong> Maybe she {{10}} him…",
        ],

        'answers' => [
            'staying',
            'looking',
            'went',
            'buy',
            'alone',
            'heard',
            'arguing',
            'lover',
            'found',
            'killed',
        ],
    ];
@endphp

@include("slider.game.drag-and-drop-blanks")
