<x-google-analytics :googleTrackingCode="Config::get('splictionary.google.analytics.tracking_id')"/>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link rel="stylesheet" type="text/css" href="/css/app.css">
<link rel="icon" 
      type="image/png" 
      href="/favicon.png">
<script src="/js/advertising.js"></script>
<script src="/js/votes.js"></script>
<script src="https://kit.fontawesome.com/3261ed6533.js" crossorigin="anonymous"></script>
<script src="https://cdn.tiny.cloud/1/o9d4jet6ewjcnm6wnj2uhxfw0sky7z784rbjoabqloqiwdr9/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<title>{{$title ?? "Splictionary - A word splice site"}}</title>