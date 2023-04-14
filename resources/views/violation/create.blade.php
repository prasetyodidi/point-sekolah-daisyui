@extends('dashboard.main')

@section('content')
    <h1 class="text-xl mb-4">Tambah Pelanggaran</h1>

    <form action="{{ route('violations.store') }}" method="post">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <label>
                <input type="text"
                       name="violation-name"
                       placeholder="Nama Pelanggaran"
                       class="input input-bordered input-primary w-full"/>
                <x-validation-message name="violation-name"/>
            </label>
            <label>
                <input type="number"
                       name="violation-point"
                       placeholder="Point Pelanggaran"
                       class="input input-bordered input-primary w-full"/>
                <x-validation-message name="violation-point"/>
            </label>
            <label>
                <select name="violation-type" class="select select-bordered w-full">
                    <option disabled selected>Pilih jenis pelanggaran</option>
                    @foreach($violationTypes as $key => $type)
                        <option value="{{ $key }}">{{ $type }}</option>
                    @endforeach
                </select>
                <x-validation-message name="student-class"/>
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
@endsection