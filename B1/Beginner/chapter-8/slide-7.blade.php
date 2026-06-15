@php
    $content = [
        'title'      => 'New Vocabulary',
        'subtitle'   => '',
        'grid_class' => 'grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5',

        'items' => [
            [
                'text'     => 'boss (noun)',
                'subtitle' => 'the person in charge of a company or organization',
                'emoji'    => '👔',
                'sound'    => materialAsset('slider/B1/Beginner/chapter-8/audios/slide7/boss.mp3'),
                'image'    => materialAsset('slider/B1/Beginner/chapter-8/img/slide7/boss.webp'),
            ],
            [
                'text'     => 'company (noun)',
                'subtitle' => 'a business organization',
                'emoji'    => '🏢',
                'sound'    => materialAsset('slider/B1/Beginner/chapter-8/audios/slide7/company.mp3'),
                'image'    => materialAsset('slider/B1/Beginner/chapter-8/img/slide7/company.webp'),
            ],
            [
                'text'     => 'employee (noun)',
                'subtitle' => 'a person who works for a company or organization',
                'emoji'    => '🧑‍💼',
                'sound'    => materialAsset('slider/B1/Beginner/chapter-8/audios/slide7/employee.mp3'),
                'image'    => materialAsset('slider/B1/Beginner/chapter-8/img/slide7/employee.webp'),
            ],
            [
                'text'     => 'work from home (phrase)',
                'subtitle' => 'work remotely from your house',
                'emoji'    => '🏠',
                'sound'    => materialAsset('slider/B1/Beginner/chapter-8/audios/slide7/work-from-home.mp3'),
                'image'    => materialAsset('slider/B1/Beginner/chapter-8/img/slide7/work-from-home.webp'),
            ],
            [
                'text'     => 'set their own schedule (phrase)',
                'subtitle' => 'choose their own working hours',
                'emoji'    => '🗓️',
                'sound'    => materialAsset('slider/B1/Beginner/chapter-8/audios/slide7/set-their-own-schedule.mp3'),
                'image'    => materialAsset('slider/B1/Beginner/chapter-8/img/slide7/set-their-own-schedule.webp'),
            ],
            [
                'text'     => 'day by day (phrase)',
                'subtitle' => 'changing or happening every day',
                'emoji'    => '📅',
                'sound'    => materialAsset('slider/B1/Beginner/chapter-8/audios/slide7/day-by-day.mp3'),
                'image'    => materialAsset('slider/B1/Beginner/chapter-8/img/slide7/day-by-day.webp'),
            ],
            [
                'text'     => 'practical (adjective)',
                'subtitle' => 'useful and suitable for real situations',
                'emoji'    => '🛠️',
                'sound'    => materialAsset('slider/B1/Beginner/chapter-8/audios/slide7/practical.mp3'),
                'image'    => materialAsset('slider/B1/Beginner/chapter-8/img/slide7/practical.webp'),
            ],
            [
                'text'     => 'computer engineering (noun)',
                'subtitle' => 'the study of designing and developing computer systems',
                'emoji'    => '💻',
                'sound'    => materialAsset('slider/B1/Beginner/chapter-8/audios/slide7/computer-engineering.mp3'),
                'image'    => materialAsset('slider/B1/Beginner/chapter-8/img/slide7/computer-engineering.webp'),
            ],
            [
                'text'     => 'degree (noun)',
                'subtitle' => 'a qualification from a university',
                'emoji'    => '🎓',
                'sound'    => materialAsset('slider/B1/Beginner/chapter-8/audios/slide7/degree.mp3'),
                'image'    => materialAsset('slider/B1/Beginner/chapter-8/img/slide7/degree.webp'),
            ],
            [
                'text'     => 'develop apps (verb phrase)',
                'subtitle' => 'create software applications',
                'emoji'    => '📱',
                'sound'    => materialAsset('slider/B1/Beginner/chapter-8/audios/slide7/develop-apps.mp3'),
                'image'    => materialAsset('slider/B1/Beginner/chapter-8/img/slide7/develop-apps.webp'),
            ],
            [
                'text'     => 'stay fit (phrase)',
                'subtitle' => 'remain healthy and physically active',
                'emoji'    => '🏃',
                'sound'    => materialAsset('slider/B1/Beginner/chapter-8/audios/slide7/stay-fit.mp3'),
                'image'    => materialAsset('slider/B1/Beginner/chapter-8/img/slide7/stay-fit.webp'),
            ],
            [
                'text'     => 'art history (noun)',
                'subtitle' => 'the study of art and its development',
                'emoji'    => '🎨',
                'sound'    => materialAsset('slider/B1/Beginner/chapter-8/audios/slide7/art-history.mp3'),
                'image'    => materialAsset('slider/B1/Beginner/chapter-8/img/slide7/art-history.webp'),
            ],
            [
                'text'     => 'tour guide (noun)',
                'subtitle' => 'a person who shows visitors around',
                'emoji'    => '🗺️',
                'sound'    => materialAsset('slider/B1/Beginner/chapter-8/audios/slide7/tour-guide.mp3'),
                'image'    => materialAsset('slider/B1/Beginner/chapter-8/img/slide7/tour-guide.webp'),
            ],
            [
                'text'     => 'museum (noun)',
                'subtitle' => 'a building where historical, scientific, or artistic objects are shown',
                'emoji'    => '🏛️',
                'sound'    => materialAsset('slider/B1/Beginner/chapter-8/audios/slide7/museum.mp3'),
                'image'    => materialAsset('slider/B1/Beginner/chapter-8/img/slide7/museum.webp'),
            ],
        ],
    ];
@endphp

@include('slider.vocab.image-card', ['content' => $content])