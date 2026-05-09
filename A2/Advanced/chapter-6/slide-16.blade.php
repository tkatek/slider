<?php
// 1. MODIFY THESE TO CHANGE THE TEXT
$customTitle    = "Speaking Time!";
$customSubtitle = '
<span class="font-black text-blue-700 dark:text-blue-300">How long have you lived in your place?</span><br>
    <span class="font-black text-blue-700 dark:text-blue-300">How long have you worked as a......?</span><br>
    <span class="font-black text-blue-700 dark:text-blue-300">How ling have you travelled to the USA/CANADA/...?</span>
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

$finalTitle    = $customTitle ??  'Writing Time';
$finalSubtitle = $customSubtitle ??  'Share your thoughts';

$content = [
    'pusher'      => $pusher,
    'user'        => $user,
    'user_avatar' => $userAvatar,
    'title'       => $finalTitle,
    'subtitle'    => $finalSubtitle,
    'page_title'  => $finalTitle,
];
?>


@include('slider.chat.live-audio', ['content' => $content])