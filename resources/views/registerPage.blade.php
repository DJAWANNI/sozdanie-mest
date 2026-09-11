<x-head />

<body>
    <x-header />
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
            <form class="" action="{{ route('register') }}" method="post">@csrf
                photo
                <h1 class="h3 mb-3 fw-normal">Зарегестрироваться</h1>
                <div class="form-floating pb-3"> <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com"> <label for="floatingInput">Email</label>
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                 <div class="form-floating pb-3"> <input name="name" type="text" class="form-control" id="floatingName" placeholder="ФИО"> <label for="floatingName">ФИО</label>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-floating pb-3"> <input class="form-control" id="floatingLogin" name="login" placeholder="Логин"> <label for="floatingLogin">Логин</label>
                    @error('login')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-floating pb-3"> <input class="form-control" id="floatingNumber" name="number" placeholder="Телефон"> <label for="floatingNumber">Телефон</label>
                    @error('number')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-floating pb-3"> <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Пароль"> <label for="floatingPassword">Пароль</label>
                    @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button class="btn btn-primary w-100 py-2" type="submit">Регистрация</button>
            </form>
        </div>
    </div>
</div>
   <x-scripts />
</body>

</html>