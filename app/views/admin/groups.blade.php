@extends('layout')

@section('content')
<nav role="navigation" class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar">
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('admin/dashboard') }}">Users</a></li>
                <li class="active"><a href="{{ URL::to('admin/groups') }}">User groups</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
<div class="container jumbotron" role="main">
    <div class="page-header">
        <h1>Customer groups</h1>
    </div>
    <button type="button" class="btn-primary btn btn-default btn-lg command-add"> 
        <span class="glyphicon glyphicon-plus-sign glyphicon-align-left" aria-hidden="true"></span>
        Add new customer group
    </button>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-condensed table-hover table-striped" id="customergroups-grid">
                <thead>
                    <tr class="customergroups-data">
                        <th data-column-id="id" data-identifier="true" id="customergroups-id">ID</th>
                        <th data-column-id="name">Group name</th>
                        <th data-column-id="commands" data-formatter="commands" data-sortable="false">Commands</th
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>


<!-- Modal add-->
<div class="modal fade" id="add-customergroups-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Add customer</h4>
            </div>
            <div class="modal-body">
                <form role="form" id="customergroups-add-modal-form">
                    <div class="form-group">
                        <label for="name" class="control-label">Name:</label>
                        <input type="text" name="name" class="form-control" id="customergroups-name">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="add-customergroups">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="edit-customergroups-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit customer group</h4>
            </div>
            <div class="modal-body">
                <form role="form" id="customergroups-edit-modal-form">
                    <div class="form-group">
                        <label for="name" class="control-label">Name:</label>
                        <input type="text" name="name" class="form-control" id="customergroups-name">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="edit-customergroup">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- modal view -->
<div class="modal fade" id="view-customergroups-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">View group's customers</h4>
            </div>
            <div class="modal-body">
                <ul></ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@stop

