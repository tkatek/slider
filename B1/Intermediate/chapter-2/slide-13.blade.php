@php
    $content = [
        'page_title' => 'Practice 6',
        'title'      => 'Practice 6',
        'subtitle'   => 'Fill in each gap using must have, can’t have, could have, may have or might have.',

        'sentences' => [
            "<strong class='text-slate-700 dark:text-slate-200'>1.</strong> I am sure he was here. I saw his car in front of the building.<br>He {{1}} been here.",

            "<strong class='text-slate-700 dark:text-slate-200'>2.</strong> <strong class='text-blue-600 dark:text-blue-400'>A:</strong> Where is James? He should already be here, shouldn't he?<br><strong class='text-emerald-600 dark:text-emerald-400'>B:</strong> Yes, he should but I don't know why he isn't here — he {{2}} missed the bus.",

            "<strong class='text-slate-700 dark:text-slate-200'>3.</strong> I'm not sure if I passed the exam. I don't feel very sure that I passed.<br>I {{3}} passed the exam.",

            "<strong class='text-slate-700 dark:text-slate-200'>4.</strong> <strong class='text-blue-600 dark:text-blue-400'>A:</strong> Last summer I took four exams and failed them all!<br><strong class='text-emerald-600 dark:text-emerald-400'>B:</strong> You {{4}} been very disappointed.",

            "<strong class='text-slate-700 dark:text-slate-200'>5.</strong> She speaks excellent French. I'm sure she's lived in Paris for a long time.<br>She {{5}} lived in Paris for a long time.",

            "<strong class='text-slate-700 dark:text-slate-200'>6.</strong> <strong class='text-blue-600 dark:text-blue-400'>A:</strong> Their plane was delayed and they had to wait 36 hours in the airport.<br><strong class='text-emerald-600 dark:text-emerald-400'>B:</strong> They {{6}} been very happy with the airline.",
        ],

        'answers' => [
            'must have',
            'might have',
            'may have',
            'must have',
            'must have',
            "can’t have",
        ],
    ];
@endphp

@include("slider.game.drag-and-drop-blanks")