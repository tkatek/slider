<?php
// 1. MODIFY THESE TO CHANGE THE TEXT
$customTitle    = "Record a (voice note ) using the prompt provided";
$customSubtitle = "Make a 30-second emergency call\n".
    "Checklist:\n" .
    "- Say problem\n" .
    "- Give address\n" .
    "- Ask for help\n";

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