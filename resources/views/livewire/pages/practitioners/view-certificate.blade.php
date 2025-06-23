<div>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Dancing+Script:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dompurify/2.4.0/purify.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <style>
        .certificate-container {
            width: 1200px;
            margin: 0 auto;
            padding-top: 30px;
            border: 2px solid #000000;
            border-radius: 10px;
            text-align: center;
            position: relative; /* To position the pseudo-element correctly */
            overflow: hidden; /* Ensure content doesn't overflow */
            background-color: #fff;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-family: 'Arial', sans-serif;
            z-index: 1; /* Ensures the header is on top */
        }
        .header img {
            width: 140px;
            height: 140px;
            border-radius: 50%;
        }
        .text {
            text-align: center;
            flex: 1;
            font-size: 18px;
            font-weight: bold;
        }
        .title {
            font-size: 21px;
            font-weight: bold;
        }

        /* Script font styles */
        .script-font {
            font-family: 'Edwardian Script ITC', cursive;
            margin: 10px 0;
        }
        .small-script {
            font-size: 28px;
            line-height: 1.2;
        }
        .small-script-bold {
            font-size: 28px;
            font-weight: bold;
        }
        .large-script {
            font-size: 75px;
            margin: -40px;
        }
        /* Readable script font for description */
        .readable-script {
            font-family: 'Monotype Corsiva', cursive;
            font-size: 28px;
            line-height: 1;
            margin-top: 10px;
            font-weight: normal;
            z-index: 1; /* Ensure the text appears on top */
        }
        .uppercase-bold {
            font-size: 36px;
            font-weight: bold;
            text-transform: uppercase;
        }
        .uppercase-smaller-bold {
            font-size: 24px;
            font-weight: bold;
            text-transform: uppercase;
        }

        /* Grouping name and certification code */
        .name-cert-container {
            text-align: center;
        }
        .name-cert-container div {
            margin: 0;
        }
        /* QR code positioning */
        .qr-code {
            position: absolute;
            bottom: 20px;
            left: 5px;
            width: 260px;
            height: 200px;
        }

        @media print {
            body, html {
                width: 100%;
                height: 100%;
                margin: 0;
                padding: 0;
            }
            footer {
                display: none;
            }

            .certificate-container {
           
                margin-top: 50px;
                margin-bottom: 50px;
        }
        }

        @page {
                size: letter landscape;
            }
            
        body {
            -webkit-print-color-adjust: exact;  /* For WebKit browsers */
            print-color-adjust: exact;          /* Standard for other browsers */
        }
        
    </style>
    <div>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Certification of Registration</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('list-practitioners') }}">Practitioners</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('profile-practitioner', ['param' => $certificate_details->practitioner_id]) }}">Practitioner's Profile</a></li>
                            <li class="breadcrumb-item active">Certificate of Registration</li>
                        </ol>
                    </div>
                    <div class="col-sm-12">
                        <button onclick="printPage()" class="btn btn-primary float-right mb-2">
                            <i class="fa solid fa-print mr-2"></i> Print Certificate
                        </button>
                        <button onclick="downloadPDF()" class="btn btn-primary float-right mb-2 mr-2">
                            <i class="fas fa-file-pdf mr-2"></i> Download Certificate
                        </button>
                    </div>
                </div>
            
            </div>
        </div>
        <div id="pdf-content" class="certificate-container" style="background-image: url('{{ asset('assets/images/PITAHCLogo2.png') }}'); background-size: 35%; background-repeat: no-repeat; background-position: center calc(100% - 40px);">
            <div class="header">
                <img src="{{ asset('assets/images/DOHLogo.png') }}" alt="Left Logo" style="margin-left: 5%;"> <!-- Replace with actual left logo -->
                <div class="text">
                    <div class="title">REPUBLIC OF THE PHILIPPINES</div>
                    <div class="title">PHILIPPINE INSTITUTE OF TRADITIONAL AND ALTERNATIVE</div>
                    <div class="title">HEALTH CARE - DEPARTMENT OF HEALTH</div>
                </div>
                <img src="{{ asset('assets/images/PITAHCLogo.png') }}" alt="Right Logo" style="margin-right: 5%;"> <!-- Replace with actual right logo -->
            </div>

            <!-- New rows with script font -->
            <div class="script-font small-script-bold" style="margin-top: -10px;">presents this</div>
            <div class="script-font large-script">Certificate of Registration</div>
            <div class="script-font small-script-bold">to</div>

            <!-- Practitioner Information grouped together -->
            <div class="name-cert-container">
                <div class="uppercase-bold" style="margin: -15px">{{ $certificate_details->practitioner->first_name }} {{ substr($certificate_details->practitioner->middle_name, 0, 1) }}. {{ $certificate_details->practitioner->last_name }}</div>
                <div class="uppercase-smaller-bold">({{ $certificate_details->modality_class->modality_class_code }} {{ $certificate_details->certification_code }})</div>
            </div>

            <!-- Modality Class -->
            <div class="uppercase-smaller-bold" style="margin: 15px">{{ $certificate_details->modality_class->modality_class_name }}</div>

            <!-- Description in readable script font -->
            <div class="readable-script">
                for having complied with all the requirements on the Guidelines Implementing<br>
                Republic Act 8423 Implementing Rules and Regulations (IRR) on the National Certification<br>
                of {{ $certificate_details->modality_class->modality->modality_name }} and Accreditation of {{ $certificate_details->modality_class->modality->modality_name }} Training Programs, <br>
                Centers and Clinics.
            </div>
            <div class="script-font small-script">
                This certification is granted in Quezon City, this <b>{{ \Carbon\Carbon::parse($certificate_details->application_date)->format('F, j, Y') }}</b><br>
                Valid until <b>{{ \Carbon\Carbon::parse($certificate_details->expiration_date)->subDay()->format('F, j, Y') }}</b>
            </div>
            <div style="margin-top:-10px;"><i>Original Registration Date: {{ \Carbon\Carbon::parse($certificate_details->entry_date)->format('F, j, Y') }}</i></div>

            <div class="name-cert-container" style="margin-top:40px">
                <div class="uppercase-smaller-bold">MA. TERESA C. IÑIGO, MD, FPCAM, CESE</div>
                <div style="font-size: 24px; font-weight: bold; margin-bottom: 20px;">Director General</div>
                
            </div>
            
            <div class="qr-code">
                <p style="margin-bottom:5px; font-weight: bold;">Scan to Verify:</p>
                {!! $qrCode !!}
                <div style="text-align: left; margin-left:10px; margin-top:10px ;font-weight: bold;">
                    <p>Control Number: CERT-{{substr($this->certificate_details->practitioner->first_name, 0, 1)
                        . substr($this->certificate_details->practitioner->last_name, 0, 1) 
                        . '-' . $this->certificate_details->practitioner->id 
                        . $this->certificate_details->id; }}</p>
                </div>
            </div>
            
            <!-- QR code -->
            {{-- <img src="CERT001-QRCode.png" alt="QR Code" class="qr-code"> <!-- Replace with actual QR code image --> --}}
        </div>
    </div>
        

