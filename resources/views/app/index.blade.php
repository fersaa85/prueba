<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<script>
    var site_domine = '{{ url('/') }}';
</script>
<div class="container">

    <div class="page-header">
        <h1>Bootstrap grid examples</h1>
        <p class="lead">Basic grid layouts to get you familiar with building within the Bootstrap grid system.</p>
    </div>

    <h3>Three equal columns</h3>
    <p>Get three equal-width columns <strong>starting at desktops and scaling to large desktops</strong>. On mobile devices, tablets and below, the columns will automatically stack.</p>


    <form method="get" action="" class="" id="formSearch" >
        <div class="row">
            <div class="col-md-6">
                <label for="name">Busqueda</label>
                <input type="text" class="form-control" id="search" name="search" aria-describedby="search" placeholder="Buqueda por nombre o por ID">
            </div>
            <div class="col-md-6"></div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label for="name"></label>
                <input type="submit" class="form-control" id="submit" name="submit" value="Enviar">
            </div>
            <div class="col-md-9"></div>
        </div>
    </form>
    <br /><br /><br /><br /><br /><br />


    <div class="list">
    @foreach($user as $value)

        <div class="row">
            <div class="col-md-3">{{ $value->name }}</div>
            <div class="col-md-3">{{ $value->userinfo->bitrhday }}</div>
            <div class="col-md-3">{{ $value->userinfo->annual_income }}</div>
            <div class="col-md-3">
                <a href="{{ url("app/item/".$value->userinfo->user_id)  }}" class="btn btn-sm btn-default">Ver</a>
                <a href="{{ url("app/delete/".$value->userinfo->user_id)  }}" class="btn btn-sm btn-danger">Eliminar</a>
            </div>
        </div>
        <br />

    @endforeach
    </div>


    <br /><br /><br /><br /><br /><br />
    <h3>Nuevo registro</h3>
    <form method="post" action="" class="" id="formAdd" >

        <div class="form-group">
            <label for="name">Nombre completo</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Nombre completo">
            <small id="name" class="form-text text-muted">Nombre completo.</small>
        </div>

        <div class="form-group">
            <label for="name">Fecha de nacimeinto</label>
            <input type="text" class="form-control" id="bitrhday" name="bitrhday" aria-describedby="emailHelp" placeholder="YYYY-MM-DD">
            <small id="bitrhday" class="form-text text-muted">Fecha de nacimeinto.</small>
        </div>

        <div class="form-group">
            <label for="name">Sueldo Anual</label>
            <input type="text" class="form-control" id="annual_income" name="annual_income" aria-describedby="emailHelp" placeholder="Sueldo Anual">
            <small id="annual_income" class="form-text text-muted">Sueldo Anual.</small>
        </div>

        <div class="form-group">
            <label for="name"></label>
            <input type="submit" class="form-control" id="submit" name="submit" value="Enviar">
        </div>
    </form>


</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="assets/js/bootstrap.min.js"></script>
<script src="{{ asset('assets/js/default.js') }}"></script>
</body>
</html>