@extends('layouts.app')
@section('title', 'Create new task')
@section('content')
    <p>NEW TASK FORM!</p>
    {{ $errors }}
    <form method="POST" action="{{route('tasks.store')}}">
        @csrf
        <div>
            <label for='title'>
                Title
            </label>
            <input text='text' name='title' id='title' required/>
        </div>
         <div>
            <label for='description'>
                Description
            </label>
            <textarea name='description' id='description' rows='2' required></textarea>
        </div>
         <div>
            <label for='long_description'>
                Detailed escription
            </label>
            <textarea name='long_description' id='long_description' rows='5'></textarea>
        </div>
        <a class='btn' href='/'>Cancel</a>
        <button type='Submit'>Add Task</button>
    </form>
@endsection