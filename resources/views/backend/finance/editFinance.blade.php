@extends('backendLayout')
@section('backend_contains')
    @push('backend_css')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
            integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
    @endpush
    <div class="container-xxl flex-grow-1 container-p-y ">
        <div class="card">
            <div class="card-header bg-light shadow mb-4 d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Edit your personal cost</h4>
                <a href="{{ route('finance.get.finance') }}" class="btn btn-primary">all record's</a>
            </div>
            <div class="card-body">
                <form class="p-3 " id="edit_form_data" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">


                        <div class="col-xl-6">
                            <label for="title">Edit title for cost <span>*</span> </label>
                            <input value="{{ $editFinance->title }}" name="cost_title" id="title" type="text"
                                class="form-control py-3" placeholder="cost title">

                        </div>


                        <div class="col-xl-6">
                            <label for="cost_amount">Edit cost amount <span>*</span> </label>
                            <input value="{{ $editFinance->amount }}" name="cost_amount" id="cost_amount" type="number"
                                class="form-control py-3" placeholder="cost amount">
                        </div>


                        <div class="col-xl-12 mt-3">
                            <label for="cost_details">Edit Description </label>
                            <textarea class="form-control" name="cost_details" id="cost_details" cols="30" rows="5"
                                placeholder="cost details">{{ $editFinance->description }}</textarea>
                        </div>

                        <div class="col-xl-6 mt-3">
                            <label for="attach_file">Attach file </label>
                            <span
                                class="{{ $editFinance->attach_file ? 'text-success' : 'text-danger' }}">{{ $editFinance->attach_file ? 'one file already exist' : 'no file attached' }}</span>
                            <input name="attach_file" id="attach_file" type="file" class="form-control py-3 ">
                        </div>

                        <div class="col-xl-6 d-flex align-items-end">
                            <button id="financeBtn" class="btn btn-primary py-3 w-100">Submit</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('backend_js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        $(function() {
            $('#financeBtn').on('click', function(e) {
                e.preventDefault();

                let formData = new FormData($("#edit_form_data")[0]);
                let id = `{{ $editFinance->id }}`; // dynamic ID from Blade

                $.ajax({
                    url: `{{ route('finance.update.finance', $editFinance->id) }}`, // Laravel will match Route::put('update/{id}', ...)
                    method: 'POST', // use POST + method spoofing
                    data: formData,
                    contentType: false,
                    processData: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(res) {
                        toastr.success(res.success, 'Updated');
                        setTimeout(() => {
                            window.location.href = `{{ route('finance.get.finance') }}`;
                        }, 1500); // Delay (ms) to show toast
                    },
                    error: function(xhr) {
                        if (xhr.responseJSON && xhr.responseJSON.errors) {
                            $.each(xhr.responseJSON.errors, function(key, value) {
                                toastr.error(value[0]);
                            });
                        } else {
                            toastr.error('Something went wrong.');
                        }
                    }
                });
            });
        });
    </script>
@endpush
