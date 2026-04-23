<?php
// 1. MODIFY THESE TO CHANGE THE TEXT
$customTitle    = "Speaking time!: What about you";
$customSubtitle = "Think about a memorable moment: What were you doing when something unexpected happened?<br>
Picture yourself in that moment clearly.
";
$customPlaceholder = "While I .........................., ............................................\n\nI .................................. when ................................";

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
    'pusher'      => $pusher,
    'user'        => $user,
    'user_avatar' => $userAvatar,
    'title'       => $finalTitle,
    'subtitle'    => $finalSubtitle,
    'page_title'  => $finalTitle,
    'placeholder' => $customPlaceholder,
];
?>

@include('slider.chat.live-audio', ['content' => $content])
