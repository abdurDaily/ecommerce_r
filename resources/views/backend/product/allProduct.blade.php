@extends('backendLayout')
@section('backend_contains')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="mb-4">All Products</h4>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
        <thead class="table-dark">
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
                                    <img src="{{ asset('uploads/products/' . $img) }}" width="60" height="60" style="object-fit: cover; border-radius: 5px;">
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
                        <form action="{{ route('product.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Delete this product?')" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
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
