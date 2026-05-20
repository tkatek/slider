<?php
$content = [
    'video'      => materialAsset('slider/A2/Intermediate/chapter-1/video/clothes-encrypted/clothes.m3u8'),
    'thumbnail'  => materialAsset('slider/A2/Intermediate/chapter-1/img/slide13.webp'),
    'isQuiz'     => 0,
    'questions'  => [],
    'subtitles'  => [
        ['start' => 0,   'end' => 4,   'text' => 'Welcome to this video about traditional clothes around the world.'],
        ['start' => 4,   'end' => 12,  'text' => 'People from different countries wear special clothes that show their culture and history. Let\'s learn some of them.'],
        ['start' => 12.5,  'end' => 24,  'text' => 'In Japan, people wear a kimono. It is a long robe with wide sleeves. Women often wear beautiful colorful kimonos on special days.'],
        ['start' => 25.5,  'end' => 34,  'text' => 'In India, women wear a sari. A sari is a long piece of cloth that is wrapped around the body. It looks very elegant.'],
        ['start' => 35.5,  'end' => 45,  'text' => 'In Scotland, men wear a kilt. A kilt is a short pleated skirt made of wool. It is part of the traditional Scottish dress.'],
        ['start' => 46.8,  'end' => 54.5,  'text' => 'In Mexico, people wear a sombrero. It is a big hat with a wide brim that protects them from the sun.'],
        ['start' => 56.5,  'end' => 67.5,  'text' => 'In Saudi Arabia and many Arab countries, men wear a long white robe called a thobe or dishdasha, and a head covering called a ghutra or keffiyeh.'],
        ['start' => 68,  'end' => 74.5,  'text' => 'Women in many Arab countries wear an abaya — a long black cloak — and a hijab to cover their hair.'],
        ['start' => 75.7,  'end' => 85,  'text' => 'In China, the traditional dress for women is called a cheongsam or qipao. It is a tight-fitting dress with a high collar.'],
        ['start' => 86.5,  'end' => 93.5,  'text' => 'In Vietnam, women wear an áo dài. It is a long silk tunic worn over trousers.'],
        ['start' => 93.8,  'end' => 101,  'text' => 'In Russia, women sometimes wear a sarafan — a traditional sleeveless dress.'],
        ['start' => 101.7,  'end' => 113, 'text' => 'In many African countries, people wear colorful clothes made from bright fabrics. In Nigeria, for example, men wear a dashiki or agbada.'],
        ['start' => 113.5, 'end' => 120, 'text' => 'These traditional clothes are still worn today on festivals, weddings, and important celebrations.'],
    ],
];
?>
@include("slider.video.interactive", ['content' => $content])