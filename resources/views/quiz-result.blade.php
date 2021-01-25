<x-app-layout>
    <x-slot name="header">
        '{{ $quiz->title }}' Quiz Result
    </x-slot>

    <div class="card">
        <div class="card-body">
            <div class="alert alert-primary">
                <i class="fa fa-check text-success"> Correct Answer</i> | 
                <i class="fa fa-square text-danger"> Your Answer</i>
            </div>

                    @foreach ($quiz->questions as $question)
                        @if($question->image)
                            <img src="{{ asset($question->image) }}" width="40%" class="img-responsive rounded mb-2 mt-2">
                        @endif
                        @if($question->correct_answer == $question->myAnswer->answer)
                        <i class="fa fa-check text-success"></i>
                        @else
                        <i class="fa fa-times text-danger"></i>
                        @endif
                        <strong>
                            Question {{ $loop->iteration }}: 
                        </strong>
                        {{ $question->question }}
                        <div class="form-check">
                            <label class="form-check-label" for="quiz{{ $question->id }}1">
                            {{ $question->answer_1 }}
                            </label>
                            @if('answer_1' == $question->correct_answer)
                            <i class="fa fa-check text-success"></i>
                            @elseif('answer_1' == $question->myAnswer->answer)
                            <i class="fa fa-square text-danger"></i>
                            @endif
                        </div>
                        <div class="form-check">
                            <label class="form-check-label" for="quiz{{ $question->id }}2">
                            {{ $question->answer_2 }}
                            </label>
                            @if('answer_2' == $question->correct_answer)
                            <i class="fa fa-check text-success"></i>
                            @elseif('answer_2' == $question->myAnswer->answer)
                            <i class="fa fa-square text-danger"></i>
                            @endif
                        </div>
                        <div class="form-check">
                            <label class="form-check-label" for="quiz{{ $question->id }}3">
                            {{ $question->answer_3 }}
                            </label>
                            @if('answer_3' == $question->correct_answer)
                            <i class="fa fa-check text-success"></i>
                            @elseif('answer_3' == $question->myAnswer->answer)
                            <i class="fa fa-square text-danger"></i>
                            @endif
                        </div>
                        <div class="form-check">
                            <label class="form-check-label" for="quiz{{ $question->id }}4">
                            {{ $question->answer_4 }}
                            </label>
                            @if('answer_4' == $question->correct_answer)
                            <i class="fa fa-check text-success"></i>
                            @elseif('answer_4' == $question->myAnswer->answer)
                            <i class="fa fa-square text-danger"></i>
                            @endif
                        </div>
                        @if(!$loop->last)
                            <hr>
                        @endif
                    @endforeach

        </div>
    </div>
</x-app-layout>
