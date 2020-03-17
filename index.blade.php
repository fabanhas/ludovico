@extends(engine_view('base'))
@section('conteudo')
@section('title', 'Home')


    <section class="banner">
        <div class="container px-4 px-md-0">
            <div class="row">
                <div class="col-md-6 col-9">
                    <img src="{{ path('logo.png') }}" alt="" class="img-fluid">
                </div>
                <div class="col-md-6 d-flex" data-aos="fade-left">
                    <a href="javascript:;" class="associe-se">Associe-se</a>
                    @if(null !== $planos->collection)
                        @foreach($planos->collection as $plano)
                            @if($plano->description == "Plano Mensal")
                                <div class="plano-mensal" onclick="window.location.href='/checkout/cart/plan/add/{{ $plano->id }}?redirect_to=checkout/cart'">
                            @else
                                <div class="plano-anual" onclick="window.location.href='/checkout/cart/plan/add/{{ $plano->id }}?redirect_to=checkout/cart'">
                            @endif
                                    <h2>{{ $plano->description }}</h2>
                                    <h3>R$ {{ number_format($plano->amount, 2, ',', '.') }}</h3>
                                    <small>+ taxa de entrega</small>
                                </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
    
    
    <section class="py-5 o-que-e" id="quem">
        <div class="container px-5 px-md-0"> 
            <h2 class="icon-right" data-aos="fade">Quem é ludovico?</h2>
            <div class="row pl-md-5">
                <div class="col-md-6" data-aos="fade-left" data-aos-delay="300">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro hic iusto quis est eum. Rem, porro. Distinctio expedita, architecto voluptates dolor, alias nisi commodi aperiam voluptatibus enim autem, voluptate quos.</p>
                </div>
                <div class="col-md-6" data-aos="fade-right" data-aos-delay="300">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro hic iusto quis est eum. Rem, porro. Distinctio expedita, architecto voluptates dolor, alias nisi commodi aperiam voluptatibus enim autem, voluptate quos.</p>
                </div>
            </div>
            
                
        </div>
    </section>


    <section class="py-4 como-funciona" id="como">
        <div class="container px-5 px-md-0">
            <h2 class="icon-right" data-aos="fade">Como funciona?</h2>
            <div class="row pl-md-5">
                @if($comofunciona->records->count() > 0)
                    @foreach($comofunciona->records as $como)
                        <div class="col-md-4 px-md-5">
                            <div class="flex">
                                @if($como->imagem != null)
                                    <div class="img-how">
                                        <img class="img-fluid" src="{{ $como->imagem->values->first()->source }}" alt="">
                                    </div>
                                @endif
                                @if($como->titulo != null)
                                <h2 class="text-center">{{ $como->titulo->values->first()->value }}</h2>
                                @endif
                            </div>
                            @if($como->como_funciona != null)
                            <p>{{ $como->como_funciona->values->first()->value }}</p>
                            @endif
                        </div>    
                    @endforeach
                @endif     
            </div>
            <hr class="pl-md-5">
            <div class="row pl-md-5">
                <div class="col-md-6">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti nam optio eveniet, veniam repellat soluta dignissimos mollitia est impedit architecto ab minima dolore, suscipit omnis dolor pariatur? Officia, ex odit!</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae reiciendis iste deleniti sit, voluptates, totam consectetur vero quibusdam tempore facere aperiam, nulla neque consequatur voluptatem hic corporis vel libero optio.</p>
                </div>
                <div class="col-md-6">
                    <img class="img-fluid" src="{{ path('grafico.png')}}" alt="">
                </div>
            </div>
        </div>
    </section>

    <section class="melhor-conteudo py-5">
        <div class="container px-5 px-md-0">
            <h2 class="icon-right" data-aos="fade">O melhor conteúdo!</h2>
            <div class="row pl-md-5">
                <div class="col-md-6">
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Alias perferendis, assumenda quos est iusto provident exercitationem repellendus ab! Quae natus explicabo laboriosam suscipit eaque quas totam voluptatibus similique vitae molestias.</p>
                </div>
                <div class="col-md-6">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quam temporibus inventore, sequi libero alias, rem maxime perferendis reprehenderit quis cum debitis ipsa soluta, quos aperiam nostrum quisquam hic culpa asperiores?</p>
                </div>

                <img src="assets/img/kit.png" alt="" class="img-fluid">
            </div>
        </div>
    </section>

@if($curadores->records->count() > 0)
    <section class="curadores py-4" id="curadores">
        <div class="container px-5 px-md-0">
            <h2 class="icon-right" data-aos="fade">Patronos e curadores</h2>
            
            <div class="row">
                @foreach($curadores->records as $cura)
                    @if($cura->foto !=  null)
                    <div class="col-md-4 mb-4 cura-img grayscale" target="#cura1">
                        <img src="{{ $cura->foto->values->first()->source }}" alt="{{ $cura->nome->values->first()->value }}" class="img-fluid">
                    </div>
                    @endif

                    
                    <div class="curador" id="cura1">
                        <div class="content">
                            @if($cura->nome !=  null)
                                <h2>{{ $cura->nome->values->first()->value }}</h2>
                            @endif
                            @if($cura->descricao !=  null)
                                <p>{!! $cura->descricao->values->first()->value !!}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
                
            </div>
        </div>
    </section>
@endif

