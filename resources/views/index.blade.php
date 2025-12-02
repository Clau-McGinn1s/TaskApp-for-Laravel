@extends('layouts.app')
@section('title', 'Task list')
@section('content')
    @forelse ($tasks as $task)
        <div class='mb-5'>
            <a @class(['font-bold text-xl text-blue-600 hover:text-blue-300', 'line-through' => $task->completed]) href='{{route('tasks.show', ['task' => $task])}}'><h3>{{$task->title}}</h3></a>
            <p>{{$task->description}}</p>
        </div>
    @empty
        <h2>no tasks</h2>
    @endforelse
    <nav class='pt-5 flex items-center'>
        <a class='grow btn bg-blue-500 hover:bg-blue-300 text-white' href='tasks/create'>Add New Task</a>
    </nav>

    @if ($tasks->count())
        <nav class='pt-2'>
            {{ $tasks->links() }}
        </nav>
    @endif
@endsection