<script>
    function printPage() {
        window.print();
    }

    async function downloadPDF() {
        const contentElement = document.getElementById("pdf-content");

        if (!contentElement) {
            console.error("Content element not found.");
            return;
        }

        const { jsPDF } = window.jspdf;
        
        // Initialize jsPDF in landscape mode with letter size
        const doc = new jsPDF("l", "mm", "letter");

        // Ensure canvas renders properly
        const canvas = await html2canvas(contentElement, {
            scale: 2,  // Higher scale for better quality
            useCORS: true
        });

        const imgData = canvas.toDataURL("image/png");

        // Letter dimensions (landscape): 279.4mm x 215.9mm
        const pageWidth = 279.4;  // Letter width in landscape
        const pageHeight = 215.9;  // Letter height in landscape

        // Margins
        const marginX = 10;  // 10mm for left and right
         const marginY = 10;  // 50px for top and bottom

        // Calculate width and height with margins
        const imgWidth = pageWidth - (marginX * 2);
        const imgHeight = (canvas.height * imgWidth) / canvas.width;
        const availableHeight = pageHeight - (marginY * 2);  // Space for content

        // Calculate starting position for vertical centering
        const posX = marginX;
        let posY = marginY;

        // Adjust if image height exceeds available space
        if (imgHeight > availableHeight) {
            posY = marginY;  // Start at margin if the content exceeds available space
        } else {
            // Center vertically if content fits
            posY = (pageHeight - imgHeight) / 2;
        }

        // Add the image to the PDF
        doc.addImage(imgData, "PNG", posX, posY, imgWidth, imgHeight);

        // Dynamically generate filename
        const practitionerLastName = @json($certificate_details->practitioner->last_name);
        const firstLetterLastName = practitionerLastName.charAt(0);

        const practitionerFirstName = @json($certificate_details->practitioner->first_name);
        const firstLetterFirstName = practitionerFirstName.charAt(0);

        const certificationID = @json($certificate_details->id);
        const practitionerID = @json($certificate_details->practitioner->id);
        const dynamicFileName = "CERT_" + firstLetterFirstName + firstLetterLastName + "_" + practitionerID + certificationID + ".pdf";

        doc.save(dynamicFileName);
    }
</script>
</div>
