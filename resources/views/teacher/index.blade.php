@extends('dashboard.main')

@section('content')
    <div class="w-full">
        <div class="flex flex-row justify-between">
            <a href="#modal-import-teacher" class="btn btn-primary my-2">Impor Guru</a>
            <a href="{{ route('teacher.create')  }}" class="btn btn-primary my-2">Tambah Guru</a>
        </div>
        <div class="overflow-x-auto w-full">
            <table class="table w-full" aria-describedby="list of users">
                <thead>
                <tr>
                    <th id="no" class="z-0">No</th>
                    <th id="name">Name</th>
                    <th id="email">Username</th>
                    <th id="role">Email</th>
                    <th id="verified-at">NIP</th>
                    <th id="verified-at">Mata Pelajaran</th>
                    <th id="action"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($teachers as $key => $teacher)
                    <tr class="hover hover:cursor-pointer">
                        <th id="row-number">{{ $teachers->firstItem() + $key }}</th>
                        <td>{{ $teacher->name }}</td>
                        <td>{{ $teacher->username }}</td>
                        <td>{{ $teacher->email }}</td>
                        <td>{{ $teacher->employee_id_number }}</td>
                        <td>{{ $teacher->subject }}</td>
                        <td class="flex flex-row gap-2">
                            <a href="{{ route('teacher.edit', $teacher->id) }}"
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
                                    <form action="{{ route('teacher.destroy', $teacher->id) }}" method="post">
                                        @csrf
                                        @method('delete')

                                        <h1 class="font-bold text-xl text-center">Hapus Guru</h1>
                                        <h2 class="text-center">Apakah anda yakin menghapus data guru ini</h2>

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
            {{ $teachers->links()  }}
        </div>
    </div>

    <div class="modal" id="modal-import-teacher">
        <form action="{{ route('teachers.import') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="modal-box">
                <h1 class="font-bold text-lg mb-6">Impor Guru</h1>

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
                    <button type="submit" class="btn btn-primary">Impor</a>
                </div>
            </div>
        </form>
    </div>

@endsection
