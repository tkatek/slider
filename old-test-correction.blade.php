@extends('student.enroll.test.layout')
@section('head')
    <link rel="stylesheet" type="text/css" href="{{asset('template/libs/level/index.min.css')}}"/>
@endsection
@section('script')
    <script src="{{asset('template/summernote/mathLive/mathLive.min.js')}}"></script>
    <script src="{{asset('template/summernote/mathLive/show.min.js')}}"></script>
    <script src="{{asset('template/pages/student/enroll/test/control.min.js')}}?v=1"></script>
    <script src="{{asset('template/pages/student/enroll/test/writing.min.js')}}"></script>
    <script>
        $(function () {
            $("a[href='#correctionModal']").on('click', function () {
                $(".tutorCorrection").html($(this).data("tutor-correction"));
            })
            $('#modal_hint_correction').modal('show');
        })
    </script>

    <script src="{{asset('template/libs/chartJs/index.min.js')}}"></script>
    <script src="{{asset('template/libs/level/index.min.js')}}"></script>
@endsection
@section('progress')
    <div class="box_img_course rounded-circle border-1">
        <div id="slide_courses_timer" class="d-flex justify-content-center  note_finale align-items-center">
            <span>{{sprintf('%0.2f',$noteObtained??0)}} {{($test->authStudentResponse->isCorrected)?'':__('form.Prov')}} <br>
						<hr class="p-0 m-0">{{sprintf('%0.2f',$test->authStudentResponse->quiz_note) }}
					</span>
        </div>
    </div>
@endsection

