<table class="table">
    <thead>
    <tr>
        <th><input type="checkbox" value="" id="checkAll" class="input-text"></th>
        <th>Tên nhóm thành viên</th>
        <th>Số thành viên</th>
        <th>Mô tả</th>
        <th>Tình trạng</th>
    </tr>
    </thead>
    <tbody>
        @if(isset($userCatalogues) && is_object($userCatalogues))
        @foreach ($userCatalogues as $userCatalogue)
            
        <tr>
            <td><input type="checkbox" value="{{$userCatalogue->id}}"  class="input-checkbox checkBoxItem"></td>
            <td>
                <div class="info-item name">
                    {{ $userCatalogue->name }}
                </div>
            </td>
            <td>
                <div class="info-item name">
                    {{$userCatalogue->users_count}} người
                </div>
            </td>
            <td>
                <div class="info-item name">
                    {{ $userCatalogue->description }}
                </div>
            </td>
            <td class="js-switch-{{$userCatalogue->id}}"> 
                <input type="checkbox" value="{{$userCatalogue->publish}}" class="js-switch status" data-modelId="{{$userCatalogue->id}}" data-field="publish" data-model="UserCatalogue" {{($userCatalogue->publish == 1) ? 'checked' : ''}}/>
            </td>
            <td class="text-center">
                <a href="{{route('user.catalogue.edit', $userCatalogue->id)}}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                <a href="{{route('user.catalogue.delete', $userCatalogue->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
    @endforeach
    @endif
    
    </tbody>
</table>

{{ $userCatalogues->links('pagination::bootstrap-4') }}



