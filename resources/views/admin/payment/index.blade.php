<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="{{ asset('css/tabs.css') }}">
</head>
<body>
    
<div class="tabs">
  <ul class="tabs-nav">
    <li><a href="#tab-1">Features</a></li>
    <li><a href="#tab-2">Details</a></li>
  </ul>
  <div class="tabs-stage">
    <div id="tab-1">
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec neque nisi, dictum aliquet lectus.</p>
    </div>
    <div id="tab-2">
      <p>Phasellus pharetra aliquet viverra. Donec scelerisque tincidunt diam, eu fringilla urna auctor at.</p>
    </div>
  </div>
</div>


<script src="{{asset('js/tabs.js')}}"></script>
</body>
</html>