@extends('layouts.app')

@section('content')
<b-container>
    <b-row  align-h="center">
        <b-col cols="8">
            <b-card title="Registro" class="my-3">
                 @if ($errors->any())

                    <b-alert show variant="danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    
                    </b-alert>

                @else

                    <b-alert show>
                        Por favor ingrese sus datos
                    </b-alert>

                @endif
               
                <b-form  method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}

                     <b-form-group  
                                    label="Nombre"
                                    label-for="name">
                        <b-form-input   id="name"
                                        type="text"
                                        name="name"
                                        value="{{old('name')}}" required autofocus >
                                        
                        </b-form-input>
                    </b-form-group>

                    <b-form-group  
                                    label="Correo electrónico"
                                    label-for="email"
                                    description="Nunca compartiremos tu correo. Está seguro con nosotros.">
                        <b-form-input   id="email"
                                        type="email"
                                        name="email"
                                        value="{{old('email')}}" required 
                                        placeholder="Ingresa aqui tu correo">
                        </b-form-input>
                    </b-form-group>
                    <b-form-group  
                                    label="Contraseña"
                                    label-for="password">
                        <b-form-input   id="password"
                                        type="password"
                                        name="password" required >
                        </b-form-input>
                    </b-form-group>
                    <b-form-group  
                                    label="Confirmar contraseña"
                                    label-for="password_confirmation">
                        <b-form-input   id="password_confirmation"
                                        type="password"
                                        name="password_confirmation" required >
                        </b-form-input>
                    </b-form-group>
                    <b-button  type="submit" variant="primary">Confirmar registro</b-button>
                    <b-button href="{{ route('login') }}" variant="link" >¿ Ya te has registrado ?</b-button>

                </b-form>
            </b-card>
        </b-col>
    </b-row>
</b-container>
@endsection
