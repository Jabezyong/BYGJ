@extends('Admin.layouts.app')
@section('content')
    <section class="content-header">
        <div class="left">
        </div>
    </section>
    <div class="content">
        <div class="clearfix"></div>
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-tag"></i> 游戏平台列表</h3>
                <div class="box-tools">
                    <ul class="pull-right pagination-sm pagination">
                    </ul>
                </div>
            </div>
            <div class="box-body">
                @include('Admin.plat.table')
                <h5 class="pull-left">
                    {{--<a class="btn btn-primary pull-left" style="margin-top: -10px;margin-bottom: 5px" onclick="{!! TableScript::addOrEditModalShowEventScript(route('payTypes.create')) !!}">新增支付类型</a>--}}
                    <a class="btn btn-primary pull-left" style="margin-top: -10px;margin-bottom: 5px" onclick="location.href='{{route('plats.create')}}'">新增主游戏平台</a>
                </h5>
            </div>
            <div class="overlay" id="overlay" style="display: none">
                <i class="fa fa-refresh fa-spin"></i>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editAddModal" tabindex="-3" role="dialog" aria-labelledby="myModalLabel"></div>
    <div class="modal fade" id="carrierUserAddEditModal" tabindex="-3" role="dialog" aria-labelledby="myModalLabel"></div>
@endsection

@section('scripts')
    @parent
    <script src="{{asset('js/vue.min.js')}}"></script>
    <script src="/src/js/bootstrap-switch.js"></script>
    @include('Carrier.layouts.datatables_js')
    @include('vendor.datatable.datatables_template')
@endsection

@section('footer')
    @include('vendor.alert.default')
@endsection



