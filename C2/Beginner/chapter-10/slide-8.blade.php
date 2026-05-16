<?php

$customTitle = 'Speaking Practice';

$customSubtitle = '
    <span class="font-black text-slate-950 dark:text-slate-50">Students practice fixing sentences:</span>
';

$practiceNote = '
    <span class="block text-left">
        <span class="block space-y-3 text-slate-800 dark:text-slate-100">
            <span class="block">
                <span class="font-black text-blue-700 dark:text-blue-300">Teacher says:</span><br>
                "I did a big mistake."
            </span>

            <span class="block">
                <span class="font-black text-fuchsia-700 dark:text-fuchsia-300">Students correct:</span><br>
                "I made a big mistake."
            </span>

            <span class="block">
                <span class="font-black text-slate-900 dark:text-slate-100">Example:</span><br>
                "The weather is cold very."<br>
                "I explained him the problem."
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