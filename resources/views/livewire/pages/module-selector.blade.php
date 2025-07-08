<div>
    <style>
    .btn-icon-label {
    display: flex;
    flex-direction: column;
    align-items: center;
    }

    .btn-icon-label i {
    font-size: 48px;
    margin-bottom: 10px;
    }   
    </style>
    <div>    
        <div>
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Modules</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Modules</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <a href="#" class="btn btn-light btn-lg btn-block btn-icon-label disabled">
                                                        <i class="fas fa-shopping-cart text-primary"></i> Bids and Awards
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <a href="#" class="btn btn-light btn-lg btn-block btn-icon-label disabled">
                                                        <i class="fas fa-boxes text-primary"></i> Supplies
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <a href="{{ route('list-documents') }}" class="btn btn-light btn-lg btn-block btn-icon-label">
                                                        <i class="fas fa-file-import text-primary"></i> Document Tracking
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <a href="{{ route('css-results', ['param' => 2025]) }}" class="btn btn-light btn-lg btn-block btn-icon-label">
                                                        <i class="fas fa-poll text-primary"></i> Client Satisfaction Measurement
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <a href="#" class="btn btn-light btn-lg btn-block btn-icon-label disabled">
                                                        <i class="fas fa-users text-primary"></i> Human Resource
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <a href="#" class="btn btn-light btn-lg btn-block btn-icon-label disabled">
                                                        <i class="fas fa-money-bill text-primary"></i> Finance
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <a href="{{ route('list-ict-requests') }}" class="btn btn-light btn-lg btn-block btn-icon-label">
                                                        <i class="fas fa-laptop text-primary"></i> ICT Requests
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <a href="{{ route('issuances.index') }}" class="btn btn-light btn-lg btn-block btn-icon-label">
                                                        <i class="fas fa-file text-primary"></i> Issuances
                                                    </a>
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
</div>
