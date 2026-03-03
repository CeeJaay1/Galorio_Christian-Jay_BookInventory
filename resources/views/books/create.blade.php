@extends('books.layout')

@section('title', 'Create Book')

@section('content')
	<div class="d-flex justify-content-between align-items-center mb-3">
		<h1 class="h3 mb-0">Create Book</h1>
		<a href="{{ route('books.index') }}" class="btn btn-outline-secondary">Back</a>
	</div>

	@if ($errors->any())
		<div class="alert alert-danger">
			<ul class="mb-0 ps-3">
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

	<div class="card">
		<div class="card-body">
			<form action="{{ route('books.store') }}" method="POST">
				@csrf

				<div class="row g-3">
					<div class="col-md-6">
						<label for="title" class="form-label">Title</label>
						<input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}" required>
					</div>

					<div class="col-md-6">
						<label for="author" class="form-label">Author</label>
						<input type="text" id="author" name="author" class="form-control" value="{{ old('author') }}" required>
					</div>

					<div class="col-md-6">
						<label for="isbn" class="form-label">ISBN</label>
						<input type="text" id="isbn" name="isbn" class="form-control" value="{{ old('isbn') }}" required>
					</div>

					<div class="col-md-6">
						<label for="genre" class="form-label">Genre</label>
						<input type="text" id="genre" name="genre" class="form-control" value="{{ old('genre') }}" required>
					</div>

					<div class="col-md-6">
						<label for="published_year" class="form-label">Published Year</label>
						<input type="number" id="published_year" name="published_year" class="form-control"
							   min="1000" max="{{ now()->year }}" value="{{ old('published_year') }}" required>
					</div>

					<div class="col-md-6">
						<label for="status" class="form-label">Status</label>
						<select id="status" name="status" class="form-select" required>
							<option value="">Select status</option>
							<option value="available" @selected(old('status') === 'available')>available</option>
							<option value="checked_out" @selected(old('status') === 'checked_out')>checked_out</option>
							<option value="archived" @selected(old('status') === 'archived')>archived</option>
						</select>
					</div>
				</div>

				<div class="mt-4">
					<button type="submit" class="btn btn-primary">Save Book</button>
				</div>
			</form>
		</div>
	</div>
@endsection
