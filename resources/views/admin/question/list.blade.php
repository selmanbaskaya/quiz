<x-app-layout>
    <x-slot name="header">
        Questions for quiz "{{ $quiz->title }}"
    </x-slot>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                <a href="{{ route('questions.create', $quiz->id) }}" class="btn btn-sm btn-info">
                    <i class="fa fa-plus"></i>
                    Add Question
                </a>
            </h5>
            <table class="table table-bordered table-sm mt-4">
                <thead>
                  <tr  class="text-center">
                    <th scope="col">Question</th>
                    <th scope="col">Image</th>
                    <th scope="col">1. Answer</th>
                    <th scope="col">2. Answer</th>
                    <th scope="col">3. Answer</th>
                    <th scope="col">4. Answer</th>
                    <th scope="col">Correct Answer</th>
                    <th scope="col">Operations</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($quiz->questions as $question)
                    <tr>
                        <td scope="row">{{ $question->question }}</td>
                        <td scope="row" class="text-center">{{ $question->image }}</td>
                        <td scope="row" class="text-center">{{ $question->answer_1 }}</td>
                        <td scope="row" class="text-center">{{ $question->answer_2 }}</td>
                        <td scope="row" class="text-center">{{ $question->answer_3 }}</td>
                        <td scope="row" class="text-center">{{ $question->answer_4 }}</td>
                        <td scope="row" class="text-center text-success font-weight-bold">{{ substr($question->correct_answer, -1) }}. Answer</td>
                        <td scope="row" class="text-center"> 
                            <a href="{{ route('quizzes.edit', $question->id) }}" class="btn btn-sm btn-warning text-white">
                                <i class="fa fa-pen"></i>    
                            </a>    
                            <a href="{{ route('quizzes.destroy', $question->id) }}" class="btn btn-sm btn-danger">
                                <i class="fa fa-times"></i>    
                            </a>    
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
</x-app-layout>
