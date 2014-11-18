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
                <li class="active"><a href="#">Users</a></li>
                <li><a href="#">User groups</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
<div class="container jumbotron" role="main">
    <div class="page-header">
        <h1>Users</h1>
    </div>
    <button type="button" class="btn-primary btn btn-default btn-lg command-add"> 
        <span class="glyphicon glyphicon-plus-sign glyphicon-align-left" aria-hidden="true"></span>
        Add new user
    </button>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-condensed table-hover table-striped" id="customer-grid">
                <thead>
                    <tr class="customer-data">
                        <th data-column-id="id" data-identifier="true" id="customer-id">ID</th>
                        <th data-column-id="firstname">Firstname</th>
                        <th data-column-id="lastname">Lastname</th>
                        <th data-column-id="address">Address</th>
                        <th data-column-id="phone">Phone</th>
                        <th data-column-id="email">Email</th>
                        <th data-column-id="city">City</th>
                        <th data-column-id="commands" data-formatter="commands" data-sortable="false">Commands</th
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="edit-customer-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit customer</h4>
            </div>
            <div class="modal-body">
                <form role="form" id="customer-edit-modal-form">
                    <div class="form-group">
                        <label for="fistname" class="control-label">Firstname:</label>
                        <input type="text" name="firstname" class="form-control" id="customer-firstname">
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="control-label">Lastname:</label>
                        <input type="text" name="lastname" class="form-control" id="customer-lastname">
                    </div>
                    <div class="form-group">
                        <label for="email" class="control-label">Email:</label>
                        <input type="text" name="email" class="form-control" id="customer-email">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="edit-customer">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal add-->
<div class="modal fade" id="add-customer-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Add customer</h4>
            </div>
            <div class="modal-body">
                <form role="form" id="customer-add-modal-form">
                    <div class="form-group">
                        <label for="fistname" class="control-label">Firstname:</label>
                        <input type="text" name="firstname" class="form-control" id="customer-firstname">
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="control-label">Lastname:</label>
                        <input type="text" name="lastname" class="form-control" id="customer-lastname">
                    </div>
                    <div class="form-group">
                        <label for="email" class="control-label">Address:</label>
                        <input type="text" name="address" class="form-control" id="customer-address">
                    </div>
                    <div class="form-group">
                        <label for="email" class="control-label">Phone:</label>
                        <input type="text" name="phone" class="form-control" id="customer-phone">
                    </div>
                    <div class="form-group">
                        <label for="email" class="control-label">Email:</label>
                        <input type="text" name="email" class="form-control" id="customer-email">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="add-customer">Save changes</button>
            </div>
        </div>
    </div>
</div>
@stop

