@php
$levels = ['A0', 'A1', 'A2', 'B1', 'B2', 'C1'];
$ages = ['YoungTeens', 'Teens', 'Adults'];
$explanationLanguages = ['ar', 'fr','en'];
$days = [
    0 => ['short' => 'Sun', 'label' => 'Sunday'],
    1 => ['short' => 'Mon', 'label' => 'Monday'],
    2 => ['short' => 'Tue', 'label' => 'Tuesday'],
    3 => ['short' => 'Wed', 'label' => 'Wednesday'],
    4 => ['short' => 'Thu', 'label' => 'Thursday'],
    5 => ['short' => 'Fri', 'label' => 'Friday'],
    6 => ['short' => 'Sat', 'label' => 'Saturday'],
];
$teachers = [
    [
        'id' => 1,
        'name' => 'Mr. Adam',
        'category' => 2,
        'levels' => ['A0', 'A1', 'A2'],
        'ages' => ['YoungTeens', 'Teens'],
        'explanation_languages' => ['ar', 'en'],
        'tags' => ['can get groups'],
        'groups_count' => 2,
        'availabilities' => [
            ['day_of_week' => 1, 'time_slot' => ['16', '17']],
            ['day_of_week' => 3, 'time_slot' => ['16', '17']],
        ],
        'groups' => [
            [
                'id' => 1,
                'level' => 'A1',
                'age' => 'Teens',
                'language' => 'en',
                'students_count' => 3,
                'is_active' => 1,
                'events' => [
                    ['day_of_week' => 1, 'start_time' => '16:00:00', 'end_time' => '18:00:00'],
                ],
            ],
            [
                'id' => 2,
                'level' => 'A0',
                'age' => 'YoungTeens',
                'language' => null,
                'students_count' => 2,
                'is_active' => 1,
                'events' => [
                    ['day_of_week' => 3, 'start_time' => '16:00:00', 'end_time' => '18:00:00'],
                ],
            ],
        ],
    ],

    [
        'id' => 2,
        'name' => 'Ms. Nadia',
        'category' => 1,
        'levels' => ['A1', 'B1', 'B2'],
        'ages' => ['Adults', 'Teens'],
        'explanation_languages' => ['fr', 'en'],
        'tags' => ['has groups',"can get groups"],
        'groups_count' => 4,
        'availabilities' => [
            ['day_of_week' => 2, 'time_slot' => ['17', '18', '19']],
            ['day_of_week' => 4, 'time_slot' => ['17', '18', '19']],
        ],
        'groups' => [
            [
                'id' => 1,
                'level' => 'B1',
                'age' => 'Teens',
                'language' => 'en',
                'students_count' => 4,
                'is_active' => 0,
                'events' => [
                    ['day_of_week' => 2, 'start_time' => '17:00:00', 'end_time' => '20:00:00'],
                ],
            ],
            [
                'id' => 2,
                'level' => 'A1',
                'age' => 'Adults',
                'language' => 'fr',
                'students_count' => 2,
                'is_active' => 1,
                'events' => [
                    ['day_of_week' => 4, 'start_time' => '17:00:00', 'end_time' => '20:00:00'],
                ],
            ],
        ],
    ],
    [
        'id' => 15,
        'name' => 'Mr. Nabil',
        'category' => 2,
        'levels' => ['A1', 'A2'],
        'ages' => ['Adults'],
        'explanation_languages' => [],
        'tags' => ['pending'],
        'groups_count' => 0,
        'availabilities' => [
            ['day_of_week' => 1, 'time_slot' => ['09', '10']],
            ['day_of_week' => 3, 'time_slot' => ['13', '14']],
        ],
        'groups' => [],
    ],

    [
        'id' => 17,
        'name' => 'Ms. Kawtar',
        'category' => null,
        'levels' => ['A0', 'A1'],
        'ages' => ['YoungTeens'],
        'tags' => ["can't get groups"],
        'groups_count' => 0,
        'groups' => [],
    ],
];
$groups = [
    ['id' => 1001, 'teacher_id' => 1, 'teacher_name' => 'Mr. Adam', 'level' => 'A1', 'age' => 'Teens', 'language' => 'en', 'students_count' => 3, 'is_active' => 1, 'path' => 'group-1001', 'events' => [['day_of_week' => 1, 'start_time' => '16:00:00', 'end_time' => '18:00:00']]],
    ['id' => 1002, 'teacher_id' => 1, 'teacher_name' => 'Mr. Adam', 'level' => 'A0', 'age' => 'YoungTeens', 'language' => null, 'students_count' => 2, 'is_active' => 1, 'path' => 'group-1002', 'events' => [['day_of_week' => 3, 'start_time' => '16:00:00', 'end_time' => '18:00:00']]],
    ['id' => 1003, 'teacher_id' => 2, 'teacher_name' => 'Ms. Nadia', 'level' => 'B1', 'age' => 'Teens', 'language' => 'en', 'students_count' => 4, 'is_active' => 1, 'path' => 'group-1003', 'events' => [['day_of_week' => 2, 'start_time' => '17:00:00', 'end_time' => '20:00:00']]],
    ['id' => 1004, 'teacher_id' => 2, 'teacher_name' => 'Ms. Nadia', 'level' => 'A1', 'age' => 'Adults', 'language' => 'fr', 'students_count' => 2, 'is_active' => 1, 'path' => 'group-1004', 'events' => [['day_of_week' => 4, 'start_time' => '17:00:00', 'end_time' => '20:00:00']]],
    ['id' => 1005, 'teacher_id' => 3, 'teacher_name' => 'Mr. Karim', 'level' => 'C1', 'age' => 'Adults', 'language' => 'fr', 'students_count' => 1, 'is_active' => 1, 'path' => 'group-1005', 'events' => [['day_of_week' => 1, 'start_time' => '19:00:00', 'end_time' => '21:00:00']]],
    ['id' => 1006, 'teacher_id' => 3, 'teacher_name' => 'Mr. Karim', 'level' => 'B2', 'age' => 'Adults', 'language' => null, 'students_count' => 3, 'is_active' => 1, 'path' => 'group-1006', 'events' => [['day_of_week' => 5, 'start_time' => '18:00:00', 'end_time' => '20:00:00']]],
    ['id' => 1007, 'teacher_id' => 4, 'teacher_name' => 'Ms. Salma', 'level' => 'A0', 'age' => 'YoungTeens', 'language' => 'ar', 'students_count' => 5, 'is_active' => 1, 'path' => 'group-1007', 'events' => [['day_of_week' => 6, 'start_time' => '09:00:00', 'end_time' => '12:00:00']]],
    ['id' => 1008, 'teacher_id' => 4, 'teacher_name' => 'Ms. Salma', 'level' => 'A2', 'age' => 'Adults', 'language' => null, 'students_count' => 2, 'is_active' => 1, 'path' => 'group-1008', 'events' => [['day_of_week' => 0, 'start_time' => '10:00:00', 'end_time' => '12:00:00']]],
    ['id' => 1009, 'teacher_id' => 5, 'teacher_name' => 'Mr. Youssef', 'level' => 'B2', 'age' => 'Adults', 'language' => 'en', 'students_count' => 2, 'is_active' => 1, 'path' => 'group-1009', 'events' => [['day_of_week' => 2, 'start_time' => '18:30:00', 'end_time' => '20:30:00']]],
    ['id' => 1010, 'teacher_id' => 5, 'teacher_name' => 'Mr. Youssef', 'level' => 'A2', 'age' => 'Teens', 'language' => null, 'students_count' => 3, 'is_active' => 1, 'path' => 'group-1010', 'events' => [['day_of_week' => 4, 'start_time' => '18:30:00', 'end_time' => '20:30:00']]],
    ['id' => 1011, 'teacher_id' => 6, 'teacher_name' => 'Ms. Ikram', 'level' => 'A1', 'age' => 'YoungTeens', 'language' => 'ar', 'students_count' => 4, 'is_active' => 1, 'path' => 'group-1011', 'events' => [['day_of_week' => 3, 'start_time' => '14:00:00', 'end_time' => '16:00:00']]],
    ['id' => 1012, 'teacher_id' => 6, 'teacher_name' => 'Ms. Ikram', 'level' => 'A0', 'age' => 'YoungTeens', 'language' => null, 'students_count' => 3, 'is_active' => 1, 'path' => 'group-1012', 'events' => [['day_of_week' => 6, 'start_time' => '10:30:00', 'end_time' => '12:30:00']]],
    ['id' => 1013, 'teacher_id' => 7, 'teacher_name' => 'Mr. Bilal', 'level' => 'A2', 'age' => 'Adults', 'language' => 'en', 'students_count' => 2, 'is_active' => 1, 'path' => 'group-1013', 'events' => [['day_of_week' => 1, 'start_time' => '14:30:00', 'end_time' => '15:30:00']]],
    ['id' => 1014, 'teacher_id' => 7, 'teacher_name' => 'Mr. Bilal', 'level' => 'B1', 'age' => 'Teens', 'language' => 'ar', 'students_count' => 5, 'is_active' => 1, 'path' => 'group-1014', 'events' => [['day_of_week' => 4, 'start_time' => '19:00:00', 'end_time' => '20:00:00']]],
    ['id' => 1015, 'teacher_id' => 8, 'teacher_name' => 'Ms. Rania', 'level' => 'A1', 'age' => 'YoungTeens', 'language' => 'fr', 'students_count' => 4, 'is_active' => 1, 'path' => 'group-1015', 'events' => [['day_of_week' => 2, 'start_time' => '09:00:00', 'end_time' => '10:30:00']]],
    ['id' => 1016, 'teacher_id' => 8, 'teacher_name' => 'Ms. Rania', 'level' => 'A2', 'age' => 'Teens', 'language' => null, 'students_count' => 3, 'is_active' => 1, 'path' => 'group-1016', 'events' => [['day_of_week' => 6, 'start_time' => '16:00:00', 'end_time' => '17:30:00']]],
    ['id' => 1017, 'teacher_id' => 9, 'teacher_name' => 'Mr. Hicham', 'level' => 'C1', 'age' => 'Adults', 'language' => 'fr', 'students_count' => 2, 'is_active' => 1, 'path' => 'group-1017', 'events' => [['day_of_week' => 0, 'start_time' => '19:30:00', 'end_time' => '21:00:00']]],
    ['id' => 1018, 'teacher_id' => 9, 'teacher_name' => 'Mr. Hicham', 'level' => 'B2', 'age' => 'Adults', 'language' => 'en', 'students_count' => 1, 'is_active' => 1, 'path' => 'group-1018', 'events' => [['day_of_week' => 3, 'start_time' => '18:00:00', 'end_time' => '19:00:00']]],
    ['id' => 1019, 'teacher_id' => 10, 'teacher_name' => 'Ms. Sofia', 'level' => 'B1', 'age' => 'Adults', 'language' => 'en', 'students_count' => 2, 'is_active' => 1, 'path' => 'group-1019', 'events' => [['day_of_week' => 5, 'start_time' => '11:30:00', 'end_time' => '12:30:00']]],
    ['id' => 1020, 'teacher_id' => 10, 'teacher_name' => 'Ms. Sofia', 'level' => 'A0', 'age' => 'YoungTeens', 'language' => null, 'students_count' => 6, 'is_active' => 1, 'path' => 'group-1020', 'events' => [['day_of_week' => 6, 'start_time' => '08:00:00', 'end_time' => '09:00:00']]],
    ['id' => 1021, 'teacher_id' => 11, 'teacher_name' => 'Mr. Mehdi', 'level' => 'B2', 'age' => 'Adults', 'language' => 'en', 'students_count' => 3, 'is_active' => 1, 'path' => 'group-1021', 'events' => [['day_of_week' => 1, 'start_time' => '21:00:00', 'end_time' => '22:00:00']]],
    ['id' => 1022, 'teacher_id' => 11, 'teacher_name' => 'Mr. Mehdi', 'level' => 'A2', 'age' => 'Teens', 'language' => 'ar', 'students_count' => 4, 'is_active' => 1, 'path' => 'group-1022', 'events' => [['day_of_week' => 5, 'start_time' => '17:30:00', 'end_time' => '18:30:00']]],
    ['id' => 1023, 'teacher_id' => 12, 'teacher_name' => 'Ms. Dounia', 'level' => 'B1', 'age' => 'Adults', 'language' => 'fr', 'students_count' => 2, 'is_active' => 1, 'path' => 'group-1023', 'events' => [['day_of_week' => 2, 'start_time' => '16:30:00', 'end_time' => '18:00:00']]],
    ['id' => 1024, 'teacher_id' => 12, 'teacher_name' => 'Ms. Dounia', 'level' => 'A1', 'age' => 'Teens', 'language' => null, 'students_count' => 5, 'is_active' => 1, 'path' => 'group-1024', 'events' => [['day_of_week' => 4, 'start_time' => '15:00:00', 'end_time' => '16:00:00']]],
    ['id' => 1025, 'teacher_id' => 13, 'teacher_name' => 'Mr. Samir', 'level' => 'C1', 'age' => 'Adults', 'language' => 'fr', 'students_count' => 1, 'is_active' => 1, 'path' => 'group-1025', 'events' => [['day_of_week' => 3, 'start_time' => '08:00:00', 'end_time' => '09:30:00']]],
    ['id' => 1026, 'teacher_id' => 14, 'teacher_name' => 'Ms. Asmae', 'level' => 'A1', 'age' => 'Teens', 'language' => 'ar', 'students_count' => 4, 'is_active' => 1, 'path' => 'group-1026', 'events' => [['day_of_week' => 0, 'start_time' => '10:00:00', 'end_time' => '11:00:00']]],
    ['id' => 1027, 'teacher_id' => 14, 'teacher_name' => 'Ms. Asmae', 'level' => 'A0', 'age' => 'YoungTeens', 'language' => null, 'students_count' => 3, 'is_active' => 1, 'path' => 'group-1027', 'events' => [['day_of_week' => 6, 'start_time' => '18:30:00', 'end_time' => '19:30:00']]],
    ['id' => 1028, 'teacher_id' => 16, 'teacher_name' => 'Ms. Ghita', 'level' => 'B1', 'age' => 'Teens', 'language' => 'en', 'students_count' => 4, 'is_active' => 1, 'path' => 'group-1028', 'events' => [['day_of_week' => 2, 'start_time' => '18:00:00', 'end_time' => '19:30:00']]],
    ['id' => 1029, 'teacher_id' => 1, 'teacher_name' => 'Mr. Adam', 'level' => 'A2', 'age' => 'Teens', 'language' => 'ar', 'students_count' => 4, 'is_active' => 1, 'path' => 'demo-group-1001', 'events' => [['day_of_week' => 5, 'start_time' => '13:00:00', 'end_time' => '15:00:00']]],
    ['id' => 1030, 'teacher_id' => 4, 'teacher_name' => 'Ms. Salma', 'level' => 'B1', 'age' => 'Adults', 'language' => 'fr', 'students_count' => 3, 'is_active' => 1, 'path' => 'demo-group-1002', 'events' => [['day_of_week' => 2, 'start_time' => '12:00:00', 'end_time' => '13:30:00'], ['day_of_week' => 4, 'start_time' => '12:00:00', 'end_time' => '13:00:00']]],
    ['id' => 1031, 'teacher_id' => 9, 'teacher_name' => 'Mr. Hicham', 'level' => 'A0', 'age' => 'YoungTeens', 'language' => null, 'students_count' => 6, 'is_active' => 1, 'path' => 'demo-group-1003', 'events' => [['day_of_week' => 6, 'start_time' => '15:00:00', 'end_time' => '17:00:00']]],
    ['id' => 1032, 'teacher_id' => 12, 'teacher_name' => 'Mr. Mehdi', 'level' => 'C1', 'age' => 'Adults', 'language' => 'en', 'students_count' => 2, 'is_active' => 1, 'path' => 'demo-group-1004', 'events' => [['day_of_week' => 0, 'start_time' => '09:00:00', 'end_time' => '10:00:00']]],
    ['id' => 1033, 'teacher_id' => 16, 'teacher_name' => 'Ms. Ghita', 'level' => 'B1', 'age' => 'Teens', 'language' => 'en', 'students_count' => 5, 'is_active' => 1, 'path' => 'demo-group-1005', 'events' => []],
];

