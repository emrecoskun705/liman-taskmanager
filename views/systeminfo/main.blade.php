<div class="row">
    <div class="col-12 mb-2">
        <b>{{ __('Sistem Bilgileri') }}</b>: 
    </div>
    <div class="col-12 system-info">
        
    </div>
    @component('modal-component',[
        "id" => "installLshw",
        "title" => "Görev İşleniyor",
    ])
    @endcomponent
</div>

@include("systeminfo.scripts")