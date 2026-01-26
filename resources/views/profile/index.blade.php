
{{-- profile/index.blade.php --}}
@extends('layout.app')

@section('title', 'Profile - NeoAds')
@section('content')
<div class="space-y-8">

    {{-- Header --}}
    <div>
        <h1 class="text-2xl font-semibold text-gray-900">Profile</h1>
    </div>

    <form action="{{ route('profile.update') }}" method="POST" class="space-y-8">
        @csrf
        @method('PUT')

        {{-- ================= Informasi Perusahaan ================= --}}
        <section class="bg-white rounded-lg border border-gray-200 p-6">
            <h2 class="text-lg font-semibold text-blue-900 mb-6">
                Informasi Perusahaan
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Nama Perusahaan --}}
                <div>
                    <label class="label">Nama Perusahaan</label>
                    <input type="text" name="nama_perusahaan"
                        value="{{ old('nama_perusahaan', $perusahaan->nama_perusahaan ?? '') }}"
                        class="input">
                </div>

                {{-- Jenis Perusahaan --}}
                <div>
                    <label class="label">Jenis Perusahaan</label>
                    <select name="jenis_perusahaan" class="input">
                        <option value="">Pilih Jenis</option>
                        @foreach(['PT','UMKM','Korporat','Agensi','Perorangan'] as $jp)
                            <option value="{{ $jp }}"
                                {{ old('jenis_perusahaan', $perusahaan->jenis_perusahaan ?? '') == $jp ? 'selected' : '' }}>
                                {{ $jp }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Kategori Bisnis --}}
                <div>
                    <label class="label">Kategori Bisnis</label>
                    <select name="kategori_bisnis" class="input">
                        @foreach(['FnB','IT','Jasa','Lainnya'] as $kb)
                            <option value="{{ $kb }}"
                                {{ old('kategori_bisnis', $perusahaan->kategori_bisnis ?? '') == $kb ? 'selected' : '' }}>
                                {{ $kb }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- NPWP --}}
                <div>
                    <label class="label">NPWP</label>
                    <input type="text" name="npwp"
                        value="{{ old('npwp', $perusahaan->npwp ?? '') }}"
                        class="input">
                </div>

                {{-- Provinsi --}}
                <div>
                    <label class="label">Provinsi</label>
                    <input type="text" name="provinsi"
                        value="{{ old('provinsi', $perusahaan->provinsi ?? '') }}"
                        class="input">
                </div>

                {{-- Kota --}}
                <div>
                    <label class="label">Kota</label>
                    <input type="text" name="kota"
                        value="{{ old('kota', $perusahaan->kota ?? '') }}"
                        class="input">
                </div>

                {{-- Kecamatan --}}
                <div>
                    <label class="label">Kecamatan</label>
                    <input type="text" name="kecamatan"
                        value="{{ old('kecamatan', $perusahaan->kecamatan ?? '') }}"
                        class="input">
                </div>

                {{-- Alamat --}}
                <div>
                    <label class="label">Alamat Lengkap Perusahaan</label>
                    <textarea name="alamat_lengkap" rows="3"
                        class="input">{{ old('alamat_lengkap', $perusahaan->alamat_lengkap ?? '') }}</textarea>
                </div>
            </div>

            <div class="flex justify-end mt-6">
                <button type="submit" class="btn-primary">
                    Simpan
                </button>
            </div>
        </section>

    </form>

    <form action="{{ route('profile.update1') }}" method="POST" class="space-y-8">
        @csrf
        @method('PUT')

        {{-- ================= Penanggung Jawab ================= --}}
        <section class="bg-white rounded-lg border border-gray-200 p-6">
            <h2 class="text-lg font-semibold text-blue-900 mb-6">
                Informasi Penanggung Jawab
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="label">Nama Depan</label>
                    <input type="text" name="nama_depan_penanggungjawab"
                        value="{{ old('nama_depan_penanggungjawab', $penanggungjawab->nama_depan_penanggungjawab ?? '') }}"
                        class="input">
                </div>

                <div>
                    <label class="label">Nama Belakang</label>
                    <input type="text" name="nama_belakang_penanggungjawab"
                        value="{{ old('nama_belakang_penanggungjawab',  $penanggungjawab->nama_belakang_penanggungjawab ?? '') }}"
                        class="input">
                </div>

                <div>
                    <label class="label">Email</label>
                    <input type="email" name="email_penanggungjawab"
                        value="{{ old('email_penanggungjawab',  $penanggungjawab->email_penanggungjawab ?? '') }}"
                        class="input">
                </div>

                <div>
                    <label class="label">Nomor Telepon</label>
                    <input type="tel" name="telepon_penanggungjawab"
                        value="{{ old('telepon_penanggungjawab',  $penanggungjawab->telepon_penanggungjawab ?? '') }}"
                        class="input">
                </div>
            </div>

            <div class="flex justify-end gap-3 mt-6">
                <button type="button" class="border rounded-lg px-3 py-2">+</button>
                <button type="submit" class="btn-primary">Simpan</button>
            </div>
        </section>
    </form>
</div>
@endsection