@section('content')

    {{ App::setLocale($test->lang) }}

    <div class="menu-wrapper" style="margin-top: 2.95rem;">
        <div id="container_course_student_content" class="container-xxl  flex-grow-1 container-p-y px-0 mx-0 pb-0">
            <div class="col-12 mb-2 mb-md-0 mt-3 mt-md-0 pt-1 pt-md-0">
                <div id="main_card_student_content" class="mode_expand m-0 px-1 py-1 px-md-4">


                    <!-- header_test_chapter -->
                    <div class="header_test_chapter d-flex align-items-center justify-content-between">
                        <div class="  d-flex justify-content-center align-items-center gap-3 block_header">
                            <div id="control_multi_view" class="cursor-pointer">
                                <div class=" d-flex justify-content-center align-items-center text-capitalize gap-1">
                                    <iconify-icon icon="bi:window-split"></iconify-icon>
                                    <span class="fs-6">
                                            {{__('enroll.MultipleView')}}
                                        </span>
                                </div>
                                <div class=" d-flex justify-content-center align-items-center text-capitalize gap-1  d-none ">
                                    <iconify-icon icon="bi:window"></iconify-icon>
                                    <span class="fs-6">{{__('enroll.SingleView')}}</span>
                                </div>
                            </div>
                            <div id="control_problem"
                                 class="d-flex justify-content-center align-items-center text-capitalize gap-3 cursor-pointer">
                                <div class=" d-flex justify-content-center align-items-center text-capitalize gap-1">
                                    <iconify-icon icon="grommet-icons:domain"></iconify-icon>
                                    <span class="fs-6">{{__('enroll.ViewQuestion')}}</span>
                                </div>
                                <div class=" d-flex justify-content-center align-items-center text-capitalize gap-1  d-none ">
                                    <iconify-icon icon="bi:window"></iconify-icon>
                                    <span class="fs-6">{{__('enroll.ViewProblem')}}</span>
                                </div>
                            </div>

                        </div>


                    </div>
                    <!-- view chapter -->
                    <div id="view_chapter" class="test_chapter pt-3">
                        <!-- body_test_chapter  -->
                        <div class="body_test_chapter ">

                            <!-- problem 1 -->

                            @if(count($questions)!=0)
                                <div class="problem_block active resizable-x " data-problem-block="0">
                                    <div class="questions_problem " style="flex: 50%;">
                                        @foreach($questions as $question)
                                            <div class="question_box py-3 {{(!$loop->index)?'active':''}} {{($question->type_question_id==10)?"writing_question_box":""}} " data-questions-block="{{$loop->index}}">
                                                @if($question->authStudentResponse&&$question->authStudentResponse->tutor_correction)
                                                    <div class="question_box_header box_verified_tutor mb-4 d-flex justify-content-between align-content-center text-uppercase">
                                                        <div class="question_range">{{__('form.TutorCorrection')}} </div>
                                                        <a href="#correctionModal" data-tutor-correction="Sorry for this wrong"
                                                           data-bs-toggle="modal" class="btn p-0 ml-auto fs-4">
                                                            <iconify-icon icon="ph:eye-bold"></iconify-icon>
                                                        </a>
                                                    </div>
                                                @endif
                                                <div class="question_box_header d-flex justify-content-between align-content-center text-uppercase">
                                                    <div class="question_range">
                                                        {{__('quiz.Question')}} : {{$loop->index+1}}
                                                    </div>
                                                    <div class="point_question" >
                                                        {{__('quiz.Pt')}} : {{sprintf('%0.2f',$question->note)}}
                                                    </div>
                                                </div>
                                                <div  class="question_content py-md-3 py-2">
                                                    <div style="overflow: auto; margin-bottom: 10px;">
                                                        {!! $question->title !!}
                                                        @if($question->hasMedia('audio'))
                                                            <div class="voice-assistant-item w-clearfix mt-5">
                                                                <div class="voice-assistant-item-button">
                                                                    <a class="play-button w-button" data-audio="{{$question->getFirstMediaUrl('audio')}}">
                                                                        <em class="box-player">
                                                                            <iconify-icon  icon="tabler:player-play-filled" width="30" height="30"></iconify-icon>

                                                                            <iconify-icon class="d-none"  icon="tabler:player-pause-filled" width="30" height="30"></iconify-icon>
                                                                        </em>
                                                                    </a>
                                                                </div>

                                                                <div class="voice-assistant-item-text">
                                                                    <div class="audio-controls">
                                                                        <div class="audio-controls-bar">
                                                                            <div class="audio-controls-bar-current" style="width: 0%;"></div>
                                                                        </div>

                                                                        <div class="audio-controls-time">0:00</div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        @endif
                                                        @if($question->hasMedia('image'))
                                                            <div class="mt-2 mb-3 d-flex justify-content-end">
                                                                <img class="question_img"
                                                                     src="{{$question->getFirstMediaUrl('image','card')}}">
                                                            </div>
                                                        @endif
                                                    </div>

                                                    <div class="option_answer answer_student" >
                                                        <div class="question_box_header d-flex justify-content-between align-content-center text-uppercase">
                                                            <div class="question_range ">
                                                                {{__('enroll.YourAnswer')}}:
                                                            </div>
                                                            <div class="point_question">
                                                                {{__('quiz.Pt')}} : {{sprintf('%0.2f',($question->authStudentResponse)?$question->authStudentResponse->note:0)}}
                                                            </div>
                                                        </div>

                                                        @if($question->type_question_id==1)
                                                            <!--Multiple Choice-->
                                                            <div class="question_content py-md-3 py-2">
                                                                @foreach($question->choices as $choice)
                                                                    <div class="form-check d-flex">
                                                                        <input  {{($question->authStudentResponse && in_array($choice->id,explode(',',$question->authStudentResponse->answer)))?'checked':''}} disabled class="form-check-input me-2" type="checkbox" >
                                                                        <label class="form-check-label ">
                                                                            {!! $choice->choice !!}
                                                                        </label>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        @endif
                                                        @if(in_array($question->type_question_id,[2,4,10]))
                                                            <!-- direct,editor  -->
                                                            <div class="question_content py-md-3 py-2">
                                                                {!! ($question->authStudentResponse)?$question->authStudentResponse->answer : '' !!}
                                                            </div>
                                                        @endif

                                                        @if($question->type_question_id==3)
                                                            {{--True False--}}
                                                            <div class="true_false">
                                                                @foreach($question->choices as $choice)
                                                                    <div class="form-check mt-2">

                                                                        <input disabled {{($question->authStudentResponse&&$choice->id==$question->authStudentResponse->answer)?'checked':''}} name="choice-id-{{$question->id}}" class="form-check-input" type="radio" value="{{$choice->id}}"
                                                                               id="answer_{{$choice->id}}">
                                                                        <label class="form-check-label " for="answer_{{$choice->id}}">{{__("quiz.$choice->choice")}}</label>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        @endif

                                                        @if($question->type_question_id==5)
                                                            <!--Connect Colors-->
                                                            <div  class=" connect_line connect_colors d-flex gap-2  d-flex flex-column flex-md-row justify-content-between">
                                                                <ul class="list-unstyled connect_line_option_1">
                                                                    @foreach($question->choices as $choice)
                                                                        <li data-value="{{$loop->index+1}}" >{!!$choice->choice!!}</li>
                                                                    @endforeach
                                                                </ul>
                                                                <ul  class="list-unstyled connect_line_option_2">
                                                                    @foreach($question->choices as $choice)
                                                                        <li data-value="{{($question->authStudentResponse && in_array($choice->id,explode(',',$question->authStudentResponse->answer)))? $loop->index+1 : 0}}" data-choice="{{$choice->id}}">{!!$choice->answer!!}</li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        @endif

                                                        @if($question->type_question_id==6 && $question->authStudentResponse)
                                                                <?php
                                                                //paths
                                                                $answers=$question->authStudentResponse->getMedia('answers');
                                                                ?>

                                                                    <!--upload File-->
                                                            @if($answers)
                                                                @foreach($answers as $answer)
                                                                    <div class="d-flex gap-2 my-3" style="height: 60vh !important;">
                                                                        <iframe class="d-block" src="{{$answer->getUrl()}}" width="100%" height="100%" frameborder="0"></iframe>
                                                                    </div>
                                                                @endforeach
                                                            @endif
                                                        @endif
                                                        @if($question->type_question_id==7)
                                                            @if($question->authStudentResponse && $question->authStudentResponse->answer)
                                                                <!--Draw-->
                                                                <img class="mx-auto orthogonal" src="{{json_decode($question->authStudentResponse->answer)->answer}}" style="background: url('{{json_decode($question->authStudentResponse->answer)->background??asset('/template/libs/draw/img/fig1.jpg')}}')  no-repeat center center"/>
                                                            @endif
                                                            {{--                    <img class="orthogonal" src="{{($question->authStudentResponse&&$question->authStudentResponse->answer)?$question->authStudentResponse->answer:asset('/template/pages/tutor/test/fig1.jpg')}}" />--}}
                                                        @endif
                                                        @if($question->type_question_id==8)
                                                            <!--math-->
                                                            <math-field read-only>
                                                                {!! ($question->authStudentResponse)?$question->authStudentResponse->answer : '' !!}
                                                            </math-field>
                                                        @endif
                                                        @if($question->type_question_id==9)
                                                                <?php
                                                                $answerIds=($question->authStudentResponse&&$question->authStudentResponse->answer)?explode(',',$question->authStudentResponse->answer):[];
                                                                ?>
                                                                    <!--Order Answers-->
                                                            <div class="question_content py-md-3 py-2">
                                                                <ul class="sortable">
                                                                    @foreach($answerIds as $answerId)
                                                                        <li class="ui-state-default d-flex gap-3 justify-content-between align-content-center">
                                                                            <div>
                                                                                    <?php
                                                                                    $answer=\App\Models\Choice::find($answerId);
                                                                                    ?>
                                                                                {!! ($answer)?$answer->choice:"" !!}
                                                                            </div>

                                                                        </li>
                                                                    @endforeach
                                                                </ul>

                                                            </div>
                                                        @endif
                                                        @if($question->type_question_id==11&&$question->authStudentResponse)
                                                            <audio controls>
                                                                <source src="{{$question->authStudentResponse->getFirstMediaUrl('record')}}">
                                                            </audio>

                                                        @endif
                                                    </div>

                                                    @if(Str::remove("<p><br></p>",$question->correctResponse)||isset($question->authStudentResponse->correctAnswer))
                                                        <!-- correction prof -->
                                                        <div class="option_answer correction_prof " >
                                                            <div class="question_box_header d-flex justify-content-between align-content-center text-uppercase">
                                                                <div class="question_range ">
                                                                    {{__('quiz.Correction')}}:
                                                                </div>
                                                            </div>

                                                            <div class=" gap-2">
                                                                @if($question->type_question_id==7)
                                                                    <!--Draw-->
                                                                    <img class="mx-auto orthogonal" src="{{json_decode($question->correctResponse)->correctResponse}}" style="background: url('{{json_decode($question->correctResponse)->graphBackground??asset('/template/libs/draw/img/fig1.jpg')}}')  no-repeat center center"/>
                                                                @elseif($question->type_question_id==10 /*&& $question->authStudentResponse && $question->authStudentResponse->correctAnswer*/)
                                                                    {!! $question->authStudentResponse->correctAnswer !!}
                                                                @elseif($question->correctResponse)
                                                                    {!! $question->correctResponse !!}
                                                                @endif
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>

                                        @endforeach
                                    </div>
                                </div>
                            @endif
                            @foreach($problems as $subQuestion)
                                <div class="problem_block {{(count($questions)==0&&!$loop->index)?'active':''}}  resizable-x "
                                     data-problem-block="{{(count($questions)==0)?$loop->index:$loop->index+1}}">
                                    @if(strip_tags($subQuestion->title))
                                        <div class="problem_content  {{(count($questions)==0&&!$loop->index)?'active':''}}"
                                             style="flex: 50%;">
                                            {!! $subQuestion->title !!}
                                            @if($subQuestion->hasMedia('audio'))

                                                <div class="voice-assistant-item w-clearfix mt-5">
                                                    <div class="voice-assistant-item-button">
                                                        <a class="play-button w-button" data-audio="{{$subQuestion->getFirstMediaUrl('audio')}}">
                                                            <em class="box-player">
                                                                <iconify-icon  icon="tabler:player-play-filled" width="30" height="30"></iconify-icon>

                                                                <iconify-icon class="d-none"  icon="tabler:player-pause-filled" width="30" height="30"></iconify-icon>
                                                            </em>
                                                        </a>
                                                    </div>

                                                    <div class="voice-assistant-item-text">
                                                        <div class="audio-controls">
                                                            <div class="audio-controls-bar">
                                                                <div class="audio-controls-bar-current" style="width: 0%;"></div>
                                                            </div>

                                                            <div class="audio-controls-time">0:00</div>
                                                        </div>
                                                    </div>
                                                </div>

                                            @endif
                                        </div>

                                        <div class="resizer-x"></div>
                                    @endif
                                    <div class="questions_problem " style="flex: 50%;">
                                        @foreach($subQuestion->questions as $question)
                                            <div class="question_box py-3 {{(!$loop->index)?'active':''}} {{($question->type_question_id==10)?"writing_question_box":""}} " data-questions-block="{{$loop->index}}">
                                                @if($question->authStudentResponse&&$question->authStudentResponse->tutor_correction)
                                                    <div class="question_box_header box_verified_tutor mb-4 d-flex justify-content-between align-content-center text-uppercase">
                                                        <div class="question_range">{{__('form.TutorCorrection')}} </div>
                                                        <a href="#correctionModal" data-tutor-correction="Sorry for this wrong"
                                                           data-bs-toggle="modal" class="btn p-0 ml-auto fs-4">
                                                            <iconify-icon icon="ph:eye-bold"></iconify-icon>
                                                        </a>
                                                    </div>
                                                @endif
                                                <div class="question_box_header d-flex justify-content-between align-content-center text-uppercase">
                                                    <div class="question_range">
                                                        {{__('quiz.Question')}} : {{$loop->index+1}}
                                                    </div>
                                                    <div class="point_question" >
                                                        {{__('quiz.Pt')}} : {{sprintf('%0.2f',$question->note)}}
                                                    </div>
                                                </div>
                                                <div  class="question_content py-md-3 py-2">
                                                    <div style="overflow: auto; margin-bottom: 10px;">
                                                        {!! $question->title !!}
                                                        @if($question->hasMedia('audio'))
                                                            <div class="voice-assistant-item w-clearfix mt-5">
                                                                <div class="voice-assistant-item-button">
                                                                    <a class="play-button w-button" data-audio="{{$question->getFirstMediaUrl('audio')}}">
                                                                        <em class="box-player">
                                                                            <iconify-icon  icon="tabler:player-play-filled" width="30" height="30"></iconify-icon>

                                                                            <iconify-icon class="d-none"  icon="tabler:player-pause-filled" width="30" height="30"></iconify-icon>
                                                                        </em>
                                                                    </a>
                                                                </div>

                                                                <div class="voice-assistant-item-text">
                                                                    <div class="audio-controls">
                                                                        <div class="audio-controls-bar">
                                                                            <div class="audio-controls-bar-current" style="width: 0%;"></div>
                                                                        </div>

                                                                        <div class="audio-controls-time">0:00</div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        @endif
                                                        @if($question->hasMedia('image'))
                                                            <div class="mt-2 mb-3 d-flex justify-content-end">
                                                                <img class="question_img"
                                                                     src="{{$question->getFirstMediaUrl('image','card')}}">
                                                            </div>
                                                        @endif
                                                    </div>

                                                    <div class="option_answer answer_student" >
                                                        <div class="question_box_header d-flex justify-content-between align-content-center text-uppercase">
                                                            <div class="question_range ">
                                                                {{__('enroll.YourAnswer')}}:
                                                            </div>
                                                            <div class="point_question">
                                                                {{__('quiz.Pt')}} : {{sprintf('%0.2f',($question->authStudentResponse)?$question->authStudentResponse->note:0)}}
                                                            </div>
                                                        </div>

                                                        @if($question->type_question_id==1)
                                                            <!--Multiple Choice-->
                                                            <div class="question_content py-md-3 py-2">
                                                                @foreach($question->choices as $choice)
                                                                    <div class="form-check d-flex">
                                                                        <input  {{($question->authStudentResponse && in_array($choice->id,explode(',',$question->authStudentResponse->answer)))?'checked':''}} disabled class="form-check-input me-2" type="checkbox" >
                                                                        <label class="form-check-label ">
                                                                            {!! $choice->choice !!}
                                                                        </label>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        @endif
                                                        @if(in_array($question->type_question_id,[2,4,10]))
                                                            <!-- direct,editor  -->
                                                            <div class="question_content py-md-3 py-2">
                                                                {!! ($question->authStudentResponse)?$question->authStudentResponse->answer : '' !!}
                                                            </div>
                                                        @endif

                                                        @if($question->type_question_id==3)
                                                            {{--True False--}}
                                                            <div class="true_false">
                                                                @foreach($question->choices as $choice)
                                                                    <div class="form-check mt-2">

                                                                        <input disabled {{($question->authStudentResponse&&$choice->id==$question->authStudentResponse->answer)?'checked':''}} name="choice-id-{{$question->id}}" class="form-check-input" type="radio" value="{{$choice->id}}"
                                                                               id="answer_{{$choice->id}}">
                                                                        <label class="form-check-label " for="answer_{{$choice->id}}">{{__("quiz.$choice->choice")}}</label>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        @endif

                                                        @if($question->type_question_id==5)
                                                            <!--Connect Colors-->
                                                            <div  class=" connect_line connect_colors d-flex gap-2  d-flex flex-column flex-md-row justify-content-between">
                                                                <ul class="list-unstyled connect_line_option_1">
                                                                    @foreach($question->choices as $choice)
                                                                        <li data-value="{{$loop->index+1}}" >{!!$choice->choice!!}</li>
                                                                    @endforeach
                                                                </ul>
                                                                <ul  class="list-unstyled connect_line_option_2">
                                                                    @foreach($question->choices as $choice)
                                                                        <li data-value="{{($question->authStudentResponse && in_array($choice->id,explode(',',$question->authStudentResponse->answer)))? $loop->index+1 : 0}}" data-choice="{{$choice->id}}">{!!$choice->answer!!}</li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        @endif

                                                        @if($question->type_question_id==6 && $question->authStudentResponse)
                                                                <?php
                                                                //paths
                                                                $answers=$question->authStudentResponse->getMedia('answers');
                                                                ?>

                                                                    <!--upload File-->
                                                            @if($answers)
                                                                @foreach($answers as $answer)
                                                                    <div class="d-flex gap-2 my-3" style="height: 60vh !important;">
                                                                        <iframe class="d-block" src="{{$answer->getUrl()}}" width="100%" height="100%" frameborder="0"></iframe>
                                                                    </div>
                                                                @endforeach
                                                            @endif
                                                        @endif
                                                        @if($question->type_question_id==7)
                                                            @if($question->authStudentResponse && $question->authStudentResponse->answer)
                                                                <!--Draw-->
                                                                <img class="mx-auto orthogonal" src="{{json_decode($question->authStudentResponse->answer)->answer}}" style="background: url('{{json_decode($question->authStudentResponse->answer)->background??asset('/template/libs/draw/img/fig1.jpg')}}')  no-repeat center center"/>
                                                            @endif
                                                            {{--                    <img class="orthogonal" src="{{($question->authStudentResponse&&$question->authStudentResponse->answer)?$question->authStudentResponse->answer:asset('/template/pages/tutor/test/fig1.jpg')}}" />--}}
                                                        @endif
                                                        @if($question->type_question_id==8)
                                                            <!--math-->
                                                            <math-field read-only>
                                                                {!! ($question->authStudentResponse)?$question->authStudentResponse->answer : '' !!}
                                                            </math-field>
                                                        @endif
                                                        @if($question->type_question_id==9)
                                                                <?php
                                                                $answerIds=($question->authStudentResponse&&$question->authStudentResponse->answer)?explode(',',$question->authStudentResponse->answer):[];
                                                                ?>
                                                                    <!--Order Answers-->
                                                            <div class="question_content py-md-3 py-2">
                                                                <ul class="sortable">
                                                                    @foreach($answerIds as $answerId)
                                                                        <li class="ui-state-default d-flex gap-3 justify-content-between align-content-center">
                                                                            <div>
                                                                                    <?php
                                                                                    $answer=\App\Models\Choice::find($answerId);
                                                                                    ?>
                                                                                {!! ($answer)?$answer->choice:"" !!}
                                                                            </div>

                                                                        </li>
                                                                    @endforeach
                                                                </ul>

                                                            </div>
                                                        @endif
                                                        @if($question->type_question_id==11&&$question->authStudentResponse)
                                                            <audio controls>
                                                                <source src="{{$question->authStudentResponse->getFirstMediaUrl('record')}}">
                                                            </audio>

                                                        @endif
                                                    </div>

                                                    @if(Str::remove("<p><br></p>",$question->correctResponse)||isset($question->authStudentResponse->correctAnswer))
                                                        <!-- correction prof -->
                                                        <div class="option_answer correction_prof " >
                                                            <div class="question_box_header d-flex justify-content-between align-content-center text-uppercase">
                                                                <div class="question_range ">
                                                                    {{__('quiz.Correction')}}:
                                                                </div>
                                                            </div>

                                                            <div class=" gap-2">
                                                                @if($question->type_question_id==7)
                                                                    <!--Draw-->
                                                                    <img class="mx-auto orthogonal" src="{{json_decode($question->correctResponse)->correctResponse}}" style="background: url('{{json_decode($question->correctResponse)->graphBackground??asset('/template/libs/draw/img/fig1.jpg')}}')  no-repeat center center"/>
                                                                @elseif($question->type_question_id==10 /*&& $question->authStudentResponse && $question->authStudentResponse->correctAnswer*/)
                                                                    {!! $question->authStudentResponse->correctAnswer !!}
                                                                @elseif($question->correctResponse)
                                                                    {!! $question->correctResponse !!}
                                                                @endif
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>

                                        @endforeach
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <!-- footer_test_chapter -->
                    <div class="footer_test_chapter d-flex justify-content-between align-items-center gap-3">
                        <div class="block_footer d-flex justify-content-center align-items-center text-capitalize gap-3">
                            <div id="control_expand_mode" class="cursor-pointer">

                                <div class=" d-flex d-none justify-content-center align-items-center text-capitalize gap-1">
                                    <iconify-icon icon="ion:expand-sharp"></iconify-icon>
                                    <span class="fs-6">
                                            {{__('enroll.Expand')}}
                                      </span>
                                </div>
                                <div class=" d-flex justify-content-center align-items-center text-capitalize gap-1">
                                    <iconify-icon icon="uil:expand-from-corner"></iconify-icon>
                                    <span class="fs-6">
                                        {{__('enroll.Contract')}}
                                    </span>
                                </div>
                            </div>
                        </div>


                        <div class="block_footer  d-flex justify-content-center align-items-center gap-2 ">
                            <button id="btn_pre"
                                    class="btn d-flex px-1 justify-content-center align-items-center gap-1 text-capitalize">
                                <iconify-icon class="rotate_180_deg" icon="mdi:arrow-left-thin"></iconify-icon>
                                <span class="fs-6">{{__('buttons.Previous')}}</span>
                            </button>
                            <button id="btn_next"
                                    class=" btn d-flex px-1 justify-content-center align-items-center gap-1 text-capitalize">
                                <span class="fs-6">{{__('buttons.Next')}}</span>
                                <iconify-icon class="rotate_180_deg" icon="mdi:arrow-right-thin"></iconify-icon>
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @if($test->authStudentResponse->correction_request=="pending")
        <div class="modal fade px-0" id="correctionRequestModal" data-backdrop="static" data-keyboard="false"
             aria-hidden="true" aria-labelledby="staticBackdropLabel" tabindex="-1">
            <div class="modal-dialog pa-0">
                <div class="modal-content">
                    <div class="modal-header border-bottom">
                        <h5 class="modal-title text-capitalize text-center mx-auto">
                            {{__('form.SendRequest')}}
                        </h5>

                    </div>
                    <div class="modal-body text-center">
                        {{__('form.Are you sure you are not satisfied with the correction?')}}
                    </div>
                    <form action="{{route('student.test.askTutorCorrection',['test'=>$test->id])}}" method="POST">
                        @csrf
                        @method("PUT")
                        <div class="modal-footer justify-content-center">

                            <button type="reset" class="btn text-capitalize mx-2 btn_blue btn_effect"
                                    data-bs-dismiss="modal">
                                {{__('buttons.No')}}
                            </button>
                            <button class="btn text-white text-capitalize btn_red btn_effect" type="submit">
                                {{__('buttons.Yes')}}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
    <div class="modal fade px-0" id="correctionModal" data-backdrop="static" data-keyboard="false"
         aria-labelledby="staticBackdropLabel" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog py-0 px-md-0 mx-auto">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-capitalize mx-auto">
                        {{__('form.TutorCorrection')}}
                    </h5>
                </div>
                <div class="modal-body">
                    <div class="d-flex justify-content-center  mt-2 flex-column">
                        <div style="background-color: #ffab000a !important;resize: none;"
                             class="more_experience tutorCorrection w-100 form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button style="--color_hover:#fb9b22" class="btn btn_red text-white mx-2 btn_effect"
                            data-bs-dismiss="modal" type="button">
                        {{__('buttons.Close')}}
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_hint_correction" tabindex="-1" aria-labelledby="modal_hint" style="display: none;"
         aria-hidden="true">

        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" style="margin-top: 0 !important;">
                <div class="modal-body pt-1 pb-0 ">
                    <div class=" d-flex align-items-center  ">
                        <div class=" m-0 py-1 mx-2 mx-md-3 box_container_hint  w-100">
                            @if($test->id==placementTestId())
                                <div class=" box-level fw-bold text-center h3 py-md-3 py-4 mb-4 mt-md-4 mb-md-4 w-100">
                                    Your English level has been assessed as {{$test->level}}
                                </div>
                                <hr class="pt-0 mb-0">
                            @else
                                <div class=" box-level fw-bold text-center h3 py-md-3 py-4 mb-4 mt-md-4 mb-md-4 w-100">
                                    Your Score is {{sprintf('%0.2f',$noteObtained??0)}} {{($test->authStudentResponse->isCorrected)?'':__('form.Prov')}}
                                </div>
                                <hr class="pt-0 mb-0">

                            @endif
                            <div class="d-flex  box-hint-btn align-items-center justify-content-center mt-4 py-2 mb-4  pt-md-3 gap-3">

                                @if($test->has_certificate&&(/*!$completeLevel||*/$score>=50))
                                    <div class=" Retake_box overflow-hidden  d-flex justify-content-center align-items-center text-capitalize gap-3">
                                        <a href="{{route('downloadCertificate',['test'=>$test->id,'student'=>$test->authStudentResponse->student_id])}}"
                                           target="_blank"
                                           class="d-flex justify-content-center align-items-center text-capitalize  gap-1 text-white btn_blue btn_effect">

                                            <span class="fs-6">{{ __('form.DownloadCertificate') }}</span>
                                        </a>
                                    </div>
                                @else
                                    @if($test->retakable)
                                        <div class="block_footer Retake_box overflow-hidden d-flex justify-content-center align-items-center text-capitalize gap-3">
                                            <a href="{{($test->isRandom)?route('student.test.showRandom',['test'=>$test->id]):route('student.test.show',['test'=>$test->id])}}"
                                               class="d-flex justify-content-center align-items-center text-capitalize px-md-5 gap-1 btn_blue btn_effect">
                                        <span class="fs-6">
                                            {{__('enroll.retryExam')}}
                                        </span>
                                            </a>
                                        </div>
                                    @endif
                                @endif

                                <div class=" box_hint    justify-content-end align-items-center  pt-md-0">
                                    <a id="startTest" data-bs-dismiss="modal"
                                       class="btn text-capitalize  px-md-5 btn_blue btn_effect text-white">
                                        {{__('enroll.checkCorrection')}}
                                    </a>
                                </div>

                            </div>

                            <div class=" mx-0 " dir="ltr">
                                <div >
                                    <div class=" box-details">
                                        <div class="pt-4">
                                            <h5 class="stitle card-header text-center  px-0">
                                                {{__('enroll.scoreDetails')}}
                                            </h5>

                                        </div>
                                        <hr>
                                        <div class="pb-4  box-keys" >
                                            @if($test->questions_count)
                                                <div class="mt-2">
                                                    <span class="box-key-active me-1"></span>
                                                    Direct Questions - {{sprintf('%0.2f',$test->auth_student_question_response_sum_note)}} /{{sprintf('%0.2f',$test->questions_sum_note)}}
                                                </div>
                                            @endif
                                            @foreach($problems as $key=>$problem)
                                                <div class="mt-2">
                                                    <span class="box-key-active me-1"></span>
                                                    {{$problem->label??"problem ".($key+1)}} - {{sprintf('%0.2f',$problem->auth_student_question_response_sum_note)}} /{{sprintf('%0.2f',$problem->questions_sum_note)}}
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <div class="subcharts  ">
                                    <div class="h-100  d-flex align-items-center justify-content-center">
                                        <div style="max-width: 700px">
                                            <div class=" py-md-3 w-100 mx-auto d-flex justify-content-around  align-items-center flex-wrap gap-3" >
                                                @if($test->questions_sum_note)
                                                    <div class="   box-canvas-score" data-id="graf0" data-true="{{$test->auth_student_question_response_sum_note}}" data-false="{{$test->questions_sum_note-$test->auth_student_question_response_sum_note}}" data-info="Direct questions">
                                                        <div class=" h-100 box-graph position-relative">
                                                            <div class="pb-3 position-relative">
                                                                <canvas id="graf0"></canvas>
                                                                <div class="text-center box-title  mt-2 fw-bold">{{sprintf('%0.2f',$test->auth_student_question_response_sum_note*100/$test->questions_sum_note)}} %</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @foreach($problems as $problem)
                                                    <div class="   box-canvas-score" data-id="graf{{(count($questions)==0)?$loop->index:$loop->index+1}}" data-true="{{$problem->auth_student_question_response_sum_note}}" data-false="{{$problem->questions_sum_note-$problem->auth_student_question_response_sum_note}}" data-info="{{$problem ->label}}">
                                                        <div class=" h-100 box-graph position-relative">
                                                            <div class="pb-3 position-relative">
                                                                <canvas id="graf{{(count($questions)==0)?$loop->index:$loop->index+1}}"></canvas>
                                                                <div class="text-center box-title  mt-2 fw-bold">{{$problem->questions_sum_note?sprintf('%0.2f',$problem->auth_student_question_response_sum_note*100/$problem->questions_sum_note):0}} %</div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach

                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>

                            @if($test->has_certificate)

                                <hr class="pt-0 mt-3 mt-md-0">
                                @if($completeLevel&&$score<50)
                                    <div class=" box-level fw-bold text-center h3 py-md-3 py-4 mb-4 mt-md-4 mb-md-4 w-100">
                                        You need to get above 50% to get the certificate
                                    </div>
                                @else
                                    <div class="box-certificate py-md-4">
                                        <img class="my-4" src="{{asset('template/img/certificate/certificate.png')}}" alt="boston english center certificate">
                                    </div>
                                @endif
                            @endif
                            <hr class="pt-0 mt-3 mt-md-0">


                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

@endsection
