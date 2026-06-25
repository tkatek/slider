@php
    $content['questions'] = [
        'You can shop anytime, anywhere, 24/7.',
        'You can return or exchange products more easily, in person.',
        'No queues.',
        'You can see, touch, try any product on/off.',
        'No need to carry heavy items, they come to your door.',
        'It takes less time.',
        'Shop assistants can help with any advice or question.',
        'You get item immediately after paying.',
        'You can compare prices on different websites quickly.',
    ];

    $content['title'] = 'Speaking';
    $content['subtitle'] = "Spin the wheel, read the sentence, say if it’s an advantage of online or offline shopping.";
@endphp

@include("slider.game.spin-wheel", ['content' => $content])