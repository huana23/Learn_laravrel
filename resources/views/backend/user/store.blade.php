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
    $url = ($config['method'] == 'create') ? route('user.store') : route('user.update', $user->id);
@endphp
<form action="{{ $url}}" method="post">
    @csrf
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-5">
                <div class="panel-head">
                    <div class="panel-title">Thông tin chung</div>
                    <div class="panel-description">
                        <p>Nhập thông tin người sử dụng</p>
                        <p>Lưu ý những trường hợp đánh dấu <span class="text-danger">(*)</span> là bắt buộc điền</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Thông tin chung</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row mb10">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Email
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <input type="text" name="email" value="{{old('email', ($user->email) ?? '')}}" class="form-control" placeholder="" autocomplete="off">
                                </div>
                                
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Họ tên
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <input type="text" name="name" value="{{old('name', ($user->name) ?? '')}}" class="form-control" placeholder="" autocomplete="off">
                                </div>
                                
                            </div>
                        </div>
                        <div class="row mb10">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Nhóm Thành viên
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <select name="user_catalogue_id" class="form-control setupSelect2">
                                        @php
                                            $userCatalogue = [
                                                'Chọn nhóm thành viên',
                                                'Quản trị viên',
                                                'Cộng tác viên'
                                            ]
                                            
                                        @endphp
                                        @foreach($userCatalogue as $key => $item)
                                        <option {{$key == old('user_catalogue_id', (isset($user->user_catalogue_id)) ? $user->user_catalogue_id : '') ? 'selected' : '' }} value="{{$key}}">{{$item}}</option>
                                        @endforeach
        


                                    </select>
                                </div>
                                
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Ngày sinh
                                       
                                    </label>
                                    <input type="date" name="birthday" value="{{old('birthday', (isset($user->birthday)) ? date('Y-m-d', strtotime($user->birthday)) : '')}}" class="form-control" placeholder="" autocomplete="off">
                                </div>
                                
                            </div>
                        </div>
                        @if($config['method'] == 'create')
                            <div class="row mb10">
                                <div class="col-lg-6">
                                    <div class="form-row">
                                        <label for="" class="control-label text-right">Mật khẩu
                                            <span class="text-danger">(*)</span>
                                        </label>
                                        <input type="password" name="password" value="" class="form-control" placeholder="" autocomplete="off">
                                    </div>
                                    
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-row">
                                        <label for="" class="control-label text-right">Nhập lại mật khẩu
                                            <span class="text-danger">(*)</span>
                                        </label>
                                        <input type="password" name="re_password" value="" class="form-control" placeholder="" autocomplete="off">
                                    </div>
                                    
                                </div>
                            </div>
                        @endif
                        <div class="row mb10">
                            <div class="col-lg-12">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Ảnh đại diện
                                    </label>
                                    <input type="text" name="image" value="{{old('image', ($user->image) ?? '')}}" class="form-control input-image" data-upload="Images" placeholder="" autocomplete="off">
                                </div>
                                
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-5">
                <div class="panel-head">
                    <div class="panel-title">Thông tin cư trú</div>
                    <div class="panel-description">Nhập thông tin liên hệ người sử dụng</div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Thông tin chung</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row mb10">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Thành phố
                                    </label>
                                    <select name="province_id" class="form-control setupSelect2 province location" data-target="districts">
                                        <option value="0">[Chọn Tỉnh/Thành Phố]</option>
                                        @if(isset($provinces))
                                            @foreach ($provinces as $province)
                                            <option name="" id="" @if(old('province_id') == $province->code) selected @endif value="{{$province->code}}">{{$province->name}}</option>     
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Quận/Huyện
                                    </label>
                                    <select name="district_id"  class="form-control setupSelect2 districts location" data-target="wards">
                                        <option value="0" >[Chọn Quận/Huyện]</option>
                                    </select>
                                </div>
                                
                            </div>
                        </div>
                        <div class="row mb10">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label  text-right">Phường/Xã
                                    </label>
                                    <select name="ward_id" class="form-control setupSelect2 wards">
                                        <option value="0">[Chọn Phường/Xã]</option>
                                    </select>
                                </div>
                                
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Địa chỉ
                                       
                                    </label>
                                    <input type="text" name="address" value="{{old('address', ($user->address) ?? '')}}" class="form-control" placeholder="" autocomplete="off">
                                </div>
                                
                            </div>
                        </div>
                        <div class="row mb10">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Số điện thoại
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <input type="text" name="phone" value="{{old('phone', ($user->phone) ?? '')}}" class="form-control" placeholder="" autocomplete="off">
                                </div>
                                
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Ghi chú
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <input type="text" name="description" value="{{old('description', ($user->description) ?? '')}}" class="form-control" placeholder="" autocomplete="off">
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

<script>
    var province_id = '{{ (isset($user->province_id)) ? $user->province_id : old('province_id') }}'
    var district_id = '{{ (isset($user->district_id)) ? $user->district_id : old('district_id') }}'
    var ward_id = '{{( isset($user->ward_id)) ? $user->ward_id : old('ward_id') }}'

</script>