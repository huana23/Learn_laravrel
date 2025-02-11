<div class="filter bg-light p-3 rounded shadow-sm">
    <div class="d-flex align-items-center">
        
        <select name="perpage" class="form-control mr-3">
            @for($i = 20; $i < 200; $i++)
                <option value="{{$i}}"> {{$i}} bản ghi</option>
            @endfor
        </select>

        <div class="d-flex align-items-center mr-3">
            
            <select name="user_catalogue_id" class="form-control mr-3">
                <option value="0" selected="selected">Chọn nhóm thành viên</option>
                <option value="1">Quản trị viên</option>
            </select>

            
            <div class="input-group">
                <input type="text" name="keyword" value="" placeholder="Nhập từ khoá tìm kiếm" class="form-control">
                <span class="input-group-append">
                    <button type="submit" name="search" value="search" class="btn btn-primary btn-sm">Tìm kiếm</button>
                </span>
                <a href="" class="btn btn-danger ml-3">
                    <i class="fa fa-plus"></i> Thêm mới thành viên
                </a>
            </div>
        </div>

        
    </div>
</div>