@endphp
        <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Availability Analytics</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;700&family=Source+Sans+3:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        display: ["Space Grotesk", "ui-sans-serif", "system-ui"],
                        body: ["Source Sans 3", "ui-sans-serif", "system-ui"],
                    },
                    boxShadow: {
                        board: "0 24px 80px rgba(17, 37, 44, 0.18)",
                    },
                    borderRadius: {
                        panel: "30px",
                    },
                },
            },
        };
    </script>
    <style>
        :root {
            color-scheme: light;
            --bg: #f3efe6;
            --surface: rgba(255, 250, 243, 0.9);
            --surface-strong: rgba(255, 248, 239, 0.98);
            --panel-border: rgba(39, 59, 64, 0.14);
            --panel-border-strong: rgba(39, 59, 64, 0.24);
            --ink: #13272d;
            --muted: #5f7576;
            --teacher: #0f766e;
            --teacher-soft: rgba(15, 118, 110, 0.16);
            --student: #c75d2c;
            --student-soft: rgba(199, 93, 44, 0.16);
            --highlight: #f5c45b;
            --shadow: 0 24px 80px rgba(19, 39, 45, 0.14);
        }

        body {
            min-height: 100vh;
            background:
                    radial-gradient(circle at top left, rgba(245, 196, 91, 0.42), transparent 34%),
                    radial-gradient(circle at top right, rgba(15, 118, 110, 0.18), transparent 32%),
                    linear-gradient(180deg, #f6f1e7 0%, #efe8db 54%, #efeade 100%);
            color: var(--ink);
        }

        .glass-panel {
            background: var(--surface);
            backdrop-filter: blur(18px);
            border: 1px solid var(--panel-border);
            box-shadow: var(--shadow);
        }

        .metric-card {
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.96), rgba(252, 247, 240, 0.9));
            border: 1px solid rgba(39, 59, 64, 0.08);
        }

        .filter-select {
            appearance: none;
            background-image:
                    linear-gradient(45deg, transparent 50%, rgba(19, 39, 45, 0.6) 50%),
                    linear-gradient(135deg, rgba(19, 39, 45, 0.6) 50%, transparent 50%);
            background-position:
                    calc(100% - 1.15rem) calc(50% - 3px),
                    calc(100% - 0.8rem) calc(50% - 3px);
            background-size: 7px 7px, 7px 7px;
            background-repeat: no-repeat;
        }

        .schedule-shell {
            scrollbar-width: thin;
            scrollbar-color: rgba(39, 59, 64, 0.25) transparent;
        }

        .schedule-shell::-webkit-scrollbar {
            height: 10px;
            width: 10px;
        }

        .schedule-shell::-webkit-scrollbar-thumb {
            background: rgba(39, 59, 64, 0.24);
            border-radius: 999px;
        }

        .schedule-shell::-webkit-scrollbar-track {
            background: transparent;
        }

        .schedule-cell {
            transition: transform 140ms ease, box-shadow 140ms ease, border-color 140ms ease;
        }

        .schedule-cell:hover,
        .schedule-cell:focus-visible {
            transform: translateY(-2px);
            box-shadow: 0 12px 28px rgba(19, 39, 45, 0.12);
            border-color: rgba(39, 59, 64, 0.26);
            outline: none;
        }

        .schedule-cell.is-active {
            border-color: rgba(19, 39, 45, 0.5);
            box-shadow: 0 16px 36px rgba(19, 39, 45, 0.16);
        }

        .details-drawer {
            transition: transform 220ms ease;
        }

        .details-drawer[aria-hidden="true"] {
            transform: translateX(100%);
            pointer-events: none;
        }

        .details-backdrop {
            transition: opacity 220ms ease;
        }

        .details-backdrop.is-hidden {
            opacity: 0;
            pointer-events: none;
        }

        .finder-popout {
            transition: opacity 220ms ease, transform 220ms ease;
        }

        .finder-popout.is-hidden {
            opacity: 0;
            pointer-events: none;
        }

        .finder-popout.is-hidden .finder-popout-panel {
            transform: translateY(20px) scale(0.98);
        }

        .peak-load-popout {
            transition: opacity 220ms ease, transform 220ms ease;
        }

        .peak-load-popout.is-hidden {
            opacity: 0;
            pointer-events: none;
        }

        .peak-load-popout.is-hidden .peak-load-popout-panel {
            transform: translateY(20px) scale(0.98);
        }

        .mini-badge {
            border: 1px solid rgba(39, 59, 64, 0.12);
            background: rgba(255, 255, 255, 0.78);
        }

        .finder-row {
            background: rgba(255, 255, 255, 0.72);
            border: 1px solid rgba(39, 59, 64, 0.1);
        }
    </style>
