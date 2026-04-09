@php
    $content = [
        'page_title' => 'Writing',
        'title' => 'Writing',
        'subtitle' => 'Drag & drop the suitable
word to complete the
sentences',

        'sentences' => [
            "<span class='mr-1 inline-block font-extrabold text-blue-600 dark:text-blue-400'>Receptionist:</span> Hi, can I help you?",
            "<span class='mr-1 inline-block font-extrabold text-pink-600 dark:text-pink-400'>Melissa:</span> Yes, I made a reservation a couple of weeks ago.",
            "<span class='mr-1 inline-block font-extrabold text-blue-600 dark:text-blue-400'>Receptionist:</span> What name did you make it under, please?",
            "<span class='mr-1 inline-block font-extrabold text-pink-600 dark:text-pink-400'>Melissa:</span> Simmonds, Melissa Simmonds.",
            "<span class='mr-1 inline-block font-extrabold text-blue-600 dark:text-blue-400'>Receptionist:</span> Ah, yes, a single {{1}} for two nights.",
            "<span class='mr-1 inline-block font-extrabold text-pink-600 dark:text-pink-400'>Melissa:</span> Actually, it was a double room for three nights.",
            "<span class='mr-1 inline-block font-extrabold text-blue-600 dark:text-blue-400'>Receptionist:</span> Oh, I’m sorry about that. I’ll just change the {{2}}. Right, so that’s a double room for three nights.",
            "<span class='mr-1 inline-block font-extrabold text-pink-600 dark:text-pink-400'>Melissa:</span> Yes, I’ll be checking {{3}} on Monday morning.",
            "<span class='mr-1 inline-block font-extrabold text-blue-600 dark:text-blue-400'>Receptionist:</span> Could I have your credit card and {{4}}, please?",
            "<span class='mr-1 inline-block font-extrabold text-pink-600 dark:text-pink-400'>Melissa:</span> Yes, here you are.",
            "<span class='mr-1 inline-block font-extrabold text-blue-600 dark:text-blue-400'>Receptionist:</span> Thanks. You’re in room 625, which is on the sixth floor. Here’s your key card, and the {{5}} is just over there.",
            "<span class='mr-1 inline-block font-extrabold text-pink-600 dark:text-pink-400'>Melissa:</span> Great. What time is the restaurant open for {{6}}, please?",
            "<span class='mr-1 inline-block font-extrabold text-blue-600 dark:text-blue-400'>Receptionist:</span> Between 7am and 10am.",
            "<span class='mr-1 inline-block font-extrabold text-pink-600 dark:text-pink-400'>Melissa:</span> OK, and is there a swimming pool here?",
            "<span class='mr-1 inline-block font-extrabold text-blue-600 dark:text-blue-400'>Receptionist:</span> Yes, just down those stairs over there on the right. We’ve got some pool {{7}} if you need one.",
            "<span class='mr-1 inline-block font-extrabold text-pink-600 dark:text-pink-400'>Melissa:</span> Perfect.",
            "<span class='mr-1 inline-block font-extrabold text-blue-600 dark:text-blue-400'>Receptionist:</span> And let me know if there’s anything else you need. Enjoy your stay.",
            "<span class='mr-1 inline-block font-extrabold text-pink-600 dark:text-pink-400'>Melissa:</span> Thanks.",
        ],

        'answers' => [
            'room',
            'booking',
            'out',
            'passport',
            'lift',
            'breakfast',
            'towels',
        ],

    ];
@endphp

@include('slider.game.drag-and-drop-blanks', ['content' => $content])