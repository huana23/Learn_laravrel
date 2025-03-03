@include('backend.dashboard.component.breadcrums',['title' => $config['seo']['create']['title']])

<form action="{{route('user.destroy', $user->id)}}" method="post">
    @csrf
    @method('DELETE')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-5">
                <div class="panel-head">
                    <div class="panel-title">Thông tin chung</div>
                    <div class="panel-description">
                        <p>Bạn muốn xoá thành viên có email là : {{$user->email}}</p>
                        <p>Lưu ý không thể khôi phục lại thành viên sau khi xoá</p>
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
                                    <input type="text" name="email" readonly value="{{old('email', ($user->email) ?? '')}}" class="form-control" placeholder="" autocomplete="off">                            
                                </div>
                                
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Họ tên
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <input type="text" name="name" readonly value="{{old('name', ($user->name) ?? '')}}" class="form-control" placeholder="" autocomplete="off">
                                </div>
                                
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="text-right">
            <button class="btn btn-danger" type="submit" name="send" value="send">Xoá</button>
        </div>
    </div>
</form>

