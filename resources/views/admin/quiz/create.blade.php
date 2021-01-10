<x-app-layout>
    <x-slot name="header">
        Add Quiz
    </x-slot>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                <form method="POST" action="{{ route('quizzes.store') }}">
                    @csrf
                    <div class="form-group">
                        <label>Quiz Title</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Quiz Description</label>
                        <textarea name="description" class="form-control" rows="4"> </textarea>
                    </div>
                    <div class="form-group">
                        <input id="isFinished" type="checkbox">
                        <label>Do you want a time limit for the quiz?</label>
                    </div>
                    <div style="display: none;" id="haveFinished" class="form-group">
                        <label>Due Date</label>
                        <input type="datetime-local" name="finished_at" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-block btn-success" type="submit">Add Quiz</button>
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
