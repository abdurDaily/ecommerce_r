@extends('backendLayout')

@push('backend_css')
<style>
    div:where(.swal2-container).swal2-center, div:where(.swal2-container).swal2-bottom {
        /* background: red !important; */
        z-index: 522221;
    }
</style>
@endpush

@section('backend_contains')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="mb-4">All Products</h4>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-light">
                <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>Stock</th>
                    <th>Details</th>
                    <th>Images</th>
                    <th>FAQs</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $index => $product)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->slug }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->discount ?? '-' }}</td>
                    <td>
                        @if ($product->stock_status)
                        <span class="badge bg-success">In Stock</span>
                        @else
                        <span class="badge bg-danger">Out of Stock</span>
                        @endif
                    </td>
                    <td>{{ Str::limit($product->details, 50) }}</td>
                    <td>
                        @if ($product->images && is_array($product->images))
                        <div class="d-flex flex-wrap" style="gap: 5px;">
                            @foreach ($product->images as $img)
                            <img src="{{ asset('uploads/products/' . $img) }}" width="60" height="60"
                                style="object-fit: cover; border-radius: 5px;">
                            @endforeach
                        </div>
                        @endif
                    </td>
                    <td>
                        @if ($product->faqs && is_array($product->faqs))
                        <ul style="padding-left: 16px;">
                            @foreach ($product->faqs as $faq)
                            <li>
                                <strong>Q:</strong> {{ $faq['question'] }}<br>
                                <strong>A:</strong> {{ $faq['answer'] }}
                            </li>
                            @endforeach
                        </ul>
                        @else
                        <em>No FAQ</em>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('product.edit', $product->id) }}" class="btn btn-sm btn-primary mb-1">Edit</a>
                        <button class="btn btn-sm btn-danger delete-btn" data-id="{{ $product->id }}">Delete</button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="10" class="text-center">No products found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('backend_js')
<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function () {
        $('.delete-btn').click(function () {
            let productId = $(this).data('id');
            let url = "{{ route('product.destroy', ':id') }}".replace(':id', productId);

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function (response) {
                            Swal.fire('Deleted!', response.message, 'success');
                            setTimeout(() => {
                                location.reload();
                            }, 1000);
                        },
                        error: function (xhr) {
                            Swal.fire('Error!', 'Something went wrong.', 'error');
                        }
                    });
                }
            });
        });
    });
</script>
@endpush