<script>
    function taskManager() {
        showSwal("Yükleniyor...", "info");

        let data = new FormData();
        request("{{API('task_manager_list')}}", data, function(response) {
            //response = JSON.parse(response);
            //console.log(response);
            $('#task_list').html(response).find(".table").dataTable(dataTablePresets("normal"));
            Swal.close();
        }, function (error) {

        });
    }

    function jsGetFileLocation(node) {
        $pid = $(node).find('#pid').html();
        console.log($pid);

        showSwal("Yükleniyor...", "info");

        let data = new FormData();
        data.append("pid", $pid);
        request("{{API('get_file_location')}}", data, function(response) {
            response = JSON.parse(response);
            console.log(response.message);
            $("#fileLocationModal").modal('show');
            $("#fileLocationContent").html(response.message);
            //$('#task_list').html(response).find(".table").dataTable(dataTablePresets("normal"));
            Swal.close();
        }, function (error) {

        });
    }

    function jsGetStatus(node) {

        $status =$(node).find('#service').html();

        let data = new FormData();
        data.append("service", $status);
        
        request("{{API('get_status')}}", data, function(response) {
            response = JSON.parse(response);
            //console.log(response.message);
            $("#statusModal").modal('show');
            $("#statusContent").html(response.message);
            //$('#task_list').html(response).find(".table").dataTable(dataTablePresets("normal"));
            Swal.close();
        }, function (error) {
            console.log(error);
        });
    }

    function jsProcessTree(node) {
        $pid = $(node).find('#pid').html();

        let data = new FormData();
        data.append("pid", $pid);
        
        request("{{API('get_proccess_tree')}}", data, function(response) {
            response = JSON.parse(response);
            //console.log(response.message);
            $("#processTreeModal").modal('show');
            $("#processTreeContent").html(response.message);
            //$('#task_list').html(response).find(".table").dataTable(dataTablePresets("normal"));
            Swal.close();
        }, function (error) {
            console.log(error);
        });
    }

    function jsKillAllProcess(node) {
        $service = $(node).find('#service').html();

        showSwal("Yükleniyor...", "info");

        let data = new FormData();
        data.append("service", $service);

        request("{{API('kill_all_proccess')}}", data, function(response) {
            Swal.close();
            showSwal("Başarıyla silindi", "success", 2000);
        }, function (error) {

        });
    }

    function jsKillPid(node) {
        $pid = $(node).find('#pid').html();
        //console.log($pid);

        showSwal("Yükleniyor...", "info");

        let data = new FormData();
        data.append("pid", $pid);
        request("{{API('kill_pid')}}", data, function(response) {
            Swal.close();
            showSwal("Başarıyla silindi", "success", 2000);
        }, function (error) {

        });
    }

    function jsProccessArguments(node) {
        $command = $(node).find('#command').html();

        let data = new FormData();
        data.append("command", $command);
        
        request("{{API('get_command_arguments')}}", data, function(response) {
            response = JSON.parse(response);
            //console.log(response.message);
            $("#commandArgumentsModal").modal('show');
            $("#commandArgumentsContent").html(response.message);
            //$('#task_list').html(response).find(".table").dataTable(dataTablePresets("normal"));
            Swal.close();
        }, function (error) {
            console.log(error);
        });
    }

</script>
