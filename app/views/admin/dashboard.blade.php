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
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>City</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>    
                        <td>Nicoleta</td>
                        <td>Albu</td>
                        <td>Galati</td>
                        <td>123456789</td>
                        <td>albunicoleta@gmail.com</td>
                        <td>Galati</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript" src="jquery_1.6.1.js"></script>
<script type="text/javascript">

</script>
@stop

