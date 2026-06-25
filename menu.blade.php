@php
    $currentLang = $currentLang ?? 'en';
    $languages = $languages ?? [
        ['lang' => 'en', 'title' => 'English', 'flag' => 'us'],
        ['lang' => 'ar', 'title' => 'العربية', 'flag' => 'sa'],
        ['lang' => 'fr', 'title' => 'Français', 'flag' => 'fr'],
        ['lang' => 'es', 'title' => 'Español', 'flag' => 'es'],
        ['lang' => 'pt', 'title' => 'Português', 'flag' => 'br'],
        ['lang' => 'tr', 'title' => 'Türkçe', 'flag' => 'tr'],
        ['lang' => 'zh', 'title' => '中文', 'flag' => 'cn'],
    ];
    $active = $active ?? 'profile';
    $menuItems = ['profile', 'books', 'speaking', 'market', 'chat', 'help'];

    if (!in_array($active, $menuItems, true)) {
        $active = 'profile';
    }

    $navItemBaseClass = 'relative flex min-w-0 flex-col items-center justify-end gap-[5px] no-underline [-webkit-tap-highlight-color:transparent] min-[681px]:!min-h-0 min-[681px]:!flex-col min-[681px]:!items-center min-[681px]:!justify-end min-[681px]:!gap-[5px] min-[681px]:!rounded-none min-[681px]:!bg-transparent min-[681px]:!p-0 min-[1280px]:!min-h-[50px] min-[1280px]:!flex-row min-[1280px]:!justify-start min-[1280px]:!gap-6 min-[1280px]:!rounded-none min-[1280px]:!px-8 min-[1280px]:!py-0';
    $navItemActiveClass = 'text-[#345eff] min-[681px]:!text-[#345eff] min-[1280px]:!rounded-r-[20px] min-[1280px]:!bg-[#f3f1ff] min-[1280px]:!text-[#5b45d7] min-[1280px]:before:absolute min-[1280px]:before:left-0 min-[1280px]:before:top-0 min-[1280px]:before:h-full min-[1280px]:before:w-1 min-[1280px]:before:rounded-r-full min-[1280px]:before:bg-[#5b45d7]';
    $navItemInactiveClass = 'text-[#7c879d] min-[681px]:!text-[#7c879d] min-[1280px]:!text-[#344054]';
    $navLabelBaseClass = 'w-full truncate text-center text-[10px] font-bold leading-[1.1] tracking-normal min-[421px]:text-[clamp(12px,2.25vw,18px)] min-[681px]:!w-full min-[681px]:!text-center min-[681px]:!text-[clamp(12px,2.25vw,18px)] min-[681px]:!leading-[1.1] min-[1280px]:!w-auto min-[1280px]:!whitespace-nowrap min-[1280px]:!text-left min-[1280px]:!text-[18px] min-[1280px]:!font-bold min-[1280px]:!leading-none';

    $navItemClass = static fn (string $item): string => $navItemBaseClass . ' ' . ($active === $item ? $navItemActiveClass : $navItemInactiveClass);
    $navLabelClass = static fn (string $item): string => $navLabelBaseClass;
    $user=auth()->user();
