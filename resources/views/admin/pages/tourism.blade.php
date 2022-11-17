@extends('admin.index')

@section('title')
    Naxçıvan turizm | Admin panel
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
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Naxçıvan turizm</a></li>
                </ol>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="card-title">Naxçıvan turizm</h4>
                            <button type="button" class="btn btn-primary btn-rounded mr-2" data-toggle="modal"
                                    data-target="#createModal"><span class="btn-icon-left text-primary"><i
                                        class="fa fa-plus color-info"></i></span>
                                Əlavə et
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <form method="get" class="d-flex" action=""
                                      style="width: 300px;">
                                    <select class="form-control default-select" name="category"
                                            id="searchOption">
                                        <option value="" disabled selected>Kateqoriya seçin</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name_az}}</option>
                                        @endforeach
                                    </select>
                                    <div class="input-group-btn">
                                        <button id="searchBtn" class="btn btn-default" type="submit"><i
                                                class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </form>
                                <form action="" method="GET">
                                    <div class="input-group">
                                        <div class="form-item">
                                            <input id="search-input" name="search" type="search"
                                                   placeholder="Axtarış et" class="form-control" style="border-top-right-radius: 0; border-bottom-right-radius: 0"/>
                                        </div>
                                        <button id="search-button" type="submit" class="btn btn-primary">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="table-responsive">
                                <table id="example3" class="display min-w850 text-center">
                                    <thead>
                                    <tr class="text-center">
                                        <th>Şəkil</th>
                                        <th>Başlıq</th>
                                        <th>Kateqoriya</th>
                                        <th>Status</th>
                                        <th>Əməliyyatlar</th>
                                    </tr>
                                    </thead>
                                    @foreach($posts as $post)
                                        <tr id="row{{$post->id}}">
                                            <td class="d-flex align-items-center justify-content-center">
                                                <img class="d-block img-thumbnail" style="width: 100px"
                                                     src="{{asset('/storage/'.$post->image)}}" alt=""></td>
                                            <td>{{$post->title_az}}</td>
                                            <td>{{$post->category[0]->name_az}}</td>
                                            <td class="m-auto text-center">
                                                @if($post->status)
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input changeStatus"
                                                               data-id="{{$post->id}}" type="checkbox"
                                                               id="flexSwitchCheckDefault" checked/>
                                                    </div>

                                                @else
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input changeStatus"
                                                               data-id="{{$post->id}}" type="checkbox"
                                                               id="flexSwitchCheckDefault"/>
                                                    </div>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <a href="javascript:void(0)" data-id="{{$post->id}}"
                                                       data-target="#editModal"
                                                       data-toggle="modal"
                                                       class="btn btn-primary shadow btn-xs sharp mr-1 editModal"><i
                                                            class="fa fa-pencil"></i></a>
                                                    <a data-id="{{$post->id}}"
                                                       class="btn btn-danger shadow btn-xs sharp deleteItem"><i
                                                            class="fa fa-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
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
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Əlavə
                        et</h5>
                    <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formCreate" action="{{route('tourism.store')}}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body pb-0 pt-2">
                        <div class="row">
                            <div class="col-3">
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
                            </div>
                            <div class="col-3" style="margin-top: 35px;">
                                <div class="form-group">
                                    <label for="name">Link</label>
                                    <input type="text" class="form-control"
                                           name="link"
                                           id="link"
                                           placeholder="Link" value="{{ old('link') }}"
                                           maxlength="191">
                                </div>
                                <div class="form-group">
                                    <label for="categoryId">Kateqoriya</label>
                                    <select class="form-control default-select"
                                            name="category_id"
                                            id="categoryId">
                                        @foreach($categories as $category)
                                            <option
                                                value="{{$category->id}}">{{$category->name_az}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label for="status" class="col-4">Status</label>
                                    <div class="form-check form-switch col-8">
                                        <input class="form-check-input"
                                               type="checkbox" checked name="status"
                                               id="status"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6" style="margin-top: 35px">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        @foreach($lang as $item)
                                            <a class="nav-item nav-link {{$item->code=='az' ? 'active' : ''}}"
                                               id="nav-{{$item->code}}-tab" data-toggle="tab"
                                               href="#nav-{{$item->code}}"
                                               role="tab" aria-controls="nav-{{$item->code}}"
                                               aria-selected="true">{{$item->name}} &nbsp;
                                                &nbsp;<i class="flag flag-{{$item->flag}}"></i></a>
                                        @endforeach
                                    </div>
                                </nav>
                                <br>
                                <div class="tab-content" id="nav-tabContent">
                                    @foreach($lang as $item)
                                        <div
                                            class="tab-pane fade show {{$item->code=='az' ? 'active' : ''}}"
                                            id="nav-{{$item->code}}" role="tabpanel"
                                            aria-labelledby="nav-{{$item->code}}-tab">
                                            <div class="form-group">
                                                <label for="name">Başlıq</label>
                                                <input type="text" class="form-control"
                                                       name="title_{{$item->code}}"
                                                       id="title{{$item->id}}"
                                                       placeholder="Başlıq" value="{{ old('title_'.$item->code) }}"
                                                       maxlength="191">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
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
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Menyunu redaktə
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
                        <div class="row">
                            <div class="col-3">
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
                            </div>
                            <div class="col-3" style="margin-top: 35px">
                                <div class="form-group">
                                    <label for="linkEdit">Link</label>
                                    <input type="text" name="link" class="form-control"
                                           id="linkEdit" placeholder="Link" maxlength="191">
                                </div>
                                <div class="form-group">
                                    <label for="categoryIdEdit">Kateqoriya</label>
                                    <select class="form-control"
                                            name="category_id"
                                            id="categoryIdEdit">
                                        @foreach($categories as $category)
                                            <option class="categoryOption"
                                                    value="{{$category->id}}">{{$category->name_az}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label for="statusEdit" class="col-4">Status</label>
                                    <div class="form-check form-switch col-8">
                                        <input class="form-check-input"
                                               type="checkbox" name="status"
                                               id="statusEdit"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6" style="margin-top: 35px">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        @foreach($lang as $item)
                                            <a class="nav-item nav-link {{$item->code=='az' ? 'active' : ''}}"
                                               id="nav-{{$item->code}}-tab" data-toggle="tab"
                                               href="#nav-edit-{{$item->code}}"
                                               role="tab" aria-controls="nav-{{$item->code}}"
                                               aria-selected="true">{{$item->name}} &nbsp;
                                                &nbsp;<i
                                                    class="flag flag-{{$item->flag}}"></i></a>
                                        @endforeach
                                    </div>
                                </nav>
                                <br>
                                <div class="tab-content" id="nav-tabContent">
                                    @foreach($lang as $item)
                                        <div
                                            class="tab-pane fade show {{$item->code=='az' ? 'active' : ''}}"
                                            id="nav-edit-{{$item->code}}" role="tabpanel"
                                            aria-labelledby="nav-{{$item->code}}-tab">
                                            <div class="form-group">
                                                <label for="name">Başlıq</label>
                                                <input type="text" class="form-control"
                                                       name="title_{{$item->code}}"
                                                       id="titleEdit{{$item->id}}"
                                                       placeholder="Başlıq" maxlength="191">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Ləğv et
                        </button>
                        <button type="submit" id="editMenu" class="btn btn-primary">Yadda
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
                    url: '{{route('tourism.changeStatus')}}',
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
                let route = '{{route('tourism.destroy', ['tourism'=>'id'])}}';
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

                let linkEdit = $('#linkEdit');
                let titleAzEdit = $('#titleEdit1');
                let titleEnEdit = $('#titleEdit2');
                let titleRuEdit = $('#titleEdit3');
                let statusEdit = $('#statusEdit');
                let categoryIdEdit = $('#categoryIdEdit');
                let imageEdit = $('#previewImage');

                let route = '{{route('tourism.edit', ['tourism'=>'edit'])}}';
                route = route.replace('edit', dataID);
                let routeUpdate = '{{route('tourism.update', ['tourism' => 'update'])}}';
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

                        titleAzEdit.val(post.title_az);
                        titleEnEdit.val(post.title_en);
                        titleRuEdit.val(post.title_ru);
                        linkEdit.val(post.link);
                        categoryIdEdit.val(post.category_id);
                        imageEdit.attr("src", ('/storage/' + post.image));

                        if (post.status == 1) {
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
