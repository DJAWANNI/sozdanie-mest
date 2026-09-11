<x-head />

<body>
    <x-header />

  
    @if(auth()->user())
        @isset($zayavki)
    @foreach ($zayavki as $zayavk)
      <div class="card" style="width: 18rem;">
  <img src="{{ $zayavk->place->image }}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"> {{ $zayavk->place->name }}</h5>
    <span class="badge text-bg-secondary">{{ $zayavk->pay=='nal'? 'Наличные':'Безналичные'}}</span>
    <span class="badge text-bg-secondary">  {{ $zayavk->data }}</span>
    <p class="card-text">  {{ $zayavk->place->opisanie }}</p>
     <div class="mb-3">
        <form action="{{ route('placeCreate') }}" method="post">@csrf
    <label for="exampleInputEmail1" class="form-label">Коментарий</label>
    <input type="email" class="form-control mb-2" id="exampleInputEmail1" aria-describedby="emailHelp ">
        <a href="#" class="btn mb-2 btn-primary">Добавить</a>
        </form>
        
        <!-- коменты нужно условие -->
         <div class="accordion" id="accordionExample">
 <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#{{ $zayavk->id }}" aria-expanded="false" aria-controls="{{ $zayavk->id }}">
        Коментарии
      </button>
    </h2>
    <div id="{{ $zayavk->id }}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <!-- сюда надо будет выписывать коментари -->
        {{ $zayavk->place->opisanie }}
      </div>
    </div>
  </div>
  </div>


  </div>
  

  </div>
</div>
    @endforeach
    @endisset
    @else
Eror

    @endif


    <x-scripts />
</body>

</html>