<div>   
    <style>
        .small-box {
            min-height: 150px; /* you can adjust the height */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        
        .small-box h4 {
            font-size: 2rem;
            margin-bottom: 10px;
        }
        .small-box p {
            font-size: 1rem;
        }
    </style> 
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.2.0/dist/chartjs-plugin-datalabels.min.js"></script>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard</h1>
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
                    <!-- Certificates Overview -->
                    <div class="col-12">
                        <h5 class="text-muted mb-3">Certification Overview</h5>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="small-box bg-warning shadow rounded-3">
                            <div class="inner">
                                <h3 class="fw-bold">{{ number_format($certification->total_certified, 0) }}</h3>
                                <p class="mb-0">Issued Certificates</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="small-box bg-success shadow rounded-3">
                            <div class="inner">
                                <h3 class="fw-bold">{{ number_format($certification->total_certified_active, 0) }}
                                    <small class="text-light">({{ number_format(($certification->total_certified_active/$certification->total_certified)*100, 0) }}%)</small>
                                </h3>
                                <p class="mb-0">Active Certificates</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-user-check"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="small-box bg-danger shadow rounded-3">
                            <div class="inner">
                                <h3 class="fw-bold">{{ number_format($certification->total_certified_expired, 0) }}
                                    <small class="text-light">({{ number_format(($certification->total_certified_expired/$certification->total_certified)*100, 0) }}%)</small>
                                </h3>
                                <p class="mb-0">Expired Certificates</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-user-times"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="small-box bg-info shadow rounded-3">
                            <div class="inner">
                                <h3 class="fw-bold">{{ number_format($newly_added_certificates_prev_month, 0) }}</h3>
                                <p class="mb-0">New Certificates<br>({{ $lastMonthWord }} {{ $lastMonthYear }})</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-user-plus"></i>
                            </div>
                        </div>
                    </div>
                    <!-- Accreditation Overview -->
                    <div class="col-12">
                        <h5 class="text-muted mb-3">Accreditation Overview</h5>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="small-box bg-warning shadow rounded-3">
                            <div class="inner">
                                <h3 class="fw-bold">{{ number_format($accreditation->total_accredited, 0) }}</h3>
                                <p class="mb-0">Issued Accreditation</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-layer-group"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="small-box bg-success shadow rounded-3">
                            <div class="inner">
                                <h3 class="fw-bold">{{ number_format($accreditation->total_accredited_active, 0) }}
                                    <small class="text-light">({{ number_format(($accreditation->total_accredited_active/$accreditation->total_accredited)*100, 0) }}%)</small>
                                </h3>
                                <p class="mb-0">Active Accreditation</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-check-circle"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="small-box bg-danger shadow rounded-3">
                            <div class="inner">
                                <h3 class="fw-bold">{{ number_format($accreditation->total_accredited_expired, 0) }}
                                    <small class="text-light">({{ number_format(($accreditation->total_accredited_expired/$accreditation->total_accredited)*100, 0) }}%)</small>
                                </h3>
                                <p class="mb-0">Expired Accreditation</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-times-circle"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="small-box bg-info shadow rounded-3">
                            <div class="inner">
                                <h3 class="fw-bold">{{ number_format($newly_added_accreditations_prev_month, 0) }}</h3>
                                <p class="mb-0">New Accreditation<br>({{ $lastMonthWord }} {{ $lastMonthYear }})</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-plus-circle"></i>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Summary</h5>
                            </div>
                            <div class="card-body">
                                <ul class="nav nav-pills" id="summaryTabs" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="certification-tab" data-toggle="tab" href="#certification" role="tab" aria-controls="certification" aria-selected="true">
                                            <i class="fas fa-certificate mr-2"></i>Certification
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="accreditation-tab" data-toggle="tab" href="#accreditation" role="tab" aria-controls="accreditation" aria-selected="false">
                                            <i class="fas fa-university mr-2"></i>Accreditation
                                        </a>
                                    </li>
                                </ul>
                                    
                                    <!-- Tab Content -->
                                <div class="tab-content" id="summaryTabsContent">
                                    <div class="tab-pane fade show active" id="certification" role="tabpanel" aria-labelledby="certification-tab">
                                        <div class="card shadow-sm rounded">
                                            <div class="card-body">
                                                <table class="table table-bordered">
                                                    <thead style="text-align: center; vertical-align: middle">
                                                        <tr class="bg-dark">
                                                            <th style="position: sticky; top: 0; background-color: #343a40; z-index: 2;">Modality Class</th>
                                                            <th style="position: sticky; top: 0; background-color: #343a40; z-index: 2;">Male</th>
                                                            <th style="position: sticky; top: 0; background-color: #343a40; z-index: 2;">Female</th>
                                                            <th style="position: sticky; top: 0; background-color: #343a40; z-index: 2;">Filipino</th>
                                                            <th style="position: sticky; top: 0; background-color: #343a40; z-index: 2;">Foreign</th>
                                                            <th style="position: sticky; top: 0; background-color: #343a40; z-index: 2;">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tr>
                                                        <td style="text-align:center; font-weight: bold" colspan="6" class="bg-success">ACUPUNTURE</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold">Certified Medical Acupuncturist (CMA)</td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_male_cma, 0) }} <i>({{ $certification->total_certified_cma > 0 ? number_format(($certification->total_certified_male_cma/$certification->total_certified_cma)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_female_cma, 0) }} <i>({{ $certification->total_certified_cma > 0 ? number_format(($certification->total_certified_female_cma/$certification->total_certified_cma)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_filipino_cma, 0) }} <i>({{ $certification->total_certified_cma > 0 ? number_format(($certification->total_certified_filipino_cma/$certification->total_certified_cma)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_foreign_cma, 0) }} <i>({{ $certification->total_certified_cma > 0 ? number_format(($certification->total_certified_foreign_cma/$certification->total_certified_cma)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_cma, 0) }} <i>({{ $certification->total_certified_acupunture > 0 ? number_format(($certification->total_certified_cma/$certification->total_certified_acupunture)*100, 0) : 0 }}%)</i></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold">Certified Associate Medical Acupuncturist (CAMA)</td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_male_cama, 0) }} <i>({{ $certification->total_certified_cama > 0 ? number_format(($certification->total_certified_male_cama/$certification->total_certified_cama)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_female_cama, 0) }} <i>({{ $certification->total_certified_cama > 0 ? number_format(($certification->total_certified_female_cama/$certification->total_certified_cama)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_filipino_cama, 0) }} <i>({{ $certification->total_certified_cama > 0 ? number_format(($certification->total_certified_filipino_cama/$certification->total_certified_cama)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_foreign_cama, 0) }} <i>({{ $certification->total_certified_cama > 0 ? number_format(($certification->total_certified_foreign_cama/$certification->total_certified_cama)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_cama, 0) }} <i>({{ $certification->total_certified_acupunture > 0 ? number_format(($certification->total_certified_cama/$certification->total_certified_acupunture)*100, 0) : 0 }}%)</i></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold">Certified Acupuncturist (CA)</td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_male_ca, 0) }} <i>({{ $certification->total_certified_ca > 0 ? number_format(($certification->total_certified_male_ca/$certification->total_certified_ca)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_female_ca, 0) }} <i>({{ $certification->total_certified_ca > 0 ? number_format(($certification->total_certified_female_ca/$certification->total_certified_ca)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_filipino_ca, 0) }} <i>({{ $certification->total_certified_ca > 0 ? number_format(($certification->total_certified_filipino_ca/$certification->total_certified_ca)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_foreign_ca, 0) }} <i>({{ $certification->total_certified_ca > 0 ? number_format(($certification->total_certified_foreign_ca/$certification->total_certified_ca)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_ca, 0) }} <i>({{ $certification->total_certified_acupunture > 0 ? number_format(($certification->total_certified_ca/$certification->total_certified_acupunture)*100, 0) : 0 }}%)</i></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold">Certified Associate Acupuncturist (CAA)</td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_male_caa, 0) }} <i>({{ $certification->total_certified_caa > 0 ? number_format(($certification->total_certified_male_caa/$certification->total_certified_caa)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_female_caa, 0) }} <i>({{ $certification->total_certified_caa > 0 ? number_format(($certification->total_certified_female_caa/$certification->total_certified_caa)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_filipino_caa, 0) }} <i>({{ $certification->total_certified_caa > 0 ? number_format(($certification->total_certified_filipino_caa/$certification->total_certified_caa)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_foreign_caa, 0) }} <i>({{ $certification->total_certified_caa > 0 ? number_format(($certification->total_certified_foreign_caa/$certification->total_certified_caa)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_caa, 0) }} <i>({{ $certification->total_certified_acupunture > 0 ? number_format(($certification->total_certified_caa/$certification->total_certified_acupunture)*100, 0) : 0 }}%)</i></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold">Visiting Acupuncture Professor (VAP)</td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_male_vap, 0) }} <i>({{ $certification->total_certified_vap > 0 ? number_format(($certification->total_certified_male_vap/$certification->total_certified_vap)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_female_vap, 0) }} <i>({{ $certification->total_certified_vap > 0 ? number_format(($certification->total_certified_female_vap/$certification->total_certified_vap)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_filipino_vap, 0) }} <i>({{ $certification->total_certified_vap > 0 ? number_format(($certification->total_certified_filipino_vap/$certification->total_certified_vap)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_foreign_vap, 0) }} <i>({{ $certification->total_certified_vap > 0 ? number_format(($certification->total_certified_foreign_vap/$certification->total_certified_vap)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_vap, 0) }} <i>({{ $certification->total_certified_acupunture > 0 ? number_format(($certification->total_certified_vap/$certification->total_certified_acupunture)*100, 0) : 0 }}%)</i></td>
                                                    </tr>
                                                    <tr class="bg-secondary">
                                                        <td style="text-align:center; font-weight: bold">Subtotal (Acupuncture)</td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_male_acupunture, 0) }} <i>({{ $certification->total_certified_acupunture > 0 ? number_format(($certification->total_certified_male_acupunture/$certification->total_certified_acupunture)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_female_acupunture, 0) }} <i>({{ $certification->total_certified_acupunture > 0 ? number_format(($certification->total_certified_female_acupunture/$certification->total_certified_acupunture)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_filipino_acupunture, 0) }} <i>({{ $certification->total_certified_acupunture > 0 ? number_format(($certification->total_certified_filipino_acupunture/$certification->total_certified_acupunture)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_foreign_acupunture, 0) }} <i>({{ $certification->total_certified_acupunture > 0 ? number_format(($certification->total_certified_foreign_acupunture/$certification->total_certified_acupunture)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_acupunture, 0) }} <i>(100%)</i></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align:center; font-weight: bold" colspan="6" class="bg-success">CHIROPRACTIC</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold">Certified Chiropractor (CCH)</td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_male_cch, 0) }} <i>({{ $certification->total_certified_cch > 0 ? number_format(($certification->total_certified_male_cch/$certification->total_certified_cch)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_female_cch, 0) }} <i>({{ $certification->total_certified_cch > 0 ? number_format(($certification->total_certified_female_cch/$certification->total_certified_cch)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_filipino_cch, 0) }} <i>({{ $certification->total_certified_cch > 0 ? number_format(($certification->total_certified_filipino_cch/$certification->total_certified_cch)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_foreign_cch, 0) }} <i>({{ $certification->total_certified_cch > 0 ? number_format(($certification->total_certified_foreign_cch/$certification->total_certified_cch)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_cch, 0) }} <i>({{ $certification->total_certified_chiropractic > 0 ? number_format(($certification->total_certified_cch/$certification->total_certified_chiropractic)*100, 0) : 0 }}%)</i></td>
                                                    </tr>
                                                    <tr class="bg-secondary">
                                                        <td style="text-align:center; font-weight: bold">Subtotal (Chiropractic)</td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_male_chiropractic, 0) }} <i>({{ $certification->total_certified_chiropractic > 0 ? number_format(($certification->total_certified_male_chiropractic/$certification->total_certified_chiropractic)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_female_chiropractic, 0) }} <i>({{ $certification->total_certified_chiropractic > 0 ? number_format(($certification->total_certified_female_chiropractic/$certification->total_certified_chiropractic)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_filipino_chiropractic, 0) }} <i>({{ $certification->total_certified_chiropractic > 0 ? number_format(($certification->total_certified_filipino_chiropractic/$certification->total_certified_chiropractic)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_foreign_chiropractic, 0) }} <i>({{ $certification->total_certified_chiropractic > 0 ? number_format(($certification->total_certified_foreign_chiropractic/$certification->total_certified_chiropractic)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_chiropractic, 0) }} <i>(100%)</i></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align:center; font-weight: bold" colspan="6" class="bg-success">HILOT</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold">Certified Hilot Practitioners (CHP)</td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_male_chp, 0) }} <i>({{ $certification->total_certified_chp > 0 ? number_format(($certification->total_certified_male_chp/$certification->total_certified_chp)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_female_chp, 0) }} <i>({{ $certification->total_certified_chp > 0 ? number_format(($certification->total_certified_female_chp/$certification->total_certified_chp)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_filipino_chp, 0) }} <i>({{ $certification->total_certified_chp > 0 ? number_format(($certification->total_certified_filipino_chp/$certification->total_certified_chp)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_foreign_chp, 0) }} <i>({{ $certification->total_certified_chp > 0 ? number_format(($certification->total_certified_foreign_chp/$certification->total_certified_chp)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_chp, 0) }} <i>({{ $certification->total_certified_hilot > 0 ? number_format(($certification->total_certified_chp/$certification->total_certified_hilot)*100, 0) : 0 }}%)</i></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold">Recognized Hilot Practitioner (RHP)</td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_male_rhp, 0) }} <i>({{ $certification->total_certified_rhp > 0 ? number_format(($certification->total_certified_male_rhp/$certification->total_certified_rhp)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_female_rhp, 0) }} <i>({{ $certification->total_certified_rhp > 0 ? number_format(($certification->total_certified_female_rhp/$certification->total_certified_rhp)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_filipino_rhp, 0) }} <i>({{ $certification->total_certified_rhp > 0 ? number_format(($certification->total_certified_filipino_rhp/$certification->total_certified_rhp)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_foreign_rhp, 0) }} <i>({{ $certification->total_certified_rhp > 0 ? number_format(($certification->total_certified_foreign_rhp/$certification->total_certified_rhp)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_rhp, 0) }} <i>({{ $certification->total_certified_hilot > 0 ? number_format(($certification->total_certified_rhp/$certification->total_certified_hilot)*100, 0) : 0 }}%)</i></td>
                                                    </tr>
                                                    <tr class="bg-secondary">
                                                        <td style="text-align:center; font-weight: bold">Subtotal (Hilot)</td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_male_hilot, 0) }} <i>({{ $certification->total_certified_hilot > 0 ? number_format(($certification->total_certified_male_hilot/$certification->total_certified_hilot)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_female_hilot, 0) }} <i>({{ $certification->total_certified_hilot > 0 ? number_format(($certification->total_certified_female_hilot/$certification->total_certified_hilot)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_filipino_hilot, 0) }} <i>({{ $certification->total_certified_hilot > 0 ? number_format(($certification->total_certified_filipino_hilot/$certification->total_certified_hilot)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_foreign_hilot, 0) }} <i>({{ $certification->total_certified_hilot > 0 ? number_format(($certification->total_certified_foreign_hilot/$certification->total_certified_hilot)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_hilot, 0) }} <i>(100%)</i></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align:center; font-weight: bold" colspan="6" class="bg-success">HOMEOPATHY</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold">Certified Medical Homeopath (CMH)</td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_male_cmh, 0) }} <i>({{ $certification->total_certified_cmh > 0 ? number_format(($certification->total_certified_male_cmh/$certification->total_certified_cmh)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_female_cmh, 0) }} <i>({{ $certification->total_certified_cmh > 0 ? number_format(($certification->total_certified_female_cmh/$certification->total_certified_cmh)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_filipino_cmh, 0) }} <i>({{ $certification->total_certified_cmh > 0 ? number_format(($certification->total_certified_filipino_cmh/$certification->total_certified_cmh)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_foreign_cmh, 0) }} <i>({{ $certification->total_certified_cmh > 0 ? number_format(($certification->total_certified_foreign_cmh/$certification->total_certified_cmh)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_cmh, 0) }} <i>({{ $certification->total_certified_homeopathy > 0 ? number_format(($certification->total_certified_cmh/$certification->total_certified_homeopathy)*100, 0) : 0 }}%)</i></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold">Certified Homeopath (CH)</td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_male_ch, 0) }} <i>({{ $certification->total_certified_ch > 0 ? number_format(($certification->total_certified_male_ch/$certification->total_certified_ch)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_female_ch, 0) }} <i>({{ $certification->total_certified_ch > 0 ? number_format(($certification->total_certified_female_ch/$certification->total_certified_ch)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_filipino_ch, 0) }} <i>({{ $certification->total_certified_ch > 0 ? number_format(($certification->total_certified_filipino_ch/$certification->total_certified_ch)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_foreign_ch, 0) }} <i>({{ $certification->total_certified_ch > 0 ? number_format(($certification->total_certified_foreign_ch/$certification->total_certified_ch)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_ch, 0) }} <i>({{ $certification->total_certified_homeopathy > 0 ? number_format(($certification->total_certified_ch/$certification->total_certified_homeopathy)*100, 0) : 0 }}%)</i></td>
                                                    </tr>
                                                    <tr class="bg-secondary">
                                                        <td style="text-align:center; font-weight: bold">Subtotal (Homeopathy)</td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_male_homeopathy, 0) }} <i>({{ $certification->total_certified_homeopathy > 0 ? number_format(($certification->total_certified_male_homeopathy/$certification->total_certified_homeopathy)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_female_homeopathy, 0) }} <i>({{ $certification->total_certified_homeopathy > 0 ? number_format(($certification->total_certified_female_homeopathy/$certification->total_certified_homeopathy)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_filipino_homeopathy, 0) }} <i>({{ $certification->total_certified_homeopathy > 0 ? number_format(($certification->total_certified_filipino_homeopathy/$certification->total_certified_homeopathy)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_foreign_homeopathy, 0) }} <i>({{ $certification->total_certified_homeopathy > 0 ? number_format(($certification->total_certified_foreign_homeopathy/$certification->total_certified_homeopathy)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_homeopathy, 0) }} <i>(100%)</i></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align:center; font-weight: bold" colspan="6" class="bg-success">NATUROPATHY</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold">Certified Medical Naturopath (CMN)</td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_male_cmn, 0) }} <i>({{ $certification->total_certified_cmn > 0 ? number_format(($certification->total_certified_male_cmn/$certification->total_certified_cmn)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_female_cmn, 0) }} <i>({{ $certification->total_certified_cmn > 0 ? number_format(($certification->total_certified_female_cmn/$certification->total_certified_cmn)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_filipino_cmn, 0) }} <i>({{ $certification->total_certified_cmn > 0 ? number_format(($certification->total_certified_filipino_cmn/$certification->total_certified_cmn)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_foreign_cmn, 0) }} <i>({{ $certification->total_certified_cmn > 0 ? number_format(($certification->total_certified_foreign_cmn/$certification->total_certified_cmn)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_cmn, 0) }} <i>({{ $certification->total_certified_naturopathy > 0 ? number_format(($certification->total_certified_cmn/$certification->total_certified_naturopathy)*100, 0) : 0 }}%)</i></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold">Certified Naturopath Practitioner (CNP)</td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_male_cnp, 0) }} <i>({{ $certification->total_certified_cnp > 0 ? number_format(($certification->total_certified_male_cnp/$certification->total_certified_cnp)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_female_cnp, 0) }} <i>({{ $certification->total_certified_cnp > 0 ? number_format(($certification->total_certified_female_cnp/$certification->total_certified_cnp)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_filipino_cnp, 0) }} <i>({{ $certification->total_certified_cnp > 0 ? number_format(($certification->total_certified_filipino_cnp/$certification->total_certified_cnp)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_foreign_cnp, 0) }} <i>({{ $certification->total_certified_cnp > 0 ? number_format(($certification->total_certified_foreign_cnp/$certification->total_certified_cnp)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_cnp, 0) }} <i>({{ $certification->total_certified_naturopathy > 0 ? number_format(($certification->total_certified_cnp/$certification->total_certified_naturopathy)*100, 0) : 0 }}%)</i></td>
                                                    </tr>
                                                    <tr class="bg-secondary">
                                                        <td style="text-align:center; font-weight: bold">Subtotal (Naturopathy)</td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_male_naturopathy, 0) }} <i>({{ $certification->total_certified_naturopathy > 0 ? number_format(($certification->total_certified_male_naturopathy/$certification->total_certified_naturopathy)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_female_naturopathy, 0) }} <i>({{ $certification->total_certified_naturopathy > 0 ? number_format(($certification->total_certified_female_naturopathy/$certification->total_certified_naturopathy)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_filipino_naturopathy, 0) }} <i>({{ $certification->total_certified_naturopathy > 0 ? number_format(($certification->total_certified_filipino_naturopathy/$certification->total_certified_naturopathy)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_foreign_naturopathy, 0) }} <i>({{ $certification->total_certified_naturopathy > 0 ? number_format(($certification->total_certified_foreign_naturopathy/$certification->total_certified_naturopathy)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_naturopathy, 0) }} <i>(100%)</i></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align:center; font-weight: bold" colspan="6" class="bg-success">OSTEOPATHY</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold">Certified Osteopath (CO)</td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_male_co, 0) }} <i>({{ $certification->total_certified_co > 0 ? number_format(($certification->total_certified_male_co/$certification->total_certified_co)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_female_co, 0) }} <i>({{ $certification->total_certified_co > 0 ? number_format(($certification->total_certified_female_co/$certification->total_certified_co)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_filipino_co, 0) }} <i>({{ $certification->total_certified_co > 0 ? number_format(($certification->total_certified_filipino_co/$certification->total_certified_co)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_foreign_co, 0) }} <i>({{ $certification->total_certified_co > 0 ? number_format(($certification->total_certified_foreign_co/$certification->total_certified_co)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_co, 0) }} <i>({{ $certification->total_certified_osteopathy > 0 ? number_format(($certification->total_certified_co/$certification->total_certified_osteopathy)*100, 0) : 0 }}%)</i></td>
                                                    </tr>
                                                    <tr class="bg-secondary">
                                                        <td style="text-align:center; font-weight: bold">Subtotal (Osteopathy)</td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_male_osteopathy, 0) }} <i>({{ $certification->total_certified_osteopathy > 0 ? number_format(($certification->total_certified_male_osteopathy/$certification->total_certified_osteopathy)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_female_osteopathy, 0) }} <i>({{ $certification->total_certified_osteopathy > 0 ? number_format(($certification->total_certified_female_osteopathy/$certification->total_certified_osteopathy)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_filipino_osteopathy, 0) }} <i>({{ $certification->total_certified_osteopathy > 0 ? number_format(($certification->total_certified_filipino_osteopathy/$certification->total_certified_osteopathy)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_foreign_osteopathy, 0) }} <i>({{ $certification->total_certified_osteopathy > 0 ? number_format(($certification->total_certified_foreign_osteopathy/$certification->total_certified_osteopathy)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_osteopathy, 0) }} <i>(100%)</i></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align:center; font-weight: bold" colspan="6" class="bg-success">TRADITIONAL CHINESE MEDICINE</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold">Certified TCM Practitioner (CTMCP)</td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_male_ctmcp, 0) }} <i>({{ $certification->total_certified_ctmcp > 0 ? number_format(($certification->total_certified_male_ctmcp/$certification->total_certified_ctmcp)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_female_ctmcp, 0) }} <i>({{ $certification->total_certified_ctmcp > 0 ? number_format(($certification->total_certified_female_ctmcp/$certification->total_certified_ctmcp)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_filipino_ctmcp, 0) }} <i>({{ $certification->total_certified_ctmcp > 0 ? number_format(($certification->total_certified_filipino_ctmcp/$certification->total_certified_ctmcp)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_foreign_ctmcp, 0) }} <i>({{ $certification->total_certified_ctmcp > 0 ? number_format(($certification->total_certified_foreign_ctmcp/$certification->total_certified_ctmcp)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_ctmcp, 0) }} <i>({{ $certification->total_certified_tcm > 0 ? number_format(($certification->total_certified_ctmcp/$certification->total_certified_tcm)*100, 0) : 0 }}%)</i></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold">Certified Chinese Medicine Dispenser (CCMD)</td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_male_ccmd, 0) }} <i>({{ $certification->total_certified_ccmd > 0 ? number_format(($certification->total_certified_male_ccmd/$certification->total_certified_ccmd)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_female_ccmd, 0) }} <i>({{ $certification->total_certified_ccmd > 0 ? number_format(($certification->total_certified_female_ccmd/$certification->total_certified_ccmd)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_filipino_ccmd, 0) }} <i>({{ $certification->total_certified_ccmd > 0 ? number_format(($certification->total_certified_filipino_ccmd/$certification->total_certified_ccmd)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_foreign_ccmd, 0) }} <i>({{ $certification->total_certified_ccmd > 0 ? number_format(($certification->total_certified_foreign_ccmd/$certification->total_certified_ccmd)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_ccmd, 0) }} <i>({{ $certification->total_certified_tcm > 0 ? number_format(($certification->total_certified_ccmd/$certification->total_certified_tcm)*100, 0) : 0 }}%)</i></td>
                                                    </tr>
                                                    <tr class="bg-secondary">
                                                        <td style="text-align:center; font-weight: bold">Subtotal (Traditional Chinese Medicine)</td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_male_tcm, 0) }} <i>({{ $certification->total_certified_tcm > 0 ? number_format(($certification->total_certified_male_tcm/$certification->total_certified_tcm)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_female_tcm, 0) }} <i>({{ $certification->total_certified_tcm > 0 ? number_format(($certification->total_certified_female_tcm/$certification->total_certified_tcm)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_filipino_tcm, 0) }} <i>({{ $certification->total_certified_tcm > 0 ? number_format(($certification->total_certified_filipino_tcm/$certification->total_certified_tcm)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_foreign_tcm, 0) }} <i>({{ $certification->total_certified_tcm > 0 ? number_format(($certification->total_certified_foreign_tcm/$certification->total_certified_tcm)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_tcm, 0) }} <i>(100%)</i></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align:center; font-weight: bold" colspan="6" class="bg-success">TUINA MASSAGE</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold">Certified Associate Tuina Massage Therapist (CATMT)</td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_male_catmt, 0) }} <i>({{ $certification->total_certified_catmt > 0 ? number_format(($certification->total_certified_male_catmt/$certification->total_certified_catmt)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_female_catmt, 0) }} <i>({{ $certification->total_certified_catmt > 0 ? number_format(($certification->total_certified_female_catmt/$certification->total_certified_catmt)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_filipino_catmt, 0) }} <i>({{ $certification->total_certified_catmt > 0 ? number_format(($certification->total_certified_filipino_catmt/$certification->total_certified_catmt)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_foreign_catmt, 0) }} <i>({{ $certification->total_certified_catmt > 0 ? number_format(($certification->total_certified_foreign_catmt/$certification->total_certified_catmt)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_catmt, 0) }} <i>({{ $certification->total_certified_tuina > 0 ? number_format(($certification->total_certified_catmt/$certification->total_certified_tuina)*100, 0) : 0 }}%)</i></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold">Certified Tuina Massage Therapist (CTMT)</td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_male_ctmt, 0) }} <i>({{ $certification->total_certified_ctmt > 0 ? number_format(($certification->total_certified_male_ctmt/$certification->total_certified_ctmt)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_female_ctmt, 0) }} <i>({{ $certification->total_certified_ctmt > 0 ? number_format(($certification->total_certified_female_ctmt/$certification->total_certified_ctmt)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_filipino_ctmt, 0) }} <i>({{ $certification->total_certified_ctmt > 0 ? number_format(($certification->total_certified_filipino_ctmt/$certification->total_certified_ctmt)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_foreign_ctmt, 0) }} <i>({{ $certification->total_certified_ctmt > 0 ? number_format(($certification->total_certified_foreign_ctmt/$certification->total_certified_ctmt)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_ctmt, 0) }} <i>({{ $certification->total_certified_tuina > 0 ? number_format(($certification->total_certified_ctmt/$certification->total_certified_tuina)*100, 0) : 0 }}%)</i></td>
                                                    </tr>
                                                    <tr class="bg-secondary">
                                                        <td style="text-align:center; font-weight: bold">Subtotal (Tuina Massage)</td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_male_tuina, 0) }} <i>({{ $certification->total_certified_tuina > 0 ? number_format(($certification->total_certified_male_tuina/$certification->total_certified_tuina)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_female_tuina, 0) }} <i>({{ $certification->total_certified_tuina > 0 ? number_format(($certification->total_certified_female_tuina/$certification->total_certified_tuina)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_filipino_tuina, 0) }} <i>({{ $certification->total_certified_tuina > 0 ? number_format(($certification->total_certified_filipino_tuina/$certification->total_certified_tuina)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_foreign_tuina, 0) }} <i>({{ $certification->total_certified_tuina > 0 ? number_format(($certification->total_certified_foreign_tuina/$certification->total_certified_tuina)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_tuina, 0) }} <i>(100%)</i></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align:center; font-weight: bold" colspan="6" class="bg-success">ANTHROPOSOPHIC MEDICINE</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold">Certified Anthroposophic Health Provider (CAHP)</td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_male_cahp, 0) }} <i>({{ $certification->total_certified_cahp > 0 ? number_format(($certification->total_certified_male_cahp/$certification->total_certified_cahp)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_female_cahp, 0) }} <i>({{ $certification->total_certified_cahp > 0 ? number_format(($certification->total_certified_female_cahp/$certification->total_certified_cahp)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_filipino_cahp, 0) }} <i>({{ $certification->total_certified_cahp > 0 ? number_format(($certification->total_certified_filipino_cahp/$certification->total_certified_cahp)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_foreign_cahp, 0) }} <i>({{ $certification->total_certified_cahp > 0 ? number_format(($certification->total_certified_foreign_cahp/$certification->total_certified_cahp)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_cahp, 0) }} <i>({{ $certification->total_certified_anthroposophic > 0 ? number_format(($certification->total_certified_cahp/$certification->total_certified_anthroposophic)*100, 0) : 0 }}%)</i></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold">Certified Associate Anthroposophic Practitioner (CAAP)</td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_male_caap, 0) }} <i>({{ $certification->total_certified_caap > 0 ? number_format(($certification->total_certified_male_caap/$certification->total_certified_caap)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_female_caap, 0) }} <i>({{ $certification->total_certified_caap > 0 ? number_format(($certification->total_certified_female_caap/$certification->total_certified_caap)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_filipino_caap, 0) }} <i>({{ $certification->total_certified_caap > 0 ? number_format(($certification->total_certified_filipino_caap/$certification->total_certified_caap)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_foreign_caap, 0) }} <i>({{ $certification->total_certified_caap > 0 ? number_format(($certification->total_certified_foreign_caap/$certification->total_certified_caap)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_caap, 0) }} <i>({{ $certification->total_certified_anthroposophic > 0 ? number_format(($certification->total_certified_caap/$certification->total_certified_anthroposophic)*100, 0) : 0 }}%)</i></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold">Certified Associate Anthroposophic Medical Practitioner (CAAMP)</td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_male_caamp, 0) }} <i>({{ $certification->total_certified_caamp > 0 ? number_format(($certification->total_certified_male_caamp/$certification->total_certified_caamp)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_female_caamp, 0) }} <i>({{ $certification->total_certified_caamp > 0 ? number_format(($certification->total_certified_female_caamp/$certification->total_certified_caamp)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_filipino_caamp, 0) }} <i>({{ $certification->total_certified_caamp > 0 ? number_format(($certification->total_certified_filipino_caamp/$certification->total_certified_caamp)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_foreign_caamp, 0) }} <i>({{ $certification->total_certified_caamp > 0 ? number_format(($certification->total_certified_foreign_caamp/$certification->total_certified_caamp)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_caamp, 0) }} <i>({{ $certification->total_certified_anthroposophic > 0 ? number_format(($certification->total_certified_caamp/$certification->total_certified_anthroposophic)*100, 0) : 0 }}%)</i></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold">Certified Anthroposophic Medical Practitioner (CAMP)</td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_male_camp, 0) }} <i>({{ $certification->total_certified_camp > 0 ? number_format(($certification->total_certified_male_camp/$certification->total_certified_camp)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_female_camp, 0) }} <i>({{ $certification->total_certified_camp > 0 ? number_format(($certification->total_certified_female_camp/$certification->total_certified_camp)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_filipino_camp, 0) }} <i>({{ $certification->total_certified_camp > 0 ? number_format(($certification->total_certified_filipino_camp/$certification->total_certified_camp)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_foreign_camp, 0) }} <i>({{ $certification->total_certified_camp > 0 ? number_format(($certification->total_certified_foreign_camp/$certification->total_certified_camp)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_camp, 0) }} <i>({{ $certification->total_certified_anthroposophic > 0 ? number_format(($certification->total_certified_camp/$certification->total_certified_anthroposophic)*100, 0) : 0 }}%)</i></td>
                                                    </tr>
                                                    <tr class="bg-secondary">
                                                        <td style="text-align:center; font-weight: bold">Subtotal (Anthroposophic Medicine)</td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_male_anthroposophic, 0) }} <i>({{ $certification->total_certified_anthroposophic > 0 ? number_format(($certification->total_certified_male_anthroposophic/$certification->total_certified_anthroposophic)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_female_anthroposophic, 0) }} <i>({{ $certification->total_certified_anthroposophic > 0 ? number_format(($certification->total_certified_female_anthroposophic/$certification->total_certified_anthroposophic)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_filipino_anthroposophic, 0) }} <i>({{ $certification->total_certified_anthroposophic > 0 ? number_format(($certification->total_certified_filipino_anthroposophic/$certification->total_certified_anthroposophic)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_foreign_anthroposophic, 0) }} <i>({{ $certification->total_certified_anthroposophic > 0 ? number_format(($certification->total_certified_foreign_anthroposophic/$certification->total_certified_anthroposophic)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_anthroposophic, 0) }} <i>(100%)</i></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align:center; font-weight: bold" colspan="6" class="bg-success">AYURVEDA</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold">Certified Ayurveda Lifestyle Practitioner (CALP)</td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_male_calp, 0) }} <i>({{ $certification->total_certified_calp > 0 ? number_format(($certification->total_certified_male_calp/$certification->total_certified_calp)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_female_calp, 0) }} <i>({{ $certification->total_certified_calp > 0 ? number_format(($certification->total_certified_female_calp/$certification->total_certified_calp)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_filipino_calp, 0) }} <i>({{ $certification->total_certified_calp > 0 ? number_format(($certification->total_certified_filipino_calp/$certification->total_certified_calp)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_foreign_calp, 0) }} <i>({{ $certification->total_certified_calp > 0 ? number_format(($certification->total_certified_foreign_calp/$certification->total_certified_calp)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_calp, 0) }} <i>({{ $certification->total_certified_ayurveda > 0 ? number_format(($certification->total_certified_calp/$certification->total_certified_ayurveda)*100, 0) : 0 }}%)</i></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold">Certified Ayurveda Lifestyle Teacher (CALT)</td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_male_calt, 0) }} <i>({{ $certification->total_certified_calt > 0 ? number_format(($certification->total_certified_male_calt/$certification->total_certified_calt)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_female_calt, 0) }} <i>({{ $certification->total_certified_calt > 0 ? number_format(($certification->total_certified_female_calt/$certification->total_certified_calt)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_filipino_calt, 0) }} <i>({{ $certification->total_certified_calt > 0 ? number_format(($certification->total_certified_filipino_calt/$certification->total_certified_calt)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_foreign_calt, 0) }} <i>({{ $certification->total_certified_calt > 0 ? number_format(($certification->total_certified_foreign_calt/$certification->total_certified_calt)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_calt, 0) }} <i>({{ $certification->total_certified_ayurveda > 0 ? number_format(($certification->total_certified_calt/$certification->total_certified_ayurveda)*100, 0) : 0 }}%)</i></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold">Certified AyurvedaTherapist (CAT)</td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_male_cat, 0) }} <i>({{ $certification->total_certified_cat > 0 ? number_format(($certification->total_certified_male_cat/$certification->total_certified_cat)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_female_cat, 0) }} <i>({{ $certification->total_certified_cat > 0 ? number_format(($certification->total_certified_female_cat/$certification->total_certified_cat)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_filipino_cat, 0) }} <i>({{ $certification->total_certified_cat > 0 ? number_format(($certification->total_certified_filipino_cat/$certification->total_certified_cat)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_foreign_cat, 0) }} <i>({{ $certification->total_certified_cat > 0 ? number_format(($certification->total_certified_foreign_cat/$certification->total_certified_cat)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_cat, 0) }} <i>({{ $certification->total_certified_ayurveda > 0 ? number_format(($certification->total_certified_cat/$certification->total_certified_ayurveda)*100, 0) : 0 }}%)</i></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold">Certified Ayurveda Specialist (CAS)</td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_male_cas, 0) }} <i>({{ $certification->total_certified_cas > 0 ? number_format(($certification->total_certified_male_cas/$certification->total_certified_cas)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_female_cas, 0) }} <i>({{ $certification->total_certified_cas > 0 ? number_format(($certification->total_certified_female_cas/$certification->total_certified_cas)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_filipino_cas, 0) }} <i>({{ $certification->total_certified_cas > 0 ? number_format(($certification->total_certified_filipino_cas/$certification->total_certified_cas)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center">{{ number_format($certification->total_certified_foreign_cas, 0) }} <i>({{ $certification->total_certified_cas > 0 ? number_format(($certification->total_certified_foreign_cas/$certification->total_certified_cas)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_cas, 0) }} <i>({{ $certification->total_certified_ayurveda > 0 ? number_format(($certification->total_certified_cas/$certification->total_certified_ayurveda)*100, 0) : 0 }}%)</i></td>
                                                    </tr>
                                                    <tr class="bg-secondary">
                                                        <td style="text-align:center; font-weight: bold">Subtotal (Ayurveda)</td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_male_ayurveda, 0) }} <i>({{ $certification->total_certified_ayurveda > 0 ? number_format(($certification->total_certified_male_ayurveda/$certification->total_certified_ayurveda)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_female_ayurveda, 0) }} <i>({{ $certification->total_certified_ayurveda > 0 ? number_format(($certification->total_certified_female_ayurveda/$certification->total_certified_ayurveda)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_filipino_ayurveda, 0) }} <i>({{ $certification->total_certified_ayurveda > 0 ? number_format(($certification->total_certified_filipino_ayurveda/$certification->total_certified_ayurveda)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_foreign_ayurveda, 0) }} <i>({{ $certification->total_certified_ayurveda > 0 ? number_format(($certification->total_certified_foreign_ayurveda/$certification->total_certified_ayurveda)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_ayurveda, 0) }} <i>(100%)</i></td>
                                                    </tr>
                                                    <tr class="bg-dark">
                                                        <td style="text-align:center; font-weight: bold">Total</td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_male, 0) }} <i>({{ $certification->total_certified > 0 ? number_format(($certification->total_certified_male/$certification->total_certified)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_female, 0) }} <i>({{ $certification->total_certified > 0 ? number_format(($certification->total_certified_female/$certification->total_certified)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_filipino, 0) }} <i>({{ $certification->total_certified > 0 ? number_format(($certification->total_certified_filipino/$certification->total_certified)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified_foreign, 0) }} <i>({{ $certification->total_certified > 0 ? number_format(($certification->total_certified_foreign/$certification->total_certified)*100, 0) : 0 }}%)</i></td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($certification->total_certified, 0) }} <i>(100%)</i></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="accreditation" role="tabpanel" aria-labelledby="accreditation-tab">
                                        <div class="card shadow-sm rounded">
                                            <div class="card-body">
                                                <table class="table table-bordered">
                                                    <thead style="text-align: center; vertical-align: middle">
                                                        <tr class="bg-dark">
                                                            <th style="position: sticky; top: 0; background-color: #343a40; z-index: 2;">Modality Class</th>
                                                            <th style="position: sticky; top: 0; background-color: #343a40; z-index: 2;">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tr>
                                                        <td style="text-align:center; font-weight: bold" colspan="6" class="bg-success">ACUPUNTURE</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold">Acu Training Center (ATC)</td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($accreditation->total_accredited_atc, 0) }} <i>({{ $accreditation->total_accredited_acupunture > 0 ? number_format(($accreditation->total_accredited_atc/$accreditation->total_accredited_acupunture)*100, 0) : 0 }}%)</i></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold">Acu Training Center Com (ATCC)</td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($accreditation->total_accredited_atcc, 0) }} <i>({{ $accreditation->total_accredited_acupunture > 0 ? number_format(($accreditation->total_accredited_atcc/$accreditation->total_accredited_acupunture)*100, 0) : 0 }}%)</i></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold">Acu Clinic (AC)</td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($accreditation->total_accredited_ac, 0) }} <i>({{ $accreditation->total_accredited_acupunture > 0 ? number_format(($accreditation->total_accredited_ac/$accreditation->total_accredited_acupunture)*100, 0) : 0 }}%)</i></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold">Acu Clinic Com (ACC)</td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($accreditation->total_accredited_acc, 0) }} <i>({{ $accreditation->total_accredited_acupunture > 0 ? number_format(($accreditation->total_accredited_acc/$accreditation->total_accredited_acupunture)*100, 0) : 0 }}%)</i></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold">TAHC Organizations (Acupuncture) (TOAC)</td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($accreditation->total_accredited_toac, 0) }} <i>({{ $accreditation->total_accredited_acupunture > 0 ? number_format(($accreditation->total_accredited_toac/$accreditation->total_accredited_acupunture)*100, 0) : 0 }}%)</i></td>
                                                    </tr>
                                                    <tr class="bg-secondary">
                                                        <td style="text-align:center; font-weight: bold">Subtotal (Acupuncture)</td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($accreditation->total_accredited_acupunture, 0) }} <i>(100%)</i></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align:center; font-weight: bold" colspan="6" class="bg-success">CHIROPRACTIC</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold">Chiropractic Clinic (CC)</td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($accreditation->total_accredited_ctc, 0) }} <i>({{ $accreditation->total_accredited_chiropractic > 0 ? number_format(($accreditation->total_accredited_ctc/$accreditation->total_accredited_chiropractic)*100, 0) : 0 }}%)</i></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold">Chiro Training Center (CTC)</td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($accreditation->total_accredited_cc, 0) }} <i>({{ $accreditation->total_accredited_chiropractic > 0 ? number_format(($accreditation->total_accredited_cc/$accreditation->total_accredited_chiropractic)*100, 0) : 0 }}%)</i></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold">TAHC Organizations (Chiropractic) (TOC)</td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($accreditation->total_accredited_toc, 0) }} <i>({{ $accreditation->total_accredited_chiropractic > 0 ? number_format(($accreditation->total_accredited_toc/$accreditation->total_accredited_chiropractic)*100, 0) : 0 }}%)</i></td>
                                                    </tr>
                                                    <tr class="bg-secondary">
                                                        <td style="text-align:center; font-weight: bold">Subtotal (Chiropractic)</td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($accreditation->total_accredited_chiropractic, 0) }} <i>(100%)</i></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align:center; font-weight: bold" colspan="6" class="bg-success">HILOT</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold">Hilot Training Center (Type A) (HTCA)</td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($accreditation->total_accredited_htca, 0) }} <i>({{ $accreditation->total_accredited_hilot > 0 ? number_format(($accreditation->total_accredited_htca/$accreditation->total_accredited_hilot)*100, 0) : 0 }}%)</i></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold">Hilot Training Center (Type B) (HTCB)</td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($accreditation->total_accredited_htcb, 0) }} <i>({{ $accreditation->total_accredited_hilot > 0 ? number_format(($accreditation->total_accredited_htcb/$accreditation->total_accredited_hilot)*100, 0) : 0 }}%)</i></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold">Hilot Training Center (Type C) (HTCC)</td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($accreditation->total_accredited_htcc, 0) }} <i>({{ $accreditation->total_accredited_hilot > 0 ? number_format(($accreditation->total_accredited_htcc/$accreditation->total_accredited_hilot)*100, 0) : 0 }}%)</i></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold">Hilot Healing Center (Type A) (HHCA)</td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($accreditation->total_accredited_hhca, 0) }} <i>({{ $accreditation->total_accredited_hilot > 0 ? number_format(($accreditation->total_accredited_hhca/$accreditation->total_accredited_hilot)*100, 0) : 0 }}%)</i></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold">Hilot Healing Center (Type B) (HHCB)</td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($accreditation->total_accredited_hhcb, 0) }} <i>({{ $accreditation->total_accredited_hilot > 0 ? number_format(($accreditation->total_accredited_hhcb/$accreditation->total_accredited_hilot)*100, 0) : 0 }}%)</i></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold">Hilot Healing Center (Type C) (HHCC)</td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($accreditation->total_accredited_hhcc, 0) }} <i>({{ $accreditation->total_accredited_hilot > 0 ? number_format(($accreditation->total_accredited_hhcc/$accreditation->total_accredited_hilot)*100, 0) : 0 }}%)</i></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold">Hilot Healing Center (Type D) (HHCD)</td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($accreditation->total_accredited_hhcd, 0) }} <i>({{ $accreditation->total_accredited_hilot > 0 ? number_format(($accreditation->total_accredited_hhcd/$accreditation->total_accredited_hilot)*100, 0) : 0 }}%)</i></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold">TAHC Organizations (Hilot) (TOH)</td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($accreditation->total_accredited_toh, 0) }} <i>({{ $accreditation->total_accredited_hilot > 0 ? number_format(($accreditation->total_accredited_toh/$accreditation->total_accredited_hilot)*100, 0) : 0 }}%)</i></td>
                                                    </tr>
                                                    <tr class="bg-secondary">
                                                        <td style="text-align:center; font-weight: bold">Subtotal (Hilot)</td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($accreditation->total_accredited_hilot, 0) }} <i>(100%)</i></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align:center; font-weight: bold" colspan="6" class="bg-success">HOMEOPATHY</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold">Homeo/Homotox Training Center (HHXTC)</td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($accreditation->total_accredited_hhxtc, 0) }} <i>({{ $accreditation->total_accredited_homeopathy > 0 ? number_format(($accreditation->total_accredited_hhxtc/$accreditation->total_accredited_homeopathy)*100, 0) : 0 }}%)</i></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold">Homeo/Homotox Clinic or HC (HHXC)</td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($accreditation->total_accredited_hhxc, 0) }} <i>({{ $accreditation->total_accredited_homeopathy > 0 ? number_format(($accreditation->total_accredited_hhxc/$accreditation->total_accredited_homeopathy)*100, 0) : 0 }}%)</i></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold">Homeo/Homotox Clinic Com (HHXCC)</td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($accreditation->total_accredited_hhxcc, 0) }} <i>({{ $accreditation->total_accredited_homeopathy > 0 ? number_format(($accreditation->total_accredited_hhxcc/$accreditation->total_accredited_homeopathy)*100, 0) : 0 }}%)</i></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold">TAHC Organizations (Homeopathy) (TOHH)</td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($accreditation->total_accredited_tohh, 0) }} <i>({{ $accreditation->total_accredited_homeopathy > 0 ? number_format(($accreditation->total_accredited_tohh/$accreditation->total_accredited_homeopathy)*100, 0) : 0 }}%)</i></td>
                                                    </tr>
                                                    <tr class="bg-secondary">
                                                        <td style="text-align:center; font-weight: bold">Subtotal (Homeopathy)</td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($accreditation->total_accredited_homeopathy, 0) }} <i>(100%)</i></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align:center; font-weight: bold" colspan="6" class="bg-success">NATUROPATHY</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold">Nat Training Center (NTC)</td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($accreditation->total_accredited_ntc, 0) }} <i>({{ $accreditation->total_accredited_naturopathy > 0 ? number_format(($accreditation->total_accredited_ntc/$accreditation->total_accredited_naturopathy)*100, 0) : 0 }}%)</i></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold">Nat Training Center Com (NTCC)</td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($accreditation->total_accredited_ntcc, 0) }} <i>({{ $accreditation->total_accredited_naturopathy > 0 ? number_format(($accreditation->total_accredited_ntcc/$accreditation->total_accredited_naturopathy)*100, 0) : 0 }}%)</i></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold">Nat Center/Facilities (NCF)</td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($accreditation->total_accredited_ncf, 0) }} <i>({{ $accreditation->total_accredited_naturopathy > 0 ? number_format(($accreditation->total_accredited_ncf/$accreditation->total_accredited_naturopathy)*100, 0) : 0 }}%)</i></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold">Nat Center/Facilities Com (NCFC)</td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($accreditation->total_accredited_ncfc, 0) }} <i>({{ $accreditation->total_accredited_naturopathy > 0 ? number_format(($accreditation->total_accredited_ncfc/$accreditation->total_accredited_naturopathy)*100, 0) : 0 }}%)</i></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold">TAHC Organizations (Naturopathy) (TON)</td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($accreditation->total_accredited_ton, 0) }} <i>({{ $accreditation->total_accredited_naturopathy > 0 ? number_format(($accreditation->total_accredited_ton/$accreditation->total_accredited_naturopathy)*100, 0) : 0 }}%)</i></td>
                                                    </tr>
                                                    <tr class="bg-secondary">
                                                        <td style="text-align:center; font-weight: bold">Subtotal (Naturopathy)</td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($accreditation->total_accredited_naturopathy, 0) }} <i>(100%)</i></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align:center; font-weight: bold" colspan="6" class="bg-success">OSTEOPATHY</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold">Osteo Training Center (OTC)</td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($accreditation->total_accredited_otc, 0) }} <i>({{ $accreditation->total_accredited_osteopathy > 0 ? number_format(($accreditation->total_accredited_otc/$accreditation->total_accredited_osteopathy)*100, 0) : 0 }}%)</i></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold">Osteopathy Clinc (OC)</td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($accreditation->total_accredited_oc, 0) }} <i>({{ $accreditation->total_accredited_osteopathy > 0 ? number_format(($accreditation->total_accredited_oc/$accreditation->total_accredited_osteopathy)*100, 0) : 0 }}%)</i></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold">TAHC Organizations (Osteopathy) (TOO)</td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($accreditation->total_accredited_too, 0) }} <i>({{ $accreditation->total_accredited_osteopathy > 0 ? number_format(($accreditation->total_accredited_too/$accreditation->total_accredited_osteopathy)*100, 0) : 0 }}%)</i></td>
                                                    </tr>
                                                    <tr class="bg-secondary">
                                                        <td style="text-align:center; font-weight: bold">Subtotal (Osteopathy)</td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($accreditation->total_accredited_osteopathy, 0) }} <i>(100%)</i></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align:center; font-weight: bold" colspan="6" class="bg-success">TRADITIONAL CHINESE MEDICINE</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold">TCM Training Center (TCMTC)</td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($accreditation->total_accredited_tcmtc, 0) }} <i>({{ $accreditation->total_accredited_tcmtc > 0 ? number_format(($accreditation->total_accredited_ctmcp/$accreditation->total_accredited_tcm)*100, 0) : 0 }}%)</i></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold">TCM Clinic (TCMC)</td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($accreditation->total_accredited_tcmc, 0) }} <i>({{ $accreditation->total_accredited_tcmc > 0 ? number_format(($accreditation->total_accredited_ccmd/$accreditation->total_accredited_tcm)*100, 0) : 0 }}%)</i></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold">TAHC Organizations (Traditional Chinese Medicine) (TOTCM)</td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($accreditation->total_accredited_totcm, 0) }} <i>({{ $accreditation->total_accredited_totcm > 0 ? number_format(($accreditation->total_accredited_ccmd/$accreditation->total_accredited_tcm)*100, 0) : 0 }}%)</i></td>
                                                    </tr>
                                                    <tr class="bg-secondary">
                                                        <td style="text-align:center; font-weight: bold">Subtotal (Traditional Chinese Medicine)</td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($accreditation->total_accredited_tcm, 0) }} <i>(100%)</i></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align:center; font-weight: bold" colspan="6" class="bg-success">TUINA MASSAGE</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold">Tuina Massage Training Center Com (TMTCC)</td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($accreditation->total_accredited_tmtcc, 0) }} <i>({{ $accreditation->total_accredited_tuina > 0 ? number_format(($accreditation->total_accredited_tmtcc/$accreditation->total_accredited_tuina)*100, 0) : 0 }}%)</i></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold">Tuina Massage Training Center (TMTC)</td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($accreditation->total_accredited_tmtc, 0) }} <i>({{ $accreditation->total_accredited_tuina > 0 ? number_format(($accreditation->total_accredited_tmtc/$accreditation->total_accredited_tuina)*100, 0) : 0 }}%)</i></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold">Tuina Massage Clinic (TMC)</td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($accreditation->total_accredited_tmc, 0) }} <i>({{ $accreditation->total_accredited_tuina > 0 ? number_format(($accreditation->total_accredited_tmc/$accreditation->total_accredited_tuina)*100, 0) : 0 }}%)</i></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold">Tuina Massage Clinic Com (TMCC)</td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($accreditation->total_accredited_tmcc, 0) }} <i>({{ $accreditation->total_accredited_tuina > 0 ? number_format(($accreditation->total_accredited_tmcc/$accreditation->total_accredited_tuina)*100, 0) : 0 }}%)</i></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold">TAHC Organizations (Tuina) (TOTM)</td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($accreditation->total_accredited_totm, 0) }} <i>({{ $accreditation->total_accredited_tuina > 0 ? number_format(($accreditation->total_accredited_totm/$accreditation->total_accredited_tuina)*100, 0) : 0 }}%)</i></td>
                                                    </tr>
                                                    <tr class="bg-secondary">
                                                        <td style="text-align:center; font-weight: bold">Subtotal (Tuina Massage)</td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($accreditation->total_accredited_tuina, 0) }} <i>(100%)</i></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align:center; font-weight: bold" colspan="6" class="bg-success">ANTHROPOSOPHIC MEDICINE</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold">Anthro Medicine Training Center (AMTC)</td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($accreditation->total_accredited_amtc, 0) }} <i>({{ $accreditation->total_accredited_anthroposophic > 0 ? number_format(($accreditation->total_accredited_amtc/$accreditation->total_accredited_anthroposophic)*100, 0) : 0 }}%)</i></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold">Anthro Medicine Clinic (AMC)</td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($accreditation->total_accredited_amc, 0) }} <i>({{ $accreditation->total_accredited_anthroposophic > 0 ? number_format(($accreditation->total_accredited_amc/$accreditation->total_accredited_anthroposophic)*100, 0) : 0 }}%)</i></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold">TAHC Organizations Anthroposophic Medicine (TOAM)</td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($accreditation->total_accredited_toam, 0) }} <i>({{ $accreditation->total_accredited_anthroposophic > 0 ? number_format(($accreditation->total_accredited_toam/$accreditation->total_accredited_anthroposophic)*100, 0) : 0 }}%)</i></td>
                                                    </tr>
                                                    <tr class="bg-secondary">
                                                        <td style="text-align:center; font-weight: bold">Subtotal (Anthroposophic Medicine)</td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($accreditation->total_accredited_anthroposophic, 0) }} <i>(100%)</i></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align:center; font-weight: bold" colspan="6" class="bg-success">AYURVEDA</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold">Ayurveda Lifestyle Institute/Training Center (ALITC)</td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($accreditation->total_accredited_alitc, 0) }} <i>({{ $accreditation->total_accredited_ayurveda > 0 ? number_format(($accreditation->total_accredited_alitc/$accreditation->total_accredited_ayurveda)*100, 0) : 0 }}%)</i></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold">Ayurveda Center/Clinic (AYCC)</td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($accreditation->total_accredited_aycc, 0) }} <i>({{ $accreditation->total_accredited_ayurveda > 0 ? number_format(($accreditation->total_accredited_aycc/$accreditation->total_accredited_ayurveda)*100, 0) : 0 }}%)</i></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold">TAHC Organizations (Ayurveda) (TOA)</td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($accreditation->total_accredited_toa, 0) }} <i>({{ $accreditation->total_accredited_ayurveda > 0 ? number_format(($accreditation->total_accredited_toa/$accreditation->total_accredited_ayurveda)*100, 0) : 0 }}%)</i></td>
                                                    </tr>
                                                    <tr class="bg-secondary">
                                                        <td style="text-align:center; font-weight: bold">Subtotal (Ayurveda)</td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($accreditation->total_accredited_ayurveda, 0) }} <i>(100%)</i></td>
                                                    </tr>
                                                    <tr class="bg-dark">
                                                        <td style="text-align:center; font-weight: bold">Total</td>
                                                        <td style="text-align:center; font-weight: bold">{{ number_format($accreditation->total_accredited, 0) }} <i>(100%)</i></td>
                                                    </tr>
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
        </section>
    </div>
</div>
