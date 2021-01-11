<x-app-layout>
    <x-slot name="header">
        Questions
    </x-slot>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                <a href="{{ route('quizzes.create') }}" class="btn btn-sm btn-info">
                    <i class="fa fa-plus"></i>
                    Add Quiz
                </a>
            </h5>
            <table class="table table-bordered mt-4">
                <thead>
                  <tr>
                    <th scope="col">Quiz</th>
                    <th scope="col">Status</th>
                    <th scope="col">Due Date</th>
                    <th scope="col">Operations</th>
                  </tr>
                </thead>
                <tbody>
                    
                </tbody>
              </table>
        </div>
    </div>
</x-app-layout>
