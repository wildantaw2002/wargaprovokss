@extends('layouts.umkm.app')

@section('title', 'Manage Project UMKM')

@section('content')
<section class="section dashboard">
    <div class="container">
        <div id="statusAlert" class="alert alert-success alert-dismissible fade show d-none" role="alert">
            <span id="statusMessage"></span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Manage Project UMKM</h5>
                <table id="applyTable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Posisi</th>
                            <th>Nama</th>
                            <th>Status</th>
                            <th>Tanggal Apply</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($applies as $apply)
                            <tr>
                                <td>{{ $apply->user->name ?? 'N/A' }}</td>
                                <td>{{ $apply->project->posisi ?? 'N/A' }}</td>
                                <td>{{ $apply->nama ?? 'N/A' }}</td>
                                <td>
                                    <select class="form-select status-select" data-apply-id="{{ $apply->id }}">
                                        @foreach(['active', 'completed'] as $status)
                                            <option value="{{ $status }}" {{ $apply->status === $status ? 'selected' : '' }}>
                                                {{ ucfirst($status) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>{{ $apply->created_at->format('d M Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function() {
        var table = $('#applyTable').DataTable({
            responsive: true,
            language: {
                search: "Cari:",
                lengthMenu: "Tampilkan _MENU_ entri",
                info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                infoEmpty: "Menampilkan 0 sampai 0 dari 0 entri",
                infoFiltered: "(disaring dari _MAX_ total entri)",
                paginate: {
                    first: "Pertama",
                    last: "Terakhir",
                    next: "Selanjutnya",
                    previous: "Sebelumnya"
                },
            }
        });

        $('.status-select').on('change', function() {
            var applyId = $(this).data('apply-id');
            var newStatus = $(this).val();
            updateStatus(applyId, newStatus);
        });

        function updateStatus(applyId, newStatus) {
            $.ajax({
                url: "{{ route('apply.updateStatus') }}",
                method: "POST",
                data: {
                    id: applyId,
                    status: newStatus,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    showAlert('success', response.success);
                },
                error: function(xhr) {
                    showAlert('danger', 'Error updating status: ' + xhr.responseText);
                }
            });
        }

        function showAlert(type, message) {
            var alertElement = $('#statusAlert');
            alertElement.removeClass('d-none alert-success alert-danger')
                        .addClass('alert-' + type)
                        .find('#statusMessage').text(message);
            alertElement.fadeIn();
            setTimeout(function() {
                alertElement.fadeOut();
            }, 3000);
        }
    });
</script>
@endsection

