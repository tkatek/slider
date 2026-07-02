@extends('tutor.layout.dashboard')
@section('head')
    <link href="{{asset('template/pages/student/liveTutor/index.min.css')}}" rel="stylesheet" />
    {{-- script for including summernote--}}
    <script src="{{asset('template/summernote/vendor/popper.min.js')}}" ></script>

    <script src="{{asset('template/summernote/vendor/bootstrap.min.js')}}"></script>
    <link href="{{asset('template/summernote/vendor/style.min.css')}}" rel="stylesheet" />
    <link href="{{asset('template/summernote/vendor/summernote-bs4.min.css')}}" rel="stylesheet">
    <script src="{{asset('template/summernote/vendor/summernote-bs4.min.js')}}"></script>
    <script src="{{asset('template/summernote/mathLive/mathLive.min.js')}}"></script>
    <script src="{{asset('template/summernote/mathLive/edit.min.js')}}"></script>
    <script src="{{asset('template/summernote/plugins/math.js')}}"></script>
    <script src="{{asset('template/summernote/plugins/list-styles.js')}}"></script>
    <script src="{{asset('template/summernote/plugins/special-chars.js')}}"></script>

@endsection
@section('script')
    <script type="module">
        import {callSummerNote} from "/template/summernote/summernote-student.js";
        import {isNumber} from "/template/libs/forms/isNumber.js"; 
        $(function (){
            $(".number").keypress(function (event) {
                return isNumber(event, this);
            });
            const csrfToken = document.head.querySelector('meta[name="csrf-token"], meta[name="csrf_token"]')?.content || '';

            $('#delete_response').on('click',function (){
                const url = $(this).data('route');
                $.ajax({
                    url: url,
                    method: "DELETE",
                    data: { _token: csrfToken },
                    success: (data) => {
                        $('#answer_questions_box').html('');
                    },
                    error: () => {
                        console.error("Server error, check your response");
                    },
                });
            })
        });
        callSummerNote();
    </script>
    <script src="{{asset('template/pages/student/liveTutor/index.min.js')}}" ></script>
@endsection
@section('content')
    {{ App::setLocale(Auth::user()->lang) }}
    <div class="card pt-0">
        <div class="card-body position-relative">
            <div class="box_pre_answer d-none">
                <div class="container">
                    <div class="preAnswers_container">
                        <div class="preAnswers">
                            <div class="box_bot">
                                <div class="dot"></div>
                            </div>
                            <div class="box_bot">
                                <div class="dot"></div>
                            </div>
                            <div class="box_bot">
                                <div class="dot"></div>
                            </div>
                            <div class="box_bot">
                                <div class="dot"></div>
                            </div>
                            <div class="box_bot">
                                <div class="dot"></div>
                            </div>
                            <div class="box_bot">
                                <div class="dot"></div>
                            </div>
                        </div>
                        <div class="text">
                            {{__('form.Please wait')}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="  main_container_answer_questions">
                <div class="answer_questions_box_container">
                    <ul id="answer_questions_box" class="list-group list-group-flush" style="min-height: calc(var(--innerHeight) - 645px);">
                        @if($conversation)
                            @foreach($conversation as $message)
                                <li class="list-group-item fs-5">
                                    @if($message->from_id==auth()->id())
                                        Me:
                                    @else
                                        Ai:
                                    @endif
                                    {{$message->body}}
                                </li>
                            @endforeach
                        @else
                            <li class="list-group-item fs-5">
                                {{__('form.Please provide a question for me to answer.')}}
                            </li>
                        @endif

                    </ul>
                </div>
            </div>
            <div class=" d-flex flex-column justify-content-between footer_input_and_btns"
                 style="min-height: calc(var(--innerHeight) - 450px);">
                <div class="mb-3 d-flex align-items-center gap-3 box_btn_option  pt-2">
                    <button id="copy_response"
                            class="btn btn_blue text-white  btn_effect  d-flex align-items-center gap-2">
                        <iconify-icon icon="tabler:clipboard-copy"></iconify-icon> {{__('buttons.Copy')}}</button>

                    <button id="download_response"
                            class="btn btn_blue text-white  btn_effect  d-flex align-items-center gap-2">
                        <iconify-icon icon="ic:file-download"></iconify-icon>{{__('buttons.Download')}} </button>
                    <button id="delete_response" data-route="{{route('chatBot.delete')}}"
                            class="btn btn_blue text-white  btn_effect  d-flex align-items-center gap-2">
                        <iconify-icon icon="ic:baseline-delete"></iconify-icon>{{__('buttons.Delete')}} </button>
                </div>

                <div>
                    <textarea name="summernote" class="summernote" id="" rows="10" cols="80"></textarea>
                    <div class="d-flex align-items-center gap-3 justify-content-between  container_number_question_you_have">
                        <div class=" d-flex justify-content-end" data-alert="Save">
                            <button id="submitBtn" data-url="{{route('chatBot.store')}}"
                                    class="btn_yellow d-flex justify-content-center gap-1 btn  align-items-center"
                                    type="submit" >
                                <iconify-icon icon="ri:send-plane-fill"></iconify-icon>
                                <span class=" fs-6">{{__('buttons.Submit')}}</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
