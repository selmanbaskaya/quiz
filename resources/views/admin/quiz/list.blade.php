<x-app-layout>
    <x-slot name="header">
        Quizzes
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
                    <th scope="col">Number of Questions</th>
                    <th scope="col">Status</th>
                    <th scope="col">Due Date</th>
                    <th scope="col">Operations</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($quizzes as $quiz)
                    <tr>
                        <td scope="row">{{ $quiz->title }}</td>
                        <td scope="row" class="text-center">{{ $quiz->questions_count }}</td>
                        <td scope="row" class="text-center">
                            @switch($quiz->status)
                                @case('Draft')
                                    <span class="badge badge-warning text-white">{{ $quiz->status }}</span>
                                    @break
                                @case('Published')
                                    <span class="badge badge-success">{{ $quiz->status }}</span>
                                    @break
                                @case('Passive')
                                    <span class="badge badge-danger">{{ $quiz->status }}</span>
                                    @break
                            @endswitch
                        </td>
                        <td scope="row" class="text-center">
                            <span title="{{ $quiz->finished_at ?  $quiz->finished_at->format('d.m.Y, H:i')  : 'No time limit' }}">
                                {{ $quiz->finished_at ? $quiz->finished_at->diffForHumans() : 'No time limit'}}
                            </span>
                        </td>
                        <td scope="row" class="text-center">
                            <a href="{{ route('questions.index', $quiz->id) }}" class="btn btn-sm btn-success">
                                <i class="fa fa-question"></i>    
                            </a>    
                            <a href="{{ route('quizzes.edit', $quiz->id) }}" class="btn btn-sm btn-warning text-white">
                                <i class="fa fa-pen"></i>    
                            </a>    
                            <a href="{{ route('quizzes.destroy', $quiz->id) }}" class="btn btn-sm btn-danger">
                                <i class="fa fa-times"></i>    
                            </a>    
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
              <b>{{ $quizzes->links() }}</b>
        </div>
    </div>
</x-app-layout>
