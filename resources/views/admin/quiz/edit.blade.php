<x-app-layout>
    <x-slot name="header">
        Edit Quiz
    </x-slot>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                <form method="POST" action="{{ route('quizzes.update', $quiz->id) }}">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label>Quiz Title</label>
                        <input type="text" name="title" value="{{ $quiz->title }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Quiz Description</label>
                        <textarea name="description" class="form-control" rows="4">{{ $quiz->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <input id="isFinished" type="checkbox"  @if($quiz->finished_at) checked @endif>
                        <label>Do you want a time limit for the quiz?</label>
                    </div>
                    <div @if(!$quiz->finished_at) style="display: none;" @endif id="haveFinished" class="form-group">
                        <label>Due Date</label>
                        <input type="datetime-local" name="finished_at" @if($quiz->finished_at) value="{{ date('Y-m-d\TH:i', strtotime($quiz->finished_at)) }}" @endif class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-block btn-success" type="submit">Save Changes</button>
                    </div>
                </form>
            </h5>
        </div>
    </div>

    <x-slot name="js">
        <script>
            $('#isFinished').change(function() {
                if($('#isFinished').is(':checked')) {
                    $('#haveFinished').show();
                } else {
                    $('#haveFinished').hide();
                }
            })
        </script>
    </x-slot>
</x-app-layout>
