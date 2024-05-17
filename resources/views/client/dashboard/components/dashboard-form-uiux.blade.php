<div class="container-wrapper">
    <div class="container">

        @isset($user)
            <h1 class="judul" data-tim="{{ $user->nama_tim }}">{{ $user->nama_tim }}</h1>
            <div class="member">
                <div class="member member--anggota {{ $number == 1 ? 'highlight' : '' }}">
                    1
                </div>
                <hr class="line">
                <div class="member member--anggota {{ $number == 2 ? 'highlight' : '' }}">
                    2
                </div>
            </div>
            {{-- Form Create --}}
            <form action="{{ route('store_anggota') }}" class="add-anggota-form" method="post" enctype="multipart/form-data">
                @csrf
                <div class="image">
                    <h4>PAS FOTO</h4>
                    <img src="{{ url('/assets/img/pas.png') }}" alt="" class="view-pasFoto">
                    <input type="file" name="foto_profil" id="pasFoto" style="display: none">
                    <label for="pasFoto" class="button btn-primary">Upload</label>
                    @if ($errors->has('foto_profil'))
                        <span class="text-danger">{{ $errors->first('foto_profil') }}</span>
                    @endif
                </div>
                <div class="team-data">
                    <div class="form-group">
                        <label class="form-label" for="nama">NAMA LENGKAP</label>
                        <input type="text" class="form-control" name="nama" id="nama"
                            value="{{ old('nama') }}">
                        @if ($errors->has('nama'))
                            <span class="text-danger">{{ $errors->first('nama') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="tgl_lahir">TANGGAL LAHIR</label>
                        <input type="date" class="form-control" name="tgl_lahir" id="tanggalLahir"
                            value="{{ old('tgl_lahir') }}">
                        @if ($errors->has('tgl_lahir'))
                            <span class="text-danger">{{ $errors->first('tgl_lahir') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="status">STATUS</label>
                        <select name="status" id="" class="form-control">
                            <option class="disabled" selected="true" disabled="disabled">Pilih Status Keanggotaan</option>

                            @if ($number == 1)
                                <option value="ketua" {{ old('status') === 'ketua' ? 'selected' : '' }}>Ketua</option>
                                <option value="anggota" {{ old('status') === 'anggota' ? 'selected' : '' }}>Anggota
                                </option>
                            @elseif($number == 2 && $user->students->firstOrFail()->status == 'ketua')
                                <option value="anggota" {{ old('status') === 'anggota' ? 'selected' : '' }}>Anggota
                                </option>
                            @elseif($number == 2 && $user->students->firstOrFail()->status == 'anggota')
                                <option value="ketua" {{ old('status') === 'ketua' ? 'selected' : '' }}>Ketua</option>
                            @endif


                        </select>
                        @if ($errors->has('status'))
                            <span class="text-danger">{{ $errors->first('status') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="telp">WHATSAPP</label>
                        <input type="text" class="form-control" name="telp" id="whatsapp"
                            value="{{ old('telp') }}">
                        @if ($errors->has('telp'))
                            <span class="text-danger">{{ $errors->first('telp') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="form-label">BUKTI SISWA AKTIF</label>
                        <div style="border: none;border-radius: 0.25rem;background-color: #d9e9ff61;">
                            <input type="file" name="bukti_siswa" id="bukti_siswa" style="display: none">
                            <label for="bukti_siswa" class="button btn-primary"
                                style="font-size: 0.8rem; margin: 5px">Choose
                                File</label>
                            <span id="file-chosen" style="font-size: 0.8rem">No file chosen</span>
                        </div>
                        @if ($errors->has('bukti_siswa'))
                            <span class="text-danger">{{ $errors->first('bukti_siswa') }}</span>
                        @endif
                    </div>
                @else
                    <h1 class="judul" data-tim="{{ $student->account->nama_tim }}">{{ $student->account->nama_tim }}</h1>
                    {{-- Form Edit --}}

                    <form action="{{ route('update_anggota', ['student' => $student]) }}" class="add-anggota-form"
                        method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="image">
                            <h4>PAS FOTO</h4>
                            <img src="{{ url($student->foto_profil) }}" alt="" class="view-pasFoto">
                            <input type="file" name="foto_profil" id="pasFoto" style="display: none">
                            <label for="pasFoto" class="button btn-primary">Upload</label>
                            @if ($errors->has('foto_profil'))
                                <span class="text-danger">{{ $errors->first('foto_profil') }}</span>
                            @endif
                        </div>
                        <div class="team-data">
                            <div class="form-group">
                                <label class="form-label" for="nama">NAMA LENGKAP</label>
                                <input type="text" class="form-control" name="nama" id="nama"
                                    value="{{ $student->nama }}">
                                @if ($errors->has('nama'))
                                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="tgl_lahir">TANGGAL LAHIR</label>
                                <input type="date" class="form-control" name="tgl_lahir" id="tanggalLahir"
                                    value="{{ $student->tgl_lahir }}">
                                @if ($errors->has('tgl_lahir'))
                                    <span class="text-danger">{{ $errors->first('tgl_lahir') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="status">STATUS</label>
                                <select name="status" id="" class="form-control">
                                    <option class="disabled" selected="true" disabled="disabled">Pilih Status Keanggotaan
                                    </option>
                                    <option value="ketua" {{ $student->status === 'ketua' ? 'selected' : '' }}>Ketua
                                    </option>
                                    <option value="anggota" {{ $student->status === 'anggota' ? 'selected' : '' }}>Anggota
                                    </option>
                                </select>
                                @if ($errors->has('status'))
                                    <span class="text-danger">{{ $errors->first('status') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="telp">WHATSAPP</label>
                                <input type="text" class="form-control" name="telp" id="whatsapp"
                                    value="{{ $student->telp }}">
                                @if ($errors->has('telp'))
                                    <span class="text-danger">{{ $errors->first('telp') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="form-label">BUKTI SISWA AKTIF</label>
                                <div style="border: none;border-radius: 0.25rem;background-color: #d9e9ff61;">
                                    <input type="file" name="bukti_siswa" id="bukti_siswa" style="display: none">
                                    <label for="bukti_siswa" class="button btn-primary"
                                        style="font-size: 0.8rem; margin: 5px">Choose
                                        File</label>
                                    <span id="file-chosen" style="font-size: 0.8rem">No file chosen</span>
                                </div>
                                @if ($errors->has('bukti_siswa'))
                                    <span class="text-danger">{{ $errors->first('bukti_siswa') }}</span>
                                @endif
                            </div>
                        @endisset
                        <button type="submit" class="button btn-primary"
                            style="align-self: flex-end;">Confirm</button>

                    </div>
                </form>
                <img class="image-scene" src="{{ url('/assets/svg/scene_1.svg') }}" alt="" />
            </div>
    </div>

    <script>
        const actualBtn = document.getElementById('bukti_siswa');
        const fileChosen = document.getElementById('file-chosen');
        actualBtn.addEventListener('change', function() {
            fileChosen.textContent = this.files[0].name
        })
    </script>
