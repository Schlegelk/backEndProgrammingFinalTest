@extends('layout.app')

@section('title', 'Data Kategori')

@section('content')

<div class="card shadow">
    <div class="card-header">
         <h4 class="card-title">
            Data Kategori
         </h4>
    </div>
    <div class="card-body">
        <div class="d-flex justify-content-end mb-4">
            <a href="#modal-form" data-toggle="modal" class="btn btn-primary modal-tambah">Tambah Data</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                   <th>No</th>
                   <th>Nama Kategori</th>
                   <th>Deskripsi</th>
                   <th>Gambar</th>
                   <th>Aksi</th>
                </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-form" tabindex="-1">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Kategory</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row-md-12">
                    <form class="form-kategori">
                        <div class="form-group">
                            <label for="">
                                Nama Kategori
                            </label>
                            <input type="text" class="form-control" name="nama_kategori" placeholder="Nama Kategori" required>
                        </div>
                        <div class="form-group">
                            <label for="">
                                Deskripsi
                            </label>
                            <textarea name="deksripsi" placeholder="Deskripsi" class="form-control" id="" cols="30" rows="10" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">
                                Gambar
                            </label>
                            <input type="file" class="form-control" name=gambar" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Save changes</button>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
    <script>
        $(function() {
            $.ajax({
                url: '/api/categories',
                success: function({data}) {
                    let row = '';

                    data.map(function (val, index) {
                        row += `
                        <tr>
                           <td>${index + 1}</td>
                           <td>${val.nama_kategori}</td>
                           <td>${val.deskripsi}</td>
                           <td><img src="/uploads/${val.gambar}" width="150"></td>
                           <td>
                              <a data-toggle="modal" href="#modal-form" data-id="${val.id}" class="btn btn-warning modal-ubah">Edit</a>
                              <a href="#" data-id="${val.id}" class="btn btn-danger btn-hapus">Hapus</a>
                           </td>
                        </tr>
                        `;
                    });

                    $('tbody').append(row);
                }
            });

            $(document).on('click', '.btn-hapus', function(){
                const id = $(this).data('id');
                const token = localStorage.getItems('token')

                const confirm_dialog = confirm('Apakah anda yakin?');


                if (confirm_dialog) {
                    $.ajax({
                        url : '/api/categories/' + id,
                        type : 'DELETE',
                        headers: {
                            "Authorization":  token
                        },
                        success : function(data){
                            if (data.message == 'success') {
                                alert('Data berhasil dihapus')
                                location.reload()
                            }
                        }
                    });
                }
            });

            $('.modal-tambah').click(function(){
                $('#modal-form').modal('show')

                $('.form-kategori').submit(function(e){
                    e.preventDefault()
                    const token = localStorage.getItem('token')

                    const frmdata = new FormData(this);

                   $.ajax({
                       url : 'api/categories',
                       type : 'POST',
                       data : frmdata,
                       cache: false,
                       contentType: false,
                       processData: false,
                       headers: {
                           "Authorization": token
                       },
                       success : function(data) {
                            if (data.success) {
                                alert('Data berhasil ditambah')
                                location.reload();
                            }
                       }
                   })
                });
            });

            $(document).on('click', '.modal-ubah', function(){
                $('#modal-form').modal('show')
            })

        });
    </script>
@endpush
