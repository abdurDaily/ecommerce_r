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

            .swal2-backdrop-show {
                z-index: 2251 !important;
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
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($allFinanceRecords as $key => $finance)
                        <tr>
                            <td>{{ $allFinanceRecords->firstItem() + $key }}</td>
                            <td>{{ $finance->title }}</td>
                            <td>{{ $finance->author_name }}</td>
                            <td>{{ $finance->description }}</td>
                            <td>{{ $finance->amount }} /- </td>
                            <td>{{ $finance->created_at->format('d M Y') }}</td>

                            <td>
                                <div class="d-flex justify-content-between">
                                    @can('edit')
                                        <a href="{{ route('finance.edit.finance', $finance->id) }}" class="text-success">
                                        <iconify-icon icon="mingcute:pen-line" width="24" height="24"></iconify-icon>
                                    </a>
                                    @endcan
                                    @php
                                        $fileUrl = $finance->attach_file;
                                        $extension = pathinfo($fileUrl, PATHINFO_EXTENSION);
                                    @endphp

                                    @if ($finance->attach_file)
                                        @if (strtolower($extension) === 'pdf')
                                            <a href="{{ $fileUrl }}" class="text-dark" target="_blank"
                                                title="View PDF">
                                                <iconify-icon icon="mdi:file-pdf-box" width="24"
                                                    height="24"></iconify-icon>
                                            </a>
                                        @elseif (in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif']))
                                            <a href="{{ $fileUrl }}" class="text-dark" target="_blank"
                                                title="View Image">
                                                <img src="{{ $fileUrl }}" alt="file"
                                                    style="height: 24px; border-radius: 4px;">
                                            </a>
                                        @else
                                            <a href="{{ $fileUrl }}" class="text-dark" target="_blank"
                                                title="Download file">
                                                <iconify-icon icon="mingcute:file-line" width="24"
                                                    height="24"></iconify-icon>
                                            </a>
                                        @endif
                                    @endif

                                  @can('delete')
                                        <a href="#" class="text-danger deleteFinanceItem"
                                        data-url="{{ route('finance.delete.finance', $finance->id) }}">
                                        <iconify-icon icon="material-symbols:delete-outline-rounded" width="24"
                                            height="24">
                                        </iconify-icon>
                                    </a>
                                  @endcan
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        $('.deleteFinanceItem').on('click', function(e) {
            e.preventDefault();
            let url = $(this).data('url');

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
                        type: "GET",
                        success: function(response) {
                            //toastr.success('Deleted successfully');
                            window.location.reload();
                        },
                        error: function(xhr) {
                            toastr.error('Something went wrong');
                        }
                    });
                }
            });
        });
    </script>
@endpush
