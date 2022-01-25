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
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الاعدادات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ المنتجات</span>
						</div>
					</div>

				</div>
				<!-- breadcrumb -->


@endsection
@section('content')
    @if($errors->any())
        <div class="alert alert-warning">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

    @endif
    @if ($message=\Illuminate\Support\Facades\Session::get('success'))
        <div class="alert alert-success">
            <ul>
                <li>
                    {{$message}}
                </li>
            </ul>
        </div>
    @endif
    <div class="row row-sm">

        <div class="col-xl-12">

            <div class="card">
                <div class="card-header pb-0">
                    <div class="col-md-4">
                        <a class="modal-effect btn btn-info" data-effect="effect-scale" data-toggle="modal" href="#modaldemo1">اضافة منتج</a>
                    </div>
                </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table text-md-nowrap" id="example1">
                <thead>
                <tr>
                    <th class="wd-15p border-bottom-0">#</th>
                    <th class="wd-15p border-bottom-0">اسم المنتج</th>
                    <th class="wd-20p border-bottom-0">القسم</th>
                    <th class="wd-20p border-bottom-0">الوصف</th>
                    <th class="wd-15p border-bottom-0">العمليات</th>

                </tr>
                </thead>
                <tbody>

                @foreach($products as $key=>$product)
{{--                    @foreach($sections as $section)--}}

                    <tr>
                        <th scope="row">{{$key+1}}</th>
                    <td>{{$product->product_name}}</td>
                    <td>{{$product->sections->section_name}}</td>
                    <td>{{$product->description}}</td>
                        <td><a class="btn btn-danger" href="{{route('products.delete',['id'=>$product->id])}}">حذف</a>|
                            <a class="modal-effect btn btn-info" data-effect="effect-scale" data-toggle="modal" href="#exampleModal2" data-id="{{$product->id}}" data-product_name="{{$product->product_name}}" data-product_section_id="{{$product->sections->id}}" data-product_desc="{{$product->description}}">تعديل</a>
                        </td>


                </tr>
{{--                    @endforeach--}}
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
                    </div>
                </div>
            </div>
        </div>

    <div class="modal" id="modaldemo1">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">اضافة منتج</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>

                <div class="modal-body">
                    <form action="{{ route('products.store') }}" method="post">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="exampleInputEmail1">اسم المنتج</label>
                            <input type="text" class="form-control" id="product_name" name="product_name">
                        </div>
                        <div class="form-group">
                            <label for="Default select example">اسم القسم</label>
                            <select name="section_id" class="form-select" aria-label="Default select example">
                               @foreach($sections as $section)

                                <option  value="{{$section->id}}">{{$section->section_name}}</option>
                               @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">الوصف</label>
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
                    <h5 class="modal-title" id="exampleModalLabel">تعديل المنتج</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="{{route('products.edit')}}" method="post" autocomplete="off">
                        {{csrf_field()}}
                        <div class="form-group">
                            <input type="hidden" name="selected" id="selected" value="">

                            <input type="hidden" name="id" id="id" value="">

                            <label for="product_name" class="col-form-label">اسم المنتج:</label>
                            <input class="form-control" name="product_name" id="product_name" type="text">
                        </div>
                        <div class="form-group">
                            <label for="Default select example">اسم القسم</label>

                                <select name="section_name" id="section_name" class="custom-select my-1 mr-sm-2" required>
                                <option value="" selected disabled> --حدد القسم--</option>
                                @foreach($sections as $section)

                                    <option  value="{{$section->id}}">{{$section->section_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">ملاحظات:</label>
                            <textarea class="form-control" id="product_description" name="product_description"></textarea>
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
            var product_name = $(e.relatedTarget).attr('data-product_name');
            var product_description = $(e.relatedTarget).attr('data-product_desc');
            var section_id = $(e.relatedTarget).attr('data-product_section_id');



            var modal = $(this)


            $(this).find('.modal-body #id').val(id);
            $(this).find('.modal-body #product_name').val(product_name);
            $(this).find('.modal-body #product_description').val(product_description);
            $(this).find('.modal-body #selected').val(section_id);
        })
    </script>
@endsection
