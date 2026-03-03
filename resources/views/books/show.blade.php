@extends('books.layout')

@section('title', 'Book Details')

@section('content')
	<div class="d-flex justify-content-between align-items-center mb-3">
		<h1 class="h3 mb-0">Book Details</h1>
		<a href="{{ route('books.index') }}" class="btn btn-outline-secondary">Back</a>
	</div>

	<div class="card">
		<div class="card-body">
			<div class="row g-3">
				<div class="col-md-6"><strong>Title:</strong> {{ $book->title }}</div>
				<div class="col-md-6"><strong>Author:</strong> {{ $book->author }}</div>
				<div class="col-md-6"><strong>ISBN:</strong> {{ $book->isbn }}</div>
				<div class="col-md-6"><strong>Genre:</strong> {{ $book->genre }}</div>
				<div class="col-md-6"><strong>Published Year:</strong> {{ $book->published_year }}</div>
				<div class="col-md-6"><strong>Status:</strong> {{ $book->status }}</div>
				<div class="col-md-6"><strong>Created At:</strong> {{ $book->created_at->format('d M Y, h:i A') }}</div>
				<div class="col-md-6"><strong>Updated At:</strong> {{ $book->updated_at->format('d M Y, h:i A') }}</div>
			</div>
		</div>
	</div>
@endsection
