<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title></title>
    </head>
    <body>
      <h1>Birdboard</h1>
<ul>
    @forelse ($projects as $project)
        <li><a href="{{ $project->path() }}">{{ $project->title }}</a></li>
    @empty
        <li>Todavía no hay ningún proyecto</li>
    @endforelse
</ul>  
    </body>
</html>
