<?php

$content = [
    'title'    => 'Practice 2',
    'subtitle' => 'Read and answer these questions.',

    'reading_title' => '',

    'passage' => [
        'Yesterday, I went to the post office to send a gift to my friend in France. I asked the clerk about express delivery, and she explained the cost and estimated time. I chose express and asked if I needed any forms. She said yes, and I filled them out. Later, I realized I forgot to write my return address. I asked the clerk, and she kindly helped me correct it. Even though it was a busy day, the staff was helpful, and I left feeling confident that my package would arrive safely.',
    ],

    'questions' => [
        'Describe the steps the speaker followed to send the package and why express delivery was chosen.',
        'Explain the importance of asking questions and filling out forms correctly at the post office.',
        'Discuss how the clerk\'s attitude affected the speaker\'s overall experience.',
        'Analyze why correcting small mistakes like the return address is important when sending international packages.',
        'Evaluate how good customer service can make stressful tasks feel easier and more confident.',
    ],
];

?>

@include('slider.C2.components.reading-response', ['content' => $content])