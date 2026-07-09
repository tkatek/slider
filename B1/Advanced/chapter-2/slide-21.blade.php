<?php
$customTitle = "Writing: Opinion Writing";

$customSubtitle = "Choose ONE situation. Write 6–8 sentences using different expressions of certainty.";

$customModelAnswer = "1. My family is planning to go on holiday this summer. I'm sure everyone wants to go to the beach because we all enjoy swimming. We will probably travel by car because it's cheaper than flying. We might stay in a hotel near the sea if we find a good offer. I'm not sure my dad can take a week off from work because he has been very busy recently. I'd be surprised if we cancelled our holiday because we've been planning it for months. I hope we have a wonderful time together.

2. Our class is planning a school trip next month. I'm sure everyone is excited about it. We will probably visit a museum because our teacher loves history. We might also stop at a park to have lunch and play games. I'm not sure the weather will be sunny, so we should take our jackets. I'd be surprised if anyone stayed at home because all my classmates have been talking about the trip for weeks. I think it will be a fun and educational day.

3. Our football team is getting ready for an important match this weekend. I'm sure everyone will do their best. We will probably win if we play as a team and follow our coach's advice. Some players might feel nervous before the match, but they should become more confident once the game starts. I'm not sure who will score the first goal. I'd be surprised if we gave up easily because we have trained hard all month.

4. My friend is applying for a new job this week. I'm sure she has the skills and experience for the position. She will probably do well in the interview because she has prepared carefully. She might feel a little nervous at first, but that's normal. I'm not sure when the company will announce the results. I'd be surprised if they didn't offer her the job because she always works hard and has a positive attitude. I hope she gets the job soon.";

$customCalloutText = "
<div class='grid grid-cols-1 gap-4 text-slate-800 dark:text-slate-100 lg:grid-cols-2'>

    <div class='rounded-xl border border-slate-200 bg-white/70 p-4 dark:border-slate-700 dark:bg-slate-900/40'>
        <p class='mb-3 text-sm font-bold uppercase tracking-wide text-slate-700 dark:text-slate-200'>
            Choose ONE situation
        </p>

        <ul class='list-disc space-y-2 pl-5 text-sm leading-relaxed'>
            <li>Your class is planning a school trip.</li>
            <li>Your family wants to buy a new car.</li>
            <li>Your friend is applying for a new job.</li>
            <li>Your team is preparing for a football match.</li>
        </ul>
    </div>

    <div class='rounded-xl border border-slate-200 bg-white/70 p-4 dark:border-slate-700 dark:bg-slate-900/40'>
        <p class='mb-3 text-sm font-bold uppercase tracking-wide text-slate-700 dark:text-slate-200'>
            Use at least five expressions from the box
        </p>

        <div class='grid grid-cols-1 gap-2 text-sm leading-relaxed text-slate-700 dark:text-slate-200'>
            <p>I'm sure...</p>
            <p>I'm not sure...</p>
            <p>will probably...</p>
            <p>might...</p>
            <p>should...</p>
            <p>can't...</p>
            <p>I'd be surprised if...</p>
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