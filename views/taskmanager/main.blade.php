<pre id='task_list'>
 
</pre>

@include("modal-button", [
    "text" => "Örnek Modal Aç",
    "class" => "btn-primary",
    "target_id" => "exampleModalWindow"
])

@component("modal-component", [
    "id" => "newFileModal",
    "title" => "Yeni dosya oluştur",
    "notSized" => true,
    "footer" => [
        "class" => "btn-success",
        'text' => "oluştur",
        "onClick" => "newFileEvent()"
    ]

    
])    
    <pre id="statusContent" style="background-color: black; border-radius: 5px; font-size: 16px; color: white;"></pre>
@endcomponent

@component("modal-component", [
    "id" => "statusModal",
    "title" => "Status",
    "notSized" => true,
])    
    <pre id="statusContent" style="background-color: black; border-radius: 5px; font-size: 16px; color: white;"></pre>
@endcomponent

@component("modal-component", [
    "id" => "fileLocationModal",
    "title" => "Dosya Konumu",
    "notSized" => true,
])    
    <div id="fileLocationContent"></div>
@endcomponent

@component("modal-component", [
    "id" => "processTreeModal",
    "title" => "İşlem Ağacı",
    "notSized" => true,
])    
    <pre id="processTreeContent" style="background-color: black; border-radius: 5px; font-size: 16px; color: white;"></pre>
@endcomponent

@component("modal-component", [
    "id" => "commandArgumentsModal",
    "title" => "Çalıştırma argümanları",
    "notSized" => true,
])    
    <pre id="commandArgumentsContent" style="background-color: black; border-radius: 5px; font-size: 16px; color: white;"></pre>
@endcomponent


@include("taskmanager.scripts")