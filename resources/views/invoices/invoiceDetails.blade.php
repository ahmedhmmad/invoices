@extends('layouts.master')
@section('css')
<!---Internal  Prism css-->
<link href="{{URL::asset('assets/plugins/prism/prism.css')}}" rel="stylesheet">
<!---Internal Input tags css-->
<link href="{{URL::asset('assets/plugins/inputtags/inputtags.css')}}" rel="stylesheet">
<!--- Custom-scroll -->
<link href="{{URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.css')}}" rel="stylesheet">

<link href="{{URL::asset('assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>

@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">قائمة الفواتير</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تفاصيل الفاتورة</span>
						</div>
					</div>

				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row opened -->
				<div class="row row-sm">



					<div class="col-xl-12">
						<!-- div -->
						<div class="card mg-b-20" id="tabs-style2">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									تفاصيل الفاتورة
								</div>
                                @if ($message=\Illuminate\Support\Facades\Session::get('success'))
                                    <script>
                                      window.onload=function (){
                                          notif({
                                              msg:"تم الحذف بنجاح",
                                              type:"success"

                                          });
                                      }
                                    </script>




                                @endif
								<p class="mg-b-20">.</p>
								<div class="text-wrap">
									<div class="example">
										<div class="panel panel-primary tabs-style-2">
											<div class=" tab-menu-heading">
												<div class="tabs-menu1">
													<!-- Tabs -->
													<ul class="nav panel-tabs main-nav-line">
														<li><a href="#tab1" class="nav-link active" data-toggle="tab">معلومات الفاتورة</a></li>
														<li><a href="#tab2" class="nav-link" data-toggle="tab">الدفعات</a></li>
														<li><a href="#tab3" class="nav-link" data-toggle="tab">المرفقات</a></li>
													</ul>
												</div>
											</div>
											<div class="panel-body tabs-menu-body main-content-body-right border">
												<div class="tab-content">
													<div class="tab-pane active" id="tab1">
                                                        <div class="col-xl-12">
                                                            <div class="card">
                                                                                                                                <div class="card-body">
                                                                    <div class="table-responsive">


                                                                        <table class="table table-striped mg-b-0 text-md-nowrap">
                                                                            <tbody>


                                                                            <tr>
                                                                                <th class="font-weight-bold">رقم الفاتورة</th>
                                                                                <td>{{$invoices->invoice_number}}</td>
                                                                                <th class="font-weight-bold">تاريخ الاصدار</th>
                                                                                <td>{{$invoices->invoice_Date}}</td>
                                                                                <th class="font-weight-bold">تاريخ الاستحقاق</th>
                                                                                <td>{{$invoices->Due_date}}</td>
                                                                                <th class="font-weight-bold">القسم</th>
                                                                                <td>{{$invoices->sections->section_name}}</td>
                                                                                <th class="font-weight-bold">الحالة الحالية</th>
                                                                                @if ($invoices->Value_Status==1)
                                                                                    <td class="badge badge-success">{{$invoices->Status}}</td>
                                                                                @elseif ($invoices->Value_Status==2)
                                                                                    <td class="badge badge-danger">{{$invoices->Status}}</td>
                                                                                @elseif ($invoices->Value_Status==3)
                                                                                    <td class="badge badge-warning">{{$invoices->Status}}</td>
                                                                                @endif

                                                                            </tr>
                                                                            <tr>
                                                                                <th class="font-weight-bold">المنتج</th>
                                                                                <td>{{$invoices->product}}</td>
                                                                                <th class="font-weight-bold">مبلغ التحصيل</th>
                                                                                <td>{{$invoices->Amount_collection}}</td>
                                                                                <th class="font-weight-bold">مبلغ العمولة</th>
                                                                                <td>{{$invoices->Amount_Commission}}</td>
                                                                                <th class="font-weight-bold">الخصم</th>
                                                                                <td>{{$invoices->Discount}}</td>



                                                                            </tr>
                                                                            </tbody>


                                                                        </table>
                                                                    </div><!-- bd -->
                                                                </div><!-- bd -->
                                                            </div><!-- bd -->
                                                        </div>
{{--														@foreach($invoices as $key->$invoice)--}}


{{--                                                        @endforeach--}}
													</div>
													<div class="tab-pane" id="tab2">
{{--                                                        @foreach($invoices as $key->$invoice)--}}


{{--                                                        @endforeach--}}
{{--tab 2 Contents--}}
                                                        <div class="col-xl-12">
                                                            <div class="card">


                                                                <div class="card-body">
                                                                    <div class="table-responsive">
                                                                        <table class="table table-striped mg-b-0 text-md-nowrap">
                                                                            <thead>
                                                                            <tr>
                                                                                <th>م</th>
                                                                                <th>رقم الفاتورة</th>
                                                                                <th>نوع المنتج</th>
                                                                                <th>القسم</th>
                                                                                <th>حالة الدفع</th>
                                                                                <th>تاريخ الدفع</th>
                                                                                <th>ملاحظات</th>
                                                                                <th>تاريخ الاضافة</th>
                                                                                <th>المستخدم</th>

                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                            @foreach ($details as $key=>$detail)

                                                                            <tr>
                                                                                <th scope="row">{{$key+1}}</th>
                                                                                <td>{{$detail->invoice_number}}</td>
                                                                                <td>{{$detail->product}}</td>
                                                                                <td>{{$detail->sections->section_name}}</td>
                                                                                <td>@if ($detail->Value_Status==2)
                                                                                <span class="badge badge-pill badge-danger">{{$detail->Status}}</span>
                                                                                        @elseif($detail->Value_Status==1)
                                                                                <span class="badge badge-pill badge-success">{{$detail->Status}}</span>
                                                                                    @elseif($detail->Value_Status==3)
                                                                                        <span class="badge badge-pill badge-warning">{{$detail->Status}}</span>
                                                                                        @endif
                                                                                </td>
                                                                                <td>{{$detail->Payment_Date}}</td>
                                                                                <td>{{$detail->note}}</td>
                                                                                <td>{{$detail->created_at}}</td>
                                                                                <td>{{$detail->user}}</td>
                                                                            </tr>
                                                                            @endforeach

                                                                            </tbody>

                                                                        </table>
                                                                    </div><!-- bd -->
                                                                </div><!-- bd -->
                                                            </div><!-- bd -->
                                                        </div>
													</div>

