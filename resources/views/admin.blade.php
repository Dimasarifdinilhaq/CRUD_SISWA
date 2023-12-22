<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container" mt-4>
        <table class="table table-primary table-striped mt-4">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Jurusan</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <button class="btn btn-primary mt-3" type="button" style="margin-right: 6px" data-bs-toggle="modal"
                    data-bs-target="#modaltambah">Tambah Data</button>
                <a href="#" class="btn btn-danger mt-3 logout">Logout</a>
                <div class="row g-3 align-items-center mt-2">
                    <div class="col-auto">
                    <form action="/admin" method="GET">
                      <input type="search" name="search" placeholder="Cari Data" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                    </form>
                    </div>
                @foreach ($siswa as $index => $item)
                    <tr>
                        <th scope="row">{{ $index + $siswa->firstItem() }}</th>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->jenis_kelamin }}</td>
                        <td>{{ $item->tanggal_lahir }}</td>
                        <td>{{ $item->kelas }}</td>
                        <td>{{ $item->jurusan }}</td>
                        <td>
                            <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                data-bs-target="#modaledit{{ $item->id }}">Edit Data</button>
                            <a href="#" class="btn btn-danger delete" data-id = "{{ $item->id }}"
                                data-nama="{{ $item->nama }}">Hapus
                                Data
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $siswa->links() }}
    </div>

    {{-- modal tambah data --}}
    <form action="/tambah" method="post">
        @csrf
        <div class="modal" tabindex="-1" id="modaltambah">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data Siswa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Siswa</label>
                                <input type="text" class="form-control" id="nama" name="nama"
                                    aria-describedby="nama">
                            </div>
                            <div class="mb-3">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label><br>
                                <select class="form-select" aria-label="Default select example"  aria-describedby="jenis_kelamin" name="jenis_kelamin">
                                    <option selected>Klik</option>
                                    <option>Laki-laki</option>
                                    <option>Perempuan</option>
                                  </select>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                                    aria-describedby="tanggal_lahir">
                            </div>
                            <div class="mb-3">
                                <label for="kelas" class="form-label">Kelas</label>
                                <input type="number" class="form-control" id="kelas" name ="kelas"
                                    aria-describedby="kelas">
                            </div>
                            <div class="mb-3">
                                <label for="jurusan" class="form-label">Jurusan</label>
                                <input type="text" class="form-control" id="jurusan" name ="jurusan"
                                    aria-describedby="jurusan">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    {{-- modal edit data --}}
    @foreach ($siswa as $item)
        <form action="edit" method="post">
            @csrf
            <div class="modal" tabindex="-1" id="modaledit{{ $item->id }}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Data Siswa</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <input type="hidden" name="id" class="form-controler" id="id"
                                    value="{{ $item->id }}">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Siswa</label>
                                    <input type="text" class="form-control" id="nama" name ="nama"
                                        aria-describedby="nama" value="{{ $item->nama }}">
                                </div>
                                <div class="mb-3">
                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label><br>
                                    <select class="form-select" aria-label="Default select example"  aria-describedby="jenis_kelamin" name="jenis_kelamin">
                                        <option selected>Klik</option>
                                        <option>Laki-laki</option>
                                        <option>Perempuan</option>
                                      </select>
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                                        aria-describedby="tanggal_lahir" value="{{ $item->tanggal_lahir }}">
                                </div>
                                <div class="mb-3">
                                    <label for="pt" class="form-label">Kelas</label>
                                    <input type="number" class="form-control" id="kelas" name ="kelas"
                                        aria-describedby="kelas" value="{{ $item->kelas }}">
                                </div>
                                <div class="mb-3">
                                    <label for="pt" class="form-label">Jurusan</label>
                                    <input type="text" class="form-control" id="jurusan" name ="jurusan"
                                        aria-describedby="jurusan" value="{{ $item->jurusan }}">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endforeach
</body>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script>
    $('.logout').click(function(){
        Swal.fire({
            title: "Yakin?",
            text: "Anda Akan Keluar Dari Halaman ini!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Iya",
            cancelButtonText: "Tidak"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = "/logout/"
            }
        });
    })


    $('.delete').click(function() {
        var siswaid = $(this).attr('data-id')
        var siswanama = $(this).attr('data-nama')
        Swal.fire({
            title: "Yakin?",
            text: "Anda Akan Menghapus Data Dengan nama " + siswanama + " !",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Iya, Hapus data!",
            cancelButtonText: "Tidak!"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = "/delete/" + siswaid + ""
            }
        });
    })
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.all.min.js"></script>

<script>
    @if (Session::has('success'))
        toastr.success("{{ Session::get('success') }}")
    @endif
</script>

</html>
