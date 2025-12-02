@extends('layouts.app')
@section('title', 'Edit task')
@section('content')
    <p>EDIT TASK FORM!</p>
    <form method="POST" action="{{route('tasks.update', ['task' => $task])}}">
        @csrf
        @method('PUT')
        <div>
            <label for='title'>
                Title
            </label>
            <input text='text' name='title' id='title' value={{$task->title}}/>
            @error('title')
                <p class='error-msg'>{{$message}}</p>
            @enderror
        </div>
         <div>
            <label for='description'>
                Description
            </label>
            <textarea name='description' id='description' rows='2' >{{$task->description}}</textarea>
            @error('description')
                <p class='error-msg'>{{$message}}</p>
            @enderror
        </div>
         <div>
            <label for='long_description'>
                Detailed escription
            </label>
            <textarea name='long_description' id='long_description' rows='5'>{{$task->long_description ? $task->long_description : ''}}</textarea>
            @error('long_description')
                <p class='error-msg'>{{$message}}</p>
            @enderror
        </div>
        <a class='btn' href='/'>Cancel</a>
        <a class='btn' href='{{route('tasks.delete', ['task' => $task])}}'>Delete Task</a>
        <button type='Submit'>Edit Task</button>
    </form>
@endsection