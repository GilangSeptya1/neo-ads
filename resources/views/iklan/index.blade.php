@extends('layout.app')

@section('title', 'Iklan - NeoAds')

@section('content')
<div class="space-y-6">

    {{-- Header --}}
    <div class="flex items-center justify-between">
        <h1 class="text-4xl font-semibold text-gray-500">Iklan</h1>

        <a href="{{ route('iklan.create') }}"
           class="px-4 py-2 rounded-md bg-blue-900 text-white text-sm font-medium hover:bg-blue-800">
            + Buat Iklan Baru
        </a>
    </div>

    {{-- Table --}}
    <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead class="bg-gray-50 text-gray-500">
                    <tr>
                        <th class="px-6 py-3 text-left">No</th>
                        <th class="px-6 py-3 text-left">Nama Iklan</th>
                        <th class="px-6 py-3 text-left">Target Lokasi</th>
                        <th class="px-6 py-3 text-left">Target Kendaraan</th>
                        <th class="px-6 py-3 text-left">Tanggal Iklan Dimulai</th>
                        <th class="px-6 py-3 text-left">Tanggal Iklan Berakhir</th>
                        <th class="px-6 py-3 text-left">Total Budget</th>
                        <th class="px-6 py-3 text-left">Status</th>
                        <th class="px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($iklan as $item)
                    <tr class="odd:bg-white  even:bg-neutral-50 hover:bg-neutral-100">
                        <td class="px-6 py-3">{{ $loop->iteration }}</td>
                        <td class="px-6 py-3 font-medium">{{ $item->judul_iklan }}</td>
                        <td class="px-6 py-3">{{ $item->target_lokasi }}</td>
                        <td class="px-6 py-3">{{ $item->target_kendaraan }}</td>
                        <td class="px-6 py-3">{{ $item->tanggal_mulai }}</td>
                        <td class="px-6 py-3">{{ $item->tanggal_berakhir }}</td>
                        <td class="px-6 py-3">Rp{{ number_format($item->total_budget,0,',','.') }}</td>
                        <td class="px-6 py-3">
                            <span class="px-2 py-1 text-xs rounded bg-gray-100 text-gray-600">
                                {{ $item->status }}
                            </span>
                        </td>
                        <td class="px-6 py-3">
                            <div class="flex justify-center gap-2">

                                {{-- DETAIL --}}
                                <a href="{{ route('iklan.show', $item->id) }}"
                                class="w-7 h-7 flex items-center justify-center rounded bg-blue-600 text-white"
                                title="Detail">
                                    <i class="fa-solid fa-eye text-xs"></i>
                                </a>

                                {{-- EDIT --}}
                                <a href=""
                                class="w-7 h-7 flex items-center justify-center rounded bg-yellow-400 text-white"
                                title="Edit">
                                    <i class="fa fa-pencil-alt text-xs"></i>
                                </a>

                                {{-- DELETE --}}
                                <form method="POST" action=""
                                    onsubmit="return confirm('Yakin hapus iklan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        class="w-7 h-7 flex items-center justify-center rounded bg-red-500 text-white"
                                        title="Hapus">
                                        <i class="fa-solid fa-trash text-xs"></i>
                                    </button>
                                </form>

                            </div>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="flex justify-between items-center px-6 py-4 text-sm text-gray-500">
            <span>Showing 10 from 12 data</span>
            <div class="flex gap-1">
                <button class="px-2 py-1 bg-blue-900 text-white rounded">1</button>
                <button class="px-2 py-1 border rounded">2</button>
            </div>
        </div>
    </div>
</div>
@endsection
