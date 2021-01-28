<x-app-layout>
    <x-slot name="header">
        Home
    </x-slot>

    <div class="row">
        <div class="col-md-8 col-sm-12">
            <div class="card">
                <div class="card-header">
                    Quizzes
                </div>
            <div class="list-group">
                @foreach ($quizzes as $quiz)
                <a href="{{ route('quiz.detail', $quiz->slug) }}" class="list-group-item list-group-item-action flex-column align-items-start">
                  <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">{{ $quiz->title }}</h5>
                    <small>{{ $quiz->finished_at ? $quiz->finished_at->diffForHumans() : 'No time limit'}}</small>
                  </div>
                  <p class="mb-1">{{ Str::limit($quiz->description, 100, '...') }}</p>
                  <small>
                        <span class="badge badge-dark badge-pill">
                            {{ $quiz->questions->count() }}
                        </span>
                        questions available
                  </small>
                </a>
                @endforeach
                <div class="p-2 mt-2">
                    {{ $quizzes->links() }}
                </div>
            </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12">
            <div class="card" style="width: 18rem;">
                <div class="card-header">
                    Your Quiz Results
                    <span class="float-right">Score</span>
                </div>
                <ul class="list-group list-group-flush">
                    @foreach($results as $result)
                        <li class="list-group-item">
                            <a href="{{ route('quiz.detail', $result->quiz->slug) }}" class="text-decoration-none text-dark">
                                {{ $result->quiz->title }}
                            </a>
                            <span class="badge badge-success text-white badge-pill float-right">
                                {{ $result->point }}
                            </span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
