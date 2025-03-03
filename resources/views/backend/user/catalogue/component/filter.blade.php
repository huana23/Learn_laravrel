<form action="{{route('user.catalogue.index')}}">
    <div class="filter bg-light p-3 rounded shadow-sm">
        <div class="d-flex align-items-center">
            @php
                $perpage = request('perpage') ?: old('perpage')
            @endphp
            <select name="perpage" class="form-control mr-3">
                @for($i = 20; $i < 200; $i++)
                    <option {{ ($perpage == $i) ? 'selected' : ''}} value="{{$i}}"> {{$i}} bản ghi</option>
                @endfor
            </select>
    
            <div class="d-flex align-items-center mr-3">
            
    
                
                <div class="input-group">
                    <input type="text" name="keyword" value="{{ request('keyword') ?: old('keyword')}}" placeholder="Nhập từ khoá tìm kiếm" class="form-control">
                    <span class="input-group-append">
                        <button type="submit" name="search" value="search" class="btn btn-primary btn-sm">Tìm kiếm</button>
                    </span>
                    <a href="{{route('user.catalogue.create')}}" class="btn btn-danger ml-3">
                        <i class="fa fa-plus"></i> Thêm mới nhóm thành viên
                    </a>
                </div>
            </div>
    
            
        </div>
    </div>
</form>