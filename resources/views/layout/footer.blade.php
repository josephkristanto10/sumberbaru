<!-- footer -->
<!-- ============================================================== -->
<footer class="footer">
    © Designed By Xinvan Technology 
</footer>
<!-- ============================================================== -->
<!-- End footer -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<!--stickey kit -->
<script src="{{ asset('assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
<script src="{{ asset('assets/node_modules/sparkline/jquery.sparkline.min.js')}}"></script>
<!--Custom JavaScript -->
<script src="{{ asset('dist/js/custom.min.js')}}"></script>
<!-- This is data table -->

<script src="{{ asset('assets/node_modules/jquery/jquery-3.2.1.min.js')}}"></script>
<!-- Bootstrap popper Core JavaScript -->
<script src="{{ asset('assets/node_modules/popper/popper.min.js')}}"></script>
<script src="{{ asset('assets/node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{ asset('dist/js/perfect-scrollbar.jquery.min.js')}}"></script>
<!--Wave Effects -->
<script src="{{ asset('dist/js/waves.js')}}"></script>
<!--Menu sidebar -->
<script src="{{ asset('dist/js/sidebarmenu.js')}}"></script>
<!--Custom JavaScript -->
<script src="{{ asset('dist/js/custom.min.js')}}"></script>
<!-- ============================================================== -->
<!-- Date range Plugin JavaScript -->
<script src="{{ asset('assets/node_modules/timepicker/bootstrap-timepicker.min.js')}}"></script>
<script src="{{ asset('assets/node_modules/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- Clock Plugin JavaScript -->
<script src="{{ asset('assets/node_modules/clockpicker/dist/jquery-clockpicker.min.js')}}"></script>


<script src="{{ asset('assets/node_modules/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<!-- start - This is for export functionality only -->
<script src="{{ asset('dist/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('dist/js/buttons.flash.min.js')}}"></script>
<script src="{{ asset('dist/js/jszip.min.js')}}"></script>
<script src="{{ asset('dist/js/pdfmake.min.js')}}"></script>
<script src="{{ asset('dist/js/vfs_fonts.js')}}"></script>
<script src="{{ asset('dist/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('dist/js/buttons.print.min.js')}}"></script> <!-- Sweet-Alert  -->
<script src="{{ asset('assets/node_modules/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>
<script src="{{ asset('assets/node_modules/sweetalert2/sweet-alert.init.js')}}"></script> <!-- wysuhtml5 Plugin JavaScript -->
<script src="{{ asset('assets/node_modules/summernote/dist/summernote-bs4.min.js')}}"></script>
<script src="{{ asset('assets/node_modules/switchery/dist/switchery.min.js')}}"></script>
<script src="{{ asset('assets/node_modules/select2/dist/js/select2.full.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('assets/node_modules/bootstrap-select/bootstrap-select.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('assets/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
<script src="{{ asset('assets/node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js')}}" type="text/javascript"></script>
<script src="{{ asset('assets/node_modules/dff/dff.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('assets/node_modules/multiselect/js/jquery.multi-select.js')}}"></script>

