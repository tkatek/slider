<?php
$customTitle = "Writing: Online or Offline Shopping?";

$customSubtitle = "Which is better: online or offline shopping?";

$customModelAnswer = "Online and offline shopping both have advantages and disadvantages. Online shopping is convenient because people can buy products from home and compare prices easily, which helps them make informed decisions. It can also influence buying decisions through advertising. However, customers cannot see or try products before buying, and delivery may take time.

Offline shopping allows people to see and test products, which makes it more reliable. It also gives a better shopping experience with direct help from sellers. On the downside, it can be time-consuming and sometimes more expensive.

In my opinion, online shopping is more convenient, but offline shopping is better for important purchases because it is more reliable.";

$customCalloutText = "
<div class='grid grid-cols-1 gap-4 text-slate-800 dark:text-slate-100 lg:grid-cols-2'>

    <div class='rounded-xl border border-slate-200 bg-white/70 p-4 dark:border-slate-700 dark:bg-slate-900/40'>
        <p class='text-sm font-bold leading-relaxed text-slate-900 dark:text-slate-100'>
            Write an 80–100 word paragraph comparing online shopping and offline (in-store) shopping. You should include:
        </p>

        <ul class='mt-3 list-disc space-y-2 pl-5 text-sm leading-relaxed text-slate-700 dark:text-slate-200'>
            <li>At least two advantages of online shopping</li>
            <li>At least two disadvantages of online shopping</li>
            <li>At least two advantages of offline shopping</li>
            <li>At least two disadvantages of offline shopping</li>
            <li>Your personal opinion and which one you prefer with a reason</li>
        </ul>
    </div>

    <div class='rounded-xl border border-slate-200 bg-white/70 p-4 dark:border-slate-700 dark:bg-slate-900/40'>
        <p class='mb-3 text-sm font-bold leading-relaxed text-slate-900 dark:text-slate-100'>
            Useful Sentence Starters:
        </p>

        <div class='grid grid-cols-1 gap-2 text-sm leading-relaxed text-slate-700 dark:text-slate-200'>
            <p>One advantage of online shopping is that…</p>
            <p>However, a disadvantage is that…</p>
            <p>On the other hand, offline shopping allows people to…</p>
            <p>One problem with shopping in stores is that…</p>
            <p>In my opinion, I prefer… because…</p>
        </div>
    </div>

</div>";

$customPlaceholder = "";

if (auth()->check()){
    $user = auth()->user();
} else {
    $user = \App\Models\User::create([
        "id" => Str::uuid()->toString(),
        "name" => \Faker\Factory::create()->firstName(),
        "last_name" => \Faker\Factory::create()->lastName(),
        "email" => \Faker\Factory::create()->email(),
        "role_id" => 4
    ]);
    auth()->login($user, true);
}

$userAvatar = $user->getFirstMediaUrl('avatars', 'thumb');
if (!$userAvatar) {
    $userAvatar = "https://ui-avatars.com/api/?name=" . urlencode($user->name) . "&background=059669&color=fff&bold=true";
}

$pusher = [
    "key" => config('chatify.pusher.key'),
    "cluster" => config('chatify.pusher.options.cluster'),
    "channel" => "slide-$slide->id",
];

$finalTitle = $customTitle ?? $slideItems->where('title', 'title')->first()->content ?? 'Writing Time';
$finalSubtitle = $customSubtitle ?? $slideItems->where('title', 'subtitle')->first()->content ?? 'Share your thoughts';

$content = [
    'pusher' => $pusher,
    'user' => $user,
    'user_avatar' => $userAvatar,
    'title' => $finalTitle,
    'subtitle' => $finalSubtitle,
    'callout_text' => $customCalloutText,
    'model_answer' => trim((string) ($customModelAnswer ?? '')),
    'page_title' => $finalTitle,
    'placeholder' => $customPlaceholder,
];
?>

@include("slider.chat.live", compact("content"))