<x-app-layout>
    <x-slot name="header">
        Edit Question '{{ $question->question }}'
    </x-slot>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                <form method="POST" action="{{ route('questions.update', [$question->quiz_id, $question->id]) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label>Question</label>
                        <textarea name="question" class="form-control" rows="4">{{ $question->question }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <a href="{{ asset($question->image) }}" target="_blabk">
                            <img src="{{ asset($question->image) }}" class="img-responsive rounded mb-3" width="350" alt="">
                        </a>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>1. Answer</label>
                                <textarea name="answer_1" class="form-control" rows="4">{{ $question->answer_1 }}</textarea>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>2. Answer</label>
                                <textarea name="answer_2" class="form-control" rows="4">{{ $question->answer_2 }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>3. Answer</label>
                                <textarea name="answer_3" class="form-control" rows="4">{{ $question->answer_3 }}</textarea>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>4. Answer</label>
                                <textarea name="answer_4" class="form-control" rows="4">{{ $question->answer_4 }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Correct Answer</label>
                        <select name="correct_answer" class="form-control">
                            <option @if($question->correct_answer === 'answer_1') selected @endif value="answer_1">1. Answer</option>
                            <option @if($question->correct_answer === 'answer_2') selected @endif value="answer_2">2. Answer</option>
                            <option @if($question->correct_answer === 'answer_3') selected @endif value="answer_3">3. Answer</option>
                            <option @if($question->correct_answer === 'answer_4') selected @endif value="answer_4">4. Answer</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-block btn-success" type="submit">Create Question</button>
                    </div>
                </form>
            </h5>
        </div>
    </div>
</x-app-layout>
