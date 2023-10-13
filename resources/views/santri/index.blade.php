@extends('layout.main')

@section('content')
    <div class="container mt-5">
        <a href="{{ route('santri.create') }}" class="btn btn-primary mb-5" data-bs-toggle="modal"
            data-bs-target="#createSantriModal">Tambah Santri</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>PPS ID</th>
                    <th>Nama Santri</th>
                    <th>Kelas</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($santris as $santri)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $santri->pps_id }}</td>
                        <td>{{ $santri->nama_santri }}</td>
                        <td>{{ $santri->kelas }}</td>
                        <td>
                            <a href="{{ route('santri.show', $santri) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('santri.edit', $santri) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('santri.destroy', $santri) }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <!-- Modal -->
    <!-- Modal -->
    <div class="modal fade" id="createSantriModal" tabindex="-1" aria-labelledby="createSantriModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createSantriModalLabel">Tambah Santri Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('santri.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="pps_id" class="form-label">PPS ID</label>
                            <input type="text" class="form-control" id="pps_id" name="pps_id" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama_santri" class="form-label">Nama Santri</label>
                            <input type="text" class="form-control" id="nama_santri" name="nama_santri" required>
                        </div>
                        <div class="mb-3">
                            <label for="nik" class="form-label">NIK</label>
                            <input type="text" class="form-control" id="nik" name="nik" required>
                        </div>
                        <div class="mb-3">
                            <label for="nisn" class="form-label">NISN</label>
                            <input type="text" class="form-control" id="nisn" name="nisn" required>
                        </div>
                        <div class="mb-3">
                            <label for="no_kk" class="form-label">No KK</label>
                            <input type="text" class="form-control" id="no_kk" name="no_kk" required>
                        </div>
                        <div class="mb-3">
                            <label for="domisili" class="form-label">Domisili</label>
                            <input type="text" class="form-control" id="domisili" name="domisili" required>
                        </div>
                        <div class="mb-3">
                            <label for="kelas" class="form-label">Kelas</label>
                            <input type="text" class="form-control" id="kelas" name="kelas" required>
                        </div>
                        <div class="mb-3">
                            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                        </div>
                        <div class="mb-3">
                            <label for="golongan_darah" class="form-label">Golongan Darah</label>
                            <select class="form-control" id="golongan_darah" name="golongan_darah">
                                <option value="" selected disabled>Pilih Golongan Darah</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="AB">AB</option>
                                <option value="O">O</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="nama_ayah" class="form-label">Nama Ayah</label>
                            <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama_ibu" class="form-label">Nama Ibu</label>
                            <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama_wali" class="form-label">Nama Wali (Opsional)</label>
                            <input type="text" class="form-control" id="nama_wali" name="nama_wali">
                        </div>
                        <div class="mb-3">
                            <label for="no_hp" class="form-label">Nomor HP (Opsional)</label>
                            <input type="text" class="form-control" id="no_hp" name="no_hp">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
