<span id="startRecordingBtn" class="!inline-flex !h-8 !w-8 !shrink-0 !cursor-pointer !items-center !justify-center !rounded-full !border-0 !bg-transparent !p-0 !text-[#5B3FEA] !outline-none !transition active:!scale-95 dark:!text-violet-300" aria-label="Record voice message">
     <svg class="svg-inline--fa fa-paper-plane fa-w-16 !h-6 !w-6" xmlns="http://www.w3.org/2000/svg" width="256"
          height="256" viewBox="0 0 256 256">
         <path fill="currentColor" d="M80 128V64a48 48 0 0 1 96 0v64a48 48 0 0 1-96 0Zm128 0a8 8 0 0 0-16 0a64 64 0 0 1-128 0a8 8 0 0 0-16 0a80.11 80.11 0 0 0 72 79.6V232a8 8 0 0 0 16 0v-24.4a80.11 80.11 0 0 0 72-79.6Z"/>
     </svg>
</span>
<div class="box_recorder d-none !min-w-0 !flex-1">
    <div class="box_start !flex !w-full !min-w-0 !items-center !gap-3">
        <span id="removeRecordBtn" class="!inline-flex !h-8 !w-8 !shrink-0 !cursor-pointer !items-center !justify-center !rounded-full !bg-red-50 !text-red-500 dark:!bg-red-500/15 dark:!text-red-400">
            <svg class="!h-5 !w-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path fill="currentColor" d="M5 21V6H4V4h5V3h6v1h5v2h-1v15H5Zm2-2h10V6H7v13Zm2-2h2V8H9v9Zm4 0h2V8h-2v9ZM7 6v13V6Z"/>
            </svg>
        </span>
        <div class="box_start_recorder !flex !min-w-0 !flex-1 !items-center !gap-2 !text-sm !font-semibold !text-slate-700 dark:!text-slate-200">
            <span class="effect_recorder !shrink-0"></span>
            <span class="timer_recorder !shrink-0">
                <span class="minute_recorder">00</span>
                <span>:</span>
                <span class="second_recorder">00</span>
            </span>
            <span class="text_recorder !min-w-0 !truncate">............</span>
        </div>

        <span id="sendRecordBtn" class="!inline-flex !h-8 !w-8 !shrink-0 !cursor-pointer !items-center !justify-center !rounded-full !bg-gradient-to-br !from-[#6D4CFF] !to-[#4F35D8] !text-white !shadow-[0_8px_18px_rgba(91,63,234,0.22)]">
            <svg class="svg-inline--fa fa-paper-plane fa-w-12 !h-4 !w-4" aria-hidden="true" focusable="false"
                 data-prefix="fas" data-icon="paper-plane" role="img" xmlns="http://www.w3.org/2000/svg"
                 viewBox="0 0 512 512" data-fa-i2svg="">
                    <path fill="currentColor" d="M476 3.2L12.5 270.6c-18.1 10.4-15.8 35.6 2.2 43.2L121 358.4l287.3-253.2c5.5-4.9 13.3 2.6 8.6 8.3L176 407v80.5c0 23.6 28.5 32.9 42.5 15.8L282 426l124.6 52.2c14.2 6 30.4-2.9 33-18.2l72-432C515 7.8 493.3-6.8 476 3.2z"></path>
            </svg>
        </span>
    </div>
</div>
