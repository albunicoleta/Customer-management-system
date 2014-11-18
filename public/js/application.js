$(document).ready(function () {
    var grid = $("#customer-grid").bootgrid({
        ajax: true,
        url: "/admin/api/customers",
        formatters: {
            "link": function (column, row)
            {
                return "<a href=\"#\">" + column.id + ": " + row.id + "</a>";
            },
            "commands": function (column, row)
            {
                return "<button type=\"button\" class=\"btn btn-xs btn-default command-edit\" data-row-firstname=\"" + row.firstname + "\" data-row-lastname=\"" + row.lastname + "\" data-row-email=\"" + row.email + "\" data-row-id=\"" + row.id + "\"><span class=\"glyphicon glyphicon-pencil\"></span></button> " +
                        "<button type=\"button\" class=\"btn btn-xs btn-default command-delete\" data-row-id=\"" + row.id + "\"><span class=\"glyphicon glyphicon-trash\"></span></button>";
            }
        }
    });
    grid.on("loaded.rs.jquery.bootgrid", function ()
    {

        grid.find(".command-edit").on("click", function (e)
        {
            // save row id
            var rowId = $(this).data('row-id');
            // open modal
            var editModal = $("#edit-customer-modal").modal();
            // put data in modal
            editModal.find("#customer-firstname").attr("value", $(this).data("row-firstname"));
            editModal.find("#customer-lastname").attr("value", $(this).data("row-lastname"));
            editModal.find("#customer-email").attr("value", $(this).data("row-email"));
            // on 'Save changes' click
            $('#edit-customer').click(function () {
                $.post('/admin/api/customer/edit/' + rowId, editModal.find('#customer-edit-modal-form').serialize());
                editModal.modal('hide');
                $('button[title="Refresh"]').trigger('click');
            });

        }).end().find(".command-delete").on("click", function (e)
        {
            var rowId = $(this).data('row-id');
            //alert("You pressed delete on row: " + $(this).data("row-id"));
            $.post('/admin/api/customer/delete/' + rowId, $(".customer-data").remove());
            $('button[title="Refresh"]').trigger('click');
        });
    });
    /* Executes after data is loaded and rendered */
    $(".command-add").on("click", function ()
    {
        var addModal = $("#add-customer-modal").modal();
        // on 'Save changes' click
        $('#add-customer').click(function () {
            $.post('/admin/api/customer/save', addModal.find('#customer-add-modal-form').serialize());
            addModal.modal('hide');
            $('button[title="Refresh"]').trigger('click');
        });

    });
    ;
});
