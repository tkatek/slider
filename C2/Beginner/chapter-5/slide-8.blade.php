<?php

$customTitle = 'Speaking Practice';

$customSubtitle = '
    <span class="font-black text-slate-950 dark:text-slate-50">Students practice:</span><br>
    <span class="text-blue-700 dark:text-blue-300 font-black">writing and reading polite follow-up messages</span>,
    <span class="text-blue-700 dark:text-blue-300 font-black">arranging meetings professionally</span>, and
    <span class="text-blue-700 dark:text-blue-300 font-black">suggesting collaborations</span>.
';

$practiceNote = '
    <span class="block text-left">
        <span class="mb-2 block text-sm font-black uppercase tracking-[0.16em] text-slate-500 dark:text-slate-400">
            Example
        </span>

        <span class="block space-y-2 text-slate-800 dark:text-slate-100">
            <span class="block">
                <span class="font-black text-blue-700 dark:text-blue-300">A:</span>
                "It was great speaking with you at the seminar. I\'d love to continue our discussion — are you available next Tuesday?"
            </span>
            <span class="block">
                <span class="font-black text-fuchsia-700 dark:text-fuchsia-300">B:</span>
                "Yes, that works. Let\'s set a time."
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