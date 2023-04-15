@extends('dashboard.main')

@section('content')
    <h1 class="text-xl mb-4">Tambah Pencapaian</h1>

    <form action="{{ route('achievements.store') }}" method="post">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <label>
                <input type="text"
                       name="achievement-name"
                       placeholder="Nama Pencapaian"
                       class="input input-bordered input-primary w-full"/>
                <x-validation-message name="achievement-name"/>
            </label>
            <label>
                <input type="number"
                       name="achievement-point"
                       placeholder="Point Pencapaian"
                       class="input input-bordered input-primary w-full"/>
                <x-validation-message name="achievement-point"/>
            </label>
            <label>
                <select name="achievement-type" class="select select-bordered w-full">
                    <option disabled selected>Pilih jenis pelanggaran</option>
                    @foreach($achievementTypes as $key => $type)
                        <option value="{{ $key }}">{{ $type }}</option>
                    @endforeach
                </select>
                <x-validation-message name="achievement-type"/>
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
@endsection