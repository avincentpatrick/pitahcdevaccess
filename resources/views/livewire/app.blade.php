<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->
    <title>Accreditation and Certification Electronic Service System</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
          integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
          crossorigin="anonymous"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">
    <!-- Alpine JS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    
    @yield('third_party_stylesheets')

    @stack('page_css')
    <livewire:styles />
</head>

<body class="sidebar-mini layout-fixed control-sidebar-slide-open text-sm accent-primary">
<div class="wrapper">
    <!-- Main Header -->
    @include('livewire.navbar')
    <!-- Left side column. contains the logo and sidebar -->
    @include('livewire.sidebar')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    {{ $slot }}
    </div>
    <!-- Main Footer -->
@include('livewire.footer')
</div>

<script src="{{ asset('js/app.js') }}" defer></script>

<script src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<!-- Tostr -->
<script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{ asset('plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
<!-- InputMask -->
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/inputmask/min/jquery.inputmask.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js')}}"></script>

<!-- Popper -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.13.4/jquery.mask.min.js"></script>

@yield('third_party_scripts')
<script>

  $(document).ready(function() {
    toastr.options = {
      "closeButton": false,
      "debug": false,
      "newestOnTop": false,
      "progressBar": true,
      "positionClass": "toast-bottom-right",
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": "1000",
      "hideDuration": "1000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }
    window.addEventListener('success-message', event=> {
          $('#practitioner-form, #certification-form, #education-form, #licensure-exam-passed-form, #work-experience-form, #trainings-attended-form, #facility-form, #accreditation-form, #delete-modal').modal('hide');
          toastr.success(event.detail.message, 'Success!');
    })

    window.addEventListener('warning-message', event=> {
          $('#practitioner-form, #certification-form, #education-form, #licensure-exam-passed-form, #work-experience-form, #trainings-attended-form, #facility-form, #accreditation-form, #delete-modal').modal('hide');
          toastr.warning(event.detail.message, 'Warning!');
    })

    window.addEventListener('error-message', event=> {
          $('#practitioner-form, #certification-form, #education-form, #licensure-exam-passed-form, #work-experience-form, #trainings-attended-form, #facility-form, #accreditation-form, #delete-modal').modal('hide');
          toastr.error(event.detail.message, 'Notification!');
    })

  });

  $(document).ready(function() {
    window.addEventListener('hide-delete-modal', event=> {
      $('#delete-modal').modal('hide');
    })
  });

  window.addEventListener('show-delete-modal', event=> {
    $('#delete-modal').modal({
        backdrop: 'static',
        keyboard: false
      });   
  });

  $(document).ready(function() {
    window.addEventListener('hide-practitioner-form', event=> {
      $('#practitioner-form').modal('hide');
    })
  });

  window.addEventListener('show-practitioner-form', event=> {
    $('#practitioner-form').modal({
        backdrop: 'static',
        keyboard: false
      });   
  });

  $(document).ready(function() {
    window.addEventListener('hide-facility-form', event=> {
      $('#facility-form').modal('hide');
    })
  });

  window.addEventListener('show-facility-form', event=> {
    $('#facility-form').modal({
        backdrop: 'static',
        keyboard: false
      });   
  });

  $(document).ready(function() {
    window.addEventListener('hide-certification-form', event=> {
      $('#certification-form').modal('hide');
    })
  });

  window.addEventListener('show-certification-form', event=> {
    $('#certification-form').modal({
        backdrop: 'static',
        keyboard: false
      });   
  });

  $(document).ready(function() {
    window.addEventListener('hide-accreditation-form', event=> {
      $('#accreditation-form').modal('hide');
    })
  });

  window.addEventListener('show-accreditation-form', event=> {
    $('#accreditation-form').modal({
        backdrop: 'static',
        keyboard: false
      });   
  });
  

  $(document).ready(function() {
    window.addEventListener('hide-education-form', event=> {
      $('#education-form').modal('hide');
    })
  });

  window.addEventListener('show-education-form', event=> {
    $('#education-form').modal({
        backdrop: 'static',
        keyboard: false
      });   
  });

  $(document).ready(function() {
    window.addEventListener('hide-licensure-exam-passed-form', event=> {
      $('#licensure-exam-passed-form').modal('hide');
    })
  });

  window.addEventListener('show-licensure-exam-passed-form', event=> {
    $('#licensure-exam-passed-form').modal({
        backdrop: 'static',
        keyboard: false
      });   
  });

  $(document).ready(function() {
    window.addEventListener('hide-work-experience-form', event=> {
      $('#work-experience-form').modal('hide');
    })
  });

  window.addEventListener('show-work-experience-form', event=> {
    $('#work-experience-form').modal({
        backdrop: 'static',
        keyboard: false
      });   
  });

  $(document).ready(function() {
    window.addEventListener('hide-trainings-attended-form', event=> {
      $('#trainings-attended-form').modal('hide');
    })
  });

  window.addEventListener('show-trainings-attended-form', event=> {
    $('#trainings-attended-form').modal({
        backdrop: 'static',
        keyboard: false
      });   
  });

  $(window).on('load', function() {
        $('#noAccessModal').modal({
        backdrop: 'static',
        keyboard: false
      });    
  }); 

  function calculatePercent(numerator, denominator, percent){
      $("#"+numerator+", #"+denominator+"").keyup(function () {
      myStr = $("#"+numerator).val();
      myStr2 = $("#"+denominator).val();
      myStr3 = (Number(myStr) / Number(myStr2))*100;
      $("#"+percent).val(myStr3.toFixed(2));
    });
  }

  function fnExcelReport(tableID)
  {
      var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";
      var textRange; var j=0;
      tab = document.getElementById(tableID); // id of table

      for(j = 0 ; j < tab.rows.length ; j++) 
      {     
          tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
          //tab_text=tab_text+"</tr>";
      }

      tab_text=tab_text+"</table>";
      tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
      tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
      tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

      var ua = window.navigator.userAgent;
      var msie = ua.indexOf("MSIE "); 

      if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
      {
          txtArea1.document.open("txt/html","replace");
          txtArea1.document.write(tab_text);
          txtArea1.document.close();
          txtArea1.focus(); 
          sa=txtArea1.document.execCommand("SaveAs",true,"Say Thanks to Sumit.xls");
      }  
      else                 //other browser not tested on IE 11
          sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  

      return (sa);
  }

  function selectElementContents(el) {
    var body = document.body,
      range, sel;
    if (document.createRange && window.getSelection) {
      range = document.createRange();
      sel = window.getSelection();
      sel.removeAllRanges();
      range.selectNodeContents(el);
      sel.addRange(range);
    }
    document.execCommand("Copy");
  }

  function download(id) {
    const imageLink = document.createElement('a')
    const canvas = document.getElementById(id);
    imageLink.download = 'canvas.png';
    imageLink.href = canvas.toDataURL('image/png', 1);
    imageLink.click();
  }

  function printDiv(el){                     
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(el).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;
}  


</script>
@stack('page_scripts')
<livewire:scripts />
</body>
</html>
