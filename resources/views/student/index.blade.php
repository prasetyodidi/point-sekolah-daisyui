@extends('dashboard.main')

@section('content')
    <div class="w-full">
        <div class="flex flex-row justify-between">
            <a href="#modal-import-student" class="btn btn-primary my-2">Impor Siswa</a>
            <a href="{{ route('students.create')  }}" class="btn btn-primary my-2">Tambah Siswa</a>
        </div>
        <div class="overflow-x-auto w-full">
            <table class="table w-full" aria-describedby="list of users">
                <thead>
                <tr>
                    <th id="no" class="z-0">No</th>
                    <th id="name">Name</th>
                    <th id="email">Kelas</th>
                    <th id="role">Jenis Kelamin</th>
                    <th id="verified-at">Alamat</th>
                    <th id="action"></th>
                </tr>
                </thead>
                <tbody>
                    @foreach($students as $key => $student)
                    <tr class="hover hover:cursor-pointer">
                        <th id="row-number">{{ $students->firstItem() + $key }}</th>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->studentClass->class_name }}</td>
                        <td>{{ $student->gender }}</td>
                        <td>{{ $student->address }}</td>
                        <td class="flex flex-row gap-2 h-full">
                            <a href="{{ route('students.edit', $student->id) }}"
                               class="flex flex-row items-center gap-1 hover:link text-orange-600 text-sm py-1">
                                <x-heroicon-o-pencil class="h-4 w-4 "/>
                                ubah
                            </a>
                            <a href="#modal-delete-{{ $loop->iteration }}"
                               class="flex flex-row items-center gap-1 hover:link text-red-600 text-sm py-1">
                                <x-heroicon-o-trash class="h-4 w-4 "/>
                                hapus
                            </a>

                            <div class="modal" id="modal-delete-{{ $loop->iteration }}">
                                <div class="modal-box w-5/12 max-w-5xl">
                                    <form action="{{ route('students.destroy', $student->id) }}" method="post">
                                        @csrf
                                        @method('delete')

                                        <h1 class="font-bold text-xl text-center">Hapus Siswa</h1>
                                        <h2 class="text-center">Apakah anda yakin menghapus data siswa ini</h2>

                                        <div class="modal-action flex flex-row justify-between mt-8">
                                            <a href="#" class="btn">Tutup</a>
                                            <button type="submit" class="btn btn-error">Hapus</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $students->links()  }}
        </div>
    </div>

    <div class="modal" id="modal-import-student">
        <form action="{{ route('students.import') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="modal-box">
                <h1 class="font-bold text-lg mb-6">Impor Siswa</h1>

                <div class="form-control w-full max-w-xs">
                    <input type="file"
                           name="excel-file"
                           id="excel-file"
                           class="file-input file-input-bordered w-full max-w-xs"/>
                    <label class="label">
                        <x-validation-message name="excel-file"/>
                    </label>
                </div>

                <div class="modal-action flex flex-row justify-between">
                    <a href="#" class="btn">Tutup</a>
                    <button type="submit" class="btn btn-primary">Impor</button>
                </div>
            </div>
        </form>
    </div>

@endsection
