<?php

$content = [
    'type' => 'reading',

    'title'              => 'Practice 2',
    'subtitle'           => 'Read and answer these questions',
    'question_prompt_label' => 'Read and answer these questions',
    'reading_title'      => 'Giving Opinions with Reasons',
    'reading_align'      => 'left',
    'reading_plain'      => true,
    'reading_compact'    => true,
    'reading_allow_html' => true,

    'passage' => [
        '<div class="text-[0.9rem] font-semibold leading-snug text-slate-600 dark:text-slate-300 sm:text-[0.95rem] lg:text-[1rem]">Having an opinion is easy, but justifying it requires deeper thinking. Advanced speakers don\'t simply say what they believe-they explain why they believe it.</div>',
        '<div class="text-[0.9rem] font-semibold leading-snug text-slate-600 dark:text-slate-300 sm:text-[0.95rem] lg:text-[1rem]">For example, instead of saying "Remote work is better," an advanced speaker might say, "Remote work can be more effective because it reduces commuting time and increases flexibility."</div>',
        '<div class="text-[0.9rem] font-semibold leading-snug text-slate-600 dark:text-slate-300 sm:text-[0.95rem] lg:text-[1rem]">This approach makes communication clearer, more convincing, and more professional. Critical thinking allows speakers to respond thoughtfully, even when others disagree.</div>',
    ],

    'questions' => [
        [
            'prompt' => 'Do you agree that justifying an opinion is more important than simply stating it? Why or why not? Explain your answer with clear reasons and examples.',
        ],
        [
            'prompt' => 'How can giving reasons for your opinion make your communication more professional? Discuss this idea using situations from work, study, or daily life.',
        ],
        [
            'prompt' => 'The audio mentions remote work as an example. Choose another topic (education, technology, health, or social media) and explain your opinion using at least two reasons.',
        ],
        [
            'prompt' => 'Why is critical thinking important when people disagree with your opinion? Describe how it helps in conversations and discussions.',
        ],
        [
            'prompt' => 'In your opinion, what is the difference between a beginner speaker and an advanced speaker when expressing opinions? Support your answer with examples.',
        ],
    ],
];

?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])
