<script>
    function runScript() {
        showSwal("{{__('Yükleniyor...')}}", 'info');
        let data = new FormData();
        data.append("testVeri", "test verisi");
        data.append('degiskenIsmi', $(".hostname").html());
        

        request("{{ API('run_script') }}", data, function(response){
            $('#python_script').text(response);
            Swal.close();
        }, function(response){
            response = JSON.parse(response);
            showSwal(response.message, 'error');
        });
    }
</script>