@include('backend.dashboard.component.breadcrums', ['title' => $config['seo']['index']['title']]);


<div class="row wrapper-content">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>{{ $config['seo']['index']['table'] }}</h5>
                @include('backend.user.catalogue.component.toolbox')
            
            </div>
            <div class="ibox-content">
                @include('backend.user.catalogue.component.filter')
                @include('backend.user.catalogue.component.table')
                
                

            </div>
        </div>
    </div>
</div>


