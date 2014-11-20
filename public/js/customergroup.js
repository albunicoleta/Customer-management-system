//functionality for the user groups grid
$(document).ready(function () {
    var grid = $("#customergroups-grid").bootgrid({
        ajax: true,
        url: "/admin/api/customergroups",
        formatters: {
            "link": function (column, row)
            {
                return "<a href=\"#\">" + column.id + ": " + row.id + "</a>";
            },
            "commands": function (column, row)
            {
                return  "<button type=\"button\" class=\"btn btn-xs btn-default command-edit\" data-row-id=\"" + row.id + "\" data-row-name=\"" + row.name + "\" ><span class=\"glyphicon glyphicon-pencil\"></span></button> " +
                        "<button type=\"button\" class=\"btn btn-xs btn-default command-delete\" data-row-id=\"" + row.id + "\"><span class=\"glyphicon glyphicon-trash\"></span></button> " +
                        "<button type=\"button\" class=\"btn btn-xs btn-default command-view\" data-row-id=\"" + row.id + "\"><span class=\"glyphicon glyphicon-list\"></span></button>";
            }
        }
    });
    $(".command-add").on("click", function ()
    {
        var addModal = $("#add-customergroups-modal").modal();
        // on 'Save changes' click
        $('#add-customergroups').click(function () {
            $.post('/admin/api/customergroups/save', addModal.find('#customergroups-add-modal-form').serialize());
            addModal.modal('hide');
            $('button[title="Refresh"]').trigger('click');
        });

    });
    grid.on("loaded.rs.jquery.bootgrid", function ()
    {

        grid.find(".command-edit").on("click", function (e)
        {
            // save row id
            var rowId = $(this).data('row-id');
            // open modal
            var editModal = $("#edit-customergroups-modal").modal();
            // put data in modal
            editModal.find("#customergroups-name").attr("value", $(this).data("row-name"));
            // on 'Save changes' click
            $('#edit-customergroup').click(function () {
                $.post('/admin/api/customergroups/edit/' + rowId, editModal.find('#customergroups-edit-modal-form').serialize());
                editModal.modal('hide');
                $('button[title="Refresh"]').trigger('click');
            });

        }).end().find(".command-delete").on("click", function (e)
        {
            var rowId = $(this).data('row-id');
            //alert("You pressed delete on row: " + $(this).data("row-id"));
            $.post('/admin/api/customergroups/delete/' + rowId, function (data) {
                $(".customer-data").remove();
            }).fail(function (data) {
                alert(data.responseText);
            });
            $('button[title="Refresh"]').trigger('click');
        }).end().find(".command-view").on("click", function (e)
        {
            var rowId = $(this).data('row-id');
            var viewModal = $("#view-customergroups-modal").modal();
            //alert("You pressed delete on row: " + $(this).data("row-id"));
            viewModal.find('ul').text('');
            $.post('/admin/api/customergroups/view/' + rowId, function (data) {
                $.each(data, function (index, value) {
                    viewModal.find('ul').append('<li>' + value.firstname + ' ' + value.lastname + '</li>');
                });

            });
            $('button[title="Refresh"]').trigger('click');
        });
    });
});    