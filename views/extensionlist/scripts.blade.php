<script>
    function extensionList() {
        showSwal("Yükleniyor...", "info");

        let data = new FormData();
        request("{{API('extension_list')}}", data, function(response) {
            //response = JSON.parse(response);
            //console.log(response);
            $('#extension_file_list').html(response).find(".table").dataTable(dataTablePresets("normal"));
            Swal.close();
        }, function (error) {

        });
    }

    function jsRemoveFile(node) {
        $name = $(node).find('#name').html();
        console.log($name);
        showSwal("Yükleniyor...", "info");
        let data = new FormData();
        data.append("name", $name);

        request("{{API('delete_file')}}", data, function(response) {
            console.log(response);
            Swal.close();
            showSwal("Başarıyla silindi", "success", 2000);
            extensionList();
        }, function (error) {

        });
    }
</script>