</head>
<body class="font-body antialiased">
<div class="mx-auto max-w-[1700px] px-4 py-6 sm:px-6 lg:px-10 lg:py-8">
    <div class="glass-panel rounded-panel overflow-hidden">
        <div class="border-b border-[color:var(--panel-border)] px-5 py-6 sm:px-8 lg:px-10">
            <div class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
                <div class="max-w-3xl">
                    <p class="font-display text-xs font-bold uppercase tracking-[0.35em] text-[color:var(--muted)]">Scheduling analytics</p>
                    <h1 class="mt-2 font-display text-3xl font-bold tracking-tight sm:text-4xl">Availability map for teacher supply and active groups</h1>
                    <p class="mt-3 max-w-2xl text-base text-[color:var(--muted)] sm:text-lg">
                        Filter by age, level, and explanation language, then scan the weekly matrix for pressure points. Click any slot to drill into the exact teachers and groups behind the numbers.
                    </p>
                </div>
                <div class="grid grid-cols-1 gap-3 sm:grid-cols-2 xl:grid-cols-4" id="summaryCards">
                    <button id="openMatchingTeachersPopout" type="button" class="metric-card rounded-3xl p-4 text-left transition hover:-translate-y-0.5 hover:bg-white/95 focus:outline-none focus:ring-2 focus:ring-amber-300/60">
                        <p class="text-sm font-semibold text-[color:var(--muted)]">Matching teachers</p>
                        <p class="mt-2 text-3xl font-bold font-display" data-summary="teacherCount">0</p>
                        <p class="mt-2 text-xs font-bold uppercase tracking-[0.18em] text-[color:var(--muted)]">Browse by tag</p>
                    </button>
                    <div class="metric-card rounded-3xl p-4">
                        <p class="text-sm font-semibold text-[color:var(--muted)]">Active groups</p>
                        <p class="mt-2 text-3xl font-bold font-display" data-summary="studentCount">0</p>
                    </div>
                    <button id="openNowGroupsPopout" type="button" class="metric-card rounded-3xl p-4 text-left transition hover:-translate-y-0.5 hover:bg-white/95 focus:outline-none focus:ring-2 focus:ring-amber-300/60">
                        <p class="text-sm font-semibold text-[color:var(--muted)]">Groups happening now</p>
                        <p class="mt-2 text-3xl font-bold font-display" data-summary="liveGroupCount">0</p>
                        <p class="mt-2 text-sm font-semibold text-[color:var(--ink)]" data-summary="liveGroupTime">Right now</p>
                        <p class="mt-2 text-xs font-bold uppercase tracking-[0.18em] text-[color:var(--muted)]">See live events</p>
                    </button>
                    <button id="openPeakLoadPopout" type="button" class="metric-card rounded-3xl p-4 text-left transition hover:-translate-y-0.5 hover:bg-white/95 focus:outline-none focus:ring-2 focus:ring-amber-300/60">
                        <p class="text-sm font-semibold text-[color:var(--muted)]">Peak group load</p>
                        <p class="mt-2 text-3xl font-bold font-display" data-summary="maxStudentCount">0</p>
                        <p class="mt-2 text-sm font-semibold text-[color:var(--ink)]" data-summary="peakLoadSlot">No peak hour yet</p>
                        <p class="mt-2 text-xs font-bold uppercase tracking-[0.18em] text-[color:var(--muted)]">View all average hours</p>
                    </button>
                </div>
            </div>
        </div>

        <div class="border-b border-[color:var(--panel-border)] px-5 py-5 sm:px-8 lg:px-10">
            <div class="grid gap-4 lg:grid-cols-[1fr_1fr_1fr_auto] lg:items-end">
                <label class="block">
                    <span class="mb-2 block text-sm font-semibold text-[color:var(--muted)]">Age group</span>
                    <select id="ageFilter" class="filter-select w-full rounded-2xl border border-[color:var(--panel-border)] bg-white/80 px-4 py-3 pr-10 text-base font-semibold text-[color:var(--ink)] shadow-sm focus:border-[color:var(--panel-border-strong)] focus:outline-none focus:ring-2 focus:ring-amber-300/60">
                        <option value="">All ages</option>
                        @foreach ($ages as $age)
                            <option value="{{ $age }}">{{ $age }}</option>
                        @endforeach
                    </select>
                </label>
                <label class="block">
                    <span class="mb-2 block text-sm font-semibold text-[color:var(--muted)]">Level</span>
                    <select id="levelFilter" class="filter-select w-full rounded-2xl border border-[color:var(--panel-border)] bg-white/80 px-4 py-3 pr-10 text-base font-semibold text-[color:var(--ink)] shadow-sm focus:border-[color:var(--panel-border-strong)] focus:outline-none focus:ring-2 focus:ring-amber-300/60">
                        <option value="">All levels</option>
                        @foreach ($levels as $level)
                            <option value="{{ $level }}">{{ $level }}</option>
                        @endforeach
                    </select>
                </label>
                <label class="block">
                    <span class="mb-2 block text-sm font-semibold text-[color:var(--muted)]">Explanation language</span>
                    <select id="languageFilter" class="filter-select w-full rounded-2xl border border-[color:var(--panel-border)] bg-white/80 px-4 py-3 pr-10 text-base font-semibold text-[color:var(--ink)] shadow-sm focus:border-[color:var(--panel-border-strong)] focus:outline-none focus:ring-2 focus:ring-amber-300/60">
                        <option value="">All languages</option>
                        @foreach ($explanationLanguages as $language)
                            <option value="{{ $language }}">{{ strtoupper($language) }}</option>
                        @endforeach
                    </select>
                </label>
                <button id="resetFilters" type="button" class="inline-flex h-[52px] items-center justify-center rounded-2xl border border-[color:var(--panel-border)] bg-white/70 px-5 text-sm font-bold uppercase tracking-[0.24em] text-[color:var(--ink)] transition hover:bg-white">
                    Reset filters
                </button>
            </div>

            <div class="mt-4 flex flex-wrap items-center gap-2" id="activeFilterPills">
                <span class="mini-badge rounded-full px-3 py-1 text-sm font-semibold text-[color:var(--muted)]">No active filters</span>
            </div>

            <div class="mt-5 flex flex-col gap-4 rounded-[28px] border border-[color:var(--panel-border)] bg-white/60 p-4 sm:flex-row sm:items-center sm:justify-between">
                <div class="max-w-2xl">
                    <h2 class="font-display text-xl font-bold tracking-tight">Quick finder</h2>
                    <p class="mt-1 text-sm text-[color:var(--muted)]">
                        Open the popout to rank teachers by requested day and time ranges, with conflict-free and availability-matching options first.
                    </p>
                </div>
                <button id="openFinderPopout" type="button" class="inline-flex h-[52px] items-center justify-center rounded-2xl border border-[color:var(--panel-border)] bg-white px-5 text-sm font-bold uppercase tracking-[0.18em] text-[color:var(--ink)] transition hover:bg-[#fffaf2]">
                    Use quick finder
                </button>
            </div>
        </div>

        <div class="px-5 py-6 sm:px-8 lg:px-10">
            <div class="mb-4 flex flex-col gap-3 lg:flex-row lg:items-center lg:justify-between">
                <div>
                    <h2 class="font-display text-2xl font-bold tracking-tight">Weekly schedule matrix</h2>
                    <p class="mt-1 text-sm text-[color:var(--muted)]">Each slot shows available teachers and active groups. Stronger color means higher combined activity.</p>
                </div>
                <div class="flex flex-wrap items-center gap-2 text-sm font-semibold text-[color:var(--muted)]">
                    <span class="inline-flex items-center gap-2 rounded-full bg-white/70 px-3 py-1.5">
                        <span class="h-2.5 w-2.5 rounded-full" style="background: var(--teacher);"></span>
                        Teachers available
                    </span>
                    <span class="inline-flex items-center gap-2 rounded-full bg-white/70 px-3 py-1.5">
                        <span class="h-2.5 w-2.5 rounded-full" style="background: var(--student);"></span>
                        Active groups
                    </span>
                </div>
            </div>

            <div class="schedule-shell overflow-auto rounded-[28px] border border-[color:var(--panel-border)] bg-white/65">
                <table class="min-w-[980px] w-full border-separate border-spacing-0">
                    <thead class="sticky top-0 z-20">
                    <tr class="bg-[#f7f1e7]/95 backdrop-blur">
                        <th class="sticky left-0 z-30 border-b border-r border-[color:var(--panel-border)] bg-[#f7f1e7]/95 px-4 py-4 text-left text-xs font-bold uppercase tracking-[0.3em] text-[color:var(--muted)]">Time slot</th>
                        @foreach ($days as $dayIndex => $day)
                            <th class="border-b border-[color:var(--panel-border)] px-4 py-4 text-left">
                                <div class="font-display text-lg font-bold">{{ $day['short'] }}</div>
                                <div class="text-xs font-semibold uppercase tracking-[0.24em] text-[color:var(--muted)]">{{ $day['label'] }}</div>
                            </th>
                        @endforeach
                    </tr>
                    </thead>
                    <tbody id="scheduleBody"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div id="detailsBackdrop" class="details-backdrop is-hidden fixed inset-0 z-40 bg-slate-950/35 backdrop-blur-sm"></div>
<div id="nowGroupsPopout" class="peak-load-popout is-hidden fixed inset-0 z-[62]">
    <div id="nowGroupsBackdrop" class="absolute inset-0 bg-slate-950/45 backdrop-blur-sm"></div>
    <div class="peak-load-popout-panel absolute inset-x-4 top-8 bottom-8 mx-auto flex max-w-5xl flex-col overflow-hidden rounded-[32px] border border-white/30 bg-[#fffaf2] shadow-2xl transition-transform sm:inset-x-6 lg:inset-x-10">
        <div class="border-b border-[color:var(--panel-border)] px-5 py-5 sm:px-8">
            <div class="flex flex-col gap-5 lg:flex-row lg:items-start lg:justify-between">
                <div class="max-w-3xl">
                    <p class="text-xs font-bold uppercase tracking-[0.28em] text-[color:var(--muted)]">Live groups</p>
                    <h2 class="mt-2 font-display text-2xl font-bold tracking-tight">Groups happening now</h2>
                    <p id="nowGroupsSummary" class="mt-2 text-sm text-[color:var(--muted)]">Current live groups will appear here.</p>
                </div>
                <button id="closeNowGroupsPopout" type="button" class="inline-flex h-11 w-11 items-center justify-center rounded-full border border-[color:var(--panel-border)] bg-white text-lg text-[color:var(--ink)] transition hover:bg-slate-50" aria-label="Close live groups popout">
                    ×
                </button>
            </div>
        </div>
        <div class="flex-1 overflow-y-auto px-5 py-5 sm:px-8">
            <div id="nowGroupsList" class="space-y-3"></div>
        </div>
    </div>
</div>
<div id="peakLoadPopout" class="peak-load-popout is-hidden fixed inset-0 z-[65]">
    <div id="peakLoadBackdrop" class="absolute inset-0 bg-slate-950/45 backdrop-blur-sm"></div>
    <div class="peak-load-popout-panel absolute inset-x-4 top-8 bottom-8 mx-auto flex max-w-5xl flex-col overflow-hidden rounded-[32px] border border-white/30 bg-[#fffaf2] shadow-2xl transition-transform sm:inset-x-6 lg:inset-x-10">
        <div class="border-b border-[color:var(--panel-border)] px-5 py-5 sm:px-8">
            <div class="flex flex-col gap-5 lg:flex-row lg:items-start lg:justify-between">
                <div class="max-w-3xl">
                    <p class="text-xs font-bold uppercase tracking-[0.28em] text-[color:var(--muted)]">Peak group load</p>
                    <h2 class="mt-2 font-display text-2xl font-bold tracking-tight">All average peak hours</h2>
                    <p id="peakLoadSummary" class="mt-2 text-sm text-[color:var(--muted)]">Average load is calculated across all 7 days for each hour block.</p>
                </div>
                <button id="closePeakLoadPopout" type="button" class="inline-flex h-11 w-11 items-center justify-center rounded-full border border-[color:var(--panel-border)] bg-white text-lg text-[color:var(--ink)] transition hover:bg-slate-50" aria-label="Close peak group load popout">
                    ×
                </button>
            </div>
        </div>
        <div class="flex-1 overflow-y-auto px-5 py-5 sm:px-8">
            <div id="peakLoadList" class="space-y-3"></div>
        </div>
    </div>
</div>
<div id="matchingTeachersPopout" class="peak-load-popout is-hidden fixed inset-0 z-[67]">
    <div id="matchingTeachersBackdrop" class="absolute inset-0 bg-slate-950/45 backdrop-blur-sm"></div>
    <div class="peak-load-popout-panel absolute inset-x-4 top-8 bottom-8 mx-auto flex max-w-6xl flex-col overflow-hidden rounded-[32px] border border-white/30 bg-[#fffaf2] shadow-2xl transition-transform sm:inset-x-6 lg:inset-x-10">
        <div class="border-b border-[color:var(--panel-border)] px-5 py-5 sm:px-8">
            <div class="flex flex-col gap-5 lg:flex-row lg:items-start lg:justify-between">
                <div class="max-w-3xl">
                    <p class="text-xs font-bold uppercase tracking-[0.28em] text-[color:var(--muted)]">Matching teachers</p>
                    <h2 class="mt-2 font-display text-2xl font-bold tracking-tight">Teachers grouped by tags</h2>
                    <p id="matchingTeachersSummary" class="mt-2 text-sm text-[color:var(--muted)]">Teacher matches will appear here.</p>
                </div>
                <button id="closeMatchingTeachersPopout" type="button" class="inline-flex h-11 w-11 items-center justify-center rounded-full border border-[color:var(--panel-border)] bg-white text-lg text-[color:var(--ink)] transition hover:bg-slate-50" aria-label="Close matching teachers popout">
                    ×
                </button>
            </div>
            <div id="matchingTeachersTagFilters" class="mt-5 flex flex-wrap gap-2"></div>
        </div>
        <div class="flex-1 overflow-y-auto px-5 py-5 sm:px-8">
            <div id="matchingTeachersList" class="space-y-6"></div>
        </div>
    </div>
</div>
<div id="finderPopout" class="finder-popout is-hidden fixed inset-0 z-[70]">
    <div id="finderBackdrop" class="absolute inset-0 bg-slate-950/45 backdrop-blur-sm"></div>
    <div class="finder-popout-panel absolute inset-x-4 top-6 bottom-6 mx-auto flex max-w-6xl flex-col overflow-hidden rounded-[32px] border border-white/30 bg-[#fffaf2] shadow-2xl transition-transform sm:inset-x-6 lg:inset-x-10">
        <div class="border-b border-[color:var(--panel-border)] px-5 py-5 sm:px-8">
            <div class="flex flex-col gap-6 xl:flex-row xl:items-start xl:justify-between">
                <div class="max-w-2xl">
                    <p class="text-xs font-bold uppercase tracking-[0.28em] text-[color:var(--muted)]">Quick finder</p>
                    <h2 class="mt-2 font-display text-2xl font-bold tracking-tight">Find the best teacher matches fast</h2>
                    <p class="mt-2 text-sm text-[color:var(--muted)]">
                        Pick age, level, explanation language, and one or more requested day/time ranges. Teachers are ranked with conflict-free and matching-availability options first.
                    </p>
                </div>
                <div class="flex flex-wrap gap-2">
                    <button id="finderAddSlot" type="button" class="inline-flex h-11 items-center justify-center rounded-2xl border border-[color:var(--panel-border)] bg-white/75 px-4 text-sm font-bold uppercase tracking-[0.18em] text-[color:var(--ink)] transition hover:bg-white">
                        Add time slot
                    </button>
                    <button id="finderReset" type="button" class="inline-flex h-11 items-center justify-center rounded-2xl border border-[color:var(--panel-border)] bg-white/55 px-4 text-sm font-bold uppercase tracking-[0.18em] text-[color:var(--muted)] transition hover:bg-white/80">
                        Reset finder
                    </button>
                    <button id="closeFinderPopout" type="button" class="inline-flex h-11 w-11 items-center justify-center rounded-full border border-[color:var(--panel-border)] bg-white text-lg text-[color:var(--ink)] transition hover:bg-slate-50" aria-label="Close quick finder">
                        ×
                    </button>
                </div>
            </div>

            <div class="mt-5 grid gap-4 lg:grid-cols-3">
                <label class="block">
                    <span class="mb-2 block text-sm font-semibold text-[color:var(--muted)]">Age group</span>
                    <select id="finderAgeFilter" class="filter-select w-full rounded-2xl border border-[color:var(--panel-border)] bg-white/80 px-4 py-3 pr-10 text-base font-semibold text-[color:var(--ink)] shadow-sm focus:border-[color:var(--panel-border-strong)] focus:outline-none focus:ring-2 focus:ring-amber-300/60">
                        <option value="">All ages</option>
                        @foreach ($ages as $age)
                            <option value="{{ $age }}">{{ $age }}</option>
                        @endforeach
                    </select>
                </label>
                <label class="block">
                    <span class="mb-2 block text-sm font-semibold text-[color:var(--muted)]">Level</span>
                    <select id="finderLevelFilter" class="filter-select w-full rounded-2xl border border-[color:var(--panel-border)] bg-white/80 px-4 py-3 pr-10 text-base font-semibold text-[color:var(--ink)] shadow-sm focus:border-[color:var(--panel-border-strong)] focus:outline-none focus:ring-2 focus:ring-amber-300/60">
                        <option value="">All levels</option>
                        @foreach ($levels as $level)
                            <option value="{{ $level }}">{{ $level }}</option>
                        @endforeach
                    </select>
                </label>
                <label class="block">
                    <span class="mb-2 block text-sm font-semibold text-[color:var(--muted)]">Explanation language</span>
                    <select id="finderLanguageFilter" class="filter-select w-full rounded-2xl border border-[color:var(--panel-border)] bg-white/80 px-4 py-3 pr-10 text-base font-semibold text-[color:var(--ink)] shadow-sm focus:border-[color:var(--panel-border-strong)] focus:outline-none focus:ring-2 focus:ring-amber-300/60">
                        <option value="">All languages</option>
                        @foreach ($explanationLanguages as $language)
                            <option value="{{ $language }}">{{ strtoupper($language) }}</option>
                        @endforeach
                    </select>
                </label>
            </div>
        </div>

        <div class="flex-1 overflow-y-auto px-5 py-5 sm:px-8">
            <div class="space-y-3" id="finderSlots"></div>

            <div class="mt-6 rounded-[28px] border border-[color:var(--panel-border)] bg-white/65 p-4 sm:p-5">
                <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                    <div>
                        <h3 class="font-display text-xl font-bold">Teacher ranking</h3>
                        <p id="finderSummary" class="mt-1 text-sm text-[color:var(--muted)]">Add at least one requested slot to rank teachers.</p>
                    </div>
                    <div class="flex flex-wrap gap-2 text-xs font-bold uppercase tracking-[0.18em] text-[color:var(--muted)]">
                        <span class="mini-badge rounded-full px-3 py-1">Tier 1: no events + in availability</span>
                        <span class="mini-badge rounded-full px-3 py-1">Tier 2: no events + outside availability</span>
                        <span class="mini-badge rounded-full px-3 py-1">Tier 3: has events</span>
                    </div>
                </div>
                <div id="finderResults" class="mt-4 space-y-3"></div>
            </div>
        </div>
    </div>
