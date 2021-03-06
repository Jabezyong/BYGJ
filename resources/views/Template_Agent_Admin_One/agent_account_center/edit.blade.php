@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Agent Center
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($agentCenter, ['route' => ['agentCenters.update', $agentCenter->id], 'method' => 'patch']) !!}

                        @include('agent_centers.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection