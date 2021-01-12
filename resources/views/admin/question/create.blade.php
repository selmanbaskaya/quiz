<x-app-layout>
    <x-slot name="header">
        Create a new question for the '{{ $quiz->title }}' Quiz
    </x-slot>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                <form method="POST" action="{{ route('questions.store', $quiz->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Question</label>
                        <textarea name="question" class="form-control" rows="4">{{ old('question') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>1. Answer</label>
                                <textarea name="answer_1" class="form-control" rows="4">{{ old('answer_1') }}</textarea>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>2. Answer</label>
                                <textarea name="answer_2" class="form-control" rows="4">{{ old('answer_2') }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>3. Answer</label>
                                <textarea name="answer_3" class="form-control" rows="4">{{ old('answer_3') }}</textarea>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>4. Answer</label>
                                <textarea name="answer_4" class="form-control" rows="4">{{ old('answer_4') }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Correct Answer</label>
                        <select name="correct_answer" class="form-control">
                            <option @if(old('correct_answer') === 'answer_1') selected @endif value="answer_1">1. Answer</option>
                            <option @if(old('correct_answer') === 'answer_2') selected @endif value="answer_2">2. Answer</option>
                            <option @if(old('correct_answer') === 'answer_3') selected @endif value="answer_3">3. Answer</option>
                            <option @if(old('correct_answer') === 'answer_4') selected @endif value="answer_4">4. Answer</option>
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