</div>
<aside id="detailsDrawer" class="details-drawer fixed right-0 top-0 z-50 flex h-full w-full max-w-xl flex-col border-l border-slate-900/10 bg-[#fffaf3] shadow-2xl" aria-hidden="true" role="dialog" aria-modal="true" aria-labelledby="detailsTitle">
    <div class="flex items-start justify-between border-b border-[color:var(--panel-border)] px-5 py-5 sm:px-6">
        <div>
            <p class="text-xs font-bold uppercase tracking-[0.28em] text-[color:var(--muted)]">Slot details</p>
            <h2 id="detailsTitle" class="mt-2 font-display text-2xl font-bold">Select a slot</h2>
            <p id="detailsSubtitle" class="mt-2 text-sm text-[color:var(--muted)]">Choose any cell in the schedule to inspect the people behind the totals.</p>
        </div>
        <button id="closeDrawer" type="button" class="inline-flex h-11 w-11 items-center justify-center rounded-full border border-[color:var(--panel-border)] bg-white text-lg text-[color:var(--ink)] transition hover:bg-slate-50" aria-label="Close details panel">
            ×
        </button>
    </div>
    <div class="flex-1 overflow-y-auto px-5 py-5 sm:px-6">
        <div class="grid gap-3 sm:grid-cols-2">
            <div class="rounded-3xl border border-[color:var(--panel-border)] bg-white px-4 py-4">
                <p class="text-sm font-semibold text-[color:var(--muted)]">Teachers available</p>
                <p id="drawerTeacherCount" class="mt-2 font-display text-3xl font-bold">0</p>
            </div>
            <div class="rounded-3xl border border-[color:var(--panel-border)] bg-white px-4 py-4">
                <p class="text-sm font-semibold text-[color:var(--muted)]">Active groups</p>
                <p id="drawerStudentCount" class="mt-2 font-display text-3xl font-bold">0</p>
            </div>
        </div>

        <div class="mt-6">
            <div class="flex items-center justify-between">
                <h3 class="font-display text-xl font-bold">Available teachers</h3>
                <span id="teachersEmptyLabel" class="hidden text-sm font-semibold text-[color:var(--muted)]">No teacher matches this slot.</span>
            </div>
            <div id="teacherList" class="mt-3 space-y-3"></div>
        </div>

        <div class="mt-8">
            <div class="flex items-center justify-between">
                <h3 class="font-display text-xl font-bold">Active groups</h3>
                <span id="studentsEmptyLabel" class="hidden text-sm font-semibold text-[color:var(--muted)]">No group matches this slot.</span>
            </div>
            <div id="studentList" class="mt-3 space-y-3"></div>
        </div>
    </div>
</aside>

