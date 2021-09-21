<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
      
    </head>
    <body>
	@if(isset($message))
		
		{{$message}}
		
	@endif
        <div class="max-w-sm mx-auto py-8">
    <form action="/" method="post" enctype="multipart/form-data">
	
	@csrf
        <input type="file" required name="image" id="image">
        <button type="submit">Upload</button>
    </form>
</div>

<div>
<ul>

@foreach ($Images as $img)
    <li> <a href="/{{$img->id}}" target="_blank" > {{ $img->filename }}</li>
@endforeach

</ul>

</div>

    </body>
</html>
