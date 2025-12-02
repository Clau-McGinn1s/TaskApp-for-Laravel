@extends('layouts.app')
@section('title', isset($task) ? 'Edit task' : 'Add task')
@section('content')
    <form method="POST" action="{{ isset($task) ? route('tasks.update', ['task' => $task]) : route('tasks.store') }}">
        @csrf
        @isset($task)
            @method('PUT')   
        @endisset
        <div>
            <label for='title'>
                Title
            </label>
            <input text='text' name='title' id='title' value='{{$task->title ?? old('title')}}'/>
            @error('title')
                <p class='error-msg'>{{$message}}</p>
            @enderror
        </div>
         <div>
            <label for='description'>
                Description
            </label>
            <textarea name='description' id='description' 
            rows='2' >{{$task->description ?? old('description')}}</textarea>
            @error('description')
                <p class='error-msg'>{{$message}}</p>
            @enderror
        </div>
         <div>
            <label for='long_description'>
                Detailed escription
            </label>
            <textarea name='long_description' id='long_description' 
            rows='5'>{{$task->long_description ?? old('long_description')}}</textarea>
            @error('long_description')
                <p class='error-msg'>{{$message}}</p>
            @enderror
        </div>
        <a class='btn' href='/'>Cancel</a>
        <button type='Submit'>{{ isset($task) ? 'Edit Task' : 'Add Task'}}</button>
    </form>
    @isset($task)
        <form method='POST' action='{{route('tasks.destroy', ['task' => $task])}}'>
            @csrf
            @method('DELETE')
            <button class='btn-delete mt-5'
            onclick='return confirm("delete task [ {{ $task->title }} ] ?")'>Delete Task</button>
        </form>
    @endisset
@endsection