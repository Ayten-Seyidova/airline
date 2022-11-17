@extends('admin.index')

@section('title')
    Tənzimləmələr | Admin panel
@endsection

@section('css')

@endsection

@section('content')

    <div class="content-body">
        <div class="container-fluid">
            <div class="page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Sayt</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">tənzimləmələri</a></li>
                </ol>
            </div>
            <form action="{{route('settings.update',['setting' => 1])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @foreach($settings as $setting)
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Tənzimləmələr</h4>
                            </div>
                            <div class="card-body row">
                                <div class="col-4 form-section d-flex justify-content-between flex-column" style="margin-top: -50px">

                                        <div class="form-group mt-5">
                                            <label for="exampleFormControlInput1">Telefon</label>
                                            <input type="text" name="phone" class="form-control"
                                                   value="{{$setting->phone}}"
                                                   id="exampleFormControlInput1" maxlength="25">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput2">Faks</label>
                                            <input type="text" name="fax" class="form-control"
                                                   value="{{$setting->fax}}"
                                                   id="exampleFormControlInput2" placeholder="+994" maxlength="25">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput3">Mail</label>
                                            <input type="text" name="mail" class="form-control"
                                                   value="{{$setting->mail}}"
                                                   id="exampleFormControlInput3" maxlength="50">
                                        </div>


                                </div>
                                <div class="col-8" style="margin-top: 30px">
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
                                                $title = 'title_' . $item->code;
                                                $description = 'description_' . $item->code;
                                                $keywords = 'keywords_' . $item->code;
                                                $address = 'address_' . $item->code;
                                            @endphp
                                            <div class="tab-pane fade show {{$item->code=='az' ? 'active' : ''}}"
                                                 id="nav-{{$item->code}}" role="tabpanel"
                                                 aria-labelledby="nav-{{$item->code}}-tab">

                                                <div class="form-group mt-3">
                                                    <label for="exampleFormControlInput12">Title</label>
                                                    <input type="text" class="form-control"
                                                           name="title_{{$item->code}}"
                                                           id="exampleFormControlInput12" maxlength="191" value="{{$setting->$title}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlInput13">Description</label>
                                                    <input type="text" class="form-control"
                                                           name="description_{{$item->code}}"
                                                           id="exampleFormControlInput13"
                                                           value="{{$setting->$description}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlInput14">Keywords</label>
                                                    <input type="text" class="form-control"
                                                           name="keywords_{{$item->code}}"
                                                           id="exampleFormControlInput14" maxlength="191"
                                                           value="{{$setting->$keywords}}">
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleFormControlInput17">Adres</label>
                                                    <input type="text" class="form-control"
                                                           name="address_{{$item->code}}"
                                                           id="exampleFormControlInput17"
                                                           maxlength="191"
                                                           value="{{$setting->$address}}">
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
                @endforeach
            </form>
        </div>
    </div>

@endsection

@section('js')

@endsection
