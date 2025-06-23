<div>    
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.2.0/dist/chartjs-plugin-datalabels.min.js"></script>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h4>{{ number_format($certification->total_certified, 0) }}</h4>
                                <p>No. of Issued<br>Certificates</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-certificate"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h4>{{ number_format($certification->total_certified_active, 0) }}<small class="font-italic"> ({{ number_format(($certification->total_certified_active/$certification->total_certified)*100, 0) }}%)</small></h4>
                                    <p>No. of Active<br>Certificates</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-check-circle"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h4>{{ number_format($certification->total_certified_expired, 0) }}<small class="font-italic"> ({{ number_format(($certification->total_certified_expired/$certification->total_certified)*100, 0) }}%)</small></h4>
                                <p>No. of Expired<br>Certificates</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-times-circle"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="small-box bg-secondary">
                            <div class="inner">
                                <h4>{{ number_format($certification->total_inactive, 0) }}</h4>
                                <p>No. of Newly Added<br>Certificates (June 2024)</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-exclamation"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h4>{{ number_format($certification->total_certified_multiple_certifications, 0) }}<small class="font-italic"> ({{ number_format(($certification->total_certified_multiple_certifications/$certification->total_certified)*100, 0) }}%)</small></h4>
                                <p>Total No. of<br>Practitioners</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-user-nurse"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="small-box bg-primary">
                            <div class="inner">
                                <h4>{{ number_format($certification->total_certified_multiple_certifications, 0) }}<small class="font-italic"> ({{ number_format(($certification->total_certified_multiple_certifications/$certification->total_certified)*100, 0) }}%)</small></h4>
                                <p>Practitioners with<br>More than 1 Certifications</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-tasks"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h4>{{ number_format($certification->total_certified_filipino, 0) }}<small class="font-italic"> ({{ number_format(($certification->total_certified_filipino/$certification->total_certified)*100, 0) }}%)</small></h4>
                                <p>Certified<br>Filipino Practitioners</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-map-marked-alt"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="small-box bg-secondary">
                            <div class="inner">
                                <h4>{{ number_format($certification->total_certified_foreign, 0) }}<small class="font-italic"> ({{ number_format(($certification->total_certified_foreign/$certification->total_certified)*100, 0) }}%)</small></h4>
                                <p>Certified<br>Foreign Practitioners</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-globe-asia"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
        </section>
    </div>
</div>
