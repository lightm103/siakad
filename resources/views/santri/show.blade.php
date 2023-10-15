@extends('layout.main')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="mb-4">Detail Santri</h2>
            <div>
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h2 class="card-title">{{ $santri->nama_santri }}</h2>

                <p class="mb-1"><strong>PPS ID:</strong> {{ $santri->pps_id }}</p>
                <p class="mb-1"><strong>NIK:</strong> {{ $santri->nik }}</p>
                <p class="mb-1"><strong>NISN:</strong> {{ $santri->nisn }}</p>
                <p class="mb-1"><strong>No KK:</strong> {{ $santri->no_kk }}</p>
                <p class="mb-1"><strong>Domisili:</strong> {{ $santri->domisili }}</p>
                <p class="mb-1"><strong>Kelas:</strong> {{ $santri->kelas }}</p>
                <p class="mb-1"><strong>Tempat Lahir:</strong> {{ $santri->tempat_lahir }}</p>
                <p class="mb-1"><strong>Tanggal Lahir:</strong>
                    {{ \Carbon\Carbon::parse($santri->tanggal_lahir)->format('d-m-Y') }}</p>
                <p class="mb-1"><strong>Golongan Darah:</strong> {{ $santri->golongan_darah ?? 'Tidak Diketahui' }}</p>
                <p class="mb-1"><strong>Alamat:</strong> {{ $santri->alamat }}</p>
                <p class="mb-1"><strong>Nama Ayah:</strong> {{ $santri->nama_ayah }}</p>
                <p class="mb-1"><strong>Nama Ibu:</strong> {{ $santri->nama_ibu }}</p>
                <p class="mb-1"><strong>Nama Wali:</strong> {{ $santri->nama_wali ?? 'Tidak Diketahui' }}</p>
                <p class="mb-1"><strong>No HP:</strong> {{ $santri->no_hp }}</p>
            </div>
        </div>

        <!-- Modal Edit Santri -->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Santri</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('santri.update', $santri->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nama_santri">Nama Santri:</label>
                                <input type="text" class="form-control" id="nama_santri" name="nama_santri"
                                    value="{{ $santri->nama_santri }}">
                            </div>

                            <div class="form-group">
                                <label for="pps_id">PPS ID:</label>
                                <input type="text" class="form-control" id="pps_id" name="pps_id"
                                    value="{{ $santri->pps_id }}">
                            </div>

                            <div class="form-group">
                                <label for="nik">NIK:</label>
                                <input type="text" class="form-control" id="nik" name="nik"
                                    value="{{ $santri->nik }}">
                            </div>

                            <div class="form-group">
                                <label for="nisn">NISN:</label>
                                <input type="text" class="form-control" id="nisn" name="nisn"
                                    value="{{ $santri->nisn }}">
                            </div>

                            <div class="form-group">
                                <label for="no_kk">No KK:</label>
                                <input type="text" class="form-control" id="no_kk" name="no_kk"
                                    value="{{ $santri->no_kk }}">
                            </div>

                            <div class="form-group">
                                <label for="domisili">Domisili:</label>
                                <input type="text" class="form-control" id="domisili" name="domisili"
                                    value="{{ $santri->domisili }}">
                            </div>

                            <div class="form-group">
                                <label for="kelas">Kelas:</label>
                                <input type="text" class="form-control" id="kelas" name="kelas"
                                    value="{{ $santri->kelas }}">
                            </div>

                            <div class="form-group">
                                <label for="tempat_lahir">Tempat Lahir:</label>
                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                    value="{{ $santri->tempat_lahir }}">
                            </div>

                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir:</label>
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                                    value="{{ $santri->tanggal_lahir }}">
                            </div>

                            <div class="form-group">
                                <label for="golongan_darah">Golongan Darah:</label>
                                <select class="form-control" id="golongan_darah" name="golongan_darah">
                                    <option value="" selected disabled>Pilih Golongan Darah</option>
                                    <option value="A" @if ($santri->golongan_darah == 'A') selected @endif>A</option>
                                    <option value="B" @if ($santri->golongan_darah == 'B') selected @endif>B</option>
                                    <option value="AB" @if ($santri->golongan_darah == 'AB') selected @endif>AB</option>
                                    <option value="O" @if ($santri->golongan_darah == 'O') selected @endif>O</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="alamat">Alamat:</label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="3">{{ $santri->alamat }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="nama_ayah">Nama Ayah:</label>
                                <input type="text" class="form-control" id="nama_ayah" name="nama_ayah"
                                    value="{{ $santri->nama_ayah }}">
                            </div>

                            <div class="form-group">
                                <label for="nama_ibu">Nama Ibu:</label>
                                <input type="text" class="form-control" id="nama_ibu" name="nama_ibu"
                                    value="{{ $santri->nama_ibu }}">
                            </div>

                            <div class="form-group">
                                <label for="nama_wali">Nama Wali:</label>
                                <input type="text" class="form-control" id="nama_wali" name="nama_wali"
                                    value="{{ $santri->nama_wali }}">
                            </div>

                            <div class="form-group">
                                <label for="no_hp">No HP:</label>
                                <input type="text" class="form-control" id="no_hp" name="no_hp"
                                    value="{{ $santri->no_hp }}">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Akhir Modal Edit Santri -->
    </div>
@endsection
