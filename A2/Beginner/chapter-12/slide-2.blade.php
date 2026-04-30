<?php
$content = [
    'page_title' => 'Learning Objectives',

    'title'      => 'Learning Objectives',
    'subtitle'   => 'By the end of the lesson, you will be able to:',
    'top_badge'  => '🎯 Lesson Goals',
    'cards_grid' => 'grid-cols-1 sm:grid-cols-2',

    'outcomes' => [
        [
            'number' => '01',
            'badge'  => 'from-green-500 to-emerald-600',
            'title'  => '🍎 Food Groups',
            'description' => 'Identify the main food groups in the food pyramid<br><span class="text-violet-600 dark:text-violet-300">(fruits, vegetables, grains, protein, dairy, fats)</span>',
        ],
        [
            'number' => '02',
            'badge'  => 'from-lime-500 to-green-500',
            'title'  => '🥗 Classify Foods',
            'description' => 'Classify different foods into the correct food groups.',
        ],
        [
            'number' => '03',
            'badge'  => 'from-teal-500 to-cyan-500',
            'title'  => '📚 Use Quantifiers',
            'description' => 'Use quantifiers correctly:<br><span class="text-violet-600 dark:text-violet-300">a lot of (countable & uncountable)<br>many (countable)<br>much (uncountable)</span>',
        ],
        [
            'number' => '04',
            'badge'  => 'from-sky-500 to-blue-500',
            'title'  => '🗣️ Describe Eating Habits',
            'description' => 'Describe eating habits using a lot of / much / many<br><span class="text-violet-600 dark:text-violet-300">(I eat a lot of vegetables. I don’t eat much sugar. I eat many fruits.)</span>',
        ],
        [
            'number' => '05',
            'badge'  => 'from-yellow-500 to-orange-500',
            'title'  => '❓ Diet Questions',
            'description' => 'Ask and answer questions about diet using much / many<br><span class="text-violet-600 dark:text-violet-300">(Do you eat many sweets? / Do you drink much milk?)</span>',
        ],
        [
            'number' => '06',
            'badge'  => 'from-indigo-500 to-blue-600',
            'title'  => '⚖️ Balanced Diet',
            'description' => 'Talk about a balanced diet using simple sentences<br><span class="text-violet-600 dark:text-violet-300">(A healthy diet has a lot of fruits and vegetables.)</span>',
        ],
    ],
];
?>

@include('slider.objectives.objectives-images', ['content' => $content])
