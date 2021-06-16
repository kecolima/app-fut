<!DOCTYPE html>
<html>
    <head>
        @include('site.head')
    </head>
    @hasSection('content')
    <header>
        @include('site.header')
    </header>
    <body>
        <div class="container">
            @yield('content')
        </div>
        <div class="">

        </div>
    </body>
    <footer class="bg-light text-center text-lg-start ">
        @include('site.footer')
    </footer>
    @else
        @include('site.login')
    @endif
</html>




