<?php

$content = [
    'title'    => 'Practice 2',
    'subtitle' => 'Read and answer these questions.',

    'reading_title' => 'Persuasion in Professional Environments',

    'passage' => [
        'Persuasion in professional environments requires balance. Advanced communicators avoid emotional arguments and rely on logic, evidence, and respectful language.',
        'Instead of insisting, they acknowledge opposing views and respond thoughtfully. Phrases like “I see your point” or “From my perspective” create openness rather than resistance.',
        'Effective persuasion builds trust, strengthens collaboration, and leads to better decision-making outcomes.',
    ],

    'questions' => [
        'Explain why balance is essential in professional persuasion and how it affects communication outcomes.',
        'Discuss the importance of using logic, evidence, and respectful language instead of emotional arguments in the workplace.',
        'Analyze how acknowledging opposing views can reduce resistance and improve persuasion.',
        'Evaluate the role of diplomatic phrases, such as “I see your point” or “From my perspective”, in building openness during discussions.',
        'Describe how effective persuasion contributes to trust, collaboration, and better decision-making in professional environments.',
    ],
];

?>

@include('slider.C2.components.reading-response', ['content' => $content])