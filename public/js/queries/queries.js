$( document ).ready(function () {
    $.ajaxSetup({
      headers: { 'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content') }
    });
    var url_to_add = $('#queries_add_url').val();
    var url_to_queries_list = $('#queries_list_url').val();
    var url_to_view = $('#view_url').val();
    var tables = $('#queries_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: url_to_queries_list,
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            // {data: 'id', name: 'id'},
            {data: 'customer_name', name: 'customer_name'},
            {data: 'name', name: 'name'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    $('#queriesform').submit(function(event){
        event.preventDefault();
        var $form = $('#queriesform');
        var url = url_to_add;
        var data =$form.serialize();
        Commonajax(data, url).done(function(data) {
            swal("", data.msg, (data.status == 'success' ? 'success' : 'error'));
                if(data.status == 'success' ){
                    $("#queriesform")[0].reset();
                    tables.ajax.reload();
                }
        }); 
    });

    $(document).on('click', '.queries_view', function() {
        var id = $(this).attr('data-id');
        var url = url_to_view;
        var data = { id: id};
        Commonajax(data, url).done(function(data) {
            $("#exampleModalLong .modal-body").text(data.description);
            $("#exampleModalLong").modal("show");
        });
    });

    function Commonajax(data, url) {
        let jqXHR = $.ajax({
            type: 'POST',
            url: url,
            data: data,
            cache: false,
            beforeSend: function() {
            },
            success: function(data) {
            },
            complete: function() {
            },
            error: function(xhr) {
                alertmessage("danger", "Error occured.please try again", "danger"); return false;
            }
        });
        return jqXHR;
    }
});
  