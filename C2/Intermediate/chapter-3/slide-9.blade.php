<?php

$content = [
    'title'    => 'Practice 2',
    'subtitle' => 'Read and answer these questions.',

    'reading_title' => '',

    'passage' => [
        'Last week, I went to the bank to open a new savings account. I brought my ID and proof of address. The clerk explained account types, fees, and how to get a debit card. I asked about online banking and automatic payments. The clerk patiently explained everything. I left feeling confident because I understood all the procedures and knew how to manage my account safely.',
    ],

    'questions' => [
        'Describe the steps the speaker took to open a new savings account.',
        'Explain why proof of address and identification are important when opening a bank account.',
        'Discuss the role of the bank clerk in helping the customer understand account options and fees.',
        'Analyze how learning about online banking and automatic payments can help manage money safely.',
        'Evaluate why understanding banking procedures can increase a person\'s confidence and financial responsibility.',
    ],
];

?>

@include('slider.C2.components.reading-response', ['content' => $content])