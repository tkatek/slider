<?php
$customTitle = 'Speaking time!: What about you';

$customSubtitle = '
    <span class="font-black text-slate-950 dark:text-slate-50">Think about a memorable moment:</span>
    <span class="text-blue-700 dark:text-blue-300 font-black">What were you doing when something unexpected happened?</span><br>
    <span class="text-slate-700 dark:text-slate-200 font-bold">Picture yourself in that moment clearly.</span>
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

$content = [
    'pusher'      => $pusher,
    'user'        => $user,
    'user_avatar' => $userAvatar,
    'page_title'  => $customTitle,
    'title'       => $customTitle,
    'subtitle'    => $customSubtitle,
];
?>

@include('slider.chat.live-audio', ['content' => $content])