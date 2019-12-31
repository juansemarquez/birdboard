@extends('layouts.app')
@section('content')
      <h1>Birdboard</h1>

    <h2>{{ $project->title }}</h2>
<p>{{ $project->description}}</p>
<p><a href="/projects">Volver</a></p>
@endsection
