<?php
// 1. MODIFY THESE TO CHANGE THE TEXT
$customTitle = "Speaking Time!";

$customSubtitle = '';

$practiceNote = '
    <span class="block text-left">
        <span class="mb-2 block text-sm font-black uppercase tracking-[0.16em] text-slate-500 dark:text-slate-400">
            Questions
        </span>

        <span class="block space-y-2 text-slate-800 dark:text-slate-100">
            <span class="block">
                <span class="font-black text-blue-700 dark:text-blue-300">1.</span>
                How long have you lived in your place?
            </span>
            <span class="block">
                <span class="font-black text-fuchsia-700 dark:text-fuchsia-300">2.</span>
                How long have you worked as a . . . . ?
            </span>
            <span class="block">
                <span class="font-black text-emerald-700 dark:text-emerald-300">3.</span>
                How long have you travelled to the USA / Canada / . . . . ?
            </span>
        </span>
    </span>
';

$user = auth()->user();

$userAvatar = $user->getFirstMediaUrl('avatars', 'thumb');
if (!$userAvatar) {
    $userAvatar = "https://ui-avatars.com/api/?name=" . urlencode($user->name) . "&background=6366f1&color=fff&bold=true";
}

$pusher = [
    "key" => config('chatify.pusher.key'),
    "cluster" => config('chatify.pusher.options.cluster'),
    "channel" => "slide-$slide->id",
];

$finalTitle    = $customTitle ?? 'Writing Time';
$finalSubtitle = $customSubtitle ?? 'Share your thoughts';

$content = [
    'pusher'        => $pusher,
    'user'          => $user,
    'user_avatar'   => $userAvatar,
    'title'         => $finalTitle,
    'subtitle'      => $finalSubtitle,
    'practice_note' => $practiceNote,
    'page_title'    => $finalTitle,
];
?>

@include('slider.chat.live-audio', ['content' => $content])