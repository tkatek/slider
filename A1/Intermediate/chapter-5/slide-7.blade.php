@php
    $content = [
        'page_title' => 'Listening',
        'title'      => 'Practice 2: Listening',
        'subtitle'   => 'Listen to the conversation and fill in the blanks.',
        'audio'      => materialAsset('slider/A1/Intermediate/chapter-5/audios/slide7.mp3'),
        'script'     => [
            'Pharmacist: Here’s your medicine, Mrs. Park.',
            'Patient: Thank you.',
            'Pharmacist: Take 1 tablet three times a day after meals. These tablets may cause some dizziness, especially if you mix with alcohol, so don’t drink after you take one of these. Do you have any allergies?',
            'Patient: That’s 1 tablet three times a day, right? And no alcohol?',
            'Pharmacist: Correct. Make sure you take it after eating something. You should usually wait about 20 minutes.',
            'Patient: Ok. Thanks.',
        ],

        'desktop_game_width' => 60,
        'desktop_pool_width' => 40,
        'sentence_line_class' => '!leading-[2.2]',

        'sentences' => [
            "<strong class='text-blue-600 dark:text-blue-400'>Pharmacist:</strong> Here’s your {{1}}, Mrs. Park.",
            "<strong class='text-pink-600 dark:text-pink-400'>Patient:</strong> Thank you.",
            "<strong class='text-blue-600 dark:text-blue-400'>Pharmacist:</strong> {{2}} 1 tablet three {{3}} a day after meals. These tablets may {{4}} some dizziness, especially if you {{5}} with alcohol, so don’t drink after you {{6}} one of these. Do you have any {{7}}?",
            "<strong class='text-pink-600 dark:text-pink-400'>Patient:</strong> That’s 1 tablet three times a day, right? And no alcohol?",
            "<strong class='text-blue-600 dark:text-blue-400'>Pharmacist:</strong> {{8}}. Make {{9}} you take it after eating something. You should usually {{10}} about 20 minutes.",
            "<strong class='text-pink-600 dark:text-pink-400'>Patient:</strong> Ok. Thanks.",
        ],

        'answers' => [
            'medicine',
            'Take',
            'times',
            'cause',
            'mix',
            'take',
            'allergies',
            'correct',
            'sure',
            'wait',
        ],

        'sfx' => [
            'correct' => materialAsset('slider/sounds/correct.wav'),
            'wrong'   => materialAsset('slider/sounds/wrong.wav'),
        ],
    ];
@endphp

@include("slider.game.drag-and-drop-blanks")