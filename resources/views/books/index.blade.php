@extends('books.layout')

@section('title', 'Books')

@section('content')
	<div class="d-flex justify-content-between align-items-center mb-3">
		<h1 class="h3 mb-0">Books</h1>
		<a href="{{ route('books.create') }}" class="btn btn-primary">Add Book</a>
	</div>

	@if (session('success'))
		<div class="alert alert-success">{{ session('success') }}</div>
	@endif

	<div class="card">
		<div class="card-body p-0">
			<div class="table-responsive">
				<table class="table table-striped table-hover mb-0">
					<thead class="table-light">
					<tr>
						<th>Title</th>
						<th>Author</th>
						<th>ISBN</th>
						<th>Genre</th>
						<th>Year</th>
						<th>Status</th>
						<th class="text-end">Actions</th>
					</tr>
					</thead>
					<tbody>
					@forelse ($books as $book)
						<tr>
							<td>{{ $book->title }}</td>
							<td>{{ $book->author }}</td>
							<td>{{ $book->isbn }}</td>
							<td>{{ $book->genre }}</td>
							<td>{{ $book->published_year }}</td>
							<td>
								@if ($book->status === 'available')
									<span class="badge text-bg-success">available</span>
								@elseif ($book->status === 'checked_out')
									<span class="badge text-bg-warning">checked_out</span>
								@else
									<span class="badge text-bg-danger">archived</span>
								@endif
							</td>
							<td class="text-end">
								<a href="{{ route('books.show', $book) }}" class="btn btn-sm btn-info">View</a>
								<a href="{{ route('books.edit', $book) }}" class="btn btn-sm btn-secondary">Edit</a>
								<form action="{{ route('books.destroy', $book) }}" method="POST" class="d-inline">
									@csrf
									@method('DELETE')
									<button type="submit" class="btn btn-sm btn-danger"
											onclick="return confirm('Delete this book?')">Delete
									</button>
								</form>
							</td>
						</tr>
					@empty
						<tr>
							<td colspan="7" class="text-center py-4">No books found.</td>
						</tr>
					@endforelse
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<div class="mt-3">
		{{ $books->links() }}
	</div>
@endsection
