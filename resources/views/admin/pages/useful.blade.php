@extends('admin.index')

@section('title')
    Faydalı keçidlər | Admin panel
@endsection

@section('css')

    <link href="{{ asset('admin/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">

@endsection

@section('content')

    <div class="content-body">
        <div class="container-fluid">
            <div class="page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Siyahı</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Faydalı keçidlər</a></li>
                </ol>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="card-title">Faydalı keçidlər</h4>
                            <button type="button" class="btn btn-primary btn-rounded mr-2" data-toggle="modal"
                                    data-target="#createModal"><span class="btn-icon-left text-primary"><i
                                        class="fa fa-plus color-info"></i></span>
                                Əlavə et
                            </button>
                        </div>
                        <div class="card-body">
                            <form action="" method="GET">
                                <div class="input-group">
                                    <div class="form-item">
                                        <input id="search-input" name="search" type="search"
                                               placeholder="Axtarış et" class="form-control"
                                               style="border-top-right-radius: 0; border-bottom-right-radius: 0"/>
                                    </div>
                                    <button id="search-button" type="submit" class="btn btn-primary">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="table-responsive">
                            <table id="example3" class="display min-w850">
                                <thead>
                                <tr class="text-center">
                                    <th>Şəkil</th>
                                    <th>Link</th>
                                    <th>Status</th>
                                    <th>Əməliyyatlar</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($posts as $postItem)
                                    <tr id="row{{$postItem->id}}" class="text-center">

                                        <td class="d-flex align-items-center justify-content-center">
                                            <img class="d-block img-thumbnail" style="width: 100px"
                                                 src="{{asset('/storage/'.$postItem->image)}}" alt=""></td>
                                        <td>{{mb_substr($postItem->link, 0, 30)}}..</td>

                                        <td class="m-auto text-center">
                                            @if($postItem->status)
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input changeStatus"
                                                           data-id="{{$postItem->id}}" type="checkbox"
                                                           id="flexSwitchCheckDefault" checked/>
                                                </div>

                                            @else
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input changeStatus"
                                                           data-id="{{$postItem->id}}" type="checkbox"
                                                           id="flexSwitchCheckDefault"/>
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center justify-content-center">
                                                <a href="javascript:void(0)" data-id="{{$postItem->id}}"
                                                   data-target="#editModal"
                                                   data-toggle="modal"
                                                   class="btn btn-primary shadow btn-xs sharp mr-1 editModal"><i
                                                        class="fa fa-pencil"></i></a>
                                                <a data-id="{{$postItem->id}}"
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
                                class="d-flex justify-content-center">{{$posts->appends(request()->input())->links()}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="modal fade" id="createModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Əlavə
                        et</h5>
                    <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formCreate" action="{{route('useful.store')}}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body pb-0 pt-2">
                        <div class="form-group img-section">
                            <label for="uploadImage-create">Şəkil</label>
                            <div class="img-input d-flex justify-content-between mb-2">
                                <input id="uploadImage-create" type="file"
                                       name="image" class="form-control-file"
                                       onchange="PreviewImageCreate();">
                                <div class="delete-img c-pointer" onclick="deleteImageCreate();">
                                    <i class="fas fa-trash"></i></div>
                            </div>

                            <img class="preview-img img-thumbnail" id='previewImage-create'
                                 src="{{asset('admin/images/noPhoto.png')}}"
                                 style="width: 100%;" alt="">
                        </div>

                        <div class="form-group mt-3">
                            <label for="link">Link</label>
                            <input type="text" class="form-control"
                                   name="link"
                                   id="link"
                                   placeholder="Link" value="{{ old('link') }}"
                                   maxlength="190">
                        </div>

                        <div class="form-group row mt-4">
                            <label for="status" class="col-4">Status</label>
                            <div class="form-check form-switch col-8">
                                <input class="form-check-input"
                                       type="checkbox" checked name="status"
                                       id="status"/>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Ləğv et
                        </button>
                        <button type="submit" id="createBtn" class="btn btn-primary">Yadda
                            saxla
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Redaktə
                        et</h5>
                    <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formEdit" action="" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body pb-0 pt-2">
                        <div class="form-group img-section">
                            <label for="uploadImage">Şəkil</label>
                            <div class="img-input d-flex justify-content-between mb-2">
                                <input id="uploadImage" type="file"
                                       name="image" value="" class="form-control-file"
                                       onchange="PreviewImage();">
                                <div class="delete-img c-pointer" onclick="deleteImage();">
                                    <i class="fas fa-trash"></i></div>
                                <input id="hiddenInput" type="hidden" name="hidden" value="1">
                            </div>

                            <img class="preview-img img-thumbnail" id='previewImage'
                                 src="{{asset('admin/images/noPhoto.png')}}"
                                 style="width: 100%;" alt="">
                        </div>
                        <div class="form-group mt-3">
                            <label for="linkEdit">Link</label>
                            <input type="text" class="form-control"
                                   name="link"
                                   id="linkEdit"
                                   placeholder="Link" maxlength="190">
                        </div>
                        <div class="form-group row mt-4">
                            <label for="statusEdit" class="col-4">Status</label>
                            <div class="form-check form-switch col-8">
                                <input class="form-check-input"
                                       type="checkbox" name="status"
                                       id="statusEdit"/>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Ləğv et
                        </button>
                        <button type="submit" id="editPost" class="btn btn-primary">Yadda
                            saxla
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('js')

    <script src="{{ asset('admin/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins-init/datatables.init.js') }}"></script>

    <script>
        function PreviewImageCreate() {
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("uploadImage-create").files[0]);

            oFReader.onload = function (oFREvent) {
                document.getElementById("previewImage-create").src = oFREvent.target.result;
            };
        };

        function deleteImageCreate() {
            document.getElementById("previewImage-create").src = '{{asset('admin/images/noPhoto.png')}}';
            document.getElementById("uploadImage-create").value = '';
        }


        function PreviewImage() {
            document.getElementById('hiddenInput').value = '1';
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);
            oFReader.onload = function (oFREvent) {
                document.getElementById("previewImage").src = oFREvent.target.result;
            };
        };

        function deleteImage() {
            document.getElementById("previewImage").src = '{{asset('admin/images/noPhoto.png')}}';
            document.getElementById('hiddenInput').value = '0';
        }

        $(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.changeStatus').click(function () {
                let dataID = $(this).data('id');

                $.ajax({
                    url: '{{route('useful.changeStatus')}}',
                    method: 'POST',
                    data: {
                        id: dataID
                    },
                    async: false,
                    success: function (response) {

                    },
                    error: function () {

                    }
                })

            });

            $('.deleteItem').click(function () {
                let dataID = $(this).data('id');
                let route = '{{route('useful.destroy', ['useful'=>'id'])}}';
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
                            method: 'DELETE',
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

            $('.editModal').click(function () {
                let dataID = $(this).data('id');

                let imageEdit = $('#previewImage');
                let statusEdit = $('#statusEdit');
                let linkEdit = $('#linkEdit');

                let route = '{{route('useful.edit', ['useful'=>'edit'])}}';
                route = route.replace('edit', dataID);
                let routeUpdate = '{{route('useful.update', ['useful' => 'update'])}}';
                routeUpdate = routeUpdate.replace('update', dataID);

                $('#formEdit').attr('action', routeUpdate);

                $.ajax({
                    url: route,
                    method: 'GET',
                    data: {
                        id: dataID
                    },
                    async: false,
                    success: function (response) {

                        var post = response.post;

                        linkEdit.val(post[0].link);
                        imageEdit.attr("src", ('/storage/' + post[0].image));
                        if (post[0].status == 1) {
                            statusEdit.attr('checked', true);
                        } else {
                            statusEdit.attr('checked', false);
                        }
                    },
                    error: function () {

                    }
                })

            });
        });
    </script>


@endsection
