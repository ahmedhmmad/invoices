@extends('layouts.master')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('title')
    الأقسام
    @stop
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">

						</div>
					</div>



                    <div class="col-xl-12">
                        <div class="card mg-b-20">
                            <div class="card-header pb-0">
                                <div class="d-flex justify-space-between">
                                    <h4 class="content-title mb-0 my-auto">الاعدادات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ الأقسام</span>
                            </div>
                                <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale" data-toggle="modal" href="#modaldemo1">اضافة قسم</a>
                            <div class="card-body">
                                <div class="table-responsive">

                                    @if($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                @endif

                                @if ($message=\Illuminate\Support\Facades\Session::get('success'))
                                    <div class="alert alert-success" role="alert">
                                        <ul>
                                            {{$message}}
                                        </ul>
                                    </div>
                                    @endif

                                    <table id="example" class="table key-buttons text-md-nowrap">
                                        <thead>
                                        <tr>
                                            <th class="border-bottom-0">#</th>
                                            <th class="border-bottom-0">اسم القسم </th>
                                            <th class="border-bottom-0">الوصف</th>
                                            <th class="border-bottom-0">العمليات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data as $key=>$item)
                                            <tr>
                                                <th scope="row">{{$key+1}}</th>
                                                <td>{{$item->section_name}}</td>
                                                <td>{{$item->description}}</td>




                                                <td><a href="{{route('sections.delete',['id'=>$item->id])}}" class="btn btn-danger">حذف</a>
{{--                                                    <a href="#" class="btn btn-info">تعديل</a>--}}
                                                    <a class="modal-effect btn btn-info" data-effect="effect-scale" data-toggle="modal" href="#exampleModal2" data-id="{{$item->id}}"
                                                       data-section="{{$item->section_name}}" data-section_desc="{{$item->description}}">تعديل</a>



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
				<!-- breadcrumb -->
@endsection
@section('content')



				<!-- row -->
				<div class="row">

				<!-- row closed -->
                    <!-- Basic modal -->
                    <div class="modal" id="modaldemo1">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content modal-content-demo">
                                <div class="modal-header">
                                    <h6 class="modal-title">اضافة قسم</h6><button aria-label="Close" class="close" data-dismiss="modal"
                                                                                  type="button"><span aria-hidden="true">&times;</span></button>
                                </div>

                                <div class="modal-body">
                                    <form action="{{ route('sections.store') }}" method="post">
                                        {{ csrf_field() }}

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">اسم القسم</label>
                                            <input value="" type="text" class="form-control" id="section_name" name="section_name">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">ملاحظات</label>
                                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success">تاكيد</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- End Basic modal -->

                        <!--edit module-->


                    </div>
                    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">تعديل القسم</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <form action="{{route('sections.edit')}}" method="post" autocomplete="off">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <input type="hidden" name="id" id="id" value="">
                                            <label for="recipient-name" class="col-form-label">اسم القسم:</label>
                                            <input class="form-control" name="section_name" id="section_name" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label for="message-text" class="col-form-label">ملاحظات:</label>
                                            <textarea class="form-control" id="description" name="description"></textarea>
                                        </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">تاكيد</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                        <!-- Start Basic Edit modal -->
                        <!-- edit -->

		<!-- main-content closed -->
@endsection
@section('js')
    <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
    <!--Internal  Datatable js -->
    <script src="{{URL::asset('assets/js/table-data.js')}}"></script>
    <script src="{{URL::asset('assets/js/modal.js')}}"></script>
                        <script>
                            $('#exampleModal2').on('shown.bs.modal', function (e){



                                var id = $(e.relatedTarget).attr('data-id')
                                var section_name = $(e.relatedTarget).attr('data-section');
                                var section_description = $(e.relatedTarget).attr('data-section_desc');



                                var modal = $(this)


                                $(this).find('.modal-body #id').val(id);
                                $(this).find('.modal-body #section_name').val(section_name);
                                $(this).find('.modal-body #description').val(section_description);
                            })
                        </script>
@endsection
