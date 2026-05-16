<?php
$content = [
    'title'    => 'Practice 2',
    'subtitle' => 'Read and answer these questions',

    'reading_title' => 'Giving Opinions with Reasons',

    'passage' => [
        'Having an opinion is easy, but justifying it requires deeper thinking. Advanced speakers don\'t simply say what they believe — they explain why they believe it.',
        'For example, instead of saying "Remote work is better," an advanced speaker might say, "Remote work can be more effective because it reduces commuting time and increases flexibility."',
        'This approach makes communication clearer, more convincing, and more professional. Critical thinking allows speakers to respond thoughtfully, even when others disagree.',
    ],

    'questions' => [
        'Do you agree that justifying an opinion is more important than simply stating it? Why or why not? Explain your answer with clear reasons and examples.',
        'How can giving reasons for your opinion make your communication more professional? Discuss this idea using situations from work, study, or daily life.',
        'The audio mentions remote work as an example. Choose another topic (education, technology, health, or social media) and explain your opinion using at least two reasons.',
        'Why is critical thinking important when people disagree with your opinion? Describe how it helps in conversations and discussions.',
        'In your opinion, what is the difference between a beginner speaker and an advanced speaker when expressing opinions? Support your answer with examples.',
    ],
];

?>

@include('slider.C2.components.reading-response', ['content' => $content])
