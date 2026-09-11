<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom px-5">
    <div class="col-md-3 mb-2 mb-md-0"> <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none"> photo </a> </div>
    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        @auth
        <li><a href="#" class="nav-link px-2 link-secondary">Заявки</a></li>
        <li><a href="{{ route('zayavka') }}" class="nav-link px-2" >Создать заявку</a></li>
@if(Auth::user()->role == 'admin')
        <li><a class="nav-link px-2 text-danger" href="{{ route('admin') }}">Админ панель</a></li>
        @endif
        @endauth
    </ul>
    <div class="col-md-3 text-end">
        @if(auth()->user())
        <a type="button" class="btn btn-primary" href="{{ route('logout') }}">Выход</a>
        @else
         <a type="button" class="btn btn-outline-primary me-2" href="{{ route('authPage') }}">Вход</a>
          <a type="button" class="btn btn-primary" href="{{ route('registerPage') }}">Регистрация</a>
       @endif

          
         </div>
</header>