<!-- ============================================================== -->
<!-- Plugins for this page -->
<!-- ============================================================== -->
<!-- Plugin JavaScript -->
<script src="{{ asset('assets/node_modules/moment/moment.js')}}"></script>
<script src="{{ asset('assets/node_modules/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>
<!-- Color Picker Plugin JavaScript -->
<script src="{{ asset('assets/node_modules/jquery-asColor/dist/jquery-asColor.js')}}"></script>
<script src="{{ asset('assets/node_modules/jquery-asGradient/dist/jquery-asGradient.js')}}"></script>
<script src="{{ asset('assets/node_modules/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js')}}"></script>
<!-- Date Picker Plugin JavaScript -->
<script src="{{ asset('assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<!-- Date range Plugin JavaScript -->
<script src="{{ asset('assets/node_modules/timepicker/bootstrap-timepicker.min.js')}}"></script>
<script src="{{ asset('assets/node_modules/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
</body>
<!-- end - This is for export functionality only -->
<!-- Chart JS -->
<script src="{{ asset('dist/js/dashboard3.js')}}"></script>
<script>
    // For select 2
    $(".select2").select2();
    $('.selectpicker').selectpicker();

    $('#modalselect2').select2({
        dropdownParent: $('#tambah')
    });
    $('#modalselect3').select2({
        dropdownParent: $('#tambah')
    });

    $(function() {
        $('#example').DataTable();
        $(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });
    $('#example23').DataTable({
        'paging': false,
        'lengthChange': true,
        'searching': true,
        'ordering': true,
        'info': false,
        'autoWidth': true,
        dom: 'Bfrtip',
        buttons: [
            'excel', 'pdf', 'print'
        ]
    });
    $('.buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary mr-1');

    $('#example22').DataTable({
        'paging': true,
        'lengthChange': true,
        'searching': true,
        'ordering': true,
        'info': true,
        'autoWidth': true,
    });

    $('#example25').DataTable({
        'paging': true,
        'lengthChange': true,
        'searching': true,
        'ordering': true,
        'info': true,
        'autoWidth': true,
    });

    $('#example26').dataTable({
        "ordering": true, // Allows ordering
        "searching": true, // Searchbox
        "paging": false, // Pagination
        "info": false, // Shows 'Showing X of X' information
        "pagingType": 'simple_numbers', // Shows Previous, page numbers & next buttons only
        "pageLength": 10, // Defaults number of rows to display in table
        "columnDefs": [{
            "targets": 'dialPlanButtons',
            "searchable": false, // Stops search in the fields 
            "sorting": false, // Stops sorting
            "orderable": false // Stops ordering
        }],
        "dom": '<"top"f>rt<"bottom"lp><"clear">', // Positions table elements
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ], // Sets up the amount of records to display
        "language": {
            "search": "_INPUT_", // Removes the 'Search' field label
            "searchPlaceholder": "Search" // Placeholder for the search box
        },
        "search": {
            "addClass": 'form-control input-lg col-xs-12'
        },
        "fnDrawCallback": function() {
            $("input[type='search']").attr("id", "searchBox");
            $('#dialPlanListTable').css('cssText', "margin-top: 0px !important;");
            $("select[name='dialPlanListTable_length'], #searchBox").removeClass("input-sm");
            $('#searchBox').css("width", "300px").focus();
            $('#dialPlanListTable_filter').removeClass('dataTables_filter');
        }
    });

    $('#example20').DataTable({
        'paging': true,
        'lengthChange': true,
        'searching': true,
        'ordering': true,
        'info': true,
        'autoWidth': true,
        dom: 'Bfrtip',
        buttons: [
            'excel', 'pdf', 'print'
        ]
    });
    $('#example19').DataTable({
        'paging': true,
        'lengthChange': true,
        'searching': true,
        'ordering': true,
        'info': true,
        'autoWidth': true,
        dom: 'Bfrtip',
        buttons: [
            'excel', 'pdf', 'print'
        ]
    });
    $('#example24').DataTable({
        'paging': true,
        'lengthChange': true,
        'searching': true,
        'ordering': true,
        'info': true,
        'autoWidth': true,
    });

    $(function() {
        $('.summernote').summernote({
            height: 150, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false // set focus to editable area after initializing summernote
        });

        $('.inline-editor').summernote({
            airMode: false,
        });

    });

    window.edit = function() {
            $(".click2edit").summernote()
        },
        window.save = function() {
            $(".click2edit").summernote('destroy');
        }

    // Always Show Calendar on Ranges
    $('.shawCalRanges').daterangepicker({
        ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        alwaysShowCalendars: true,
    });

    // Clock pickers
    $('#single-input').clockpicker({
        placement: 'bottom',
        align: 'left',
        autoclose: true,
        'default': 'now'
    });
    $('.clockpicker').clockpicker({
        donetext: 'Done',
    }).find('input').change(function() {
        console.log(this.value);
    });
    $('#check-minutes').click(function(e) {
        // Have to stop propagation here
        e.stopPropagation();
        input.clockpicker('show').clockpicker('toggleView', 'minutes');
    });
    if (/mobile/i.test(navigator.userAgent)) {
        $('input').prop('readOnly', true);
    }
</script>

</body>

</html>