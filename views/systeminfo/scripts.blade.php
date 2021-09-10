<script>
    function getSystemInfo(){
        showSwal("{{__('Yükleniyor...')}}", 'info');
        let data = new FormData();
        request("{{API('get_system_info')}}", data, function(response) {
            response = JSON.parse(response);
            $('.system-info').html(response.message);
            Swal.close();
        }, function(error) {
            response = JSON.parse(error);
            if(response.status == 404) {
                $('.system-info').html(`
                    @include("alert", [
                        "type" => "danger",
                        "title" => "Hata",
                        "message" => "lshw paketini kurmanız gerekmektedir. apt install lshw yazarak kurabilirsiniz."
                    ])
                    <div class="col-12">
                        <button class="btn btn-primary" onclick="installLshw()"><i class="fas fa-check-circle"></i> {{ __("Lshw Kurulumu Yap") }}</button>
                    </div>
                `);
                Swal.close();
            } else {
                showSwal(response.message, 'error');
            }
        });
    }

    function installLshw() {
        showSwal('{{__("Yükleniyor...")}}','info',2000);
        request(API('install_lshw'), new FormData(), function (response) {
            let output = JSON.parse(response).message;
            $("#install").attr("disabled","true");
            $('#installLshw').modal({backdrop: 'static', keyboard: false})
            $('#installLshw').find('.modal-body').html(output);
            $('#installLshw').modal("show"); 
            $('#installLshw').find(".close").on("click", function (e) {
                e.preventDefault();
                e.stopPropagation();
                setTimeout(() => {
                    location.reload();
                }, 1000);
            })
        }, function(response){
            let error = JSON.parse(response).message;
            showSwal(error,'error',2000);
        })
    }
</script>