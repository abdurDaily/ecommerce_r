@extends('backendLayout')
@section('backend_contains')
<div class="container-xxl flex-grow-1 container-p-y">
    <form id="updateProductForm" enctype="multipart/form-data">
        @csrf

        <input type="text" name="name" class="form-control p-3 my-2" placeholder="Product Name"
            value="{{ $product->name }}" required>
        <input type="text" name="slug" class="form-control p-3 my-2" placeholder="Slug" value="{{ $product->slug }}"
            required>
        <input type="number" name="price" class="form-control p-3 my-2" placeholder="Price"
            value="{{ $product->price }}" step="0.01" required>
        <input type="number" name="discount" class="form-control p-3 my-2" placeholder="Discount (optional)"
            value="{{ $product->discount }}" step="0.01">

        <select name="stock_status" class="form-control p-3 my-2" required>
            <option value="1" {{ $product->stock_status ? 'selected' : '' }}>In Stock</option>
            <option value="0" {{ !$product->stock_status ? 'selected' : '' }}>Out of Stock</option>
        </select>

        <textarea name="details" class="form-control p-3 my-2" placeholder="Product Details"
            required>{{ $product->details }}</textarea>

        <label class="mt-2">Existing Product Images</label>
        <div id="existingImagePreview" class="d-flex flex-wrap mt-2">
            @if($product->images && is_array($product->images))
            @foreach ($product->images as $index => $img)
            <div class="existing-image" style="position: relative; margin-right:10px; margin-bottom:10px;">
                <img src="{{ asset('uploads/products/' . $img) }}"
                    style="width: 100px; height: 100px; object-fit: cover; border-radius: 6px; border:1px solid #ddd;" />
                <button type="button" class="btn btn-sm btn-danger remove-existing-image" data-index="{{ $index }}"
                    style="position: absolute; top: -8px; right: -8px; border-radius: 50%; padding: 2px 6px;">&times;</button>
                <input type="hidden" name="existing_images[]" value="{{ $img }}">
            </div>
            @endforeach
            @endif
        </div>

        <label class="mt-2">Upload New Product Images</label>
        <input type="file" id="imageInput" class="form-control p-3 mb-2" multiple>
        <div id="imagePreview" class="d-flex flex-wrap mt-2"></div>

        <div id="faqSection" class="mt-3">
            <label>FAQs</label>
            @if($product->faqs && is_array($product->faqs))
            @foreach($product->faqs as $i => $faq)
            <div class="faq-group mb-2">
                <input type="text" name="faqs[{{ $i }}][question]" class="form-control p-3 mb-1"
                    value="{{ $faq['question'] }}" placeholder="Question">
                <input type="text" name="faqs[{{ $i }}][answer]" class="form-control p-3" value="{{ $faq['answer'] }}"
                    placeholder="Answer">
            </div>
            @endforeach
            @endif
        </div>
        <button type="button" id="addFaqBtn" class="btn btn-sm btn-secondary my-2">Add More FAQ</button>

        <br>
        <button type="submit" class="w-25 btn btn-success mt-2">Update</button>
    </form>
</div>
@endsection

@push('backend_js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    let faqIndex = {{ is_array($product->faqs) ? count($product->faqs) : 0 }};
    let selectedImages = [];

    $('#addFaqBtn').click(function () {
        $('#faqSection').append(`
            <div class="faq-group mb-3 position-relative border p-2 rounded bg-light">
                <input type="text" name="faqs[${faqIndex}][question]" class="form-control p-3 mb-2" placeholder="Question">
                <input type="text" name="faqs[${faqIndex}][answer]" class="form-control p-3 mb-2" placeholder="Answer">
                <button type="button" class="btn btn-sm btn-danger remove-faq" style="position:absolute; top:5px; right:5px;">❌</button>
            </div>
        `);
        faqIndex++;
    });

    $(document).on('click', '.remove-faq', function () {
        $(this).closest('.faq-group').remove();
    });

    // Remove existing image on cross click
    $(document).on('click', '.remove-existing-image', function () {
        $(this).closest('.existing-image').remove();
    });

    $('#imageInput').on('change', function (e) {
        const newFiles = Array.from(e.target.files);
        selectedImages = [...selectedImages, ...newFiles];
        $(this).val('');
        refreshImagePreview();
    });

    function refreshImagePreview() {
        $('#imagePreview').html('');
        selectedImages.forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = function (e) {
                $('#imagePreview').append(`
                    <div style="position: relative; margin-right:10px; margin-bottom:10px;">
                        <img src="${e.target.result}" style="width: 100px; height: 100px; object-fit: cover; border-radius: 6px; border:1px solid #ddd;" />
                        <button type="button" class="btn btn-sm btn-danger remove-image" data-index="${index}" style="position: absolute; top: -8px; right: -8px; border-radius: 50%; padding: 2px 6px;">&times;</button>
                    </div>
                `);
            };
            reader.readAsDataURL(file);
        });
    }

    $(document).on('click', '.remove-image', function () {
        const index = $(this).data('index');
        selectedImages.splice(index, 1);
        refreshImagePreview();
    });

    // Submit Form via AJAX
    $('#updateProductForm').submit(function (e) {
        e.preventDefault();
        let formData = new FormData(this);
        selectedImages.forEach(file => {
            formData.append('images[]', file);
        });

        $.ajax({
            url: "{{ route('product.update', $product->id) }}",
            method: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (res) {
                toastr.success(res.message);
            },
            error: function (xhr) {
                $.each(xhr.responseJSON.errors, function (key, value) {
                    toastr.error(value[0]);
                });
            }
        });
    });
</script>
@endpush