{{--tab 3 Contents--}}
													<div class="tab-pane" id="tab3">

                                                        <div class="col-xl-12">
                                                            <div class="card">


                                                                <div class="card-body">
                                                                    <div class="table-responsive">
                                                                        <table class="table table-striped mg-b-0 text-md-nowrap">
                                                                            <thead>
                                                                            <tr>
                                                                                <th>م</th>
                                                                                <th>رقم الفاتورة</th>
                                                                                <th>قام بالاضافة</th>
                                                                                <th>تاريخ الاضافة</th>
                                                                                <th>المرفقات</th>

                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                            @foreach ($attachments as $key=>$attachment)

                                                                                <tr>
                                                                                    <th scope="row">{{$key+1}}</th>
                                                                                    <td>{{$attachment->invoice_number}}</td>
                                                                                    <td>{{$attachment->created_by}}</td>
                                                                                    <td>{{$attachment->created_at}}</td>
                                                                                    <td><a href="{{url('view_file')}}/{{$attachment->invoice_number}}/{{$attachment->file_name}}"
                                                                                           class="btn btn-outline-success btn-sm"
                                                                                           role="button" ><i class="fas fa-eye"></i>&nbsp;
                                                                                        >عرض</a>

                                                                                    <a href="{{url('download')}}/{{$attachment->invoice_number}}/{{$attachment->file_name}}"
                                                                                       class="btn btn-outline-info btn-sm"
                                                                                       role="button">
                                                                                        <i class="fas fa-download"></i>&nbsp;
                                                                                        تحميل</a>

                                                                                    <button
                                                                                       class="btn btn-outline-danger btn-sm"
                                                                                       role="button"
                                                                                       data-toggle="modal"
                                                                                       data-target="#deleteModal"
                                                                                       data-invoice-no="{{$attachment->invoice_number}}"
                                                                                       data-invoice-id="{{$attachment->invoice_id}}"
                                                                                       data-file-name="{{$attachment->file_name}}"
                                                                                    >
                                                                                        <i class="far fa-trash-alt"></i>&nbsp;
                                                                                        >حذف</button></td>

                                                                                </tr>
                                                                            @endforeach

                                                                            </tbody>

                                                                        </table>
                                                                    </div><!-- bd -->
                                                                </div><!-- bd -->
                                                            </div><!-- bd -->
                                                        </div>
													</div>
{{--                                                    Delete Modal--}}
                                                    <div class="modal" tabindex="-1" role="dialog" id="deleteModal">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">تأكيد الحذف</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form action="{{route('delete_file')}}" method="post">
                                                                    {{csrf_field()}}
                                                                <div class="modal-body">
                                                                    <input  type="text" id="file_name" name="file_name">
                                                                    <input  type="text" id="invoice_no" name="invoice_no">
                                                                    <input  type="text" id="invoice_id" name="invoice_id">
                                                                    <p>هل تريد حذف المرفق، اضغط نعم للتأكيد</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-danger">احذف</button>
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
												</div>
											</div>
										</div>
									</div>


<!---Prism Pre code-->
								</div>
							</div>
						</div>
					</div>
					<!-- /div -->





				<!-- /row -->
			</div>
			<!-- Container closed -->

		<!-- main-content closed -->
@endsection
@section('js')
<!--Internal  Datepicker js -->
<script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!-- Internal Select2 js-->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!-- Internal Jquery.mCustomScrollbar js-->
<script src="{{URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<!-- Internal Input tags js-->
<script src="{{URL::asset('assets/plugins/inputtags/inputtags.js')}}"></script>
<!--- Tabs JS-->
<script src="{{URL::asset('assets/plugins/tabs/jquery.multipurpose_tabcontent.js')}}"></script>
<script src="{{URL::asset('assets/js/tabs.js')}}"></script>
<!--Internal  Clipboard js-->
<script src="{{URL::asset('assets/plugins/clipboard/clipboard.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/clipboard/clipboard.js')}}"></script>
<!-- Internal Prism js-->
<script src="{{URL::asset('assets/plugins/prism/prism.js')}}"></script>
<script>
    $('#deleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var invoice_no = button.data('invoice-no')
        var invoice_id = button.data('invoice-id')
        var file_name = button.data('file-name')// Extract info from data-* attributes
        console.log(file_name,invoice_no)
        // // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        // modal.find('.modal-title').text('New message to ' + recipient)
        modal.find('.modal-body #invoice_no').val(invoice_no)
        modal.find('.modal-body #invoice_id').val(invoice_id)
        modal.find('.modal-body #file_name').val(file_name)


    })
</script>
    <script src="{{URL::asset('assets/plugins/notify/js/notifIt.js')}}"></script>
@endsection
