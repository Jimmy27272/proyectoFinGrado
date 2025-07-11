
@props(['bodyClass' => '', 'title' => '']) 
{{-- Este es el layout base de la aplicación. Incluye la estructura HTML, las meta etiquetas y los enlaces a hojas de estilo y scripts. --}}

{{-- La propiedad bodyClass permite añadir clases personalizadas a la etiqueta body, y la propiedad title establece dinámicamente el título de la página. --}}

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{$title}} | {{config('app.name')}}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
      integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    
    <link rel="stylesheet" href="/css/app.css" />
    
  </head>
  <body @if($bodyClass)class="{{$bodyClass}}"@endif>

    {{ $slot }}  <!-- Aquí se insertará el contenido de las vistas que extiendan este layout -->

    <script
    src="https://cdnjs.cloudflare.com/ajax/libs/scrollReveal.js/4.0.9/scrollreveal.js"
    integrity="sha512-XJgPMFq31Ren4pKVQgeD+0JTDzn0IwS1802sc+QTZckE6rny7AN2HLReq6Yamwpd2hFe5nJJGZLvPStWFv5Kww=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
  ></script>
  <script src="/js/app.js"></script>
</body>
</html>