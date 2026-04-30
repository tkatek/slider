<?php
$content = [
    'page_title'    => 'Practice 1: Warm-up',
    'title'         => 'Practice 1: Warm-up',
    'subtitle'      => 'Find the match',
    'type' => 'image',
    'items_per_line' => 4,
    'items_per_line_mobile' => 2,
    'categories' => [
        'Face-to-face' => [
            'image' => materialAsset('slider/A2/Intermediate/chapter-10/img/slide3/face-to-face.webp'),
            'items' => ['Face-to-face'],
        ],
        'Chat on social media' => [
            'image' => materialAsset('slider/A2/Intermediate/chapter-10/img/slide3/chat-on-social-media.webp'),
            'items' => ['Chat on social media'],
        ],
        'Send a text message' => [
            'image' => materialAsset('slider/A2/Intermediate/chapter-10/img/slide3/send-a-text-message.webp'),
            'items' => ['Send a text message'],
        ],
        'Chat on Skype' => [
            'image' => materialAsset('slider/A2/Intermediate/chapter-10/img/slide3/chat-on-skype.webp'),
            'items' => ['Chat on Skype'],
        ],
        'Talk on my mobile' => [
            'image' => materialAsset('slider/A2/Intermediate/chapter-10/img/slide3/talk-on-my-mobile.webp'),
            'items' => ['Talk on my mobile'],
        ],
        'Send an email' => [
            'image' => materialAsset('slider/A2/Intermediate/chapter-10/img/slide3/send-an-email.webp'),
            'items' => ['Send an email'],
        ],
        'Send a letter' => [
            'image' => materialAsset('slider/A2/Intermediate/chapter-10/img/slide3/send-a-letter.webp'),
            'items' => ['Send a letter'],
        ],
        'Talk on a landline' => [
            'image' => materialAsset('slider/A2/Intermediate/chapter-10/img/slide3/talk-on-a-landline.webp'),
            'items' => ['Talk on a landline'],
        ],
    ],
];

?>
@include('slider.game.drag-and-drop', ['content' => $content])
