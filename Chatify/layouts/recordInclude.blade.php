<span id="startRecordingBtn" class="inline-flex shrink-0 cursor-pointer items-center justify-center text-[#5B3FEA] transition active:scale-95" aria-label="Record voice message">
    <svg viewBox="0 0 24 24" fill="none" class="h-7 w-7 md:h-6 md:w-6 xl:h-7 xl:w-7" aria-hidden="true">
        <path d="M12 14.5a3.3 3.3 0 0 0 3.3-3.3V6.3a3.3 3.3 0 0 0-6.6 0v4.9a3.3 3.3 0 0 0 3.3 3.3Z" stroke="currentColor" stroke-width="2.1"></path>
        <path d="M5.5 11.5a6.5 6.5 0 0 0 13 0M12 18v3M8.5 21h7" stroke="currentColor" stroke-width="2.1" stroke-linecap="round"></path>
    </svg>
</span>

<div class="box_recorder d-none flex min-w-0 flex-1">
    <div class="box_start flex w-full items-center gap-2">
        <span id="removeRecordBtn" class="inline-flex h-9 w-9 shrink-0 cursor-pointer items-center justify-center rounded-full bg-red-50 text-red-500 transition active:scale-95">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                <path fill="currentColor" d="M5 21V6H4V4h5V3h6v1h5v2h-1v15H5Zm2-2h10V6H7v13Zm2-2h2V8H9v9Zm4 0h2V8h-2v9ZM7 6v13V6Z"/>
            </svg>
        </span>

        <div class="box_start_recorder flex min-w-0 flex-1 items-center gap-2 text-sm font-bold text-slate-500">
            <span class="effect_recorder h-2.5 w-2.5 shrink-0 rounded-full bg-red-500"></span>
            <span class="timer_recorder shrink-0">
                <span class="minute_recorder">00</span><span>:</span><span class="second_recorder">00</span>
            </span>
            <span class="text_recorder truncate">............</span>
        </div>

        <span id="sendRecordBtn" class="inline-flex h-9 w-9 shrink-0 cursor-pointer items-center justify-center rounded-full bg-gradient-to-br from-[#6D4CFF] to-[#4F35D8] text-white shadow-[0_10px_22px_rgba(91,63,234,0.22)] transition active:scale-95">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="paper-plane" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="18" height="18">
                <path fill="currentColor" d="M476 3.2L12.5 270.6c-18.1 10.4-15.8 35.6 2.2 43.2L121 358.4l287.3-253.2c5.5-4.9 13.3 2.6 8.6 8.3L176 407v80.5c0 23.6 28.5 32.9 42.5 15.8L282 426l124.6 52.2c14.2 6 30.4-2.9 33-18.2l72-432C515 7.8 493.3-6.8 476 3.2z"></path>
            </svg>
        </span>
    </div>
</div>
