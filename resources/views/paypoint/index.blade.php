@extends('layout.master')

@section('title',__('dash.index_roles'))
@section('title_page',__('dash.index_roles'))

@section('content')



<section id="basic-datatable">
    <div class="row">
        
        <div class="col-12">
            <div class="card">
               
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            <a id="addRow" href="{{route('pay_points.create')}}" class="col-xl-2 col-md-12 col-sm-12 btn btn-primary mb-2 waves-effect waves-light"><i class="feather icon-plus"></i>&nbsp; {{__('dash.add_new')}}</a>
                            <table class="table zero-configuration">
                                <thead>
                                    <tr>
                                        <th>{{__('dash.name')}}</th>
                                        <th>{{__('dash.email')}}</th>
                                        <th>{{__('dash.mobile')}}</th>
                                        <th>{{__('dash.compony')}}</th>
                                        <th>{{__('dash.add_date2')}}</th>
                                        <th>{{__('dash.actions')}}</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($pays as $p)
                                        <tr>
                                            <td>{{$p->name}}</td>
                                            <td>{{$p->email}}</td>
                                            <td>{{$p->mobile}}</td>
                                            <td>{{$p->compony->name}}</td>
                                            <td>{{$p->created_at->format('Y-m-d')}}</td>
                                            <td class="action-table">
                                                <a href="{{route('pay_points.edit',$p->id)}}"  class="btn bg-gradient-primary   waves-effect waves-light"><i class="fa-solid fa-pen-to-square"></i></i></a>
                                                <a href="{{route('pay_points.show',$p->id)}}"  class="btn bg-gradient-info   waves-effect waves-light"><i class="fa-solid fa-eye"></i></i></a>
                                                <button type="button" class="btn bg-gradient-danger  waves-effect waves-light" onclick="performDelete(this,{{$p->id}})"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
 
    function performDelete(el,id){
        performDeleteWithTostar('/pay_points/'+id,{"_method" : 'DELETE'},el,'tr');
    }
</script>
@endsection