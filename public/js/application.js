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
                return  "<button type=\"button\" class=\"btn btn-xs btn-default command-shopping\" data-row-id=\"" + row.id + "\"><span class=\"glyphicon glyphicon-shopping-cart\"></span></button> " +
                        "<button type=\"button\" class=\"btn btn-xs btn-default command-edit\" data-row-firstname=\"" + row.firstname + "\" data-row-lastname=\"" + row.lastname + "\" data-row-email=\"" + row.email + "\" data-row-id=\"" + row.id + "\"><span class=\"glyphicon glyphicon-pencil\"></span></button> " +
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
            // add groups from db
            $.post('/admin/api/customergroups', function (data) {
                $.each(data.rows, function (index, value) {
                    editModal.find('.dropdown-menu').empty().append("<li role=\"presentation\"><a role=\"menuitem\" data-row-id=\"" + value.id + "\" tabindex=\"-1\" href=\"#\">" + value.name + "</a></li>");
                });
            });

            $( document ).on('click' , ".dropdown-menu li a", function () {
                var selText = $(this).text();
                $("#dropdownMenu1").html(selText + ' <span class="caret"></span>');
                $(".dropdown #group-id").attr('value', $(this).data('row-id'));
            });

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
        }).end().find('.command-shopping').on("click", function (e) {
            var rowId = $(this).data('row-id');
            var shoppingModal = $("#shopping-customer-modal").modal();
            // reset the list
            $("#customer-shopping-modal-list").text('');
            $.post('/admin/api/customer/' + rowId + '/products', function (data) {
                $.each(data, function (index, value) {
                    $("#customer-shopping-modal-list").append("<li> Product:" + value.name + " , Bought at :" + value.created_at + "</li>");
                });

            });
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
