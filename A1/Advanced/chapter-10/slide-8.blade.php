<?php
$content = [
    'type' => 'reading',
    'page_title'      => 'Practice 2',
    'title'           => 'Practice 2',
    'subtitle'        => 'Where is everyone?',
    'audio'           => materialAsset("slider/A1/Advanced/chapter-10/audios/slide8/Where-is-everyone.mpeg"),

    'reading_title'   => 'Hana greets Daniel and shares what everyone is doing.',
    'reading_align'   => 'left',
    'reading_plain'   => true,
    'reading_compact' => true,
    'reading_allow_html' => true,

    'passage' => <<<'HTML'
<div style='margin:0;text-align:justify;font-size:.95rem;line-height:1.28;font-weight:600;'><strong>Daniel:</strong> Hey, I'm really sorry I'm late. I came as fast as I could.</div>
<div style='margin:0;text-align:justify;font-size:.95rem;line-height:1.28;font-weight:600;'><strong>Hana:</strong> It's OK. Nobody has really come yet.</div>
<div style='margin:0;text-align:justify;font-size:.95rem;line-height:1.28;font-weight:600;'><strong>Daniel:</strong> Why? Where are they?</div>
<div style='margin:0;text-align:justify;font-size:.95rem;line-height:1.28;font-weight:600;'><strong>Hana:</strong> Well, John is shopping. He is getting some food.</div>
<div style='margin:0;text-align:justify;font-size:.95rem;line-height:1.28;font-weight:600;'><strong>Daniel:</strong> OK, what about Emma? Where is she?</div>
<div style='margin:0;text-align:justify;font-size:.95rem;line-height:1.28;font-weight:600;'><strong>Hana:</strong> Emma has an exam, so she is studying and she is going to come later.</div>
<div style='margin:0;text-align:justify;font-size:.95rem;line-height:1.28;font-weight:600;'><strong>Daniel:</strong> OK, how about Alex? I don't see him around.</div>
<div style='margin:0;text-align:justify;font-size:.95rem;line-height:1.28;font-weight:600;'><strong>Hana:</strong> Oh, Alex is over there. He is preparing for the BBQ.</div>
<div style='margin:0;text-align:justify;font-size:.95rem;line-height:1.28;font-weight:600;'><strong>Daniel:</strong> Oh, yeah, that's right. And how about Marcus and Emily?</div>
<div style='margin:0;text-align:justify;font-size:.95rem;line-height:1.28;font-weight:600;'><strong>Hana:</strong> They are over there. They are playing.</div>
<div style='margin:0;text-align:justify;font-size:.95rem;line-height:1.28;font-weight:600;'><strong>Daniel:</strong> Oh, so how many people are left? Who else is coming?</div>
<div style='margin:0;text-align:justify;font-size:.95rem;line-height:1.28;font-weight:600;'><strong>Hana:</strong> Uh, I don't know. No one has really contacted me yet.</div>
<div style='margin:0;text-align:justify;font-size:.95rem;line-height:1.28;font-weight:600;'><strong>Daniel:</strong> Oh, well, let's hope we can get around ten people maybe.</div>
<div style='margin:0;text-align:justify;font-size:.95rem;line-height:1.28;font-weight:600;'><strong>Hana:</strong> Yes, I hope so.</div>
<div style='margin:0;text-align:justify;font-size:.95rem;line-height:1.28;font-weight:600;'><strong>Daniel:</strong> Cool!</div>
HTML,

    'questions' => [ 
        [
            'prompt'  => 'What is John doing?',
            'correct' => 'shopping',
            'options' => [
                'studying',
                'resting',
                'shopping',
            ],
        ],
        [
            'prompt'  => 'What is Emma doing?',
            'correct' => 'studying',
            'options' => [
                'watching TV',
                'shopping',
                'studying',
            ],
        ],
        [
            'prompt'  => 'What are Marcus and Emily doing?',
            'correct' => 'having fun',
            'options' => [
                'working',
                'having fun',
                'studying',
            ],
        ],
        [
            'prompt'  => 'What is Alex doing?',
            'correct' => 'cooking',
            'options' => [
                'cooking',
                'sleeping',
                'leaving',
            ],
        ],
    ],
];
?>
@include('slider.game.multi-choice-all-in-one', ['content' => $content])

