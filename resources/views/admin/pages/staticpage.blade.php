@extends('admin.index')

@section('title')
    {{$category[0]->name_az}} | Admin panel
@endsection

@section('css')
@endsection

@section('content')

    <div class="content-body">
        <div class="container-fluid">
            <div class="page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Statik səhifə</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">{{$category[0]->name_az}}</a></li>
                </ol>
            </div>
            @if(!empty($pages[0]))
                <form action="{{route('static-page.update', ['static_page' => $pages[0]->id, 'page'=>$_GET['page']])}}"
                      method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-xl-12 col-lg-12">
                            <div class="card">
                                <div class="card-body row">
                                    @foreach($pages as $page)
                                        <nav>
                                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                @foreach($language as $item)
                                                    <a class="nav-item nav-link {{$item->code=='az' ? 'active' : ''}}"
                                                       id="nav-{{$item->code}}-tab" data-toggle="tab"
                                                       href="#nav-{{$item->code}}"
                                                       role="tab" aria-controls="nav-{{$item->code}}"
                                                       aria-selected="true">{{$item->name}} &nbsp; &nbsp;<i
                                                            class="flag flag-{{$item->flag}}"></i></a>
                                                @endforeach
                                            </div>

                                        </nav>
                                        <div class="tab-content" id="nav-tabContent">

                                            @foreach($language as $key => $item)
                                                @php
                                                    $content = 'content_' . $item->code;
                                                @endphp
                                                <div class="tab-pane fade show {{$item->code=='az' ? 'active' : ''}}"
                                                     id="nav-{{$item->code}}" role="tabpanel"
                                                     aria-labelledby="nav-{{$item->code}}-tab">
                                                    @foreach($pages as $about)
                                                        <div class="form-group">
                                                            <label class="mt-3" for="editorEdit">Məzmun</label>
                                                            <textarea name="content_{{$item->code}}" class="editorEdit"
                                                                      id="editorEdit{{$item->id}}"
                                                                      cols="30" rows="10">{{$about->$content}}</textarea>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endforeach
                                        </div>

                                </div>
                                        <div class="form-group">
                                            <button type="submit" name="submit" value="submit"
                                                    class="btn btn-primary btn-block">Yadda
                                                saxla
                                            </button>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            @else
                <form action="{{route('static-page.store', ['page'=>$_GET['page']])}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-xl-12 col-lg-12">
                            <div class="card">
                                <div class="card-body row">
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            @foreach($language as $item)
                                                <a class="nav-item nav-link {{$item->code=='az' ? 'active' : ''}}"
                                                   id="nav-{{$item->code}}-tab" data-toggle="tab"
                                                   href="#nav-{{$item->code}}"
                                                   role="tab" aria-controls="nav-{{$item->code}}"
                                                   aria-selected="true">{{$item->name}} &nbsp; &nbsp;<i
                                                        class="flag flag-{{$item->flag}}"></i></a>
                                            @endforeach
                                        </div>

                                    </nav>
                                    <div class="tab-content" id="nav-tabContent">

                                        @foreach($language as $key => $item)
                                            <div class="tab-pane fade show {{$item->code=='az' ? 'active' : ''}}"
                                                 id="nav-{{$item->code}}" role="tabpanel"
                                                 aria-labelledby="nav-{{$item->code}}-tab">
                                                    <div class="form-group">
                                                        <label class="mt-3" for="editor">Məzmun</label>
                                                        <textarea name="content_{{$item->code}}" class="editor"
                                                                  id="editor{{$item->id}}"
                                                                  cols="30" rows="10"></textarea>
                                                    </div>
                                            </div>
                                        @endforeach
                                    </div>

                                </div>
                                    <div class="form-group">
                                        <button type="submit" name="submit" value="submit"
                                                class="btn btn-primary btn-block">Yadda
                                            saxla
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            @endif
        </div>
    </div>

@endsection

@section('js')
    <script>

        var id = 1;

        $('textarea.editorEdit').each(function () {
            CKEDITOR.replace('editorEdit' + id, {
                filebrowserUploadUrl: "{{route('static-page.upload',['_token'=>csrf_token()])}}",
                filebrowserUploadMethod: 'form'
            })
            id = id + 1;
        })

        var id = 1;

        $('textarea.editor').each(function () {
            CKEDITOR.replace('editor' + id, {
                filebrowserUploadUrl: "{{route('static-page.upload',['_token'=>csrf_token()])}}",
                filebrowserUploadMethod: 'form'
            })
            id = id + 1;
        })

        $(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    </script>
@endsection
