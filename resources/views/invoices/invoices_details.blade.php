@extends('layouts.master')
@section('css')
    <!---Internal  Prism css-->
    <link href="{{URL::asset('assets/plugins/prism/prism.css')}}" rel="stylesheet">
    <!---Internal Input tags css-->
    <link href="{{URL::asset('assets/plugins/inputtags/inputtags.css')}}" rel="stylesheet">
    <!--- Custom-scroll -->
    <link href="{{URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.css')}}" rel="stylesheet">
@endsection
@section('title')
    Invoice details
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Invoices</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Details</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row opened -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    @if (session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session()->has('delete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('delete') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

<div class="col-xl-12">
    <div class="col-xl-12">
    <!-- div -->
    <div class="card mg-b-25" id="tabs-style2">
        <div class="card-body">
            <div class="main-content-label mg-b-5">
               Information about invoice
            </div>
            <p class="mg-b-20">the invoice number is: {{$invoice->invoice_number}}</p>
            <div class="text-wrap">
                <div class="example">
                    <div class="panel panel-primary tabs-style-2">
                        <div class=" tab-menu-heading">
                            <div class="tabs-menu1">
                                <!-- Tabs -->
                                <ul class="nav panel-tabs main-nav-line">
                                    <li><a href="#tab4" class="nav-link active" data-toggle="tab">Info</a></li>
                                    <li><a href="#tab5" class="nav-link" data-toggle="tab">Details</a></li>
                                    <li><a href="#tab6" class="nav-link" data-toggle="tab">Attachment</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="panel-body tabs-menu-body main-content-body-right border " style="width: 100%;">
                            <div class="tab-content" >

                        <!-- invoicese info -->

                                <div class="tab-pane active " id="tab4" >

                                        <div class="table-responsive ">
                                            <table id="example1" class="table key-buttons text-md-nowrap ">
                                                <thead >
                                                <tr >
<!--                                                    <th class="border-bottom-0">ID</th>-->
                                                    <th class="border-bottom-0 " >Invoices_Num</th>
                                                    <th class="border-bottom-0" >Invoices_date</th>
                                                    <th class="border-bottom-0">due_date</th>
                                                    <th class="border-bottom-0">product</th>
                                                    <th class="border-bottom-0">section</th>
                                                    <th class="border-bottom-0">discount</th>
                                                    <th class="border-bottom-0">rate_vat</th>
                                                    <th class="border-bottom-0">value_vat</th>
                                                    <th class="border-bottom-0">Total</th>
                                                    <th class="border-bottom-0">Status_paid</th>
                                                    <th class="border-bottom-0">value_status</th>
                                                    <th class="border-bottom-0">note</th>
                                                </tr>
                                                </thead>
                                                <tbody >
                                                    <tr>
                                                        <td >{{$invoice->invoice_number}}</td>
                                                        <td>{{$invoice->invoice_Date}}</td>
                                                        <td>{{$invoice->Due_date}}</td>
                                                        <td>{{$invoice->product}}</td>
                                                        <td>{{ $invoice->section->section_name }}</td>
                                                        <td>{{$invoice->Discount}}</td>
                                                        <td>{{$invoice->Rate_VAT}}</td>
                                                        <td>{{$invoice->Value_VAT}}</td>
                                                        <td >{{$invoice->Total}}</td>
                                                        <td >
                                                            @if ($invoice->Value_Status == 1)
                                                                <span class="text-success">{{ $invoice->Status }}</span>
                                                            @elseif($invoice->Value_Status == 2)
                                                                <span class="text-danger">{{ $invoice->Status }}</span>
                                                            @else
                                                                <span class="text-warning">{{ $invoice->Status }}</span>
                                                            @endif
                                                        </td>
                                                        <td>{{$invoice->Value_Status}}</td>
                                                        <td>{{$invoice->note}}</td>

                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                </div>


                                <!-- invoicese details -->

                                <div class="tab-pane" id="tab5">

                                         <div class="table-responsive">
                                        <table id="example1" class="table key-buttons text-md-nowrap">
                                            <thead>
                                            <tr>
                                                <th class="border-bottom-0">ID</th>
                                                <th class="border-bottom-0 ">id_Invoice</th>
                                                <th class="border-bottom-0">invoice_number</th>
                                                <th class="border-bottom-0">product</th>
                                                <th class="border-bottom-0">Section</th>
                                                <th class="border-bottom-0">Status</th>
                                                <th class="border-bottom-0">Value_Status</th>
                                                <th class="border-bottom-0">Payment_Date</th>
                                                <th class="border-bottom-0">note</th>
                                                <th class="border-bottom-0">user</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php
                                            $i=0;
                                            @endphp
                                            @foreach($details as $detail)
                                                @php
                                                $i++;
                                                @endphp
                                            <tr>
                                                <td>{{$i}}</td>
                                               <td>{{$detail->id_Invoice}}</td>
                                               <td>{{$detail->invoice_number}}</td>
                                                <td>{{$detail->product}}</td>
                                                <td>{{$invoice->section->section_name}}</td>
                                                <td>
                                                    @if ($detail->Value_Status == 1)
                                                        <span class="text-success">{{ $detail->Status }}</span>
                                                    @elseif($detail->Value_Status == 2)
                                                        <span class="text-danger">{{ $detail->Status }}</span>
                                                    @else
                                                        <span class="text-warning">{{ $detail->Status }}</span>
                                                    @endif
                                                </td>
                                                <td>{{$detail->Value_Status}}</td>
                                                @if($detail->Payment_Date == null)
                                                    <td>Null</td>
                                                @else
                                                    <td>{$detail->Payment_Date}}
                                                @endif
                                                <td>{{$detail->note}}</td>
                                                <td>{{$detail->user}}</td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                </div>


                                <!-- invoicese attachment -->

                                <div class="tab-pane" id="tab6">
                                    <div class="card card-statistics">
                                        @can('Create attachment')
                                            <div class="card-body">
                                                <p class="text-danger">* Attachment Format pdf, jpeg ,.jpg , png </p>
                                                <h5 class="card-title">Add attachment</h5>
                                                <form method="post" action="{{ route('attachment.store') }}"
                                                      enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="customFile"
                                                               name="file_name" required >
                                                        <input type="hidden" id="invoice_num" name="invoice_number"
                                                               value="{{ $invoice->invoice_number }}">
                                                        <input type="hidden" id="invoice_id" name="invoice_id"
                                                               value="{{ $invoice->id }}">
                                                        <label class="custom-file-label" for="customFile">Select
                                                            attachment</label>
                                                    </div>
                                                    <br><br>
                                                    <button type="submit" class="btn btn-primary" style="height: 35px;width: 65px;"
                                                            name="uploadedFile">Add</button>
                                                </form>
                                            </div>
                                        @endcan

                                        <br>
                                         <div class="table-responsive">
                                        <table id="example1" class="table key-buttons text-md-nowrap">
                                            <thead>
                                            <tr>
                                                <th class="border-bottom-0">ID</th>
                                                <th class="border-bottom-0 ">file_name</th>
                                                <th class="border-bottom-0">invoice_number</th>
                                                <th class="border-bottom-0">Created_by</th>
                                                <th class="border-bottom-0">invoice_id</th>
                                                <th class="border-bottom-0">created_at</th>
                                                <th class="border-bottom-0">updated_at</th>
                                                <th class="border-bottom-0" >Proccess</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php
                                                $j=0;
                                            @endphp
                                            @foreach($attachments as $attachment)
                                                @php
                                                    $j++;
                                                @endphp
                                            <tr>

                                                <td>{{$j}}</td>
                                                <td>{{$attachment->file_name}}</td>
                                                <td>{{$attachment->invoice_number}}</td>
                                                <td>{{$attachment->Created_by}}</td>
                                                <td>{{$attachment->invoice_id}}</td>
                                                <td>{{$attachment->created_at}}</td>
                                                <td>{{$attachment->updated_at}}</td>

                                                <td colspan="3"  style="display: flex; ">

                                                    <a class="btn btn-outline-success btn-sm" style="margin-left:5px;width: auto;height: auto "
                                                       href="{{ url('View_file') }}/{{ $invoice->invoice_number }}/{{ $attachment->file_name }}"
                                                       role="button"><i class="fas fa-eye"></i>&nbsp;
                                                        View</a>
                                                        <br>
                                                    <a class="btn btn-outline-info btn-sm" style="margin-left:5px"
                                                       href="{{ url('download') }}/{{ $invoice->invoice_number }}/{{ $attachment->file_name }}"
                                                       role="button"><i
                                                            class="fas fa-download"></i>&nbsp;
                                                        Download</a>
                                                            <br>
                                                        @can('Delete attachment')
                                                        <button class="btn btn-outline-danger btn-sm"
                                                                data-toggle="modal"
                                                                data-file_name="{{ $attachment->file_name }}"
                                                                data-invoice_number="{{ $attachment->invoice_number }}"
                                                                data-id_file="{{ $attachment->id }}"
                                                                data-target="#delete_file">Delete</button>
                                                        @endcan

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
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
        <!-- /div -->
    <!-- /row -->
    <!-- delete -->
    <div class="modal fade" id="delete_file" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete attachment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('delete_file') }}" method="post">

                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p class="text-center">
                        <h6 style="color:red"> Are you sure about the process of deleting the attachment?</h6>
                         </p>
                        <input type="hidden" name="id_file" id="id_file" value="">
                        <input type="hidden" name="file_name" id="file_name" value="">
                        <input type="hidden" name="invoice_number" id="invoice_number" value="">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
    $('#delete_file').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id_file = button.data('id_file')
        var file_name = button.data('file_name')
        var invoice_number = button.data('invoice_number')
        var modal = $(this)
        modal.find('.modal-body #id_file').val(id_file);
        modal.find('.modal-body #file_name').val(file_name);
        modal.find('.modal-body #invoice_number').val(invoice_number);
    })
</script>

    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
@endsection
