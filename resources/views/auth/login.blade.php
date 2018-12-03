@extends('layouts.app')

@section('content')
<b-container>
    <b-row  align-h="center">
        <b-col cols="8">
            <b-card title="Inicio de sesión" class="my-3">
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
                <b-form  method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

                    <b-form-group  
                                    label="Correo electrónico"
                                    label-for="email">
                        <b-form-input   id="email"
                                        type="email"
                                        name="email"
                                        value="{{old('email')}}" required autofocus
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
                    <b-form-group>
                        <b-form-checkbox  name="remember" {{ old('remember') ? 'checked="true"' : '' }}>
                            Recordar sesión 
                        </b-form-checkbox>
                    </b-form-group>
                    <b-button  type="submit" variant="primary">Login</b-button>
                    <b-button href="{{ route('password.request') }}" variant="link" >Olvidaste tu contraseña?</b-button>

                </b-form>
            </b-card>
        </b-col>
    </b-row>
</b-container>
@endsection
