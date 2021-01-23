<x-app-layout>
    <x-slot name="header">
        '{{ $quiz->title }}' Quiz Details
    </x-slot>

    <div class="card">
        <div class="card-body">
            <p class="card-text">
                <div class="row">
                    <div class="col-md-8 col-sm-12">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Quiz Description</h5>
                          <hr />
                        {{ $quiz->description }}
                      </div>
                    </div>
                        @if ($quiz->myResult)
                        <button class="btn btn-info mt-3 btn-sm btn-block disabled">You participated before!</button>
                        @else
                        <a href="{{ route('quiz.join', $quiz->slug) }}" class="card-link mt-3 btn btn-info btn-sm btn-block">Start the Quiz</a>
                        @endif
                     </div>
                    <div class="col-md-4 div-sm-12">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Quiz Details</h5>
                        <ul class="list-group mt-3">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                The number of questions
                              <span class="badge badge-info badge-pill">{{ $quiz->questions->count() }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Quiz Due Date
                              <span class="badge badge-info badge-pill">{{ $quiz->finished_at ? $quiz->finished_at->diffForHumans() : 'No time limit' }}</span>
                            </li>
                            @if($quiz->myResult)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                The number of participants
                              <span class="badge badge-info badge-pill">{{ $quiz->details['join_count'] }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Average Score
                              <span class="badge badge-warning text-white badge-pill">{{ $quiz->details['average'] }}</span>
                            </li>
                            @endif
                          </ul>
                        </div>
                      </div>
                          @if($quiz->myResult)
                          <div class="card mt-3">
                            <div class="card-body">
                              <h5 class="card-title">My Result</h5>
                        <ul class="list-group">
                          <li class="list-group-item d-flex justify-content-between align-items-center">
                            Point
                          <span class="badge badge-primary badge-pill">{{ $quiz->myResult->point }}</span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-center">
                              Correct / Incorrect Answers
                            <span class="badge badge-success badge-pill ml-4">{{ $quiz->myResult->correct_answer }}</span>
                            <span class="badge badge-danger badge-pill">{{ $quiz->myResult->wrong_answer }}</span>
                          </li>
                        </ul>
                      </div>
                    </div>
                        @endif
                          @if(count($quiz->topTenUser) > 0)
                          <div class="card mt-3">
                            <div class="card-body">
                              <h5 class="card-title">Top 10</h5>
                              <ul class="list-group">
                                @foreach ($quiz->topTenUser as $result)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <strong>{{ $loop->iteration }}.</strong> 
                                    <img src="{{ $result->user->profile_photo_url }}" class="w-10 h-10 rounded-full">
                                    {{ $result->user->name }} 
                                    <span class="badge badge-success badge-pill">{{ $result->point }}</span>
                                </li>
                                @endforeach
                              </ul>
                            </div>
                          </div>
                          @endif
                    </div>
                </div>
                
            </p>
            
        </div>
    </div>
</x-app-layout>
