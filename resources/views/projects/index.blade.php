<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title></title>
        link
    </head>
    <body>
      <h1>Birdboard</h1>
<ul>
    @foreach ($projects as $project)
        <li>{{ $project->title }}</li>
    @endforeach
</ul>  
    </body>
</html>
