<?php
$content = [
    'page_title'    => 'Lesson Objectives',
    'title'         => 'Lesson Objectives',
    'subtitle'      => 'By the end of the lesson, you will be able to:',
    'objectives'    => [
        ['icon' => '🏠', 'text' => 'Name rooms and furniture in a house'],
        ['icon' => '📝', 'text' => 'Describe your home in simple sentences'],
    ],

    'image'         => materialAsset('slider/A1/Beginner/chapter-5/img/slide2.webp'),
    'image_alt'     => '',
    'image_size'    => 'max-w-[380px] ',

    'button'        => 'Start Lesson',
];
?>
@include('slider.objectives.objectives-icons', ['content' => $content])