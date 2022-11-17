@extends('admin.index')

@section('title')
    Fotoqalereya | Admin panel
@endsection

@section('css')

    <link href="{{ asset('admin/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <style>
        .dataTables_filter label {
            display: none;
        }

    </style>
@endsection

@section('content')

    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="card-title">Yeni şəkil əlavə et</h4>
                        </div>
                        <div class="card-body pt-0">
                            <div class="container">
                                <div class='content'>
                                    <div class="container section">
                                        <div class="row">
                                            <div class="col-12">
                                                <form action="{{ route('dropzonePhoto.store') }}" method="POST"
                                                      enctype="multipart/form-data" class="dropzone rounded-5" id='image-upload'>
                                                    @csrf
                                                    <div class="dz-default dz-message"><span>Şəkil əlavə etmək üçün klikləyin</span>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="card-title">Şəkillər</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example3" class="display min-w850">
                                    <thead>
                                    <tr class="text-center">
                                        <th>Şəkil</th>
                                        <th>Əməliyyatlar</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($photos as $photo)
                                        <tr id="row{{$photo->id}}">

                                            <td class="d-flex align-items-center justify-content-center">
                                                <img class="d-block img-thumbnail" style="width: 250px;"
                                                     src="{{asset('/storage/'.$photo->image)}}" alt="">
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <a data-id="{{$photo->id}}"
                                                       class="btn btn-danger shadow btn-xs sharp deleteItem"><i
                                                            class="fa fa-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <br>
                                <div
                                    class="d-flex justify-content-center">{{$photos->appends(request()->input())->links()}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

    <script src="{{ asset('admin/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins-init/datatables.init.js') }}"></script>
    <script type="text/javascript">
        Dropzone.options.imageUpload = {
            maxFilesize: 2,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            init: function () {
                this.on('queuecomplete', function () {
                    window.location.reload();
                });
            }
        };

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.deleteItem').click(function () {
            let dataID = $(this).data('id');
            let route = '{{route('dropzonePhoto.destroy', ['dropzonePhoto'=>'id'])}}';
            route = route.replace('id', dataID);
            Swal.fire({
                title: 'Xəbərdarlıq',
                text: 'Silmək istədiyinizə əminsiniz?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Bəli',
                cancelButtonText: 'Xeyr'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: route,
                        method: 'POST',
                        data: {
                            id: dataID,
                        },
                        async: false,
                        success: function (response) {
                            $('#row' + dataID).remove();

                            Swal.fire({
                                icon: 'success',
                                title: 'Xəbərdarlıq',
                                text: "Silindi",
                                confirmButtonText: 'Tamam'
                            })
                        },
                        error: function () {

                        }
                    })
                }
            })
        });
    </script>

@endsection
