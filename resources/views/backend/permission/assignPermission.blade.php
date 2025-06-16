@extends('backendLayout')

@section('backend_contains')
    @push('backend_css')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
            integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
    @endpush

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-header bg-light shadow mb-4 d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Create Role</h4>
                <a href="" class="btn btn-primary">permission's</a>
            </div>
            <div class="card-body">
                <h2>User Permission Management</h2>

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @elseif (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <form action="{{ route('permission.assign.permission') }}" method="POST" id="permission-form">
                    @csrf
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>User</th>
                                @foreach ($permissions as $permission)
                                    <th>{{ $permission->name }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }} <br> <small>{{ $user->email }}</small></td>

                                    {{-- Hidden input ensures user is submitted even with 0 permissions --}}
                                    <input type="hidden" name="users[{{ $user->id }}]" value="">

                                    @foreach ($permissions as $permission)
                                        <td class="text-center">
                                            <input type="checkbox" class="permission-checkbox"
                                                name="users[{{ $user->id }}][]" value="{{ $permission->name }}"
                                                {{ $user->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <button type="submit" class="btn btn-primary mt-3">Save Permissions</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('backend_js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        document.getElementById('permission-form').addEventListener('submit', function(e) {
            const checkboxes = document.querySelectorAll('.permission-checkbox');
            let atLeastOneChecked = false;

            checkboxes.forEach(checkbox => {
                if (checkbox.checked) {
                    atLeastOneChecked = true;
                }
            });

            if (!atLeastOneChecked) {
                e.preventDefault();
                toastr.error("You must assign at least one permission to any user.");
            }
        });
    </script>
@endpush
