<link rel="stylesheet" href="{{ url(mix('site/css/login.css'))}}">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container login-container">
    <div class="row">
        <div class="col-md-6 login-form-1">
            <h3><img src="{{url(mix('site/img/udv.png'))}}"></h3>
            <h5>“Futebol Club!”</h5>
        </div>
        <div class="col-md-6 login-form-2">
            <h3>Login</h3>
            @if($errors->all())
                @foreach($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    {{ $error }}
                </div>
                @endforeach
            @endif
            <form action="{{ route('admin.login.do') }}" method="GET">
                @csrf
                <div class="form-group">
                    <input type="email" name="email" id="email" class="form-control" placeholder="Your Email *" value="" />
                </div>
                <div class="form-group">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Your Password *" value="" />
                </div>
                <div class="form-group">
                    <input type="submit" class="btnSubmit" value="Login" />
                </div>
                <div class="form-group">
                    <a href="{{ route('register') }}" class="ForgetPwd" value="Login">Registrar-se</a>
                </div>
                <div class="form-group">
                    <a href="{{ route('password.request') }}" class="ForgetPwd" value="Login">Esqueceu a Senha?</a>
                </div>
            </form>
        </div>
    </div>
    <footer class="bg-light text-center text-lg-start">
        <div class="text-center p-3" style="background-color: #white;color:#green">
            © 2021 Copyright:
        <a  style="color: #blue" href="http://kecolima.com.br/">kecolima.com.br</a>
</div>
    </footer>
</div>


