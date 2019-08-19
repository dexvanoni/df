@extends('layouts.app')
 
@section('content')
<div class="container">
    

    <div class="row  justify-content-between">

            <div class="col-10">
                <h2>Administração de Usuários PERMITIDOS</h2>
            </div>
            <div class="col-2">
                <a class="btn btn-success" href="{{ route('permitidos.create') }}"> Autorizar novo Usuário</a>
            </div>

    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>Email</th>
            <th>Dia de CADASTRO</th>
            <th>Expira em</th>
            <th>Situação</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($permitidos as $permitido)
        <tr>
            <td>{{ $permitido->email }}</td>
            <td>{{date('d/m/Y', strtotime($permitido->created_at)) }}</td>
            <td>{{date('d/m/Y', strtotime($permitido->created_at->copy()->addYear())) }}
                <?php 
                    $dt_exp = $permitido->created_at->copy()->addYear();
                    $dt_now = \Carbon\Carbon::now();
                        if($dt_exp->gt($dt_now)){
                            ?>
                            <i style="color: green" class="fas fa-check"></i>
                        <?php } else {
                        ?>
                            <i title="Já expirou" style="color: red" class="fas fa-skull-crossbones"></i>
                        <?php }
                ?>
            </td>
            <td>
                @php
                 $recebe1 = App\User::where('email', $permitido->email)->first();
                    if (!is_null($recebe1)) {
                        @endphp<h6 style="color: green">REGISTRADO</h6> @php
                    } else {
                        @endphp<h6 style="color: red">NÃO REGISTRADO</h6> @php
                    }
                @endphp
            </td>
            <td>
                <form action="{{ route('permitidos.destroy',$permitido->id) }}" method="POST">
                    @if ($permitido->email == 'diretor@dfbordados.com.br' || $permitido->email == 'denis.vanoni@dfbordados.com.br')
                        Usuário SUPER ADMIN
                    @else
                    <!--<a class="btn btn-info" href="{{ route('permitidos.show',$permitido->id) }}">Show</a>-->
    
                    <a class="btn btn-primary" href="{{ route('permitidos.edit',$permitido->id) }}">Editar</a>
   
                    @csrf
                    @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        @endif
                    
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
<hr>
    <!--USUÁRIOS REGISTRADOS-->
            <div class="col-10">
                <h2>USUÁRIOS REGISTRADOS</h2>
            </div>
        <table class="table table-bordered">
        <tr>
            <th>Nome</th>
            <th>Dia de REGISTRO</th>
            <th>EMAIL</th>
            <th>Situação</th>
        </tr>
        @foreach ($registrados as $registrado)
        <tr>
            <td>{{ $registrado->name }}</td>
            <td>{{date('d/m/Y', strtotime($registrado->created_at)) }}</td>
            <td>{{ $registrado->email }}</td>
            <td>
                @php
                 $recebe = App\Permitido::where('email', $registrado->email)->first();
                    if (!is_null($recebe)) {
                        @endphp<h6 style="color: green">PERMITIDO</h6> @php
                    } else {
                        @endphp<h6 style="color: red">NÃO PERMITIDO</h6> @php
                    }
                @endphp
            </td>
        </tr>
        @endforeach
    </table>


  
    {!! $permitidos->links() !!}
      </div>
@endsection