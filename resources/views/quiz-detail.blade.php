<x-app-layout>
    <x-slot name="header">
        '{{ $quiz->title }}' Quiz Details
    </x-slot>

    <div class="card">
        <div class="card-body">
            <p class="card-text">
                <div class="row">
                    <div class="col-md-8 col-sm-12">
                        {{ $quiz->description }}
                        <a href="{{ route('quiz.join', $quiz->slug) }}" class="card-link btn btn-info btn-sm btn-block">Start the Quiz</a>
                    </div>
                    <div class="col-md-4 div-sm-12">
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                The number of questions
                              <span class="badge badge-info badge-pill">{{ $quiz->questions->count() }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                The number of participants
                              <span class="badge badge-info badge-pill">14</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Quiz Due Date
                              <span class="badge badge-info badge-pill">{{ $quiz->finished_at ? $quiz->finished_at->diffForHumans() : 'No time limit' }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Average Score
                              <span class="badge badge-warning badge-pill">2</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Morbi leo risus
                              <span class="badge badge-warning badge-pill">1</span>
                            </li>
                          </ul>
                    </div>
                </div>
                
            </p>
            
        </div>
    </div>
</x-app-layout>
