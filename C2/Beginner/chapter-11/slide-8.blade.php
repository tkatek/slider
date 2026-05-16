<?php

$customTitle = 'Speaking Practice';

$customSubtitle = '
<span class="text-blue-700 dark:text-blue-300 font-black">Students practice:</span>
    <span class="font-black text-slate-950 dark:text-slate-50">Teacher says - Student reacts (Students respond quickly):</span>
';

$practiceNote = '
    <span class="block text-left">
        <span class="block space-y-3 text-slate-800 dark:text-slate-100">
            <span class="block">
                <span class="font-black text-blue-700 dark:text-blue-300">Teacher says:</span><br>
                "Did that bother you?"
            </span>

            <span class="block">
                <span class="font-black text-fuchsia-700 dark:text-fuchsia-300">Student reacts:</span><br>
                "A little."
            </span>

            <span class="block">
                <span class="font-black text-blue-700 dark:text-blue-300">Teacher says:</span><br>
                "Are you free later?"
            </span>

            <span class="block">
                <span class="font-black text-fuchsia-700 dark:text-fuchsia-300">Student reacts:</span><br>
                "Probably not."
            </span>

            <span class="block">
                <span class="font-black text-blue-700 dark:text-blue-300">Teacher says:</span><br>
                "Was it worth it?"
            </span>

            <span class="block">
                <span class="font-black text-fuchsia-700 dark:text-fuchsia-300">Student reacts:</span><br>
                "Yeah, I think so."
            </span>

            <span class="block">
                <span class="font-black text-slate-900 dark:text-slate-100">Speaking:</span><br>
                Students practice
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