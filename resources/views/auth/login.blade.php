@extends('layouts.app')

@section('content')

<div class="kt-grid kt-grid--ver kt-grid--root kt-page">
    <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v1" id="kt_login">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--desktop kt-grid--ver-desktop kt-grid--hor-tablet-and-mobile">

            <!--begin::Aside-->
            <div class="kt-grid__item kt-grid__item--order-tablet-and-mobile-2 kt-grid kt-grid--hor kt-login__aside" style="background-image: url(assets/media/bg/bg-2.jpg);">
                <div class="kt-grid__item">
                    <a href="#" class="kt-login__logo">
                       <img src="/img/logodejesus.png" width="250">
                    </a>
                </div>
                <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver">
                    <div class="kt-grid__item kt-grid__item--middle">
                        <h3 class="kt-login__title">!Bienvendido!</h3>
                        <h4 class="kt-login__subtitle">Soluciones en construcción, construyamos juntos tu patrimonio.</h4>
                    </div>
                </div>
                <div class="kt-grid__item">
                    <div class="kt-login__info">
                        <div class="kt-login__copyright">
                            &FIVETWOFIVE 2020
                        </div>
                        <div class="kt-login__menu">
                            <a href="#" class="kt-link">Privacidad</a>
                            <a href="#" class="kt-link">Legal</a>
                            <a href="#" class="kt-link">Contacto</a>
                        </div>
                    </div>
                </div>
            </div>

            <!--begin::Aside-->

            <!--begin::Content-->
            <div class="kt-grid__item kt-grid__item--fluid  kt-grid__item--order-tablet-and-mobile-1  kt-login__wrapper">

                <!--begin::Head-->
                <div class="kt-login__head">
                <!-- <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a> -->
                </div>

                <!--end::Head-->

                <!--begin::Body-->
                <div class="kt-login__body">

                    <!--begin::Signin-->
                    <div class="kt-login__form">
                        <div class="kt-login__title">
                            <h3>Inicio de Sesión</h3>
                        </div>

                        <!--begin::Form-->
                        <form method="POST" action="{{ route('login') }}">

                            @csrf
                            <div class="form-group">
                            <input id="email" placeholder="Nombre de Usuario" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="password" placeholder="Contraseña" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror                   
                            </div>                          

                            <!--begin::Action-->
                            <div class="kt-login__actions">                           
                                <button type="submit" class="btn btn-primary btn-block btn-elevate kt-login__btn-primary">
                                    {{ __('Ingresar') }}
                                </button>                            
                            </div>

                            <!--end::Action-->
                        </form>
                        
                    <a href="{{route('registrar')}}">Registrar</a>
                        <!--end::Form-->

                     
                    </div>

                    <!--end::Signin-->
                </div>

                <!--end::Body-->
            </div>

            <!--end::Content-->
        </div>
    </div>
</div>
@endsection