@if($citacoes->records->count() > 0)
    <section class="citacoes">
        <div class="container">
            <div class="slider-citacoes">
                @foreach($citacoes->records as $slider)
                <div class="slider-item">
                    @if($slider->citacao !=  null)
                        <p>{{ $slider->citacao->values->first()->value }}</p>
                    @endif
                    @if($slider->autor !=  null)
                        <p class="autor">{{ $slider->autor->values->first()->value }}</p>
                    @endif
                </div>
                @endforeach
            </div>  
        </div>
    </section>
@endif


    <section class="planos" id="planos">
        <div class="container">
            <div class="row py-5">
                @if(null !== $planos->collection)
                    @foreach($planos->collection as $plano)
                        @if($plano->description == "Plano Mensal")
                            <div class="col-md-4">
                                <div class="plano-mensal" onclick="window.location.href='/checkout/cart/plan/add/{{ $plano->id }}?redirect_to=checkout/cart'">
                                    <h2>{{ $plano->description }}</h2>
                                    <h3>R$ {{ number_format($plano->amount, 2, ',', '.') }}</h3>
                                    <p></p>
                                    <small>+ taxa de entrega</small>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
        
                <div class="col-md-4 text-center">
                    <h2 class="yellow">
                        ASSINE
                        AGORA
                    </h2>
                </div>

                @if(null !== $planos->collection)
                    @foreach($planos->collection as $plano)
                        @if($plano->description == "Plano Anual")
                            <div class="col-md-4">
                                <div class="plano-anual" onclick="window.location.href='/checkout/cart/plan/add/{{ $plano->id }}?redirect_to=checkout/cart'">
                                    <h2>{{ $plano->description }}</h2>
                                    <h3>R$ {{ number_format($plano->amount, 2, ',', '.') }}</h3>
                                    @if($plano->extraFields->has('descricao_plano'))
                                    <p>{{ $plano->extraFields->get('descricao_plano')->values->first()->value }}</p>
                                    @endif
                                    <small>+ taxa de entrega</small>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
                
            </div>
        </div>
    </section>


    <section class="news">
        <div class="container px-5 px-md-0">
            <div class="row pt-4">
                <div class="col-md-4 text-right">
                    <h2 data-aos="fade">Saiba mais sobre os<br> nossos lançamentos</h2>
                    <form action="javascript:;">
                        <input type="text">
                        <input type="submit" value="OK">
                    </form>
                </div>
                <div class="col-md-5 text-center">
                    <img src="{{path('logo-head.png') }}" alt="logo" class="img-fluid">
                    <h2>Acompanhe a ludovico:</h2>
                    <div class="links">
                        <a href="javascript:;">
                            <img src="{{path('twitter.png')}}" alt="" class="img-fluid">
                        </a>
                        <a href="javascript:;">
                            <img src="{{path('insta.png')}}" alt="" class="img-fluid">
                        </a>
                        <a href="javascript:;">
                            <img src="{{path('face.png')}}" alt="" class="img-fluid">
                        </a>
                        <a href="javascript:;">
                            <img src="{{path('youtube.png')}}" alt="" class="img-fluid">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@if($faq->records->count() > 0)
    <section class="faq py-5" id="faq">
        <div class="container px-5 px-md-0">
            <h2 class="icon-right" data-aos="fade">Perguntas frequentes</h2>
            <div class="row justify-content-end">
                <div class="col-md-6">
                    <div id="accordion" class="">
                        @foreach($faq->records as $ask)
                        <div class="card">

                        @if($ask->pergunta != null)
                          <div class="card-header" id="heading{{ $ask->alias_id }}" data-aos="fade" data-aos-delay="200">
                            <h5 class="mb-0">
                              <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{ $ask->alias_id }}" aria-expanded="false" aria-controls="collapse{{ $ask->alias_id }}">
                                {{ $ask->pergunta->values->first()->value }}
                              </button>
                            </h5>
                          </div>
                        @endif
                        @if($ask->reposta != null)
                          <div id="collapse{{ $ask->alias_id }}" class="collapse" aria-labelledby="heading{{ $ask->alias_id }}" data-parent="#accordion">
                            <div class="card-body">
                                {!! $ask->reposta->values->first()->value !!}
                            </div>
                          </div>
                        @endif
                        </div>
                        @endforeach
                      </div>
                </div>
                <div class="col-md-4 d-none d-md-block" data-aos="fade" data-aos-delay="400">
                    <img src="{{ path('interrogacao.png') }}" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
@endif
    <section class="contato" id="contato">
        <div class="container px-5 px-md-0">
            <h2 class="icon-right" data-aos="fade">Contato</h2>
            <form action="javascript:;">
                <div class="row pl-md-5">
                    <div class="col-md-6" data-aos="fade-left" data-aos-delay="200">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem fugit natus ducimus ullam a, ad nostrum numquam animi quae similique. Alias molestiae dolorem exercitationem officiis perferendis accusamus soluta debitis quasi?</p>
                        <input type="text" placeholder="nome">
                        <input type="email" placeholder="e-mail">
                    </div>
                    <div class="col-md-6" data-aos="fade-right" data-aos-delay="400">
                        <input type="text" placeholder="assunto">
                        <textarea name="" id="" cols="30" rows="10" placeholder="mensagem"></textarea>
                        <input type="submit" value="enviar mensagem">
                    </div>         
                </div>        
            </form>
        </div>
    </section>

@endsection