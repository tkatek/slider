{{-- Canva source page 6: https://canva.link/y4h0j64e7zqgakl --}}
@php
    $content = [
        'title' => 'Watch Again and Do the Quiz',
        'subtitle' => 'Watch each section and answer the questions. The final question is an open reflection.',
        'video' => materialAsset('slider/B2/Advanced/chapter-8/videos/life-saving-inventions.mp4'),
        'transcript' => [
            'Imagine a world where medical emergencies could not be treated, or where a small accident could easily become fatal. For our ancestors, this was often a reality.',
            'Over time, innovative minds have developed inventions that have saved lives, improved healthcare and changed the way we live. Let\'s look at some of the most important life-saving innovations.',
            'The discovery of antiseptics and the development of anaesthesia revolutionised medicine. They made surgery safer by reducing infections and allowing doctors to perform complex procedures without causing patients severe pain.',
            'The defibrillator has become an essential tool in emergency medicine. It can deliver an electrical shock to the heart during cardiac arrest and help restore a normal heartbeat.',
            'Another life-saving technique is CPR, which has helped people survive cardiac emergencies when immediate medical treatment was not available.',
            'Life-saving inventions are not limited to medicine. Seat belts and airbags have made travelling by car much safer.',
            'By securing passengers and cushioning the impact of a collision, these technologies have reduced the risk of serious injury and death.',
            'Organ transplantation has given many seriously ill patients a second chance at life. Replacing a damaged or failing organ with a healthy one has improved both survival rates and quality of life.',
            'Artificial organs and devices such as pacemakers and artificial joints have also helped people manage serious or long-term health conditions.',
            'One of the most important developments in medical history has been the vaccine.',
            'For centuries, diseases such as smallpox, polio and measles caused millions of deaths. Vaccines have helped prevent these diseases and protect communities around the world.',
            'If vaccines had never been developed, many people would still be at risk from diseases that can now be prevented.',
            'Insulin therapy has transformed the lives of people with diabetes. It has made it possible for many patients to manage the condition and live longer, healthier lives.',
            'Other medical treatments, including antiviral drugs and radiation therapy, have also improved survival rates and helped patients live with serious diseases.',
            'Technology has also changed access to healthcare. Telemedicine has made medical care available to people living in remote or underserved areas.',
            'At the same time, clean-water and sanitation systems have improved public health by preventing the spread of waterborne diseases.',
            'These are only some of the innovations that have changed human health and saved lives.',
            'They have not only helped people live longer, but have also improved their quality of life.',
            'But what about the future?',
            'What life-saving invention do we still need?',
            'And what would happen if one of today\'s most important medical inventions had never been developed?',
        ],
        'isQuiz' => true,
        'questions' => [
            [
                'time' => 20000,
                'type' => 'mcq',
                'question' => 'What is the main purpose of the video?',
                'options' => [
                    'To explain how modern hospitals operate',
                    'To describe inventions that have helped save lives and improve health',
                    'To compare healthcare in the past and present',
                    'To explain how scientists develop new medicines',
                ],
                'correct_answer' => 1,
            ],
            [
                'time' => 58000,
                'type' => 'true_false',
                'question' => 'Antiseptics, anaesthesia, defibrillators and CPR have all contributed to safer or more effective medical care.',
                'correct_answer' => 'True',
            ],
            [
                'time' => 98000,
                'type' => 'mcq',
                'question' => 'According to the video, what have seat belts, airbags and organ transplants helped to achieve?',
                'options' => [
                    'They have made medical treatment unnecessary.',
                    'They have reduced the need for hospitals.',
                    'They have helped reduce deaths or improve people’s chances of survival.',
                    'They have completely eliminated serious health problems.',
                ],
                'correct_answer' => 2,
            ],
            [
                'time' => 138000,
                'type' => 'input',
                'question' => 'Vaccines have helped ________ diseases and protect communities around the world.',
                'accepted_answers' => [
                    'prevent',
                ],
            ],
            [
                'time' => 175000,
                'type' => 'input',
                'question' => 'Reflection: If vaccines had never been developed, __________________________ today. Give your own answer.',
                'accepted_answers' => [
                    'many people would still be at risk from preventable diseases',
                ],
                'accept_any_answer' => true,
                'explanation' => 'Possible answer: If vaccines had never been developed, many people would still be at risk from preventable diseases today.',
            ],
        ],
        'page_title' => 'Watch Again and Do the Quiz',
    ];
@endphp

@include('slider.video.interactive', ['content' => $content])
