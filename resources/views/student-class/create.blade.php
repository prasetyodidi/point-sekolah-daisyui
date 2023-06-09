@extends('dashboard.main')

@section('content')
    <h1 class="text-xl mb-4">Tambah Kelas</h1>

    <form action="{{ route('student-classes.store') }}" method="post">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <label>
                <input type="text"
                       name="class_name"
                       placeholder="Nama Kelas"
                       value="{{ old('class_name') }}"
                       class="input input-bordered input-primary w-full"/>
                <x-validation-message name="class_name"/>
            </label>
            <label>
                <select name="homeroom_teacher" class="select select-bordered w-full">
                    <option disabled selected>Pilih Wali Kelas</option>
                    @foreach($teachers as $key => $teacher)
                        @if($key == old('homeroom_teacher'))
                            <option value="{{ $key }}" selected>{{ $teacher }}</option>
                        @else
                            <option value="{{ $key }}">{{ $teacher }}</option>
                        @endif
                    @endforeach
                </select>
                <x-validation-message name="homeroom_teacher"/>
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
@endsection
