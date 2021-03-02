@extends('layout.master')

@section('title', 'Category List')

@section('content')

<div class="container cat-list mt-5 mb-5">
	
	<h1>Category List</h1>

	<div class="inner-list">
		<ul>
			@foreach ($categories as $category)
			<li title="{{$category['remark']}}">
				[ <a href="{{ $baseur }}/admin/cat-del?id=<?php echo $category['id'] ?>">del</a> ]
				[ <a href="{{ $baseur }}/admin/cat-edit?id=<?php echo $category['id'] ?>">edit</a> ]
				{{$category['name']}}
			</li>
			@endforeach
		</ul>

		<a href="{{ $baseur }}/admin/cat-new" class="new">New Category</a>
	</div>
</div>


@endsection