@extends('dashboard.main')

@section('content')
    <div class="w-full">
        <div class="flex flex-row justify-end">
            <a href="{{ route('student-classes.create')  }}" class="btn btn-primary my-2">Tambah</a>
        </div>
        <div class="overflow-x-auto w-full">
            <table class="table w-full" aria-describedby="list of users">
                <thead>
                <tr>
                    <th id="no" class="z-0">No</th>
                    <th id="class-name">Nama Kelas</th>
                    <th id="homeroom-teacher">Wali Kelas</th>
                    <th id="action"></th>
                </tr>
                </thead>
                <tbody>
                    @foreach($studentClasses as $key => $studentClass)
                    <tr class="hover hover:cursor-pointer">
                        <th id="row-number">{{ $studentClasses->firstItem() + $key }}</th>
                        <td>{{ $studentClass->class_name }}</td>
                        <td>{{ $studentClass->homeroomTeacher->name }}</td>
                        <td class="flex flex-row gap-2">
                            <a href="{{ route('student-classes.edit', $studentClass->id) }}"
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
                                    <form action="{{ route('student-classes.destroy', $studentClass->id) }}"
                                          method="post">
                                        @csrf
                                        @method('delete')

                                        <h1 class="font-bold text-xl text-center">Hapus Kelas</h1>
                                        <h2 class="text-center">Apakah anda yakin menghapus data kelas ini</h2>

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
            {{ $studentClasses->links()  }}
        </div>
    </div>
@endsection
