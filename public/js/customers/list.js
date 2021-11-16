$(document).ready(function() { 
    $.ajaxSetup({
      headers: { 'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content') }
    });
    $(".select2").select2();
    var url_to_view = $('#customers_view_url').val();
    var url_to_delete = $('#customers_delete_url').val();
    var gender_fltr;
    var search_zipcode_value;
    var customers_tables = $('#myTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: url_to_view,
            type: 'post',
            data: function (d) {
                d.gender_fltr = $.trim(gender_fltr),
                d.search_zipcode_value = $.trim(search_zipcode_value)
            },
            "dataSrc": function(res){
                var count = res.data.length;
                $(".count_val").text(count);
                return res.data;
            }
        },
        columns: [
              // {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'fname', name: 'fname'},
            {data: 'email', name: 'email'},
            {data: 'phone', name: 'phone'},
            {data: 'gender', name: 'gender'},
            {data: 'zipcode', name: 'zipcode'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    $(document).on("click", ".single_delete", function() { 
        var id = $(this).attr('data-id');
        var customers = $(this).attr('data-customers');
        var url = url_to_delete;
        var data = { id: id};
        swal({
            title: "Are you sure?",
            text: "But you will still be able to retrieve this file.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel please!",
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function(isConfirm){
            if (isConfirm) {   // submitting the form when user press yes 
                Commonajax(data, url).done(function(data) {
                    if(data.status == 'success'){
                        customers_tables.ajax.reload();
                        swal("Deleted!", data.msg, "success");
                    }
                });
            } else {
                swal("Cancelled", "Your details is safe :)", "error");
            }
        });
    });

    $(document).on('change', '#gender_fltr', function() {
        gender_fltr = $(this).val();
        customers_tables.ajax.reload();
    });

    $(document).on('keyup', '#srch_zipcode', function() {
        search_zipcode_value = $(this).val();
        customers_tables.ajax.reload();
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
                swal("", 'Something went wrong. Please try again.', "Error"); return false;
            }
        });
        return jqXHR;
    }
});