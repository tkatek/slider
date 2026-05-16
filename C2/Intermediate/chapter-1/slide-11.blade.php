<?php

$customTitle = 'The 3-Minute Challenge';

$customSubtitle = '
    <span class="font-black text-slate-950 dark:text-slate-50">Goal:</span>
    test spontaneous speech.<br>
    Each student talks for 3 minutes about
    <span class="font-black text-blue-700 dark:text-blue-300">why communication skills matter more at advanced levels.</span>
';

$practiceNote = '
    <div class="text-left">
        <div class="font-black text-slate-900 dark:text-slate-100">Before you record:</div>
        <ul class="mt-2 space-y-1.5">
            <li>Speak continuously for 3 minutes.</li>
            <li>Use at least 2 reaction phrases + 1 filler.</li>
        </ul>
    </div>
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
