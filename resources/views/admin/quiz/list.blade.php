<x-app-layout>
    <x-slot name="header">
        Quizzes
    </x-slot>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title float-right">
                <a href="{{ route('quizzes.create') }}" class="btn btn-sm btn-info">
                    <i class="fa fa-plus"></i>
                    Add Quiz
                </a>
            </h5>
            <form action="" method="GET">
                <div class="form-row">
                    <div class="col-md-3 col-sm-3">
                        <input type="text" name="title" value="{{ request()->get('title') }}" placeholder="Quiz Title" class="form-control">
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <select name="status" onchange="this.form.submit()" class="form-control">
                            <option @if(request()->get('status') === '') selected @endif value="">Select Quiz Status</option>
                            <option @if(request()->get('status') === 'Pulished') selected @endif value="Published">Publish</option>
                            <option @if(request()->get('status') === 'Draft') selected @endif value="Draft">Draft</option>
                            <option @if(request()->get('status') === 'Passive') selected @endif value="Passive">Passive</option>
                        </select>
                    </div>
                    @if(request()->get('title') || request()->get('status'))
                        <div class="col-md-3 col-sm-3">
                            <a href="{{ route('quizzes.index') }}" class="btn btn-light">Clear Filter</a>
                        </div>
                    @endif
                </div>
            </form>
            <table class="table table-bordered mt-3">
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
                                    @if(!$quiz->finished_at)
                                        <span class="badge badge-success">{{ $quiz->status }}</span>
                                    @elseif($quiz->finished_at > now())
                                        <span class="badge badge-success">{{ $quiz->status }}</span>
                                    @else
                                        <span class="badge badge-success">Quiz Expired</span>
                                    @endif

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
                            <a href="{{ route('quizzes.details', $quiz->id) }}" class="btn btn-sm btn-dark text-white">
                                <i class="fa fa-info-circle"> </i>
                            </a>
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
              <b>{{ $quizzes->withQueryString()->links() }}</b>
        </div>
    </div>
</x-app-layout>
