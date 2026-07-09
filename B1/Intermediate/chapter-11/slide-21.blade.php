<?php
$customTitle = 'Writing: "Walk in Their Shoes"';

$customSubtitle = 'Write an 80–100 word paragraph showing empathy toward someone in a real-life situation.';

$customModelAnswer = <<<'TEXT'
If I were in this person's situation, I would feel worried and lonely. The elderly person is going through difficult circumstances because they are waiting for news about a family member. We should put ourselves in someone else's situation and think about what they are going through. I would be there for them by talking to them kindly and offering comfort. We should respect people's feelings and show compassion instead of judging them. A small act of kindness can ignite hope and make someone feel valued. Empathy helps us build stronger and more caring communities.
TEXT;

$customCalloutText = <<<'HTML'
<div class="space-y-4 text-slate-800 dark:text-slate-100">

    <div class="rounded-2xl border border-emerald-200 bg-emerald-50/70 p-4 dark:border-emerald-400/30 dark:bg-emerald-500/10">
        <p class="text-sm font-black uppercase tracking-wide text-emerald-700 dark:text-emerald-300">
            Situation
        </p>

        <p class="mt-2 text-sm font-bold leading-relaxed text-slate-800 dark:text-slate-100 sm:text-base">
            Imagine you see an elderly person sitting alone in a hospital waiting area. They look worried and upset because they are waiting for news about a family member. No one is talking to them, and they seem lonely.
        </p>
    </div>

    <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
        <div class="rounded-2xl border border-slate-200 bg-white/70 p-4 dark:border-slate-700 dark:bg-slate-900/40">
            <p class="text-sm font-black uppercase tracking-wide text-slate-700 dark:text-slate-200">
                Task
            </p>

            <p class="mt-2 text-sm font-bold leading-relaxed text-slate-900 dark:text-slate-100">
                Write 80–100 words explaining:
            </p>

            <ul class="mt-3 list-disc space-y-2 pl-5 text-sm font-semibold leading-relaxed text-slate-700 dark:text-slate-200">
                <li>How the person might feel.</li>
                <li>What circumstances they are going through.</li>
                <li>What you would do to help or comfort them.</li>
                <li>Why empathy and compassion are important in this situation.</li>
            </ul>
        </div>

        <div class="rounded-2xl border border-slate-200 bg-white/70 p-4 dark:border-slate-700 dark:bg-slate-900/40">
            <p class="text-sm font-black uppercase tracking-wide text-slate-700 dark:text-slate-200">
                Use at least 3 expressions
            </p>

            <div class="mt-3 grid gap-2 text-sm font-semibold leading-relaxed text-slate-700 dark:text-slate-200">
                <p>• put yourself in someone else's situation</p>
                <p>• think about what someone is going through</p>
                <p>• be there for someone</p>
                <p>• have someone's back</p>
                <p>• respect people's feelings</p>
                <p>• encourage hope, love, and tolerance</p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
        <div class="rounded-2xl border border-amber-200 bg-amber-50/70 p-4 dark:border-amber-400/30 dark:bg-amber-500/10">
            <p class="text-sm font-black uppercase tracking-wide text-amber-700 dark:text-amber-300">
                Sentence Starters
            </p>

            <div class="mt-3 grid gap-2 text-sm font-semibold leading-relaxed text-slate-700 dark:text-slate-200">
                <p>If I were in this person's situation, ...</p>
                <p>The person may be feeling ...</p>
                <p>We should think about what they are going through ...</p>
                <p>I would try to ...</p>
                <p>Showing empathy can ...</p>
            </div>
        </div>

        <div class="rounded-2xl border border-sky-200 bg-sky-50/70 p-4 dark:border-sky-400/30 dark:bg-sky-500/10">
            <p class="text-sm font-black uppercase tracking-wide text-sky-700 dark:text-sky-300">
                Success Criteria
            </p>

            <ul class="mt-3 space-y-2 text-sm font-semibold leading-relaxed text-slate-700 dark:text-slate-200">
                <li>✅ Write 80–100 words.</li>
                <li>✅ Use at least 5 vocabulary words from the lesson.</li>
                <li>✅ Use at least 3 empathy expressions.</li>
                <li>✅ Use should/shouldn't to give advice.</li>
            </ul>
        </div>
    </div>

</div>
HTML;

$customPlaceholder = 'Write your 80–100 word paragraph here...';

if (auth()->check()) {
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