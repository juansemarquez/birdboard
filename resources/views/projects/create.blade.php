@extends('layouts.app')
@section('content')
      <h1 class="heading is-1">Birdboard</h1>
<h2 class="heading is-1">Crear un nuevo proyecto</h2>
<form method="POST" action="/projects">
    @csrf
    <div class="field">
        <label for="title">Title: </label>
        <div class="control">
            <input type="text" name="title" id="title" value=""><br>
        </div>
    </div>
    <div class="field">
        <label for="description">Description: </label>
        <div class="control">
            <textarea name="description" id="description" value=""></textarea><br>
        </div>
    </div>
    <div class="field">
        <div class="control">
            <button type="submit">¡Crear proyecto!</button>
        </div>
        <a href="/projects">Cancelar</a>
    </div>

</form>
@endsection
