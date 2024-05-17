@extends('layouts.main')

@section('title', config('app.name') . ' | Admin ISAC 23')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/env.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/add-pg.css') }}">
@endsection

@section('content')
    <div class="container container-admin">
        {{-- head --}}
        <div class="headline">
            <h1>List Soal Olympiad</h1>
            <div>
                <a href="{{ route('list_soal', ['babak' => $babak]) }}" style="margin-right: 1rem" class="button btn-primary">List Soal</a>
            </div>
        </div>

        {{-- form input soal --}}
        <form action="{{ route('update_pilgan', ['babak' => $babak,'id' => $soal->id]) }}" enctype="multipart/form-data" class="form-admin" method="post">
            @csrf
            @method('put')
            <div class="question">
                <textarea name="soal" id="soal" rows="5" placeholder="Masukkan soal disini...">{{ old('soal') ? old('soal') : $soal->soal }}</textarea>
                @error('soal')
                    <p style="color: red">{{ $message }}</p>
                @enderror
                {{-- masukkan gambar --}}
                <div class="wrap-input">
                    <input type="file" accept="image/png,image/jpg" class="hidden input-file" name="gambar_soal"
                        id="gambar_soal">
                    <label for="gambar_soal" class="button btn-primary">UNGGAH FOTO</label>
                </div>
                <img src="{{ $soal->gambar_soal ? asset('storage/gambar_soal/' . $soal->gambar_soal) : '' }}" id="preview-gambar-0" alt="" class="view-gambar">
            </div>
        {{-- pilihan --}}
            <div class="choice">
                <p>A</p>
                <div class="choice-input">
                    <textarea name="option_1" id="option_1" rows="2" placeholder="Masukkan opsi disini...">{{ old('option_1') ? old('option_1') : $options[0]->isi_option }}</textarea>
                    @error('option_1')
                        <p style="color: red">{{ $message }}</p>
                    @enderror
                    <div class="wrap-input">
                        <input type="file" accept="image/png, image/jpg" class="hidden input-file" name="gambar_1"
                            id="gambar_1">
                        <label for="gambar_1" class="button btn-primary">UNGGAH FOTO</label>
                    </div>

                    <img src="{{ $options[0]->gambar_option ? asset('storage/gambar_option/' . $options[0]->gambar_option) : '' }}" id="preview-gambar-1" alt="" class="view-gambar" >
                </div>
            </div>
            <div class="choice">
                <p>B</p>
                <div class="choice-input">
                    <textarea name="option_2" id="option_2" rows="2" placeholder="Masukkan opsi disini...">{{ old('option_2') ? old('option_2') : $options[1]->isi_option }}</textarea>
                    @error('option_2')
                        <p style="color: red">{{ $message }}</p>
                    @enderror
                    <div class="wrap-input">
                        <input type="file" accept="image/png, image/jpg" class="hidden input-file" name="gambar_2"
                            id="gambar_2">
                        <label for="gambar_2" class="button btn-primary">UNGGAH FOTO</label>
                    </div>
                    <img src="{{ $options[1]->gambar_option ? asset('storage/gambar_option/' . $options[1]->gambar_option) : '' }}" id="preview-gambar-2" alt="" class="view-gambar">
                </div>
            </div>
            <div class="choice">
                <p>C</p>
                <div class="choice-input">
                    <textarea name="option_3" id="option_3" rows="2" placeholder="Masukkan opsi disini...">{{ old('option_3') ? old('option_3') : $options[2]->isi_option }}</textarea>
                    @error('option_3')
                        <p style="color: red">{{ $message }}</p>
                    @enderror
                    <div class="wrap-input">
                        <input type="file" accept="image/png, image/jpg" class="hidden input-file" name="gambar_3"
                            id="gambar_3">
                        <label for="gambar_3" class="button btn-primary">UNGGAH FOTO</label>
                    </div>
                    <img src="{{ $options[2]->gambar_option ? asset('storage/gambar_option/' . $options[2]->gambar_option) : '' }}" id="preview-gambar-3" alt="" class="view-gambar">
                </div>
            </div>
            <div class="choice">
                <p>D</p>
                <div class="choice-input">
                    <textarea name="option_4" id="option_4" rows="2" placeholder="Masukkan opsi disini...">{{ old('option_4') ? old('option_4') : $options[3]->isi_option }}</textarea>
                    @error('option_4')
                        <p style="color: red">{{ $message }}</p>
                    @enderror
                    <div class="wrap-input">
                        <input type="file" accept="image/png, image/jpg" class="hidden input-file" name="gambar_4"
                            id="gambar_4">
                        <label for="gambar_4" class="button btn-primary">UNGGAH FOTO</label>
                    </div>
                    <img src="{{ $options[3]->gambar_option ? asset('storage/gambar_option/' . $options[3]->gambar_option) : '' }}" id="preview-gambar-4" alt="" class="view-gambar">
                </div>
            </div>
            <div class="choice">
                <p>E</p>
                <div class="choice-input">
                    <textarea name="option_5" id="option_5" rows="2" placeholder="Masukkan opsi disini...">{{ old('option_5') ? old('option_5') : $options[4]->isi_option }}</textarea>
                    @error('option_5')
                        <p style="color: red">{{ $message }}</p>
                    @enderror
                    <div class="wrap-input">
                        <input type="file" accept="image/png, image/jpg" class="hidden input-file" name="gambar_5"
                            id="gambar_5">
                        <label for="gambar_5" class="button btn-primary">UNGGAH FOTO</label>
                    </div>
                    <img src="{{ $options[4]->gambar_option ? asset('storage/gambar_option/' . $options[4]->gambar_option) : '' }}" id="preview-gambar-5" alt="" class="view-gambar">
                </div>
            </div>

            <div class="select-nilai">
                <div class="select-div">
                    <label for="benar">Jawaban benar : </label>
                    <select class="form-control list__dropdown" name="benar" id="benar">
                        <option value="" selected disable>Pilih opsi jawaban yang benar</option>
                        <option value="1" {{ $soal->jawaban == 1 ? 'selected' : '' }}>Jawaban yang benar adalah A</option>
                        <option value="2" {{ $soal->jawaban == 2 ? 'selected' : '' }}>Jawaban yang benar adalah B</option>
                        <option value="3" {{ $soal->jawaban == 3 ? 'selected' : '' }}>Jawaban yang benar adalah C</option>
                        <option value="4" {{ $soal->jawaban == 4 ? 'selected' : '' }}>Jawaban yang benar adalah D</option>
                        <option value="5" {{ $soal->jawaban == 5 ? 'selected' : '' }}>Jawaban yang benar adalah E</option>
                    </select>
                    @error('benar')
                        <p style="color: red">{{ $message }}</p>
                    @enderror
                </div>
                <div class="nilai">
                    <label for="nilai">Masukkan Nilai : </label>
                    <input value="{{ old('nilai') ? old('nilai') : $soal->nilai }}" type="number" name="nilai" id="nilai" placeholder="Masukkan nilai soal" min="1" max="100">
                    @error('nilai')
                        <p style="color: red">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <button class="btn-primary" type="submit">Update</button>
        </form>

    </div>

    <script>
        const inputs = document.querySelectorAll('.input-file');

    inputs.forEach((input, index) => {
        input.addEventListener('change', (event) => {
            showPreview(event, index);
        });
    });

        function showPreview(event, index) {
            if (event.target.files.length > 0) {
                let src = URL.createObjectURL(event.target.files[0]);
                let preview = document.querySelector(`#preview-gambar-` + index)
                preview.src = src;
                preview.style.display = "block";

            }
        }

    </script>


@endsection
