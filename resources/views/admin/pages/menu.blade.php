@extends('admin.index')

@section('title')
    Menyu | Admin panel
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
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Menyu</a></li>
                </ol>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="card-title">Menyu</h4>
                            <button type="button" class="btn btn-primary btn-rounded mr-2" data-toggle="modal"
                                    data-target="#createModal"><span class="btn-icon-left text-primary"><i
                                        class="fa fa-plus color-info"></i></span>
                                Əlavə et
                            </button>
                        </div>
                        <div class="card-body">
                            <form action="" method="GET">
                                <div class="input-group d-flex align-items-end justify-content-end">
                                    <div class="form-item">
                                        <input id="search-input" name="search" type="search"
                                               placeholder="Axtarış et" class="form-control"/>
                                    </div>
                                    <button id="search-button" type="submit" class="btn btn-primary mb-1">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                            <div class="table-responsive">
                                <table id="example3" class="display min-w850 text-center">
                                    <thead>
                                    <tr class="text-center">
                                        <th>Menyu adı</th>
                                        <th>Tipi</th>
                                        <th>Sıra nömrəsi</th>
                                        <th>Status</th>
                                        <th>Əməliyyatlar</th>
                                    </tr>
                                    </thead>
                                    @foreach($allMenu as $menuItem)
                                        <tr id="row{{$menuItem->id}}">

                                            <td>{{$menuItem->name_az}}</td>
                                            <td>{{$menuItem->type}}</td>
                                            <td>{{$menuItem->order_number}}</td>
                                            <td class="m-auto text-center">
                                                @if($menuItem->status)
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input changeStatus"
                                                               data-id="{{$menuItem->id}}" type="checkbox"
                                                               id="flexSwitchCheckDefault" checked/>
                                                    </div>

                                                @else
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input changeStatus"
                                                               data-id="{{$menuItem->id}}" type="checkbox"
                                                               id="flexSwitchCheckDefault"/>
                                                    </div>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <a href="javascript:void(0)" data-id="{{$menuItem->id}}"
                                                       data-target="#editModal"
                                                       data-toggle="modal"
                                                       class="btn btn-primary shadow btn-xs sharp mr-1 editModal"><i
                                                            class="fa fa-pencil"></i></a>
                                                    <a data-id="{{$menuItem->id}}"
                                                       class="btn btn-danger shadow btn-xs sharp deleteItem"><i
                                                            class="fa fa-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                                <br>
                                <div
                                    class="d-flex justify-content-center">{{$allMenu->appends(request()->input())->links()}}</div>
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
                    <h5 class="modal-title" id="exampleModalLongTitle">Menyu elementi əlavə
                        et</h5>
                    <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formCreate" action="{{route('menu.store')}}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body pb-0 pt-2">
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="parentId">Əsas menyu</label>
                                    <select class="form-control default-select"
                                            name="parent_id"
                                            id="parentId">
                                        <option selected disabled>Seç</option>
                                        <option value="1">Haqqımızda</option>
                                        <option value="2">Sərnişinlər üçün</option>
                                        <option value="3">Yük daşımaları</option>
                                        <option value="4">Xidmətlər</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="orderNumber">Sıra nömrəsi</label>
                                    <input type="number" name="order_number" class="form-control"
                                           id="orderNumber" value="{{ old('order_number') }}"
                                           placeholder="Sıra nömrəsi">
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
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="type">Səhifənin tipi</label>
                                    <select class="form-control" name="type" id="type">
                                        <option value="">Sec</option>
                                        <option value="static">Static</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" name="slug" class="form-control"
                                           id="slug" placeholder="Slug" value="{{ old('slug') }}" maxlength="191">
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
                                            id="nav-{{$item->code}}" role="tabpanel"
                                            aria-labelledby="nav-{{$item->code}}-tab">
                                            <div class="form-group">
                                                <label for="name">Menyu
                                                    adı</label>
                                                <input type="text" class="form-control"
                                                       name="name_{{$item->code}}"
                                                       id="name{{$item->id}}"
                                                       placeholder="Menyu adı" value="{{ old('name_'.$item->code) }}"
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
                                <div class="form-group">
                                    <label for="parentId">Əsas menyu</label>
                                    <select class="form-control"
                                            name="parent_id"
                                            id="parentIdEdit">

                                        <option class="parentOption" value="1">Haqqımızda</option>
                                        <option class="parentOption" value="2">Sərnişinlər üçün</option>
                                        <option class="parentOption" value="3">Yük daşımaları</option>
                                        <option class="parentOption" value="4">Xidmətlər</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="orderNumberEdit">Sıra nömrəsi</label>
                                    <input type="number" name="order_number" class="form-control"
                                           id="orderNumberEdit" placeholder="Sıra nömrəsi">
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
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="typeEdit">Səhifənin tipi</label>
                                    <select class="form-control" name="type" id="typeEdit">
                                        <option value="">Sec</option>
                                        <option value="static">Static</option>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="slugEdit">Slug</label>
                                    <input type="text" name="slug" class="form-control"
                                           id="slugEdit" placeholder="Slug" maxlength="191">
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
                                                <label for="name">Menyu
                                                    adı</label>
                                                <input type="text" class="form-control"
                                                       name="name_{{$item->code}}"
                                                       id="nameEdit{{$item->id}}"
                                                       placeholder="Menyu adı" maxlength="191">
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
        $(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.changeStatus').click(function () {
                let dataID = $(this).data('id');

                $.ajax({
                    url: '{{route('menu.changeStatus')}}',
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
                let route = '{{route('menu.destroy', ['menu'=>'id'])}}';
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
                let typeEdit = $('#typeEdit');
                let orderNumberEdit = $('#orderNumberEdit');
                let slugEdit = $('#slugEdit');
                let nameAzEdit = $('#nameEdit1');
                let nameEnEdit = $('#nameEdit2');
                let nameRuEdit = $('#nameEdit3');
                let statusEdit = $('#statusEdit');
                let parentIDEdit = $('#parentIdEdit');
                let route = '{{route('menu.edit', ['menu'=>'edit'])}}';
                route = route.replace('edit', dataID);
                let routeUpdate = '{{route('menu.update', ['menu' => 'update'])}}';
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
                        var menu = response.menu;

                        nameAzEdit.val(menu[0].name_az);
                        nameEnEdit.val(menu[0].name_en);
                        nameRuEdit.val(menu[0].name_ru);
                        typeEdit.val(menu[0].type);
                        slugEdit.val(menu[0].slug);
                        orderNumberEdit.val(menu[0].order_number);
                        parentIDEdit.val(menu[0].parent_id);
                        if (menu[0].status == 1) {
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
