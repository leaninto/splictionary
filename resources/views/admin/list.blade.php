@extends('admin.wrapper')

@section('content')
<table class="table" id="admin.list">
	<thead>
	<tr><th>ID</th><th>Spliction</th><th>First Word</th><th>Second Word</th><th>Status</th><th>Created</th><th>Modified</th></tr>
	</thead>
	@foreach($listItems as $item)
	<tr>
		<td>{{$item['id']}}</td>
		<td>{{$item['word_splice']}}</td>
		<td>{{$item['first_word']}}</td>
		<td>{{$item['second_word']}}</td>
		<td>{{$item['status']}}</td>
		<td>{{$item['created_at']}}</td>
		<td>{{$item['updated_at']}}</td>
	</tr>
	@endforeach
</table>
{{$listItems->links()}}
@stop