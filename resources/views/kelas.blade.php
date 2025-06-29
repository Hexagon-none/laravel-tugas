@extends('layouts.app')
@section('content')
    <h3>Data Kelas</h3>
    <button class="btn btn-primary mb-3" id="btn-tambah">Tambah Kelas</button>
    <a href="{{ url('kelas-pdf') }}" class="btn btn-success mb-3" target="_blank">
        Download PDF
    </a>
    <table class="table table-bordered" id="table-kelas">
        <thead>
            <tr>
                <th>ID Kelas</th>
                <th>Nama Kelas</th>
                <th>Tingkat</th>
                <th>Wali Kelas</th>
                <th>Jumlah Siswa</th>
                <th>Aksi</th>
            </tr>
        </thead>
    </table>
    <!-- Modal -->
    <div class="modal fade" id="ModalAdd" tabindex="-1" aria-labelledby="ModalAddLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalAddLabel">Tambah Kelas</h5>
                </div>
                <form id="form-kelas">
                    <div class="modal-body">
                        <div class="mb-2">
                            <label for="id_kelas" class="form-label">ID Kelas</label>
                            <input type="text" id="id_kelas" name="id_kelas" class="form-control" required>
                        </div>
                        <div class="mb-2">
                            <label for="nama_kelas" class="form-label">Nama Kelas</label>
                            <input type="text" id="nama_kelas" name="nama_kelas" class="form-control" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Tingkat</label>
                            <select id="tingkat" name="tingkat" class="form-control" required>
                                <option value="">Pilih Tingkatan</option>
                                <option value="SMA">SMA</option>
                                <option value="SMP">SMP</option>
                                <option value="SD">SD</option>
                                <option value="TK">TK</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="wakes" class="form-label">Wali Kelas</label>
                            <input type="text" id="wakes" name="wakes" class="form-control" required>
                        </div>
                        <div class="mb-2">
                            <label for="jumlah" class="form-label">Jumlah Siswa</label>
                            <input type="text" id="jumlah" name="jumlah" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            var table = $('#table-kelas').DataTable({
                ajax: '/api/kelas',
                columns: [{
                        data: 'id_kelas'
                    },
                    {
                        data: 'nama_kelas'
                    },
                    {
                        data: 'tingkat'
                    },
                    {
                        data: 'wakes'
                    },
                    {
                        data: 'jumlah'
                    },
                    {
                        data: 'id_kelas',
                        render: function(id_kelas) {
                            return `
                                <button class="btn btn-warning btn-sm btn-edit" data-id="${id_kelas}">Edit</button>
                                <button class="btn btn-danger btn-sm btn-delete" data-id="${id_kelas}">Hapus</button>
                            `;
                        }
                    }
                ]
            });

            $('#btn-tambah').click(function() {
                $('#ModalAddLabel').text('Tambah Kelas');
                $('#form-kelas')[0].reset();
                $('#id_kelas').prop('readonly', false);
                $('#ModalAdd').modal('show');
            });

            function ambilDataForm() {
                return {
                    id_kelas: $('#id_kelas').val(),
                    nama_kelas: $('#nama_kelas').val(),
                    tingkat: $('#tingkat').val(),
                    wakes: $('#wakes').val(),
                    jumlah: $('#jumlah').val()
                };jan
            }

            $('#form-kelas').submit(function(e) {
                e.preventDefault();

                var data = ambilDataForm();
                var method = $('#id_kelas').prop('readonly') ? 'PUT' : 'POST';
                var url = method === 'PUT' ? '/api/kelas/' + data.id_kelas : '/api/kelas';

                $.ajax({
                    url: url,
                    type: method,
                    data: data,
                    success: function(response) {
                        $('#ModalAdd').modal('hide');
                        table.ajax.reload();
                        alert('Data berhasil disimpan');
                    },
                    error: function(xhr) {
                        alert('Error: ' + xhr.responseText);
                    }
                });
            });

            $('#table-kelas').on('click', '.btn-edit', function() {
                var id_kelas = $(this).data('id');

                $.ajax({
                    url: '/api/kelas/' + id_kelas,
                    type: 'GET',
                    success: function(data) {
                        const kls = data.data || data;

                        $('#ModalAddLabel').text('Edit Kelas');
                        $('#form-kelas')[0].reset();
                        $('#id_kelas').val(kls.id_kelas).prop('readonly', true);
                        $('#nama_kelas').val(kls.nama_kelas);
                        $('#tingkat').val(kls.tingkat);
                        $('#wakes').val(kls.wakes);
                        $('#jumlah').val(kls.jumlah);
                        $('#ModalAdd').modal('show');
                    },
                    error: function(xhr) {
                        alert('Error: ' + xhr.responseText);
                    }
                });
            });

            $('#table-kelas').on('click', '.btn-delete', function() {
                var id_kelas = $(this).data('id');
                if (confirm('Yakin ingin menghapus data ini?')) {
                    $.ajax({
                        url: '/api/kelas/' + id_kelas,
                        type: 'DELETE',
                        success: function() {
                            table.ajax.reload();
                            alert('Data berhasil dihapus');
                        },
                        error: function(xhr) {
                            alert('Error: ' + xhr.responseText);
                        }
                    });
                }
            });
        });
    </script>
@endsection
