<?php

$customTitle = 'Speaking Time!';

$customSubtitle = '
    <span class="font-black text-slate-950 dark:text-slate-50">Answer these questions:</span>
';

$practiceNote = '
    <span class="block text-left">
        <span class="mb-3 block text-sm font-black uppercase tracking-[0.16em] text-slate-500 dark:text-slate-400">
            Discussion Questions
        </span>

        <span class="block space-y-3 text-slate-800 dark:text-slate-100">
            <span class="block">
                <span class="font-black text-blue-700 dark:text-blue-300">1.</span>
                Can you share some tips you learned today?
            </span>

            <span class="block">
                <span class="font-black text-fuchsia-700 dark:text-fuchsia-300">2.</span>
                Is Boston English centre helping you achieve your goal in learning English?
            </span>
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