@endphp
<nav class="fixed inset-x-0 bottom-0 z-50 grid h-[calc(72px+env(safe-area-inset-bottom))] grid-cols-6 items-end border-t border-[#e8edf5] bg-white px-[8px] pb-[calc(8px+env(safe-area-inset-bottom))] pt-0.5 shadow-[0_-1px_0_rgba(229,235,244,0.78)] min-[421px]:h-[calc(96px+env(safe-area-inset-bottom))] min-[421px]:px-6 min-[421px]:pb-[calc(18px+env(safe-area-inset-bottom))] min-[421px]:pt-2 min-[681px]:!inset-x-0 min-[681px]:!bottom-0 min-[681px]:!top-auto min-[681px]:!grid min-[681px]:!h-[calc(96px+env(safe-area-inset-bottom))] min-[681px]:!w-full min-[681px]:!grid-cols-6 min-[681px]:!items-end min-[681px]:!border-r-0 min-[681px]:!border-t min-[681px]:!px-6 min-[681px]:!pb-[calc(18px+env(safe-area-inset-bottom))] min-[681px]:!pt-2 min-[681px]:!shadow-[0_-1px_0_rgba(229,235,244,0.78)] min-[1280px]:!inset-y-0 min-[1280px]:!left-0 min-[1280px]:!right-auto min-[1280px]:!bottom-auto min-[1280px]:!top-0 min-[1280px]:!flex min-[1280px]:!h-screen min-[1280px]:!w-[340px] min-[1280px]:!grid-cols-none min-[1280px]:!flex-col min-[1280px]:!items-stretch min-[1280px]:!overflow-hidden min-[1280px]:!border-r min-[1280px]:!border-t-0 min-[1280px]:!px-6 min-[1280px]:!pb-4 min-[1280px]:!pt-4 min-[1280px]:!shadow-[1px_0_0_rgba(229,235,244,0.78)]" aria-label="Dashboard menu">
    <div class="hidden min-[681px]:!hidden min-[1280px]:!flex min-[1280px]:!flex-col min-[1280px]:!items-start min-[1280px]:!gap-2 min-[1280px]:!border-b min-[1280px]:!border-[#e8edf5] min-[1280px]:!px-8 min-[1280px]:!pb-4">
        <a href="https://bostonenglishcenter.com/en" class="flex min-w-0 cursor-pointer list-none items-center justify-start gap-3 text-[#071326] transition active:scale-[.98]" aria-label="Boston English Center">
            <span class="grid h-11 w-11 shrink-0 place-items-center text-[#1357e8]" aria-hidden="true">
                <svg class="h-full w-full" viewBox="0 0 48 48" fill="none">
                    <circle cx="24" cy="22" r="15" stroke="currentColor" stroke-width="6"></circle>
                    <path d="M16 34 10 40l10-2" stroke="currentColor" stroke-width="6" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </span>
            <span class="min-w-0 leading-none">
                <span class="block text-[28px] font-extrabold tracking-normal text-[#071326]">Boston</span>
                <span class="block whitespace-nowrap text-[18px] font-extrabold leading-tight text-[#1357e8]">English Center</span>
            </span>
        </a>

        <details class="relative shrink-0" data-language-dropdown>
            <summary class="flex h-11 w-[176px] cursor-pointer list-none items-center gap-3 rounded-[20px] border border-[#e8edf5] bg-white px-4 text-[#071326] shadow-[0_6px_18px_rgba(15,23,42,.04)] marker:hidden [&::-webkit-details-marker]:hidden" aria-label="Change language">
                <img width="32" height="24" src="https://flagcdn.com/w40/us.png" alt="English" class="h-6 w-8 rounded-[3px] object-cover">
                <span class="text-[18px] font-medium leading-none text-[#071326]">English</span>
                <svg class="ml-auto h-4 w-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 0 1 1.06.02L10 11.168l3.71-3.938a.75.75 0 1 1 1.08 1.04l-4.25 4.5a.75.75 0 0 1-1.08 0l-4.25-4.5a.75.75 0 0 1 .02-1.06Z" clip-rule="evenodd"></path>
                </svg>
            </summary>
            <div class="absolute left-0 top-[calc(100%+10px)] z-[80] grid w-[220px] gap-1 rounded-[18px] border border-blue-100 bg-white p-2 text-left shadow-[0_18px_44px_rgba(15,23,42,.16)]">
                @foreach ($languages as $language)
                    <a href="https://bostonenglishcenter.com/landing-page/{{ $language['lang'] }}"
                        @class([
                            'flex min-h-11 items-center gap-3 rounded-[12px] px-3 text-sm font-extrabold text-[#071326] transition hover:bg-[#eaf3ff]',
                            'bg-[#eaf3ff] text-[#1357e8]' => $language['lang'] === $currentLang,
                        ])>
                        <img width="24" height="18" src="https://flagcdn.com/w40/{{ $language['flag'] }}.png" alt="{{ $language['title'] }}" class="h-4 w-6 rounded-[3px] object-cover">
                        <span>{{ $language['title'] }}</span>
                        @if ($language['lang'] === $currentLang)
                            <svg class="ml-auto h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m5 12 4 4L19 6"></path></svg>
                        @endif
                    </a>
                @endforeach
            </div>
        </details>
    </div>

    <div class="contents min-[681px]:!contents min-[681px]:!mt-0 min-[1280px]:!mt-6 min-[1280px]:!flex min-[1280px]:!flex-col min-[1280px]:!gap-0">
        <span class="hidden min-[1280px]:!mb-3 min-[1280px]:!block min-[1280px]:!px-8 min-[1280px]:!text-[14px] min-[1280px]:!font-extrabold min-[1280px]:!uppercase min-[1280px]:!tracking-normal min-[1280px]:!text-[#8a94a8]">Learn</span>
        @if(session()->has('adminId'))
            <a class="{{ $navItemClass('profile') }}" href="{{route('admin.dashboard.return')}}">
            <span class="grid h-[31px] w-[31px] shrink-0 place-items-center text-current min-[421px]:h-[38px] min-[421px]:w-[38px] min-[681px]:!h-[38px] min-[681px]:!w-[38px] min-[1280px]:h-8 min-[1280px]:w-8" aria-hidden="true">
                <svg class="block h-7 w-7 overflow-visible fill-none min-[421px]:h-[34px] min-[421px]:w-[34px] min-[681px]:!h-[34px] min-[681px]:!w-[34px] min-[1280px]:h-7 min-[1280px]:w-7" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                    <path d="M0 0h24v24H0z" fill="none" />
                    <g fill="none" stroke="currentColor" stroke-width="2.15" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="8" r="4"></circle>
                        <path d="M4.5 21a7.5 7.5 0 0 1 15 0"></path>
                    </g>
                </svg>
            </span>
                <span class="{{ $navLabelClass('profile') }}">Admin Area</span>
            </a>
        @endif
        <a class="{{ $navItemClass('profile') }}" href="#" @if ($active === 'profile') aria-current="page" @endif>
            <span class="grid h-[31px] w-[31px] shrink-0 place-items-center text-current min-[421px]:h-[38px] min-[421px]:w-[38px] min-[681px]:!h-[38px] min-[681px]:!w-[38px] min-[1280px]:h-8 min-[1280px]:w-8" aria-hidden="true">
                <svg class="block h-7 w-7 overflow-visible fill-none min-[421px]:h-[34px] min-[421px]:w-[34px] min-[681px]:!h-[34px] min-[681px]:!w-[34px] min-[1280px]:h-7 min-[1280px]:w-7" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                    <path d="M0 0h24v24H0z" fill="none" />
                    <g fill="none" stroke="currentColor" stroke-width="2.15" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="8" r="4"></circle>
                        <path d="M4.5 21a7.5 7.5 0 0 1 15 0"></path>
                    </g>
                </svg>
            </span>
            <span class="{{ $navLabelClass('profile') }}">Profile</span>
        </a>

        <a class="{{ $navItemClass('books') }}" href="#" @if ($active === 'books') aria-current="page" @endif>
            <span class="grid h-[31px] w-[31px] shrink-0 place-items-center text-current min-[421px]:h-[38px] min-[421px]:w-[38px] min-[681px]:!h-[38px] min-[681px]:!w-[38px] min-[1280px]:h-8 min-[1280px]:w-8" aria-hidden="true">
                <svg class="block h-7 w-7 overflow-visible fill-none min-[421px]:h-[34px] min-[421px]:w-[34px] min-[681px]:!h-[34px] min-[681px]:!w-[34px] min-[1280px]:h-7 min-[1280px]:w-7" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                    <path d="M0 0h24v24H0z" fill="none" />
                    <g fill="none">
                        <path d="M20 2v20H4V2z" />
                        <path d="M16 2h-4v5.5L14 6l2 1.5z" />
                        <path stroke="currentColor" stroke-width="2" d="M16 2h-4v5.5L14 6l2 1.5z" />
                        <path stroke="currentColor" stroke-width="2" d="M20 2v20H4V2z" />
                    </g>
                </svg>
            </span>
            <span class="{{ $navLabelClass('books') }}">Books</span>
        </a>

        <a class="{{ $navItemClass('speaking') }}" href="#" @if ($active === 'speaking') aria-current="page" @endif>
            <span class="grid h-[31px] w-[31px] shrink-0 place-items-center text-current min-[421px]:h-[38px] min-[421px]:w-[38px] min-[681px]:!h-[38px] min-[681px]:!w-[38px] min-[1280px]:h-8 min-[1280px]:w-8" aria-hidden="true">
                <svg class="block h-7 w-7 overflow-visible fill-none min-[421px]:h-[34px] min-[421px]:w-[34px] min-[681px]:!h-[34px] min-[681px]:!w-[34px] min-[1280px]:h-7 min-[1280px]:w-7" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                    <path d="M0 0h24v24H0z" fill="none" />
                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.1">
                        <circle cx="12" cy="12" r="7.2"></circle>
                        <circle cx="12" cy="12" r="2.6"></circle>
                        <path d="M12 2.8v2.3M12 18.9v2.3M2.8 12h2.3M18.9 12h2.3"></path>
                    </g>
                </svg>
            </span>
            <span class="{{ $navLabelClass('speaking') }}">Speaking</span>
        </a>

        <span class="hidden min-[1280px]:!mb-3 min-[1280px]:!mt-6 min-[1280px]:!block min-[1280px]:!px-8 min-[1280px]:!text-[14px] min-[1280px]:!font-extrabold min-[1280px]:!uppercase min-[1280px]:!tracking-normal min-[1280px]:!text-[#8a94a8]">Community</span>
        <a class="{{ $navItemClass('chat') }}" href="#" @if ($active === 'chat') aria-current="page" @endif>
            <span class="grid h-[31px] w-[31px] shrink-0 place-items-center text-current min-[421px]:h-[38px] min-[421px]:w-[38px] min-[681px]:!h-[38px] min-[681px]:!w-[38px] min-[1280px]:h-8 min-[1280px]:w-8" aria-hidden="true">
                <svg class="block h-7 w-7 overflow-visible fill-none min-[421px]:h-[34px] min-[421px]:w-[34px] min-[681px]:!h-[34px] min-[681px]:!w-[34px] min-[1280px]:h-7 min-[1280px]:w-7" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                    <path d="M0 0h24v24H0z" fill="none" />
                    <path fill="currentColor" d="m6 18l-2.3 2.3q-.475.475-1.088.213T2 19.575V4q0-.825.588-1.412T4 2h16q.825 0 1.413.588T22 4v12q0 .825-.587 1.413T20 18zm-.85-2H20V4H4v13.125zM4 16V4zm3-2h6q.425 0 .713-.288T14 13t-.288-.712T13 12H7q-.425 0-.712.288T6 13t.288.713T7 14m0-3h10q.425 0 .713-.288T18 10t-.288-.712T17 9H7q-.425 0-.712.288T6 10t.288.713T7 11m0-3h10q.425 0 .713-.288T18 7t-.288-.712T17 6H7q-.425 0-.712.288T6 7t.288.713T7 8" />
                </svg>
            </span>
            <span class="{{ $navLabelClass('chat') }}">Chat</span>
        </a>
        <a class="{{ $navItemClass('market') }}" href="#" @if ($active === 'market') aria-current="page" @endif>
            <span class="grid h-[31px] w-[31px] shrink-0 place-items-center text-current min-[421px]:h-[38px] min-[421px]:w-[38px] min-[681px]:!h-[38px] min-[681px]:!w-[38px] min-[1280px]:h-8 min-[1280px]:w-8" aria-hidden="true">
                <svg class="block h-7 w-7 overflow-visible fill-none min-[421px]:h-[34px] min-[421px]:w-[34px] min-[681px]:!h-[34px] min-[681px]:!w-[34px] min-[1280px]:h-7 min-[1280px]:w-7" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="-2 -2 24 24">
                    <path d="M-2 -2h24v24H-2z" fill="none" />
                    <path fill="currentColor" d="M6 2H3a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1zM3.01 8v9.965H5V13a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v4.965h6.013V8H15c-.768 0-1.47-.289-2-.764A3 3 0 0 1 11 8H9c-.768 0-1.47-.289-2-.764A3 3 0 0 1 5 8zm-2-.754A3 3 0 0 1 0 5V3a3 3 0 0 1 3-3h14a3 3 0 0 1 3 3v2c0 .882-.38 1.676-.987 2.225v10.74a2 2 0 0 1-2 2h-7.64A2 2 0 0 1 9 20H7a2 2 0 0 1-.373-.035H3.011a2 2 0 0 1-2-2V7.245zM9 17.966V13H7v4.965h2zM12 2H8v3a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1zm2 0v3a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1zm0 9h1a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1" />
                </svg>
            </span>
            <span class="{{ $navLabelClass('market') }}">Market</span>
        </a>
        <span class="hidden min-[1280px]:!mb-3 min-[1280px]:!mt-6 min-[1280px]:!block min-[1280px]:!px-8 min-[1280px]:!text-[14px] min-[1280px]:!font-extrabold min-[1280px]:!uppercase min-[1280px]:!tracking-normal min-[1280px]:!text-[#8a94a8]">Support</span>
        <a class="{{ $navItemClass('help') }}" href="#" @if ($active === 'help') aria-current="page" @endif>
            <span class="grid h-[31px] w-[31px] shrink-0 place-items-center text-current min-[421px]:h-[38px] min-[421px]:w-[38px] min-[681px]:!h-[38px] min-[681px]:!w-[38px] min-[1280px]:h-8 min-[1280px]:w-8" aria-hidden="true">
                <svg class="block h-7 w-7 overflow-visible fill-none min-[421px]:h-[34px] min-[421px]:w-[34px] min-[681px]:!h-[34px] min-[681px]:!w-[34px] min-[1280px]:h-7 min-[1280px]:w-7" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                    <path d="M0 0h24v24H0z" fill="none" />
                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.1">
                        <circle cx="12" cy="12" r="9"></circle>
                        <path d="M9.7 9a2.4 2.4 0 0 1 4.55 1.05c0 1.9-2.25 2.2-2.25 3.95"></path>
                        <path d="M12 17h.01"></path>
                    </g>
                </svg>
            </span>
            <span class="{{ $navLabelClass('help') }}">Help</span>
        </a>
    </div>

    <div class="hidden min-[681px]:!hidden min-[1280px]:!mt-auto min-[1280px]:!flex min-[1280px]:!flex-col min-[1280px]:!gap-3 min-[1280px]:!border-t min-[1280px]:!border-[#e8edf5] min-[1280px]:!pt-4">
        <div class="flex min-h-[92px] w-full items-center gap-4 rounded-[18px] bg-[#f8f7ff] px-4 py-4">
            <img class="grid h-14 w-14 shrink-0 place-items-center rounded-full bg-[#c7c1ff] text-[22px] font-medium leading-none text-white" src="{{$user->getFirstMediaUrl('avatars','thumb')}}"/>

            <span class="min-w-0">
                <span class="block whitespace-nowrap text-[22px] font-extrabold leading-tight text-[#071326]">{{$user->name}}</span>
                <span class="mt-0.5 block whitespace-nowrap text-[17px] font-medium leading-tight text-[#586174]">{{$user->student->level}} Student</span>
                <span class="mt-2.5 flex items-center gap-2 whitespace-nowrap text-[17px] font-bold leading-none text-[#5b45d7]">
                    <span aria-hidden="true">🔥</span>
                    <span>14 Day Streak</span>
                </span>
            </span>
        </div>

        <a href="#" class="flex min-h-10 items-center gap-5 px-5 text-[#1f2937] no-underline">
            <span class="grid h-8 w-8 shrink-0 place-items-center" aria-hidden="true">
                <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                    <path d="M16 17l5-5-5-5"></path>
                    <path d="M21 12H9"></path>
                </svg>
            </span>
            <span class="whitespace-nowrap text-[19px] font-semibold leading-none">Log out</span>
        </a>
    </div>
</nav>
