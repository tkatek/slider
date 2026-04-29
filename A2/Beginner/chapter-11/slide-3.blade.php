<?php
$content = [
    'page_title' => 'Learning Objectives',

    'title'      => 'Learning Objectives',
    'subtitle'   => 'By the end of the lesson, students will be able to:',
    'top_badge'  => '🎯 Lesson Goals',
    'cards_grid' => 'grid-cols-1 sm:grid-cols-2',

    'outcomes' => [
        [
            'number' => '01',
            'badge'  => 'from-emerald-500 to-teal-500',
            'title'  => '🥗 Eating Habits',
            'description' => 'Talk about their own eating and exercise habits (e.g. “I eat fruit every day” / “I don’t eat junk food”).',
        ],
        [
            'number' => '02',
            'badge'  => 'from-lime-500 to-green-500',
            'title'  => '🍎 Healthy Diets',
            'description' => 'Discuss healthy diets and say what they should eat or drink more or less of.',
        ],
        [
            'number' => '03',
            'badge'  => 'from-sky-500 to-blue-500',
            'title'  => '💬 Diet Conversation',
            'description' => 'Understand and retell a simple conversation about losing weight and trying different diets (Atkins, vegan, paleo, 5:2).',
        ],
        [
            'number' => '04',
            'badge'  => 'from-violet-500 to-purple-600',
            'title'  => '📚 Health Vocabulary',
            'description' => 'Use new vocabulary about health, diets, sports, and ways of cooking food.',
        ],
        [
            'number' => '05',
            'badge'  => 'from-amber-500 to-orange-500',
            'title'  => '⚖️ Healthy Choices',
            'description' => 'Identify healthy and unhealthy eating habits.',
        ],
        [
            'number' => '06',
            'badge'  => 'from-cyan-500 to-sky-500',
            'title'  => '🎧 Exercise Listening',
            'description' => 'Listen to people talking about exercise and say what sports they do or want to try.',
        ],
        [
            'number' => '07',
            'badge'  => 'from-indigo-500 to-blue-600',
            'title'  => '💡 Simple Advice',
            'description' => 'Give simple advice using should and shouldn’t (e.g. “You should eat steamed vegetables” / “You shouldn’t eat too much fried food”).',
        ],
        [
            'number' => '08',
            'badge'  => 'from-rose-500 to-pink-500',
            'title'  => '🗣️ Healthy Lifestyle',
            'description' => 'Practise a short conversation about starting a healthier lifestyle.',
        ],
        [
            'number' => '09',
            'badge'  => 'from-yellow-500 to-amber-500',
            'title'  => '✏️ Sentence Practice',
            'description' => 'Complete simple sentences about healthy eating.',
        ],
        [
            'number' => '10',
            'badge'  => 'from-red-500 to-rose-600',
            'title'  => '✍️ Writing Task',
            'description' => 'Write a short 5-sentence paragraph about healthy food choices for losing weight.',
        ],
    ],
];
?>

@include('slider.objectives.objectives-images', ['content' => $content])
