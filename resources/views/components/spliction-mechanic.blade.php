@if($firstWordPart == null && $secondWordPart == null)
<span class="bg-splpink">{{ucfirst($spliction)}}</span>
@else
<span class="bg-splorange">{{ucfirst($firstWordPart) ?? ""}}</span>{{$remainder ?? ""}}<span class="bg-splgreen">{{$secondWordPart ?? ""}}</span>
@endif