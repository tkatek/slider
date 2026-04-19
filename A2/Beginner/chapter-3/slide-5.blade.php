<?php
 $content = [
     'page_title' => 'Discussion',
     'title'      => 'Discussion',
     'subtitle'   => '',
     'image'      => materialAsset('slider/A2/Beginner/chapter-3/img/slide5.webp'),

     'cards' => [
         [
             'emoji' => '🌧️',
             'label' => 'Question 1',
             'text'  => 'Can you guess what does this mean?',
         ],
         [
             'emoji' => '🌤️',
             'label' => 'Question 2',
             'text'  => 'Do you know what is the weather forecast for today',
         ],

     ],
 ];
 ?>

@include('slider.other.discussion', ['content' => $content])

