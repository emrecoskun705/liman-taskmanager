@php
    $exampleTableData = [
        [
            "id"    => "1",
            "name"  => "Havelsan",
            "surname" => "Aciklab",
            "email" => "aciklab.org",
            "phone" => "00000000"
        ],
        [
            "id"    => "2",
            "name"  => "Havelsan",
            "surname" => "Pardus",
            "email" => "pardus.org",
            "phone" => "00000000"
        ]
    ];

    $exampleTree = [
        'DC=local' => [
            'DC=liman' => 
            [
                'OU=Domain Controllers' => [],
                'OU=Türkiye' => [
                    'OU=Ankara' => [
                        'OU=HAVELSAN' => [],
                    ],
                ],
                'CN=Users' => [],
                'CN=Builtin' => [],
                'CN=Computers' => []
            ]
        ]
    ]
@endphp

<div class="row">
    <div class="col-12">
        <h3>{{ __("Tablo Componenti") }}</h3>
        
        <!-- lineOnClickEvent ve exampleRightClickEvent scripts.blade icerisinde
             tanimlanmasi gereken javascript fonksiyonlaridir. Ornekleri
             eklenmistir. -->
        @include("table", [
            "value" => $exampleTableData,
            "title" => ["İsim", "Soyisim", "Eposta", "Telefon", "*hidden*"],
            "display" => ["name", "surname", "email", "phone", "id:id"],
            "onclick" => "lineOnClickEvent",
            "menu" => [
                "Ornek Sag Klik" => [
                    "target" => "exampleRightClickEvent",
                    "icon" => "fa-file-export"
                ],
            ]
        ])
    </div>
    <div class="col-12 mt-3">
        <h3>{{ __("Alert Componenti") }}</h3>
            
        <!-- type degiskeni Bootstrap4 alert classlarından almaktadır. Danger, primary, secondary...
             gibi secimler yapabilirsiniz. -->
        @include("alert", [
            "type" => "danger",
            "title" => "Örnek Alert",
            "message" => "Mesajınızı buraya yazabilirsiniz."
        ])
    </div>
    <div class="col-12 mt-3">
        <h3>{{ __("File input Componenti") }}</h3>
        
        <!-- id degiskeninden form request yakalayarak controlleriniz uzerinde veri islemi
             gerceklestirebilirsiniz -->
        @include("file-input", [
            "title" => "Örnek File Input",
            "id" => "example-file"            
        ])
    </div>
    <div class="col-6 mt-3">
        <h3>{{ __("Tree Componenti") }}</h3>

        <!-- data kısmından veriyi gondeririz, menu ile menu elementini tanimlar,
             click ile agactaki bir elemana tıklandıgında iterasyon fonksiyonu calistirabilirsiniz. -->
        @include("tree", [
            "id" => "example",
            "data" => $exampleTree,
            "menu" => [
                "Test" => "treeRightClick()"
            ],
            "click" => "treeClickFunction"
        ])
    </div>
    <div class="col-6 mt-3">
        <h3>{{ __("Modal Componenti") }}</h3>

        @include("modal-button", [
            "text" => "Örnek Modal Aç",
            "class" => "btn-primary",
            "target_id" => "exampleModalWindow"
        ])

        @component("modal-component", [
            "id" => "exampleModalWindow",
            "title" => "Örnek Modal",
            "notSized" => true,
            "modalDialogClasses" => "classExample",
            "footer" => [
                "class" => "btn-danger",
                "onclick" => "modalDialogEvent()",
                "text" => "What to do"
            ]
        ])    
            Bu kısıma javascript ile controllerdan view gonderebilir, istediginiz tum HTML kodlarını ekleyebilirsiniz.
        @endcomponent
    </div>
</div>

@include("sandbox.scripts")