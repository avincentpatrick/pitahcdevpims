@extends('layouts.b_app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Issuances</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('module-selector') }}">Modules</a></li>
                        <li class="breadcrumb-item active">Issuances</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-filter mr-2"></i>
                                Filter Options
                            </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="issuanceCategory">Issuance Category</label>
                                <select id="issuanceCategory" class="form-control">
                                    <option value="">ALL</option>
                                    <option value="1">PITAHC Order</option>
                                    <option value="2">PITAHC Personnel Order</option>
                                    <option value="3">PITAHC Memorandum</option>
                                    <option value="4">PITAHC Memorandum Circular</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="table_search">Search (by Title)</label>
                                <input type="search" id="table_search" class="form-control" placeholder="Enter title...">
                            </div>
                            <div class="form-group">
                                <label for="issuance_no_search">Issuance No.</label>
                                <input type="search" id="issuance_no_search" class="form-control" placeholder="Enter issuance no...">
                            </div>
                            <div class="form-group">
                                <label>Date Range</label>
                                <div class="input-group date" id="start_date_picker" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" data-target="#start_date_picker" id="start_date" placeholder="From"/>
                                    <div class="input-group-append" data-target="#start_date_picker" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                                <div class="input-group date mt-2" id="end_date_picker" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" data-target="#end_date_picker" id="end_date" placeholder="To"/>
                                    <div class="input-group-append" data-target="#end_date_picker" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="button" id="search_button" class="btn btn-primary">Search</button>
                                <button type="button" id="clear_button" class="btn btn-danger">Clear</button>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#uploadDocumentModal">
                                <i class="fas fa-upload mr-2"></i>Upload Document
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="card-title">List of Issuances</h3>
                            <div class="form-group mb-0">
                                <label for="table_length" class="mr-2">Show Entries</label>
                                <select id="table_length" class="form-control form-control-sm" style="width: auto; display: inline-block;">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="issuancesTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Subject</th>
                                        <th>Issuance Number</th>
                                        <th>Document Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Skeleton Loader -->
                                    <tr class="skeleton-loader">
                                        <td colspan="4">
                                            <div class="skeleton-line"></div>
                                            <div class="skeleton-line"></div>
                                            <div class="skeleton-line"></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="uploadDocumentModal" tabindex="-1" role="dialog" aria-labelledby="uploadDocumentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadDocumentModalLabel">Upload Document</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form id="uploadDocumentForm">
                                <div class="form-group">
                                    <label for="modalIssuanceCategory">Issuance Category</label>
                                    <select id="modalIssuanceCategory" class="form-control">
                                        <option value="1">PITAHC Order</option>
                                        <option value="2">PITAHC Personnel Order</option>
                                        <option value="3">PITAHC Memorandum</option>
                                        <option value="4">PITAHC Memorandum Circular</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="documentTitle">Document Title</label>
                                    <textarea class="form-control" id="documentTitle" placeholder="Enter document title" required rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="referenceNumber">Reference Number</label>
                                    <input type="text" class="form-control" id="referenceNumber" placeholder="Enter reference number" required>
                                </div>
                                <div class="form-group">
                                    <label for="documentDate">Document Date</label>
                                    <input type="date" class="form-control" id="documentDate" required>
                                </div>
                                <div class="form-group">
                                    <label for="fileUpload">File Upload</label>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <input type="file" class="form-control-file" id="fileUpload" required>
                                        <button class="btn btn-info" type="button" id="viewPreviewBtn">
                                            <i class="fas fa-eye mr-2"></i>View Preview
                                        </button>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="recipients">Recipients (comma-separated emails)</label>
                                    <textarea class="form-control" id="recipients" rows="3"></textarea>
                                    <div id="recipient-preview" class="mt-2"></div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <div id="pdf-preview-container" style="height: 500px; border: 1px solid #ddd; display: none;">
                                <embed id="pdf-preview" src="" type="application/pdf" width="100%" height="100%">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="uploadButton">Upload</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page_css')
    <style>
        .fixed-header {
            position: sticky;
            top: 0;
            z-index: 1020; /* Ensure it's above other content */
            background-color: #fff;
        }
        .dataTables_paginate {
            display: flex;
            justify-content: center;
        }
        .dataTables_paginate .paginate_button {
            margin: 0 5px;
            border-radius: 20px !important;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .skeleton-loader .skeleton-line {
            width: 100%;
            height: 1.5rem;
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: shimmer 1.5s infinite;
            margin-bottom: 0.5rem;
            border-radius: 4px;
        }
        @keyframes shimmer {
            0% {
                background-position: 200% 0;
            }
            100% {
                background-position: -200% 0;
            }
        }
    </style>
@endpush

@push('page_scripts')
    <script>
        $(document).ready(function() {
            // Make table header fixed on scroll
            var tableHeader = $('#issuancesTable thead');
            var headerOffset = tableHeader.offset().top;

            $(window).scroll(function() {
                if ($(window).scrollTop() > headerOffset) {
                    tableHeader.addClass('fixed-header');
                } else {
                    tableHeader.removeClass('fixed-header');
                }
            });
        });
        $(document).ready(function() {
            var table = $('#issuancesTable').DataTable({
                processing: true,
                serverSide: true,
                searching: false, // Disable default search
                lengthChange: false, // Disable default length change
                ajax: {
                    url: "{{ route('issuances.data') }}",
                    data: function (d) {
                        d.category = $('#issuanceCategory').val();
                        d.custom_search = $('#table_search').val();
                        d.issuance_no = $('#issuance_no_search').val();
                        d.start_date = $('#start_date').val();
                        d.end_date = $('#end_date').val();
                    }
                },
                columns: [
                    {data: 'subject', name: 'subject'},
                    {data: 'document_reference_code', name: 'document_reference_code'},
                    {data: 'document_date', name: 'document_date'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                pagingType: "simple",
                drawCallback: function(settings) {
                    $('.skeleton-loader').hide();
                    $('#issuancesTable tbody tr').not('.skeleton-loader').show();
                }
            });

            table.on('processing.dt', function(e, settings, processing) {
                if (processing) {
                    $('#issuancesTable tbody tr').not('.skeleton-loader').hide();
                    $('.skeleton-loader').show();
                }
            });

            $('#issuanceCategory').on('change', function() {
                table.draw();
            });

            $('#search_button').on('click', function() {
                table.draw();
            });

            $('#clear_button').on('click', function() {
                $('#issuanceCategory').val('');
                $('#table_search').val('');
                $('#issuance_no_search').val('');
                $('#start_date').val('');
                $('#end_date').val('');
                table.draw();
            });

            $('#table_length').on('change', function() {
                table.page.len($(this).val()).draw();
            });

            $('#uploadButton').on('click', function() {
                var form = $('#uploadDocumentForm')[0];
                if (!form.checkValidity()) {
                    toastr.warning('Please complete all required fields.');
                    return;
                }

                var formData = new FormData();
                formData.append('document_type_id', $('#modalIssuanceCategory').val());
                formData.append('document_title', $('#documentTitle').val());
                formData.append('document_reference_code', $('#referenceNumber').val());
                formData.append('document_date', $('#documentDate').val());
                formData.append('file', $('#fileUpload')[0].files[0]);
                formData.append('recipients', $('#recipients').val());
                formData.append('_token', '{{ csrf_token() }}');

                $.ajax({
                    url: "{{ route('issuances.upload') }}",
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $('#uploadDocumentModal').modal('hide');
                        form.reset();
                        table.draw();
                        toastr.success('Document uploaded successfully!');
                    },
                    error: function(response) {
                        toastr.error('An error occurred while uploading the document.');
                    }
                });
            });

            $('#viewPreviewBtn').on('click', function() {
                const file = $('#fileUpload')[0].files[0];
                const previewContainer = $('#pdf-preview-container');
                const pdfPreview = $('#pdf-preview');

                if (file && file.type === "application/pdf") {
                    const fileURL = URL.createObjectURL(file);
                    pdfPreview.attr('src', fileURL);
                    previewContainer.show();
                } else {
                    toastr.warning('Please select a PDF file to preview.');
                    previewContainer.hide();
                }
            });

            // Hide preview when a new file is selected until the button is clicked again
            $('#fileUpload').on('change', function() {
                $('#pdf-preview-container').hide();
            });

            $('#recipients').on('input', function() {
                const text = $(this).val();
                const emailRegex = /([a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z0-9._-]+)/gi;
                let html = text.replace(emailRegex, '<a href="mailto:$1" style="text-decoration: underline;">$1</a>');
                $('#recipient-preview').html(html);
            });

            $('#start_date_picker').datetimepicker({
                format: 'YYYY-MM-DD'
            });
            $('#end_date_picker').datetimepicker({
                format: 'YYYY-MM-DD',
                useCurrent: false
            });

            $("#start_date_picker").on("change.datetimepicker", function (e) {
                $('#end_date_picker').datetimepicker('minDate', e.date);
            });
            $("#end_date_picker").on("change.datetimepicker", function (e) {
                $('#start_date_picker').datetimepicker('maxDate', e.date);
            });
        });
    </script>
@endpush
