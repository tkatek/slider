<?php

$customTitle = 'Speaking Practice';

$customSubtitle = '
    Make complaints using always.
';

$practiceNote = '
    <span class="block text-left">
        <span class="mb-2 block text-sm font-black uppercase tracking-[0.16em] text-slate-500 dark:text-slate-400">
            Topics
        </span>

        <span class="mb-5 block space-y-2 text-slate-800 dark:text-slate-100">
            <span class="block">noisy neighbours</span>
            <span class="block">messy roommates</span>
            <span class="block">lazy friends</span>
            <span class="block">rude customers</span>
            <span class="block">bossy manager</span>
        </span>

        <span class="mb-2 block text-sm font-black uppercase tracking-[0.16em] text-slate-500 dark:text-slate-400">
            Example Answers
        </span>

        <span class="block space-y-2 text-slate-800 dark:text-slate-100">
            <span class="block">“My neighbor is always playing loud music.”</span>
            <span class="block">“My brother is always leaving dirty dishes in the kitchen.”</span>
            <span class="block">“She’s always interrupting people.”</span>
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