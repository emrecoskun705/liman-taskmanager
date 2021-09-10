<script>
    function getUsername(){
        showSwal("{{__('Yükleniyor...')}}", 'info');
        let data = new FormData();
        request("{{API('get_username')}}", data, function(response){
            response = JSON.parse(response);
            $('.username').text(response.message);
            Swal.close();
        }, function(response){
            response = JSON.parse(response);
            showSwal(response.message, 'error');
        });
    }
</script>