<script>
    const analyticsData = @json(['days' => $days, 'teachers' => $teachers, 'groups' => $groups], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT);

    const state = {
        filters: {
            age: "",
            level: "",
            language: "",
        },
        finder: {
            age: "",
            level: "",
            language: "",
            requests: [
                { id: 1, dayIndex: 1, start: "14:00", end: "15:00" },
            ],
        },
        matchingTeachersTag: "",
        selectedSlot: null,
    };

    const ageFilter = document.getElementById("ageFilter");
    const levelFilter = document.getElementById("levelFilter");
    const languageFilter = document.getElementById("languageFilter");
    const openNowGroupsPopoutButton = document.getElementById("openNowGroupsPopout");
    const nowGroupsPopout = document.getElementById("nowGroupsPopout");
    const nowGroupsBackdrop = document.getElementById("nowGroupsBackdrop");
    const closeNowGroupsPopoutButton = document.getElementById("closeNowGroupsPopout");
    const nowGroupsSummary = document.getElementById("nowGroupsSummary");
    const nowGroupsList = document.getElementById("nowGroupsList");
    const openMatchingTeachersPopoutButton = document.getElementById("openMatchingTeachersPopout");
    const matchingTeachersPopout = document.getElementById("matchingTeachersPopout");
    const matchingTeachersBackdrop = document.getElementById("matchingTeachersBackdrop");
    const closeMatchingTeachersPopoutButton = document.getElementById("closeMatchingTeachersPopout");
    const matchingTeachersSummary = document.getElementById("matchingTeachersSummary");
    const matchingTeachersTagFilters = document.getElementById("matchingTeachersTagFilters");
    const matchingTeachersList = document.getElementById("matchingTeachersList");
    const openPeakLoadPopoutButton = document.getElementById("openPeakLoadPopout");
    const peakLoadPopout = document.getElementById("peakLoadPopout");
    const peakLoadBackdrop = document.getElementById("peakLoadBackdrop");
    const closePeakLoadPopoutButton = document.getElementById("closePeakLoadPopout");
    const peakLoadSummary = document.getElementById("peakLoadSummary");
    const peakLoadList = document.getElementById("peakLoadList");
    const openFinderPopoutButton = document.getElementById("openFinderPopout");
    const finderPopout = document.getElementById("finderPopout");
    const finderBackdrop = document.getElementById("finderBackdrop");
    const closeFinderPopoutButton = document.getElementById("closeFinderPopout");
    const finderAgeFilter = document.getElementById("finderAgeFilter");
    const finderLevelFilter = document.getElementById("finderLevelFilter");
    const finderLanguageFilter = document.getElementById("finderLanguageFilter");
    const finderSlots = document.getElementById("finderSlots");
    const finderAddSlotButton = document.getElementById("finderAddSlot");
    const finderResetButton = document.getElementById("finderReset");
    const finderResults = document.getElementById("finderResults");
    const finderSummary = document.getElementById("finderSummary");
    const resetFiltersButton = document.getElementById("resetFilters");
    const activeFilterPills = document.getElementById("activeFilterPills");
    const scheduleBody = document.getElementById("scheduleBody");
    const summaryNodes = {
        teacherCount: document.querySelector('[data-summary="teacherCount"]'),
        studentCount: document.querySelector('[data-summary="studentCount"]'),
        liveGroupCount: document.querySelector('[data-summary="liveGroupCount"]'),
        liveGroupTime: document.querySelector('[data-summary="liveGroupTime"]'),
        maxStudentCount: document.querySelector('[data-summary="maxStudentCount"]'),
        peakLoadSlot: document.querySelector('[data-summary="peakLoadSlot"]'),
    };
    const detailsDrawer = document.getElementById("detailsDrawer");
    const detailsBackdrop = document.getElementById("detailsBackdrop");
    const closeDrawerButton = document.getElementById("closeDrawer");
    const detailsTitle = document.getElementById("detailsTitle");
    const detailsSubtitle = document.getElementById("detailsSubtitle");
    const drawerTeacherCount = document.getElementById("drawerTeacherCount");
    const drawerStudentCount = document.getElementById("drawerStudentCount");
    const teacherList = document.getElementById("teacherList");
    const studentList = document.getElementById("studentList");
    const teachersEmptyLabel = document.getElementById("teachersEmptyLabel");
    const studentsEmptyLabel = document.getElementById("studentsEmptyLabel");
    let finderRequestId = 2;

    const days = Object.entries(analyticsData.days).map(([key, day]) => ({
        index: Number(key),
        ...day,
    }));

    function toMinutes(value) {
        const [hours, minutes] = value.split(":").map(Number);
        return (hours * 60) + minutes;
    }

    function formatMinutes(totalMinutes) {
        const hours = Math.floor(totalMinutes / 60);
        const minutes = totalMinutes % 60;
        return `${String(hours).padStart(2, "0")}:${String(minutes).padStart(2, "0")}`;
    }

    function formatRange(start, end) {
        return `${formatTimeLabel(formatMinutes(start))} - ${formatTimeLabel(formatMinutes(end))}`;
    }

    function normalizeFinderEnd(start, end) {
        const startMinutes = toMinutes(start);
        const endMinutes = toMinutes(end);

        if (endMinutes > startMinutes) {
            return end;
        }

        const fallbackMinutes = Math.min(startMinutes + 60, 1439);
        return formatMinutes(fallbackMinutes);
    }

    function formatTimeLabel(value) {
        const [rawHours, rawMinutes] = value.split(":").map(Number);
        const suffix = rawHours >= 12 ? "PM" : "AM";
        const hours = rawHours % 12 || 12;
        const minutes = rawMinutes === 0 ? "" : `:${String(rawMinutes).padStart(2, "0")}`;
        return `${hours}${minutes} ${suffix}`;
    }

    const finderTimeOptions = Array.from({ length: 48 }, (_, index) => formatMinutes(index * 30)).concat("23:59");

    function buildFinderTimeOptions(selectedValue) {
        return finderTimeOptions.map(value => `
            <option value="${value}" ${value === selectedValue ? "selected" : ""}>${escapeHtml(formatTimeLabel(value))}</option>
        `).join("");
    }

    function escapeHtml(value) {
        return String(value)
            .replaceAll("&", "&amp;")
            .replaceAll("<", "&lt;")
            .replaceAll(">", "&gt;")
            .replaceAll('"', "&quot;")
            .replaceAll("'", "&#039;");
    }

    function createTimeSlots() {
        const start = 0;
        const end = 24 * 60;
        const slotSize = 60;
        const slots = [];

        for (let cursor = start; cursor < end; cursor += slotSize) {
            slots.push({
                key: `${cursor}-${cursor + slotSize}`,
                start: cursor,
                end: cursor + slotSize,
                label: formatRange(cursor, cursor + slotSize),
            });
        }

        return slots;
    }

    const timeSlots = createTimeSlots();

    function eventOverlaps(event, dayIndex, slotStart, slotEnd) {
        if (event.day_of_week !== dayIndex) {
            return false;
        }

        const eventStart = toMinutes(event.start_time);
        const eventEnd = toMinutes(event.end_time);

        return eventStart < slotEnd && eventEnd > slotStart;
    }

    function hourKeyFromSlot(slotStart) {
        return String(Math.floor(slotStart / 60)).padStart(2, "0");
    }

    function matchesOption(values, selectedValue) {
        if (!selectedValue) {
            return true;
        }

        if (!Array.isArray(values) || values.length === 0) {
            return true;
        }

        return values.includes(selectedValue) || values.includes(null);
    }

    function formatOptionList(values, formatter = value => value) {
        if (!Array.isArray(values) || values.length === 0) {
            return "ANY";
        }

        return values.map(value => value === null ? "ANY" : formatter(value)).join(", ");
    }

    function formatSingleOption(value, formatter = item => item) {
        return value === null || value === undefined || value === "" ? "ANY" : formatter(value);
    }

    function safeArray(value) {
        return Array.isArray(value) ? value : [];
    }

    function getFilteredTeachers(filters) {
        return analyticsData.teachers.filter(teacher => teacherMatchesFilters(teacher, filters));
    }

    function normalizeCategory(category) {
        return category === null || category === undefined ? 999 : category;
    }

    function formatCategoryLabel(category) {
        const categoryMap = {
            1: "A",
            2: "B",
            3: "C",
            4: "D",
        };

        return category === null || category === undefined
            ? "Unassigned"
            : `Category ${categoryMap[category] || category}`;
    }

    function getCategoryTheme(category) {
        const categoryThemes = {
            1: "background: rgba(34, 197, 94, 0.18); color: #166534;",
            2: "background: rgba(132, 204, 22, 0.18); color: #3f6212;",
            3: "background: rgba(245, 158, 11, 0.2); color: #92400e;",
            4: "background: rgba(239, 68, 68, 0.18); color: #991b1b;",
        };

        return categoryThemes[category] || "background: rgba(19, 39, 45, 0.1); color: var(--ink);";
    }

    function getTeacherTags(teacher) {
        const tags = safeArray(teacher.tags).filter(Boolean);
        return tags.length ? tags : ["No tag"];
    }

    function formatTeacherAvailabilityBlocks(availabilities) {
        return safeArray(availabilities)
            .map(item => `${analyticsData.days[item.day_of_week].short} ${safeArray(item.time_slot).map(slot => formatTimeLabel(`${slot}:00`)).join(", ")}`)
            .join(" • ");
    }

    function getTeacherGroups(teacher) {
        return safeArray(analyticsData.groups)
            .filter(group => group.teacher_id === teacher.id)
            .map(group => ({
                ...group,
                events: safeArray(group.events),
            }));
    }

    function getTeacherEvents(teacher) {
        return getTeacherGroups(teacher).flatMap(group =>
            group.events.map(event => ({
                ...event,
                group,
            }))
        );
    }

    function availabilityOverlapsRequest(teacher, request) {
        const requestStart = toMinutes(request.start);
        const requestEnd = toMinutes(request.end);

        return safeArray(teacher.availabilities).some(availability =>
            availability.day_of_week === request.dayIndex &&
            availability.time_slot.some(slotHour => {
                const slotStart = Number(slotHour) * 60;
                const slotEnd = slotStart + 60;
                return slotStart < requestEnd && slotEnd > requestStart;
            })
        );
    }

    function eventOverlapsRequest(event, request) {
        return eventOverlaps(
            { ...event, day_of_week: event.day_of_week },
            request.dayIndex,
            toMinutes(request.start),
            toMinutes(request.end)
        );
    }

    function teacherMatchesFilters(teacher, filters) {
        const matchesLevel = matchesOption(teacher.levels, filters.level);
        const matchesAge = matchesOption(teacher.ages, filters.age);
        const matchesLanguage = matchesOption(teacher.explanation_languages, filters.language);

        return matchesLevel && matchesAge && matchesLanguage;
    }

    function eventGroupMatchesFilters(group, filters) {
        const matchesLevel = !filters.level || group.level === null || group.level === filters.level;
        const matchesAge = !filters.age || group.age === null || group.age === filters.age;
        const matchesLanguage = !filters.language || group.language === null || group.language === filters.language;

        return matchesLevel && matchesAge && matchesLanguage;
    }

    function getTeacherMatches(dayIndex, slotStart, slotEnd, filters) {
        const hourKey = hourKeyFromSlot(slotStart);

        return analyticsData.teachers
            .filter(teacher => teacherMatchesFilters(teacher, filters))
            .filter(teacher => safeArray(teacher.availabilities).some(availability =>
                availability.day_of_week === dayIndex && availability.time_slot.includes(hourKey)
            ))
            .filter(teacher => !getTeacherEvents(teacher).some(event => eventOverlaps(event, dayIndex, slotStart, slotEnd)))
            .map(teacher => ({
                ...teacher,
                matchingAvailabilities: safeArray(teacher.availabilities).filter(availability =>
                    availability.day_of_week === dayIndex && availability.time_slot.includes(hourKey)
                ),
            }));
    }

    function getOccupiedGroups(dayIndex, slotStart, slotEnd, filters) {
        const groups = safeArray(analyticsData.groups).flatMap(group =>
            safeArray(group.events)
                .filter(event => eventOverlaps(event, dayIndex, slotStart, slotEnd))
                .filter(() => eventGroupMatchesFilters(group, filters))
                .map(event => ({
                    teacherId: group.teacher_id,
                    teacherName: group.teacher_name || "Unknown teacher",
                    groupId: group.id,
                    level: group.level,
                    age: group.age,
                    language: group.language,
                    studentsCount: group.students_count,
                    day_of_week: event.day_of_week,
                    start_time: event.start_time,
                    end_time: event.end_time,
                }))
        );

        return Array.from(new Map(
            groups.map(group => [group.groupId ?? `${group.teacherId}-${group.day_of_week}-${group.start_time}-${group.end_time}`, group])
        ).values());
    }

    function getOccupiedGroupCount(dayIndex, slotStart, slotEnd, filters) {
        return getOccupiedGroups(dayIndex, slotStart, slotEnd, filters).length;
    }

    function getOccupiedStudentCount(dayIndex, slotStart, slotEnd, filters) {
        return getOccupiedGroups(dayIndex, slotStart, slotEnd, filters)
            .reduce((sum, group) => sum + Number(group.studentsCount || 0), 0);
    }

    function getFilteredEventGroups(filters) {
        const groups = safeArray(analyticsData.groups).flatMap(group =>
            safeArray(group.events)
                .filter(() => eventGroupMatchesFilters(group, filters))
                .map(event => ({
                    teacherId: group.teacher_id,
                    groupId: group.id,
                    studentsCount: group.students_count,
                    day_of_week: event.day_of_week,
                    start_time: event.start_time,
                    end_time: event.end_time,
                }))
        );

        return Array.from(new Map(
            groups.map(group => [group.groupId ?? `${group.teacherId}-${group.day_of_week}-${group.start_time}-${group.end_time}`, group])
        ).values());
    }

    function getCurrentMomentDetails() {
        const now = new Date();
        const hours = String(now.getHours()).padStart(2, "0");
        const minutes = String(now.getMinutes()).padStart(2, "0");

        return {
            dayIndex: now.getDay(),
            timeValue: `${hours}:${minutes}`,
            label: `${analyticsData.days[now.getDay()].label} · ${formatTimeLabel(`${hours}:${minutes}`)}`,
            minutes: (now.getHours() * 60) + now.getMinutes(),
        };
    }

    function getGroupsHappeningNow(filters) {
        const currentMoment = getCurrentMomentDetails();
        const liveGroups = safeArray(analyticsData.groups)
            .filter(group => Number(group.is_active) === 1)
            .filter(group => eventGroupMatchesFilters(group, filters))
            .flatMap(group =>
                safeArray(group.events)
                    .filter(event =>
                        event.day_of_week === currentMoment.dayIndex
                        && Number(event.is_postponed) === 0
                        && toMinutes(event.start_time) < currentMoment.minutes
                        && toMinutes(event.end_time) > currentMoment.minutes
                    )
                    .map(event => {
                        const teacher = analyticsData.teachers.find(item => item.id === group.teacher_id) || {};

                        return {
                            ...group,
                            teacherName: teacher.name || group.teacher_name || "Unknown teacher",
                            teacherCategory: teacher.category ?? null,
                            explanationLanguages: teacher.explanation_languages || [],
                            start_time: event.start_time,
                            end_time: event.end_time,
                            day_of_week: event.day_of_week,
                        };
                    })
            );

        return Array.from(new Map(
            liveGroups.map(group => [group.id ?? `${group.teacher_id}-${group.day_of_week}-${group.start_time}-${group.end_time}`, group])
        ).values()).sort((left, right) => {
            if (left.end_time !== right.end_time) {
                return left.end_time.localeCompare(right.end_time);
            }

            return left.teacherName.localeCompare(right.teacherName);
        });
    }

    function renderNowGroupsPopout() {
        const currentMoment = getCurrentMomentDetails();
        const liveGroups = getGroupsHappeningNow(state.filters);
        const filterText = [
            state.filters.age ? `Age ${state.filters.age}` : "",
            state.filters.level ? `Level ${state.filters.level}` : "",
            state.filters.language ? `Language ${state.filters.language.toUpperCase()}` : "",
        ].filter(Boolean).join(" • ");

        nowGroupsSummary.textContent = filterText
            ? `${liveGroups.length} live groups at ${currentMoment.label} for ${filterText}.`
            : `${liveGroups.length} live groups at ${currentMoment.label}.`;

        if (!liveGroups.length) {
            nowGroupsList.innerHTML = `
                <div class="rounded-[28px] border border-[color:var(--panel-border)] bg-white px-5 py-5 text-sm font-semibold text-[color:var(--muted)]">
                    No group event is happening right now for the current filters.
                </div>
            `;
            return;
        }

        nowGroupsList.innerHTML = liveGroups.map(group => `
            <article class="rounded-[28px] border border-[color:var(--panel-border)] bg-white px-5 py-5 shadow-sm">
                <div class="flex flex-col gap-4 lg:flex-row lg:items-start lg:justify-between">
                    <div>
                        <div class="flex flex-wrap items-center gap-2">
                            <h3 class="font-display text-2xl font-bold">${escapeHtml(group.teacherName)}</h3>
                            <span class="inline-flex items-center rounded-full px-3 py-1 text-xs font-bold uppercase tracking-[0.18em]" style="${getCategoryTheme(group.teacherCategory)}">${escapeHtml(formatCategoryLabel(group.teacherCategory))}</span>
                            <span class="inline-flex items-center rounded-full px-3 py-1 text-xs font-bold uppercase tracking-[0.18em]" style="background: var(--student-soft); color: var(--student);">Group ${escapeHtml(group.id)}</span>
                        </div>
                        <p class="mt-2 text-sm font-semibold text-[color:var(--muted)]">${escapeHtml(analyticsData.days[group.day_of_week].label)} · ${escapeHtml(formatTimeLabel(group.start_time.slice(0, 5)))} to ${escapeHtml(formatTimeLabel(group.end_time.slice(0, 5)))}</p>
                    </div>
                    <a href="${escapeHtml(`/admin/meetings/${group.path || ""}`)}" target="_blank" rel="noopener noreferrer" class="inline-flex h-11 items-center justify-center rounded-2xl border border-[color:var(--panel-border)] bg-[#fff4df] px-4 text-sm font-bold uppercase tracking-[0.18em] text-[color:var(--ink)] transition hover:bg-[#ffe9c0]">
                        Join meeting
                    </a>
                </div>
                <div class="mt-4 flex flex-wrap gap-2 text-sm font-semibold">
                    <span class="mini-badge rounded-full px-3 py-1">Level: ${escapeHtml(formatSingleOption(group.level))}</span>
                    <span class="mini-badge rounded-full px-3 py-1">Age: ${escapeHtml(formatSingleOption(group.age))}</span>
                    <span class="mini-badge rounded-full px-3 py-1">Language: ${escapeHtml(formatSingleOption(group.language, value => value.toUpperCase()))}</span>
                    <span class="mini-badge rounded-full px-3 py-1">Students: ${escapeHtml(group.students_count)}</span>
                    <span class="mini-badge rounded-full px-3 py-1">Teacher languages: ${escapeHtml(formatOptionList(group.explanationLanguages, value => value.toUpperCase()))}</span>
                </div>
            </article>
        `).join("");
    }

    function renderMatchingTeacherCard(teacher) {
        const availabilityText = formatTeacherAvailabilityBlocks(teacher.availabilities);
        const tags = getTeacherTags(teacher);

        return `
            <article class="rounded-[24px] border border-[color:var(--panel-border)] bg-white px-4 py-4 shadow-sm">
                <div class="flex flex-col gap-4 lg:flex-row lg:items-start lg:justify-between">
                    <div>
                        <div class="flex flex-wrap items-center gap-2">
                            <h3 class="font-display text-2xl font-bold">${escapeHtml(teacher.name)}</h3>
                            <span class="inline-flex items-center rounded-full px-3 py-1 text-xs font-bold uppercase tracking-[0.18em]" style="${getCategoryTheme(teacher.category)}">${escapeHtml(formatCategoryLabel(teacher.category))}</span>
                            <span class="inline-flex items-center rounded-full px-3 py-1 text-xs font-bold uppercase tracking-[0.18em]"  style="background: var(--teacher-soft); color: var(--teacher);">Groups: ${escapeHtml(teacher.groups_count ?? 0)}</span>
                        </div>
                        <p class="mt-2 text-sm font-semibold text-[color:var(--muted)]">${escapeHtml(availabilityText || "No availability blocks configured")}</p>
                    </div>
                </div>
                <div class="mt-4 flex flex-wrap gap-2 text-sm font-semibold">
                    <span class="mini-badge rounded-full px-3 py-1">Levels: ${escapeHtml(formatOptionList(teacher.levels))}</span>
                    <span class="mini-badge rounded-full px-3 py-1">Ages: ${escapeHtml(formatOptionList(teacher.ages))}</span>
                    <span class="mini-badge rounded-full px-3 py-1">Languages: ${escapeHtml(formatOptionList(teacher.explanation_languages, language => language.toUpperCase()))}</span>
                    ${tags.map(tag => `<span class="mini-badge rounded-full px-3 py-1">Tag: ${escapeHtml(tag)}</span>`).join("")}
                </div>
            </article>
        `;
    }

    function renderMatchingTeachersPopout() {
        const filteredTeachers = getFilteredTeachers(state.filters)
            .sort((left, right) => {
                if (normalizeCategory(left.category) !== normalizeCategory(right.category)) {
                    return normalizeCategory(left.category) - normalizeCategory(right.category);
                }

                return left.name.localeCompare(right.name);
            });
        const filterText = [
            state.filters.age ? `Age ${state.filters.age}` : "",
            state.filters.level ? `Level ${state.filters.level}` : "",
            state.filters.language ? `Language ${state.filters.language.toUpperCase()}` : "",
        ].filter(Boolean).join(" • ");
        const tagCounts = filteredTeachers.reduce((acc, teacher) => {
            getTeacherTags(teacher).forEach(tag => {
                acc[tag] = (acc[tag] || 0) + 1;
            });

            return acc;
        }, {});
        const orderedTags = Object.entries(tagCounts)
            .sort((left, right) => {
                if (right[1] !== left[1]) {
                    return right[1] - left[1];
                }

                return left[0].localeCompare(right[0]);
            })
            .map(([tag]) => tag);

        if (state.matchingTeachersTag && !orderedTags.includes(state.matchingTeachersTag)) {
            state.matchingTeachersTag = "";
        }

        matchingTeachersSummary.textContent = filteredTeachers.length
            ? (filterText
                ? `${filteredTeachers.length} teachers match ${filterText}. Grouped by tag below${state.matchingTeachersTag ? ` and filtered to ${state.matchingTeachersTag}.` : "."}`
                : `${filteredTeachers.length} teachers match the current dashboard view. Grouped by tag below${state.matchingTeachersTag ? ` and filtered to ${state.matchingTeachersTag}.` : "."}`)
            : (filterText
                ? `No teachers match ${filterText}.`
                : "No teachers match the current dashboard view.");

        matchingTeachersTagFilters.innerHTML = filteredTeachers.length
            ? `
                <button type="button" data-tag-filter="" class="inline-flex items-center rounded-full border px-4 py-2 text-sm font-bold transition ${state.matchingTeachersTag === "" ? "border-transparent bg-[color:var(--ink)] text-white" : "border-[color:var(--panel-border)] bg-white text-[color:var(--ink)] hover:bg-slate-50"}">
                    All teachers (${filteredTeachers.length})
                </button>
                ${orderedTags.map(tag => `
                    <button type="button" data-tag-filter="${escapeHtml(tag)}" class="inline-flex items-center rounded-full border px-4 py-2 text-sm font-bold transition ${state.matchingTeachersTag === tag ? "border-transparent bg-[color:var(--teacher)] text-white" : "border-[color:var(--panel-border)] bg-white text-[color:var(--ink)] hover:bg-slate-50"}">
                        ${escapeHtml(tag)} (${tagCounts[tag]})
                    </button>
                `).join("")}
            `
            : "";

        matchingTeachersTagFilters.querySelectorAll("[data-tag-filter]").forEach(button => {
            button.addEventListener("click", () => {
                state.matchingTeachersTag = button.dataset.tagFilter || "";
                renderMatchingTeachersPopout();
            });
        });

        if (!filteredTeachers.length) {
            matchingTeachersList.innerHTML = `
                <div class="rounded-[28px] border border-[color:var(--panel-border)] bg-white px-5 py-5 text-sm font-semibold text-[color:var(--muted)]">
                    No teacher matches the current dashboard filters.
                </div>
            `;
            return;
        }

        const visibleTags = state.matchingTeachersTag ? [state.matchingTeachersTag] : orderedTags;

        matchingTeachersList.innerHTML = visibleTags.map(tag => {
            const teachers = filteredTeachers.filter(teacher => getTeacherTags(teacher).includes(tag));

            return `
                <section class="space-y-3">
                    <div class="flex flex-col gap-2 sm:flex-row sm:items-end sm:justify-between">
                        <div>
                            <p class="text-xs font-bold uppercase tracking-[0.22em] text-[color:var(--muted)]">Tag group</p>
                            <h3 class="mt-1 font-display text-2xl font-bold">${escapeHtml(tag)}</h3>
                        </div>
                        <span class="mini-badge rounded-full px-3 py-1 text-sm font-semibold">${teachers.length} teacher${teachers.length === 1 ? "" : "s"}</span>
                    </div>
                    <div class="space-y-3">
                        ${teachers.map(teacher => renderMatchingTeacherCard(teacher)).join("")}
                    </div>
                </section>
            `;
        }).join("");
    }

    function renderFinderSlots() {
        finderSlots.innerHTML = state.finder.requests.map((request, index) => `
            <div class="finder-row rounded-[24px] p-4" data-request-id="${request.id}">
                <div class="grid gap-3 lg:grid-cols-[1.2fr_1fr_1fr_auto] lg:items-end">
                    <label class="block">
                        <span class="mb-2 block text-sm font-semibold text-[color:var(--muted)]">Day of week</span>
                        <select class="finder-slot-day filter-select w-full rounded-2xl border border-[color:var(--panel-border)] bg-white px-4 py-3 pr-10 text-base font-semibold text-[color:var(--ink)] focus:border-[color:var(--panel-border-strong)] focus:outline-none focus:ring-2 focus:ring-amber-300/60">
                            ${days.map(day => `<option value="${day.index}" ${day.index === request.dayIndex ? "selected" : ""}>${escapeHtml(day.label)}</option>`).join("")}
                        </select>
                    </label>
                    <label class="block">
                        <span class="mb-2 block text-sm font-semibold text-[color:var(--muted)]">From</span>
                        <select class="finder-slot-start filter-select w-full rounded-2xl border border-[color:var(--panel-border)] bg-white px-4 py-3 pr-10 text-base font-semibold text-[color:var(--ink)] focus:border-[color:var(--panel-border-strong)] focus:outline-none focus:ring-2 focus:ring-amber-300/60">
                            ${buildFinderTimeOptions(request.start)}
                        </select>
                    </label>
                    <label class="block">
                        <span class="mb-2 block text-sm font-semibold text-[color:var(--muted)]">To</span>
                        <select class="finder-slot-end filter-select w-full rounded-2xl border border-[color:var(--panel-border)] bg-white px-4 py-3 pr-10 text-base font-semibold text-[color:var(--ink)] focus:border-[color:var(--panel-border-strong)] focus:outline-none focus:ring-2 focus:ring-amber-300/60">
                            ${buildFinderTimeOptions(request.end)}
                        </select>
                    </label>
                    <button type="button" class="finder-slot-remove inline-flex h-[52px] items-center justify-center rounded-2xl border border-[color:var(--panel-border)] bg-white/70 px-4 text-sm font-bold uppercase tracking-[0.18em] text-[color:var(--muted)] transition hover:bg-white" ${state.finder.requests.length === 1 ? "disabled" : ""}>
                        Remove
                    </button>
                </div>
                <p class="mt-3 text-sm font-semibold text-[color:var(--muted)]">Request ${index + 1}: ${escapeHtml(days.find(day => day.index === request.dayIndex).label)} from ${escapeHtml(formatTimeLabel(request.start))} to ${escapeHtml(formatTimeLabel(request.end))}</p>
            </div>
        `).join("");

        finderSlots.querySelectorAll("[data-request-id]").forEach(row => {
            const requestId = Number(row.dataset.requestId);
            const daySelect = row.querySelector(".finder-slot-day");
            const startInput = row.querySelector(".finder-slot-start");
            const endInput = row.querySelector(".finder-slot-end");
            const removeButton = row.querySelector(".finder-slot-remove");

            const syncRequest = () => {
                const request = state.finder.requests.find(item => item.id === requestId);
                if (!request) {
                    return;
                }

                request.dayIndex = Number(daySelect.value);
                request.start = startInput.value || "00:00";
                request.end = normalizeFinderEnd(request.start, endInput.value || request.start);
                endInput.value = request.end;

                renderFinderSlots();
                renderFinderResults();
            };

            daySelect.addEventListener("change", syncRequest);
            startInput.addEventListener("change", syncRequest);
            endInput.addEventListener("change", syncRequest);
            removeButton.addEventListener("click", () => {
                state.finder.requests = state.finder.requests.filter(item => item.id !== requestId);
                renderFinderSlots();
                renderFinderResults();
            });
        });
    }

    function renderFinderResults() {
        const finderFilters = state.finder;
        const requests = state.finder.requests.filter(request => toMinutes(request.end) > toMinutes(request.start));
        const matchingTeachers = analyticsData.teachers.filter(teacher => teacherMatchesFilters(teacher, finderFilters));

        if (!requests.length) {
            finderSummary.textContent = "Add at least one valid requested slot to rank teachers.";
            finderResults.innerHTML = "";
            return;
        }

        if (!matchingTeachers.length) {
            finderSummary.textContent = "No teacher matches the finder age, level, and explanation language filters.";
            finderResults.innerHTML = "";
            return;
        }

        const rankedTeachers = matchingTeachers.map(teacher => {
            const teacherEvents = getTeacherEvents(teacher);
            const requestEvaluations = requests.map(request => {
                const hasEventConflict = teacherEvents.some(event => eventOverlapsRequest(event, request));
                const inAvailability = availabilityOverlapsRequest(teacher, request);
                return {
                    ...request,
                    hasEventConflict,
                    inAvailability,
                };
            });

            const hasConflictingEvents = requestEvaluations.some(item => item.hasEventConflict);
            const availabilityMatches = requestEvaluations.filter(item => item.inAvailability).length;
            const allRequestsInAvailability = requestEvaluations.every(item => item.inAvailability);
            const tier = !hasConflictingEvents && allRequestsInAvailability ? 1 : (!hasConflictingEvents ? 2 : 3);

            return {
                ...teacher,
                rankTier: tier,
                hasConflictingEvents,
                availabilityMatches,
                requestEvaluations,
                conflictingEvents: teacherEvents.filter(event => requestEvaluations.some(request => eventOverlapsRequest(event, request))),
            };
        }).sort((left, right) => {
            if (left.rankTier !== right.rankTier) {
                return left.rankTier - right.rankTier;
            }
            if (normalizeCategory(left.category) !== normalizeCategory(right.category)) {
                return normalizeCategory(left.category) - normalizeCategory(right.category);
            }
            if (left.availabilityMatches !== right.availabilityMatches) {
                return right.availabilityMatches - left.availabilityMatches;
            }
            if (left.conflictingEvents.length !== right.conflictingEvents.length) {
                return left.conflictingEvents.length - right.conflictingEvents.length;
            }
            return left.name.localeCompare(right.name);
        });

        const tierCounts = rankedTeachers.reduce((acc, teacher) => {
            acc[teacher.rankTier] += 1;
            return acc;
        }, { 1: 0, 2: 0, 3: 0 });

        finderSummary.textContent = `${rankedTeachers.length} teachers match the finder filters. Tier 1: ${tierCounts[1]}, Tier 2: ${tierCounts[2]}, Tier 3: ${tierCounts[3]}.`;

        finderResults.innerHTML = rankedTeachers.map(teacher => {
            const tierLabel = teacher.rankTier === 1
                ? "Tier 1 · no events + requested time in availability"
                : (teacher.rankTier === 2
                    ? "Tier 2 · no events + requested time outside availability"
                    : "Tier 3 · has event conflicts");

            const tierStyle = teacher.rankTier === 1
                ? "background: rgba(15, 118, 110, 0.14); color: var(--teacher);"
                : (teacher.rankTier === 2
                    ? "background: rgba(245, 196, 91, 0.22); color: #8a5a00;"
                    : "background: rgba(199, 93, 44, 0.16); color: var(--student);");

            const availabilityText = safeArray(teacher.availabilities)
                .map(item => `${analyticsData.days[item.day_of_week].short} ${item.time_slot.map(slot => formatTimeLabel(`${slot}:00`)).join(", ")}`)
                .join(" • ");

            return `
                <article class="rounded-[24px] border border-[color:var(--panel-border)] bg-white px-4 py-4 shadow-sm">
                    <div class="flex flex-col gap-4 lg:flex-row lg:items-start lg:justify-between">
                        <div>
                            <div class="flex flex-wrap items-center gap-2">
                            <h4 class="font-display text-2xl font-bold">${escapeHtml(teacher.name)}</h4>
                            <span class="inline-flex items-center rounded-full px-3 py-1 text-xs font-bold uppercase tracking-[0.18em]" style="${tierStyle}">${escapeHtml(tierLabel)}</span>
                            <span class="inline-flex items-center rounded-full px-3 py-1 text-xs font-bold uppercase tracking-[0.18em]" style="${getCategoryTheme(teacher.category)}">${escapeHtml(formatCategoryLabel(teacher.category))}</span>
                        </div>
                        <p class="mt-2 text-sm font-semibold text-[color:var(--muted)]">Availability match: ${teacher.availabilityMatches}/${requests.length} requested slots</p>
                        <p class="mt-1 text-sm font-semibold text-[color:var(--muted)]">Conflicting events: ${teacher.conflictingEvents.length}</p>
                    </div>
                        <div class="flex flex-wrap gap-2 text-sm font-semibold">
                            <span class="mini-badge rounded-full px-3 py-1">Levels: ${escapeHtml(formatOptionList(teacher.levels))}</span>
                            <span class="mini-badge rounded-full px-3 py-1">Ages: ${escapeHtml(formatOptionList(teacher.ages))}</span>
                            <span class="mini-badge rounded-full px-3 py-1">Languages: ${escapeHtml(formatOptionList(teacher.explanation_languages, language => language.toUpperCase()))}</span>
                        </div>
                    </div>
                    <div class="mt-4 rounded-2xl bg-[#faf3e5] px-4 py-3">
                        <p class="text-xs font-bold uppercase tracking-[0.18em] text-[color:var(--muted)]">Teacher availability</p>
                        <p class="mt-2 text-sm font-semibold text-[color:var(--ink)]">${escapeHtml(availabilityText || "No availability blocks configured")}</p>
                    </div>
                    <div class="mt-4 grid gap-3 xl:grid-cols-2">
                        ${teacher.requestEvaluations.map(request => `
                            <div class="rounded-2xl border border-[color:var(--panel-border)] bg-[#fffaf3] px-4 py-3">
                                <p class="text-sm font-bold">${escapeHtml(analyticsData.days[request.dayIndex].label)} · ${escapeHtml(formatTimeLabel(request.start))} to ${escapeHtml(formatTimeLabel(request.end))}</p>
                                <div class="mt-2 flex flex-wrap gap-2 text-xs font-bold uppercase tracking-[0.16em]">
                                    <span class="mini-badge rounded-full px-3 py-1">${request.inAvailability ? "In availability" : "Outside availability"}</span>
                                    <span class="mini-badge rounded-full px-3 py-1">${request.hasEventConflict ? "Has event" : "No event"}</span>
                                </div>
                            </div>
                        `).join("")}
                    </div>
                    ${teacher.conflictingEvents.length ? `
                        <div class="mt-4 rounded-2xl border border-[color:var(--panel-border)] bg-white px-4 py-3">
                            <p class="text-xs font-bold uppercase tracking-[0.18em] text-[color:var(--muted)]">Conflicting events</p>
                            <div class="mt-2 flex flex-wrap gap-2 text-sm font-semibold text-[color:var(--ink)]">
                                ${teacher.conflictingEvents.map(event => `<span class="mini-badge rounded-full px-3 py-1">${escapeHtml(analyticsData.days[event.day_of_week].short)} ${escapeHtml(formatTimeLabel(event.start_time.slice(0, 5)))} - ${escapeHtml(formatTimeLabel(event.end_time.slice(0, 5)))} · ${escapeHtml(formatSingleOption(event.group.level))} / ${escapeHtml(formatSingleOption(event.group.age))}</span>`).join("")}
                            </div>
                        </div>
                    ` : ""}
                </article>
            `;
        }).join("");
    }

    function calculateCellTone(teacherCount, studentCount) {
        const teacherAlpha = Math.min(0.12 + (teacherCount * 0.12), 0.45);
        const studentAlpha = Math.min(0.10 + (studentCount * 0.12), 0.45);
        return `linear-gradient(180deg, rgba(15, 118, 110, ${teacherAlpha}) 0%, rgba(255, 255, 255, 0.92) 48%, rgba(199, 93, 44, ${studentAlpha}) 100%)`;
    }

    function formatAverage(value) {
        return Number.isInteger(value) ? String(value) : value.toFixed(1);
    }

    function getPeakGroupLoadRows(filters) {
        return timeSlots
            .map(slot => {
                const dayLoads = days.map(day => ({
                    dayIndex: day.index,
                    dayLabel: day.label,
                    dayShort: day.short,
                    count: getOccupiedGroupCount(day.index, slot.start, slot.end, filters),
                    students: getOccupiedStudentCount(day.index, slot.start, slot.end, filters),
                }));
                const activeDayLoads = dayLoads.filter(item => item.count > 0);
                const total = dayLoads.reduce((sum, item) => sum + item.count, 0);
                const average = total / 7;
                const totalStudents = dayLoads.reduce((sum, item) => sum + item.students, 0);
                const averageStudents = totalStudents / 7;

                return {
                    slot,
                    dayLoads,
                    activeDayLoads,
                    total,
                    average,
                    totalStudents,
                    averageStudents,
                };
            })
            .filter(item => item.average > 0)
            .sort((left, right) => {
                if (right.average !== left.average) {
                    return right.average - left.average;
                }

                if (right.total !== left.total) {
                    return right.total - left.total;
                }

                if (right.activeDayLoads.length !== left.activeDayLoads.length) {
                    return right.activeDayLoads.length - left.activeDayLoads.length;
                }

                return left.slot.start - right.slot.start;
            });
    }

    function renderPeakLoadPopout() {
        const peakRows = getPeakGroupLoadRows(state.filters);
        const filterText = [
            state.filters.age ? `Age ${state.filters.age}` : "",
            state.filters.level ? `Level ${state.filters.level}` : "",
            state.filters.language ? `Language ${state.filters.language.toUpperCase()}` : "",
        ].filter(Boolean).join(" • ");

        peakLoadSummary.textContent = filterText
            ? `Showing all hour blocks for ${filterText}. Average load is the 7-day weekly total divided by 7.`
            : "Showing all hour blocks for the full schedule. Average load is the 7-day weekly total divided by 7.";

        if (!peakRows.length) {
            peakLoadList.innerHTML = `
                <div class="rounded-[28px] border border-[color:var(--panel-border)] bg-white px-5 py-5 text-sm font-semibold text-[color:var(--muted)]">
                    No active groups match the current filters, so there are no peak hours to rank.
                </div>
            `;
            return;
        }

        peakLoadList.innerHTML = peakRows.map((item, index) => `
            <article class="rounded-[28px] border border-[color:var(--panel-border)] bg-white px-5 py-5 shadow-sm">
                <div class="flex flex-col gap-4 lg:flex-row lg:items-start lg:justify-between">
                    <div>
                        <p class="text-xs font-bold uppercase tracking-[0.22em] text-[color:var(--muted)]">Rank ${index + 1}</p>
                        <h3 class="mt-2 font-display text-2xl font-bold">${escapeHtml(item.slot.label)}</h3>
                        <p class="mt-2 text-sm font-semibold text-[color:var(--muted)]">Average groups: ${escapeHtml(formatAverage(item.average))}</p>
                        <p class="mt-1 text-sm font-semibold text-[color:var(--muted)]">Average students: ${escapeHtml(formatAverage(item.averageStudents))}</p>
                    </div>
                    <div class="flex flex-wrap gap-2 text-sm font-semibold">
                        <span class="mini-badge rounded-full px-3 py-1">Active days: ${item.activeDayLoads.length}</span>
                        <span class="mini-badge rounded-full px-3 py-1">Total sessions: ${item.total}</span>
                    </div>
                </div>
                <div class="mt-4 flex flex-wrap gap-2 text-sm font-semibold">
                    ${item.dayLoads.map(dayLoad => `<span class="mini-badge rounded-full px-3 py-1">${escapeHtml(dayLoad.dayShort)}: ${dayLoad.count} groups · ${dayLoad.students} students</span>`).join("")}
                </div>
            </article>
        `).join("");
    }

    function renderActiveFilterPills() {
        const pills = [];

        if (state.filters.age) {
            pills.push({ label: "Age", value: state.filters.age });
        }
        if (state.filters.level) {
            pills.push({ label: "Level", value: state.filters.level });
        }
        if (state.filters.language) {
            pills.push({ label: "Language", value: state.filters.language.toUpperCase() });
        }

        if (!pills.length) {
            activeFilterPills.innerHTML = '<span class="mini-badge rounded-full px-3 py-1 text-sm font-semibold text-[color:var(--muted)]">No active filters</span>';
            return;
        }

        activeFilterPills.innerHTML = pills.map(pill => `
            <span class="mini-badge inline-flex items-center gap-2 rounded-full px-3 py-1 text-sm font-semibold text-[color:var(--ink)]">
                <span class="text-[color:var(--muted)]">${escapeHtml(pill.label)}</span>
                <span>${escapeHtml(pill.value)}</span>
            </span>
        `).join("");
    }

    function renderSummary() {
        const filteredTeachers = getFilteredTeachers(state.filters);
        const filteredEventGroups = getFilteredEventGroups(state.filters);
        const peakRows = getPeakGroupLoadRows(state.filters);
        const liveGroups = getGroupsHappeningNow(state.filters);
        const currentMoment = getCurrentMomentDetails();

        let maxStudentCount = 0;

        timeSlots.forEach(slot => {
            days.forEach(day => {
                const studentCount = getOccupiedGroupCount(day.index, slot.start, slot.end, state.filters);

                maxStudentCount = Math.max(maxStudentCount, studentCount);
            });
        });

        summaryNodes.teacherCount.textContent = filteredTeachers.length;
        summaryNodes.studentCount.textContent = filteredEventGroups.length;
        summaryNodes.liveGroupCount.textContent = liveGroups.length;
        summaryNodes.liveGroupTime.textContent = liveGroups.length
            ? currentMoment.label
            : `No live groups at ${currentMoment.label}`;
        summaryNodes.maxStudentCount.textContent = maxStudentCount;
        summaryNodes.peakLoadSlot.textContent = peakRows.length
            ? `${peakRows[0].slot.label} · avg ${formatAverage(peakRows[0].average)}`
            : "No active groups for current filters";
    }

    function renderSchedule() {
        scheduleBody.innerHTML = timeSlots.map(slot => `
            <tr>
                <th class="sticky left-0 z-10 border-r border-b border-[color:var(--panel-border)] bg-[#fcf7ef] px-4 py-3 text-left align-top">
                    <div class="font-display text-base font-bold">${escapeHtml(slot.label)}</div>
                    <div class="mt-1 text-xs font-semibold uppercase tracking-[0.2em] text-[color:var(--muted)]">1 hour block</div>
                </th>
                ${days.map(day => {
            const teachers = getTeacherMatches(day.index, slot.start, slot.end, state.filters);
            const occupiedStudentCount = getOccupiedGroupCount(day.index, slot.start, slot.end, state.filters);
            const isSelected = state.selectedSlot && state.selectedSlot.dayIndex === day.index && state.selectedSlot.slotKey === slot.key;

            return `
                        <td class="border-b border-[color:var(--panel-border)] p-2 align-top">
                            <button
                                type="button"
                                class="schedule-cell ${isSelected ? "is-active" : ""} flex min-h-[118px] w-full flex-col justify-between rounded-[22px] border border-transparent px-3 py-3 text-left"
                                style="background: ${calculateCellTone(teachers.length, occupiedStudentCount)};"
                                data-day-index="${day.index}"
                                data-slot-key="${slot.key}"
                                aria-label="${escapeHtml(day.label)} ${escapeHtml(slot.label)}: ${teachers.length} available teachers, ${occupiedStudentCount} active groups"
                            >
                                <div class="flex items-center justify-between text-[11px] font-bold uppercase tracking-[0.22em] text-[color:var(--muted)]">
                                    <span>${escapeHtml(day.short)}</span>
                                    <span>${escapeHtml(slot.label)}</span>
                                </div>
                                <div class="space-y-2">
                                    <div class="rounded-2xl bg-white/72 px-3 py-2">
                                        <div class="text-[11px] font-bold uppercase tracking-[0.18em]" style="color: var(--teacher);">Teachers</div>
                                        <div class="mt-1 flex items-end justify-between">
                                            <span class="font-display text-3xl font-bold">${teachers.length}</span>
                                            <span class="text-xs font-semibold text-[color:var(--muted)]">available</span>
                                        </div>
                                    </div>
                                    <div class="rounded-2xl bg-white/72 px-3 py-2">
                                        <div class="text-[11px] font-bold uppercase tracking-[0.18em]" style="color: var(--student);">Groups</div>
                                        <div class="mt-1 flex items-end justify-between">
                                            <span class="font-display text-3xl font-bold">${occupiedStudentCount}</span>
                                            <span class="text-xs font-semibold text-[color:var(--muted)]">active</span>
                                        </div>
                                    </div>
                                </div>
                            </button>
                        </td>
                    `;
        }).join("")}
            </tr>
        `).join("");

        scheduleBody.querySelectorAll(".schedule-cell").forEach(cell => {
            cell.addEventListener("click", () => {
                state.selectedSlot = {
                    dayIndex: Number(cell.dataset.dayIndex),
                    slotKey: cell.dataset.slotKey,
                };
                renderSchedule();
                renderDrawer();
                openDrawer();
            });
        });
    }

    function renderPersonCard(person, type) {
        if (type === "teacher") {
            const availability = formatTeacherAvailabilityBlocks(person.matchingAvailabilities);
            const tags = safeArray(person.tags);

            return `
                <article class="rounded-[24px] border border-[color:var(--panel-border)] bg-white px-4 py-4 shadow-sm">
                    <div class="flex flex-col gap-3 sm:flex-row sm:items-start sm:justify-between">
                        <div>
                            <h4 class="font-display text-xl font-bold">${escapeHtml(person.name)}</h4>
                            <p class="mt-1 text-sm font-semibold text-[color:var(--muted)]">Available during ${escapeHtml(availability)}</p>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <span class="inline-flex items-center rounded-full px-3 py-1 text-xs font-bold uppercase tracking-[0.18em]" style="background: var(--teacher-soft); color: var(--teacher);">Teacher</span>
                            <span class="inline-flex items-center rounded-full px-3 py-1 text-xs font-bold uppercase tracking-[0.18em]" style="${getCategoryTheme(person.category)}">${escapeHtml(formatCategoryLabel(person.category))}</span>
                        </div>
                    </div>
                    <div class="mt-4 flex flex-wrap gap-2 text-sm font-semibold">
                        <span class="mini-badge rounded-full px-3 py-1">Groups: ${escapeHtml(person.groups_count ?? 0)}</span>
                        <span class="mini-badge rounded-full px-3 py-1">Levels: ${escapeHtml(formatOptionList(person.levels))}</span>
                        <span class="mini-badge rounded-full px-3 py-1">Ages: ${escapeHtml(formatOptionList(person.ages))}</span>
                        <span class="mini-badge rounded-full px-3 py-1">Languages: ${escapeHtml(formatOptionList(person.explanation_languages, language => language.toUpperCase()))}</span>
                        ${tags.map(tag => `<span class="mini-badge rounded-full px-3 py-1">Tag: ${escapeHtml(tag)}</span>`).join("")}
                    </div>
                </article>
            `;
        }

        const occupancy = `${analyticsData.days[person.day_of_week].short} ${formatTimeLabel(person.start_time.slice(0, 5))} - ${formatTimeLabel(person.end_time.slice(0, 5))}`;

        return `
            <article class="rounded-[24px] border border-[color:var(--panel-border)] bg-white px-4 py-4 shadow-sm">
                <div class="flex flex-col gap-3 sm:flex-row sm:items-start sm:justify-between">
                    <div>
                        <h4 class="font-display text-xl font-bold">${escapeHtml(person.teacherName)}</h4>
                        <p class="mt-1 text-sm font-semibold text-[color:var(--muted)]">${escapeHtml(occupancy)}</p>
                    </div>
                    <span class="inline-flex items-center rounded-full px-3 py-1 text-xs font-bold uppercase tracking-[0.18em]" style="background: var(--student-soft); color: var(--student);">Group ${escapeHtml(person.groupId)}</span>
                </div>
                <div class="mt-4 flex flex-wrap gap-2 text-sm font-semibold">
                    <span class="mini-badge rounded-full px-3 py-1">Group ID: ${escapeHtml(person.groupId)}</span>
                    <span class="mini-badge rounded-full px-3 py-1">Level: ${escapeHtml(formatSingleOption(person.level))}</span>
                    <span class="mini-badge rounded-full px-3 py-1">Age: ${escapeHtml(formatSingleOption(person.age))}</span>
                    <span class="mini-badge rounded-full px-3 py-1">Students: ${escapeHtml(person.studentsCount)}</span>
                    <span class="mini-badge rounded-full px-3 py-1">Language: ${escapeHtml(formatSingleOption(person.language, language => language.toUpperCase()))}</span>
                </div>
            </article>
        `;
    }

    function renderDrawer() {
        if (!state.selectedSlot) {
            detailsTitle.textContent = "Select a slot";
            detailsSubtitle.textContent = "Choose any cell in the schedule to inspect the people behind the totals.";
            drawerTeacherCount.textContent = "0";
            drawerStudentCount.textContent = "0";
            teacherList.innerHTML = "";
            studentList.innerHTML = "";
            teachersEmptyLabel.classList.add("hidden");
            studentsEmptyLabel.classList.add("hidden");
            return;
        }

        const slot = timeSlots.find(item => item.key === state.selectedSlot.slotKey);
        const day = analyticsData.days[state.selectedSlot.dayIndex];
        const teachers = getTeacherMatches(state.selectedSlot.dayIndex, slot.start, slot.end, state.filters)
            .sort((left, right) => {
                if (normalizeCategory(left.category) !== normalizeCategory(right.category)) {
                    return normalizeCategory(left.category) - normalizeCategory(right.category);
                }

                return left.name.localeCompare(right.name);
            });
        const occupiedGroups = getOccupiedGroups(state.selectedSlot.dayIndex, slot.start, slot.end, state.filters);
        const occupiedStudentCount = occupiedGroups.length;

        detailsTitle.textContent = `${day.label} · ${slot.label}`;

        const filterText = [
            state.filters.age ? `Age ${state.filters.age}` : "",
            state.filters.level ? `Level ${state.filters.level}` : "",
            state.filters.language ? `Language ${state.filters.language.toUpperCase()}` : "",
        ].filter(Boolean).join(" • ");

        detailsSubtitle.textContent = filterText
            ? `Results are filtered by ${filterText}.`
            : "Showing the full unfiltered slot.";

        drawerTeacherCount.textContent = String(teachers.length);
        drawerStudentCount.textContent = String(occupiedStudentCount);

        teacherList.innerHTML = teachers.map(teacher => renderPersonCard(teacher, "teacher")).join("");
        studentList.innerHTML = occupiedGroups.map(group => renderPersonCard(group, "student")).join("");

        teachersEmptyLabel.classList.toggle("hidden", teachers.length > 0);
        studentsEmptyLabel.classList.toggle("hidden", occupiedGroups.length > 0);
    }

    function syncBodyLock() {
        const hasOpenSurface = detailsDrawer.getAttribute("aria-hidden") === "false"
            || !nowGroupsPopout.classList.contains("is-hidden")
            || !matchingTeachersPopout.classList.contains("is-hidden")
            || !finderPopout.classList.contains("is-hidden")
            || !peakLoadPopout.classList.contains("is-hidden");
        document.body.classList.toggle("overflow-hidden", hasOpenSurface);
    }

    function openDrawer() {
        detailsDrawer.setAttribute("aria-hidden", "false");
        detailsBackdrop.classList.remove("is-hidden");
        syncBodyLock();
    }

    function closeDrawer() {
        detailsDrawer.setAttribute("aria-hidden", "true");
        detailsBackdrop.classList.add("is-hidden");
        syncBodyLock();
    }

    function openNowGroupsPopout() {
        renderNowGroupsPopout();
        nowGroupsPopout.classList.remove("is-hidden");
        syncBodyLock();
    }

    function closeNowGroupsPopout() {
        nowGroupsPopout.classList.add("is-hidden");
        syncBodyLock();
    }

    function openMatchingTeachersPopout() {
        renderMatchingTeachersPopout();
        matchingTeachersPopout.classList.remove("is-hidden");
        syncBodyLock();
    }

    function closeMatchingTeachersPopout() {
        matchingTeachersPopout.classList.add("is-hidden");
        syncBodyLock();
    }

    function openFinderPopout() {
        finderPopout.classList.remove("is-hidden");
        syncBodyLock();
    }

    function openPeakLoadPopout() {
        renderPeakLoadPopout();
        peakLoadPopout.classList.remove("is-hidden");
        syncBodyLock();
    }

    function closeFinderPopout() {
        finderPopout.classList.add("is-hidden");
        syncBodyLock();
    }

    function closePeakLoadPopout() {
        peakLoadPopout.classList.add("is-hidden");
        syncBodyLock();
    }

    function syncStateFromFilters() {
        state.filters.age = ageFilter.value;
        state.filters.level = levelFilter.value;
        state.filters.language = languageFilter.value;
    }

    function renderDashboard() {
        renderActiveFilterPills();
        renderSummary();
        renderNowGroupsPopout();
        renderMatchingTeachersPopout();
        renderPeakLoadPopout();
        renderSchedule();
        renderDrawer();
    }

    function syncFinderStateFromFilters() {
        state.finder.age = finderAgeFilter.value;
        state.finder.level = finderLevelFilter.value;
        state.finder.language = finderLanguageFilter.value;
    }

    [ageFilter, levelFilter, languageFilter].forEach(filterNode => {
        filterNode.addEventListener("change", () => {
            syncStateFromFilters();
            renderDashboard();
        });
    });

    [finderAgeFilter, finderLevelFilter, finderLanguageFilter].forEach(filterNode => {
        filterNode.addEventListener("change", () => {
            syncFinderStateFromFilters();
            renderFinderResults();
        });
    });

    finderAddSlotButton.addEventListener("click", () => {
        state.finder.requests.push({
            id: finderRequestId++,
            dayIndex: 6,
            start: "17:00",
            end: "18:30",
        });
        renderFinderSlots();
        renderFinderResults();
    });

    finderResetButton.addEventListener("click", () => {
        finderAgeFilter.value = "";
        finderLevelFilter.value = "";
        finderLanguageFilter.value = "";
        state.finder.requests = [{ id: 1, dayIndex: 1, start: "14:00", end: "15:00" }];
        finderRequestId = 2;
        syncFinderStateFromFilters();
        renderFinderSlots();
        renderFinderResults();
    });

    resetFiltersButton.addEventListener("click", () => {
        ageFilter.value = "";
        levelFilter.value = "";
        languageFilter.value = "";
        syncStateFromFilters();
        renderDashboard();
    });

    closeDrawerButton.addEventListener("click", closeDrawer);
    detailsBackdrop.addEventListener("click", closeDrawer);
    openNowGroupsPopoutButton.addEventListener("click", openNowGroupsPopout);
    closeNowGroupsPopoutButton.addEventListener("click", closeNowGroupsPopout);
    nowGroupsBackdrop.addEventListener("click", closeNowGroupsPopout);
    openMatchingTeachersPopoutButton.addEventListener("click", openMatchingTeachersPopout);
    closeMatchingTeachersPopoutButton.addEventListener("click", closeMatchingTeachersPopout);
    matchingTeachersBackdrop.addEventListener("click", closeMatchingTeachersPopout);
    openPeakLoadPopoutButton.addEventListener("click", openPeakLoadPopout);
    closePeakLoadPopoutButton.addEventListener("click", closePeakLoadPopout);
    peakLoadBackdrop.addEventListener("click", closePeakLoadPopout);
    openFinderPopoutButton.addEventListener("click", openFinderPopout);
    closeFinderPopoutButton.addEventListener("click", closeFinderPopout);
    finderBackdrop.addEventListener("click", closeFinderPopout);

    document.addEventListener("keydown", event => {
        if (event.key === "Escape") {
            closeDrawer();
            closeNowGroupsPopout();
            closeMatchingTeachersPopout();
            closePeakLoadPopout();
            closeFinderPopout();
        }
    });

    syncStateFromFilters();
    syncFinderStateFromFilters();
    renderFinderSlots();
    renderFinderResults();
    renderDashboard();
    window.setInterval(() => {
        renderSummary();
        renderNowGroupsPopout();
    }, 60000);
</script>
</body>
</html>
