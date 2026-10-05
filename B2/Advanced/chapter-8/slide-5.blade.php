{{-- Canva source page 5: https://canva.link/y4h0j64e7zqgakl --}}
@php
    $content = [
        'title' => 'Life-Saving Inventions',
        'subtitle' => 'How have life-saving inventions changed how long and how well we live?',
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
        'isQuiz' => false,
        'questions' => [
        ],
        'page_title' => 'Life-Saving Inventions',
    ];
@endphp

@include('slider.video.interactive', ['content' => $content])
