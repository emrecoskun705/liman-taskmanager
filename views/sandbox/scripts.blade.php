<script>
    function sandbox() {
        showSwal("{{__('Yükleniyor...')}}", 'info', 2000);
    }

    function lineOnClickEvent(node) {
        // node is the selector for the row
        console.log(node)

        // example of getting id of a table element
        console.log($(node).children("#id").html())

        Swal.fire(`${$(node).children("#id").html()} idli elemente tıkladınız!`)
    }

    function exampleRightClickEvent(node) {
        // node is the selector for the row
        console.log(node)

        Swal.fire(`${$(node).children("#id").html()} idli elementin sağ klik eventine tıkladınız!`)
    }

    function modalDialogEvent() {
        $("#exampleModalWindow").modal("hide");
    }

    function treeRightClick(node) {
        //
    }

    function treeClickFunction(node) {
        //
    }
</script>