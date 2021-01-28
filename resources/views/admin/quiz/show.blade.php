<x-app-layout>
    <x-slot name="header">
        '{{ $quiz->title }}' Quiz Details
    </x-slot>

    <div class="card">
        <div class="card-body">
            <p class="card-text">
            <h5 class="card-title">
                <a href="{{ route('quizzes.index') }}" class="btn btn-sm btn-secondary">
                    <i class="fa fa-arrow-left"></i>
                    Return to Quizzes
                </a>
            </h5>
            <div class="row">
                <div class="col-md-8 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Quiz Description</h5>
                            <hr />
                            {{ $quiz->description }}
                        </div>
                    </div>
                    <table class="table mt-3">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">Name Surname</th>
                            <th scope="col">Score</th>
                            <th scope="col">Correct</th>
                            <th scope="col">Wrong</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($quiz->results as $result)
                        <tr>
                            <td>{{ $result->user->name }}</td>
                            <td>{{ $result->point }}</td>
                            <td>{{ $result->correct_answer }}</td>
                            <td>{{ $result->wrong_answer }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
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
                    @if(count($quiz->topTenUser) > 0)
                        <div class="card mt-3">
                            <div class="card-body">
                                <h5 class="card-title">Top 10</h5>
                                <ul class="list-group">
                                    @foreach ($quiz->topTenUser as $result)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <strong>{{ $loop->iteration }}.</strong>
                                            <img src="{{ $result->user->profile_photo_url }}" class="w-10 h-10 rounded-full">
                                            <span @if(auth()->user()->id == $result->user_id) class="text-success" @endif >{{ $result->user->name }} </span>
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
