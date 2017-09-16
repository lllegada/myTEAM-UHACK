<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>iSave</title>

        <!-- Fonts -->
       
        <link href="../bootstrap/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="../css/home.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="flex-center position-ref">

            <div class="content">
                <div class="title">
                    <img src="../img-uploads/login.png" alt="logo"/>
                </div>

                <h3>Log in</h3>

                <div id='loginform' class="col-sm-12">
                    

                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                            {{ csrf_field() }}


                            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                
                                    <input id="username" type="username" class="form-control" placeholder="Username" name="username" value="{{ old('username') }}" required autofocus>

                                    @if ($errors->has('username'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                    @endif
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                                    <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif

                            </div>

                            <div class="form-group">  
                                    <button type="submit" class="btn btn-green">
                                        Login
                                    </button>                               
                                    <div class="checkbox">
                                        <label>
                                            <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                        Forgot Your Password?
                                    </a>
                                        </label>
                                    </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </body>
</html>
