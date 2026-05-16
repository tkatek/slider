<?php

$customTitle = 'The 3-Minute Challenge';

$customSubtitle = '
    <span class="font-black text-slate-950 dark:text-slate-50">Goal:</span>
    test spontaneous speech.<br>
    Each student talks for 3 minutes about how to
    <span class="font-black text-blue-700 dark:text-blue-300">handle a question you don\'t know the answer to</span>.
';

$practiceNote = '
    <span class="block text-left">
        <span class="block font-black text-slate-900 dark:text-slate-100">Challenge:</span>
        <span class="mt-2 block space-y-1.5">
            <span class="block">Speak continuously for 3 minutes.</span>
            <span class="block">Use at least 2 reaction phrases + 1 filler.</span>
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