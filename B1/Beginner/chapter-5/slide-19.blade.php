<?php

$customTitle = 'Speaking';

$customSubtitle = '
    What tips can you give to ensure a quality time on the beach?
';

$practiceNote = '
    <span class="block text-left">
        <span class="block font-black text-slate-950 dark:text-slate-50">
            Suggested Tips for Enjoying Seaside Entertainment
        </span>

        <span class="mt-3 block font-black text-blue-700 dark:text-blue-300">
            Add Yours:
        </span>

        <span class="mt-2 block space-y-1.5">
            <span class="block">1. Plan Activities for Your Location and Weather</span>
            <span class="block">2. Bring Necessary Equipment and Supplies</span>
            <span class="block">3. Protect and Respect the Natural Environment</span>
        </span>
    </span>
';

$user = auth()->user();

$userAvatar = $user->getFirstMediaUrl('avatars', 'thumb');
if (!$userAvatar) {
    $userAvatar = 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&background=6366f1&color=fff&bold=true';
}

$pusher = [
    'key'     => config('chatify.pusher.key'),
    'cluster' => config('chatify.pusher.options.cluster'),
    'channel' => "slide-$slide->id",
];

$content = [
    'pusher'        => $pusher,
    'user'          => $user,
    'user_avatar'   => $userAvatar,

    'page_title'    => $customTitle,
    'title'         => $customTitle,
    'subtitle'      => $customSubtitle,
    'practice_note' => $practiceNote,
];

?>

@include('slider.chat.live-audio', ['content' => $content])