@if ($paginator->hasPages())
	<nav class="" aria-label="pagination">
		<ul class="pagination pagination-circle pagination-lg justify-content-center pg-blue py-3">
			{{-- Previous Page Link --}}
			@if ($paginator->onFirstPage())
				<li class="page-item disabled"><span>&laquo;</span></li>
			@else
				<li class="page-item"><a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="page-link">&laquo;</a></li>
			@endif

			{{-- Pagination Elements --}}
			@foreach ($elements as $element)
				{{-- "Three Dots" Separator --}}
				@if (is_string($element))
					<li class="page-item disabled"><span>{{ $element }}</span></li>
				@endif

				{{-- Array Of Links --}}
				@if (is_array($element))
					@foreach ($element as $page => $url)
						@if ($page == $paginator->currentPage())
							<li class="page-item active"><span class="page-link">{{ $page }}</span></li>
						@else
							<li class="page-item"><a href="{{ $url }}" class="page-link">{{ $page }}</a></li>
						@endif
					@endforeach
				@endif
			@endforeach

			{{-- Next Page Link --}}
			@if ($paginator->hasMorePages())
				<li class="page-item"><a href="{{ $paginator->nextPageUrl() }}" rel="next" class="page-link">&raquo;</a></li>
			@else
				<li class="page-item disabled"><span>&raquo;</span></li>
			@endif
		</ul>
	</nav>
@endif
