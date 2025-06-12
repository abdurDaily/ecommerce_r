@extends('backendLayout')
@section('backend_contains')
@push('backend_css')
<style>
    .card-body nav {
        margin-top: 20px;
        display: flex;
        justify-content: center
    }

    .card-body nav span {
        padding: 10px;
        display: inline-block;
        margin: 0 10px;
        color: #000;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
    integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
<div class="container-xxl flex-grow-1 container-p-y ">
    <div class="card">
        <div class="card-header bg-light shadow mb-4 d-flex align-items-center justify-content-between">
            <h4 class="mb-0">All finance record</h4>
            <a href="{{ route('finance.index') }}" class="btn btn-primary">Store new one</a>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-hover table-striped table-bordered">
                <tr>
                    <th>Sn</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Description</th>
                    <th>Amount /-</th>
                    <th>Action</th>
                </tr>
                @foreach ($allFinanceRecords as $key => $finance)
                <tr>
                    <td>{{ $allFinanceRecords->firstItem() + $key }}</td>
                    <td>{{ $finance->title }}</td>
                    <td>{{ $finance->author_name }}</td>
                    <td>{{ $finance->description }}</td>
                    <td>{{ $finance->amount }} /- </td>
                    <td>
                        <div class="d-flex justify-content-between">
                            <a href="#" class="text-success">
                                <iconify-icon icon="mingcute:pen-line" width="24" height="24"></iconify-icon>
                            </a>
                            @if ($finance->attach_file)
                            <a class="text-dark" target="_blank" href="{{ $finance->attach_file  }}">
                                <iconify-icon icon="mingcute:file-line" width="24" height="24"></iconify-icon>
                            </a>
                            @endif
                            <a href="#" class="text-danger deleteFinanceItem"
                                data-url="{{ route('finance.delete.finance', $finance->id) }}">
                                <iconify-icon icon="material-symbols:delete-outline-rounded" width="24" height="24">
                                </iconify-icon>
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </table>
            {{ $allFinanceRecords->links() }}
        </div>
    </div>
</div>
@endsection

@push('backend_js')
<script src="https://code.iconify.design/iconify-icon/3.0.0/iconify-icon.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>


    $('.deleteFinanceItem').on('click', function(e){
    e.preventDefault();

    let url = $(this).data('url');

    console.log(url);
    

    $.ajax({
        url: url,
        type: "GET",
        success: function (response) {
            console.log(response);
            
            toastr.success('Deleted successfully');
            window.location.reload();
            // optionally remove row
        },
        error: function(xhr){
            toastr.error('Something went wrong');
        }
    });
});

</script>
@endpush