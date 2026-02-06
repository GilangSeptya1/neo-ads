@extends('layout.app')

@section('title', 'Detail Iklan - NeoAds')

@section('content')
<div class="bg-white rounded-lg border border-gray-200 p-8 max-w-5xl">

    {{-- INFORMASI IKLAN --}}
    <h1 class="text-2xl font-bold text-gray-400 mb-6">
        Informasi Iklan
    </h1>

    <div class="grid grid-cols-2 gap-6">

        <div>
            <label class="label">Nama Iklan</label>
            <input type="text" class="input bg-gray-100"
                   value="{{ $iklan->judul_iklan }}" readonly>
        </div>

        <div>
            <label class="label">Tujuan Iklan</label>
            <input type="text" class="input bg-gray-100"
                   value="{{ $iklan->tujuan_iklan }}" readonly>
        </div>

        <div>
            <label class="label">Target Lokasi Iklan</label>
            <input type="text" class="input bg-gray-100"
                   value="{{ $iklan->target_lokasi }}" readonly>
        </div>

        <div>
            <label class="label">Target Eksposur Tercapai (KM)</label>
            <input type="text" class="input bg-gray-100"
                   value="{{ number_format($iklan->target_eksposur_km) }}" readonly>
        </div>

        <div>
            <label class="label">Tanggal Iklan Dimulai</label>
            <input type="date" class="input bg-gray-100"
                   value="{{ $iklan->tanggal_mulai ? \Carbon\Carbon::parse($iklan->tanggal_mulai)->format('Y-m-d') : '' }}" readonly>
        </div>

        <div>
            <label class="label">Tanggal Iklan Berakhir</label>
            <input type="date" class="input bg-gray-100"
                   value="{{ $iklan->tanggal_berakhir ? \Carbon\Carbon::parse($iklan->tanggal_berakhir)->format('Y-m-d') : '' }}" readonly>
        </div>

        <div>
            <label class="label">Durasi Iklan</label>
            <input type="text" class="input bg-gray-100"
                   value="{{ $iklan->durasi_hari }} Hari" readonly>
        </div>

        <div>
            <label class="label">Total Budget</label>
            <input type="text" class="input bg-gray-100"
                   value="Rp {{ number_format($iklan->total_budget) }}" readonly>
        </div>

        {{-- DESKRIPSI (SETENGAH) --}}
        <div>
            <label class="label">Deskripsi Iklan</label>
            <textarea class="input bg-gray-100" rows="3" readonly>{{ $iklan->deskripsi }}</textarea>
        </div>

        {{-- STATUS --}}
        <div>
            <label class="label">Status</label>
            <input type="text" class="input bg-gray-100"
                   value="{{ ucfirst($iklan->status) }}" readonly>
        </div>

    </div>

    {{-- MATERI IKLAN --}}
    <h1 class="text-2xl font-bold text-gray-400 mt-10 mb-6">
        Materi Iklan
    </h1>

    <form method="POST"
          action="{{ route('iklan.upload-stiker', $iklan->id) }}"
          enctype="multipart/form-data"
          class="grid grid-cols-2 gap-6">
        @csrf

        {{-- STIKER IKLAN --}}
        <div>
            <label class="label">Stiker Iklan</label>

            <div class="flex gap-3 items-center">
            <a href="{{ asset('template/stiker-template.pdf') }}"
            class="flex items-center gap-2 px-3 py-2 border rounded text-sm bg-gray-100 hover:bg-gray-200">
                <i class="fa-solid fa-download"></i>
                Template
            </a>

            {{-- INPUT FILE (KANAN) --}}
            <label class="flex-1 relative cursor-pointer">
                <input type="file"
                    name="stiker"
                    accept=".png,.pdf"
                    class="hidden"
                    onchange="document.getElementById('namaFile').value = this.files[0].name">

                {{-- FAKE INPUT --}}
                <input type="text"
                    id="namaFile"
                    class="input bg-white cursor-pointer"
                    placeholder="PNG / PDF"
                    readonly
                    value="{{ $iklan->stiker_file ? basename($iklan->stiker_file) : '' }}">
            </label>

        </div>

            {{-- NAMA FILE --}}
            <p id="namaFile" class="text-sm text-gray-600 mt-2">
                {{ $iklan->stiker_file ? basename($iklan->stiker_file) : 'Belum ada file dipilih' }}
            </p>

            <p class="text-xs text-gray-400">
                Format PNG / PDF • Maks 25 MB
            </p>

            @if($iklan->stiker_file)
                <a href="{{ asset('storage/'.$iklan->stiker_file) }}"
                target="_blank"
                class="text-sm text-blue-700 inline-block mt-1">
                    Lihat stiker saat ini
                </a>
            @endif
        </div>


        {{-- TIPE STIKER --}}
        <div>
            <label class="label">Tipe Stiker</label>
            <input type="text" class="input bg-gray-100"
                   value="{{ $iklan->tipe_stiker }}" readonly>
        </div>

        {{-- BUTTON --}}
        <div class="col-span-2 flex justify-end gap-3 mt-4">
            <a href="{{ route('iklan.index') }}"
               class="px-6 py-2 rounded border text-sm">
                Simpan
            </a>

            <button
                class="px-6 py-2 rounded bg-blue-900 text-white text-sm hover:bg-blue-800">
                Submit
            </button>
        </div>

    </form>

</div>
@endsection
