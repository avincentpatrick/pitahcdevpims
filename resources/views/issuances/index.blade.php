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
                                <textarea id="table_search" class="form-control" placeholder="Enter title..."></textarea>
                            </div>
                            <div class="form-group">
                                <label for="issuance_no_search">Issuance No.</label>
                                <input type="search" id="issuance_no_search" class="form-control" placeholder="Enter issuance no...">
                            </div>
                            <div class="form-group">
                                <label>Date Range</label>
                                <div class="input-group">
                                    <input type="date" class="form-control" id="start_date" placeholder="From">
                                </div>
                                <div class="input-group mt-2">
                                    <input type="date" class="form-control" id="end_date" placeholder="To">
                                </div>
                            </div>
                            <div class="form-group d-flex justify-content-end">
                                <button type="button" id="clear_button" class="shimmer-button" style="--bg: #dc3545;">
                                    <span class="spark-container">
                                        <span class="spark"></span>
                                    </span>
                                    <span class="backdrop"></span>
                                    <span class="highlight"></span>
                                    <i class="fas fa-times mr-2"></i>Clear
                                </button>
                                <button type="button" id="search_button" class="shimmer-button" style="--bg: #007bff;">
                                    <span class="spark-container">
                                        <span class="spark"></span>
                                    </span>
                                    <span class="backdrop"></span>
                                    <span class="highlight"></span>
                                    <i class="fas fa-search mr-2"></i>Search
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <button type="button" class="shimmer-button btn-block" data-toggle="modal" data-target="#uploadDocumentModal" style="--bg: #007bff;">
                                <span class="spark-container">
                                    <span class="spark"></span>
                                </span>
                                <span class="backdrop"></span>
                                <span class="highlight"></span>
                                <i class="fas fa-upload mr-2"></i>Upload Document
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="card-title">List of Issuances</h3>
                            <div class="form-group mb-0 ml-auto">
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
                                    <div class="input-group">
                                        <input type="date" class="form-control" id="documentDate" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="fileUpload">File Upload</label>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <input type="file" class="form-control-file" id="fileUpload" required>
                                        <button class="shimmer-button" type="button" id="viewPreviewBtn" style="--bg: #17a2b8;">
                                            <span class="spark-container">
                                                <span class="spark"></span>
                                            </span>
                                            <span class="backdrop"></span>
                                            <span class="highlight"></span>
                                            <i class="fas fa-eye mr-2"></i>View Preview
                                        </button>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="recipients">Recipients (comma-separated emails)</label>
                                    <div class="input-group">
                                        <textarea class="form-control" id="recipients" rows="3"></textarea>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#recipientModal">Browse</button>
                                        </div>
                                    </div>
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
                    <button type="button" class="shimmer-button" data-dismiss="modal" style="--bg: #6c757d;">
                        <span class="spark-container">
                            <span class="spark"></span>
                        </span>
                        <span class="backdrop"></span>
                        <span class="highlight"></span>
                        Close
                    </button>
                    <button type="button" class="shimmer-button" id="uploadButton" style="--bg: #007bff;">
                        <span class="spark-container">
                            <span class="spark"></span>
                        </span>
                        <span class="backdrop"></span>
                        <span class="highlight"></span>
                        Upload
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Document Modal -->
    <div class="modal fade" id="editDocumentModal" tabindex="-1" role="dialog" aria-labelledby="editDocumentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editDocumentModalLabel">Edit Document</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form id="editDocumentForm">
                                <input type="hidden" id="editDocumentId">
                                <div class="form-group">
                                    <label for="editModalIssuanceCategory">Issuance Category</label>
                                    <select id="editModalIssuanceCategory" class="form-control">
                                        <option value="1">PITAHC Order</option>
                                        <option value="2">PITAHC Personnel Order</option>
                                        <option value="3">PITAHC Memorandum</option>
                                        <option value="4">PITAHC Memorandum Circular</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="editDocumentTitle">Document Title</label>
                                    <textarea class="form-control" id="editDocumentTitle" placeholder="Enter document title" required rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="editReferenceNumber">Reference Number</label>
                                    <input type="text" class="form-control" id="editReferenceNumber" placeholder="Enter reference number" required>
                                </div>
                                <div class="form-group">
                                    <label for="editDocumentDate">Document Date</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control" id="editDocumentDate" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="editFileUpload">File Upload (Optional)</label>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <input type="file" class="form-control-file" id="editFileUpload">
                                        <button class="shimmer-button" type="button" id="editViewPreviewBtn" style="--bg: #17a2b8;">
                                            <span class="spark-container">
                                                <span class="spark"></span>
                                            </span>
                                            <span class="backdrop"></span>
                                            <span class="highlight"></span>
                                            <i class="fas fa-eye mr-2"></i>View Preview
                                        </button>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="editRecipients">Recipients (comma-separated emails)</label>
                                    <div class="input-group">
                                        <textarea class="form-control" id="editRecipients" rows="3"></textarea>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#recipientModal">Browse</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <div id="edit-pdf-preview-container" style="height: 500px; border: 1px solid #ddd; display: none;">
                                <embed id="edit-pdf-preview" src="" type="application/pdf" width="100%" height="100%">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="shimmer-button" data-dismiss="modal" style="--bg: #6c757d;">
                        <span class="spark-container">
                            <span class="spark"></span>
                        </span>
                        <span class="backdrop"></span>
                        <span class="highlight"></span>
                        Close
                    </button>
                    <button type="button" class="shimmer-button" id="updateButton" style="--bg: #007bff;">
                        <span class="spark-container">
                            <span class="spark"></span>
                        </span>
                        <span class="backdrop"></span>
                        <span class="highlight"></span>
                        Update
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Recipient Modal -->
    <div class="modal fade" id="recipientModal" tabindex="-1" role="dialog" aria-labelledby="recipientModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="recipientModalLabel">Select Recipients</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" id="recipientSearch" class="form-control mb-2" placeholder="Search recipients...">
                    <div id="recipientList" style="height: 300px; overflow-y: auto;">
                        <!-- Recipient list will be populated here -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="addRecipientsBtn">Add Selected</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Document Modal -->
    <div class="modal fade" id="deleteDocumentModal" tabindex="-1" role="dialog" aria-labelledby="deleteDocumentModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteDocumentModalLabel">Delete Document</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="deleteDocumentForm">
                        <input type="hidden" id="deleteDocumentId">
                        <div class="form-group">
                            <label for="deleteReason">Reason for Deletion</label>
                            <textarea class="form-control" id="deleteReason" rows="3" required></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="shimmer-button" data-dismiss="modal" style="--bg: #6c757d;">
                        <span class="spark-container">
                            <span class="spark"></span>
                        </span>
                        <span class="backdrop"></span>
                        <span class="highlight"></span>
                        Close
                    </button>
                    <button type="button" class="shimmer-button" id="confirmDeleteButton" style="--bg: #dc3545;">
                        <span class="spark-container">
                            <span class="spark"></span>
                        </span>
                        <span class="backdrop"></span>
                        <span class="highlight"></span>
                        Delete
                    </button>
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
        #issuancesTable.table-striped tbody tr:nth-of-type(odd) {
            background-color: #f8f9fa;
        }
        #issuancesTable tbody tr {
            border-bottom: 1px solid #dee2e6;
        }
        #issuancesTable tbody tr:hover {
            background-color: #f1f1f1;
        }
        #issuancesTable {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
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
                createdRow: function(row, data, dataIndex) {
                    $(row).find('.edit-btn').attr('data-id', data.id);
                    $(row).find('.delete-btn').attr('data-id', data.id);
                },
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

            // Recipient modal logic
            var allRecipients = [];

            $('#recipientModal').on('show.bs.modal', function() {
                $.ajax({
                    url: "{{ route('api.recipients') }}",
                    type: 'GET',
                    success: function(data) {
                        allRecipients = data;
                        renderRecipientList(allRecipients);
                    }
                });
            });

            $('#recipientSearch').on('keyup', function() {
                var searchTerm = $(this).val().toLowerCase();
                var filteredRecipients = allRecipients.filter(function(recipient) {
                    return recipient.toLowerCase().includes(searchTerm);
                });
                renderRecipientList(filteredRecipients);
            });

            function renderRecipientList(recipients) {
                var recipientList = $('#recipientList');
                recipientList.empty();
                recipients.forEach(function(recipient) {
                    recipientList.append('<div class="form-check"><input class="form-check-input" type="checkbox" value="' + recipient + '" id="recipient-' + recipient + '"><label class="form-check-label" for="recipient-' + recipient + '">' + recipient + '</label></div>');
                });
            }

            $('#addRecipientsBtn').on('click', function() {
                var selectedRecipients = [];
                $('#recipientList input:checked').each(function() {
                    selectedRecipients.push($(this).val());
                });

                var existingRecipients = $('#recipients').val();
                var newRecipients = existingRecipients ? existingRecipients + ', ' + selectedRecipients.join(', ') : selectedRecipients.join(', ');
                $('#recipients').val(newRecipients);
                $('#recipientModal').modal('hide');
            });

            // Edit button click handler
            $('#issuancesTable tbody').on('click', '.edit-btn', function() {
                var id = $(this).data('id');
                $.get('/issuances/' + id, function(data) {
                    $('#editDocumentId').val(data.id);
                    $('#editModalIssuanceCategory').val(data.document_type_id);
                    $('#editDocumentTitle').val(data.document_title);
                    $('#editReferenceNumber').val(data.document_reference_code);
                    $('#editDocumentDate').val(data.document_date);
                    var recipients = data.recipients.map(function(r) { return r.email_address; }).join(', ');
                    $('#editRecipients').val(recipients);
                    $('#editDocumentModal').modal('show');
                });
            });

            // Update button click handler
            $('#updateButton').on('click', function() {
                var id = $('#editDocumentId').val();
                var formData = new FormData($('#editDocumentForm')[0]);
                formData.append('_token', '{{ csrf_token() }}');
                
                $.ajax({
                    url: '/issuances/update/' + id,
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $('#editDocumentModal').modal('hide');
                        table.draw();
                        toastr.success('Document updated successfully!');
                    },
                    error: function(response) {
                        toastr.error('An error occurred while updating the document.');
                    }
                });
            });

            // Delete button click handler
            $('#issuancesTable tbody').on('click', '.delete-btn', function() {
                var id = $(this).data('id');
                $('#deleteDocumentId').val(id);
                $('#deleteDocumentModal').modal('show');
            });

            $('#confirmDeleteButton').on('click', function() {
                var id = $('#deleteDocumentId').val();
                var reason = $('#deleteReason').val();

                if (!reason) {
                    toastr.warning('Please provide a reason for deletion.');
                    return;
                }

                var formData = new FormData();
                formData.append('reason', reason);
                formData.append('_token', '{{ csrf_token() }}');
                $.ajax({
                    url: "{{ url('issuances/delete') }}/" + id,
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $('#deleteDocumentModal').modal('hide');
                        $('#deleteDocumentForm')[0].reset();
                        if (response.success) {
                            table.draw();
                            toastr.success(response.message);
                        } else {
                            toastr.error(response.message || 'An error occurred while deleting the document.');
                        }
                    },
                    error: function(xhr, status, error) {
                        var errorMessage = 'An error occurred while deleting the document.';
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        }
                        toastr.error(errorMessage);
                    }
                });
            });
        });
    </script>
@endpush
