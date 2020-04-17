@extends('layouts.master')
@section('content')
@foreach($tasks as $task)
          <li>
            <div class="task">
                {{ $task -> task_name }}
            </div>
            <div class="action">
                <a href=""><i class="fa fa-edit"></i></a>
            </div>
            <div class="action">
                <a href=""><i class="fa fa-trash-alt"></i></a>
            </div>
          </li>
@endforeach
@endsection
