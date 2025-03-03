@include('backend.dashboard.component.breadcrums',['title' => $config['seo']['create']['title']])
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@php
    $url = ($config['method'] == 'create') ? route('user.catalogue.store') : route('user.catalogue.update', $userCatalogue->id);
@endphp
<form action="{{ $url}}" method="post">
    @csrf
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-5">
                <div class="panel-head">
                    <div class="panel-title">Thông tin nhóm</div>
                    <div class="panel-description">
                        <p>Nhập thông tin nhóm sử dụng</p>
                        <p>Lưu ý những trường hợp đánh dấu <span class="text-danger">(*)</span> là bắt buộc điền</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Thông tin nhóm</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row mb10">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Tên Nhóm
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <input type="text" name="name" value="{{old('name', ($userCatalogue->name) ?? '')}}" class="form-control" placeholder="" autocomplete="off">
                                </div>
                                
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Ghi chú
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <input type="text" name="description" value="{{old('description', ($userCatalogue->description) ?? '')}}" class="form-control" placeholder="" autocomplete="off">
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-right">
            <button class="btn btn-primary" type="submit" name="send" value="send">Lưu lại</button>
        </div>
    </div>
</form>

