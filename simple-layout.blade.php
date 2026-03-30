<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{config('extra-config.app_title')}}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <meta name="referrer" content="strict-origin-when-cross-origin">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: { extend: { fontFamily: { sans: ['Plus Jakarta Sans', 'ui-sans-serif', 'system-ui'] } } }
        };
    </script>

    <script src="{{asset('template/core/dark-tailwind-storage.min.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

    @yield("style")
</head>

<body class="h-full overflow-x-hidden">

<div class="isolate relative min-h-[100dvh] overflow-x-hidden overflow-y-auto bg-slate-50 text-slate-900 dark:bg-slate-900 dark:text-slate-50">
    <div class="pointer-events-none fixed inset-0 z-0">
        <div class="absolute -top-32 -left-32 h-96 w-96 rounded-full bg-indigo-500/15 blur-3xl dark:bg-indigo-500/25"></div>
        <div class="absolute -bottom-40 -right-32 h-[30rem] w-[30rem] rounded-full bg-blue-500/10 blur-3xl dark:bg-blue-500/20"></div>
        <div class="absolute left-1/2 top-[85%] -translate-x-1/2 h-[32rem] w-[32rem] rounded-full bg-emerald-500/10 blur-3xl dark:bg-emerald-500/15"></div>
    </div>

    <div class="relative z-10">
        @yield("content")
    </div>

</div>

@yield("script")
</body>
</html>
