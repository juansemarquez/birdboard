@extends('layouts.app')
@section('content')
      <h1>Birdboard</h1>

    <h2>{{ $project->title }}</h2>
<p>{{ $project->description}}</p>
@foreach ($project->tasks as $task)
    <div class="card mb-3">
        {{$task->body}}
    </div>
@endforeach
<p><a href="/projects">Volver</a></p>
@endsection
