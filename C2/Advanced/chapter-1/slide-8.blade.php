<?php

$customTitle = 'Speaking Practice';

$customSubtitle = '
    <span class="font-black text-slate-950 dark:text-slate-50">Students practise:</span><br>
    <span class="text-blue-700 dark:text-blue-300 font-black">expressing layered opinions</span>,
    <span class="text-blue-700 dark:text-blue-300 font-black">responding thoughtfully</span>, and
    <span class="text-blue-700 dark:text-blue-300 font-black">avoiding absolute language</span>.
';

$practiceNote = '
    <div class="text-left">
        <div class="mb-2 text-sm font-black uppercase tracking-[0.16em] text-slate-500 dark:text-slate-400">
            Example
        </div>

        <div class="space-y-2 text-slate-800 dark:text-slate-100">
            <p>
                <span class="font-black text-blue-700 dark:text-blue-300">A:</span>
                “Do you think social media helps relationships?”
            </p>
            <p>
                <span class="font-black text-fuchsia-700 dark:text-fuchsia-300">B:</span>
                “To some extent, yes. However, it can also create distance.”
            </p>
        </div>
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
