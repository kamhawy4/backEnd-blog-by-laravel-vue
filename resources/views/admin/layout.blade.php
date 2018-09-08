<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.7
Version: 4.7.5
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" dir="rtl">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>@yield('title')</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin RTL Theme #1 for statistics, charts, recent events and reports" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="{{url('/')}}/admin/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('/')}}/admin/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('/')}}/admin/global/plugins/bootstrap/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css" />

        <link href="{{url('/')}}/admin/global/plugins/bootstrap-switch/css/bootstrap-switch-rtl.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('/')}}/admin/global/plugins/icheck/skins/all.css" rel="stylesheet" type="text/css" />

  <link href="{{url('/')}}/admin/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.css" rel="stylesheet" type="text/css" />

        <link href="{{url('/')}}/admin/global/plugins/clockface/css/clockface.css" rel="stylesheet" type="text/css" />
        <link href="{{url('/')}}/admin/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('/')}}/admin/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />


        <link href="{{url('/')}}/admin/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />

         <link href="{{url('/')}}/admin/global/plugins/bootstrap-select/css/bootstrap-select-rtl.css" rel="stylesheet" type="text/css" />

        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="{{url('/')}}/admin/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('/')}}/admin/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
        <link href="{{url('/')}}/admin/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('/')}}/admin/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
        <link href="{{url('/')}}/admin/global/plugins/TagsInput/jquery.tagsinput.min.css" rel="stylesheet" type="text/css" />
          <link href="{{url('/')}}/admin/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('/')}}/admin/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('/')}}/admin/global/plugins/jquery-file-upload/css/jquery.fileupload.css" rel="stylesheet" type="text/css" />
        <link href="{{url('/')}}/admin/global/plugins/jquery-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="{{url('/')}}/admin/global/css/components-md-rtl.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{url('/')}}/admin/global/css/plugins-md-rtl.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="{{url('/')}}/admin/layouts/layout/css/layout-rtl.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('/')}}/admin/layouts/layout/css/themes/darkblue-rtl.min.css" rel="stylesheet" type="text/css" id="style_color" />


        <link href="{{url('/')}}/admin/layouts/layout/css/themes/light2-rtl.min.css" rel="stylesheet" type="text/css" id="style_color" />


        <link href="{{url('/')}}/admin/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

        <link href="{{url('/')}}/admin/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />


        <link href="{{url('/')}}/admin/layouts/layout/css/fontawesome-iconpicker.min.css" rel="stylesheet">

          <script src="{{url('/')}}/admin/ckeditor/ckeditor.js"></script>  

        <link href="{{url('/')}}/admin/layouts/layout/css/custom-rtl.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('/')}}/admin/layouts/layout/css/main.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
         <script src="//cdn.ckeditor.com/4.6.1/full/ckeditor.js"></script>
        <link href="https://fonts.googleapis.com/earlyaccess/droidarabickufi.css" rel="stylesheet">

          <link href="{{url('/')}}/admin/global/css/components-rounded.min.css" rel="stylesheet" id="style_components" type="text/css" />

        <link href="{{url('/')}}/admin/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />

         <link rel="stylesheet" type="text/css" href="/css/bootstrap-notifications.min.css">
          

        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://js.pusher.com/3.1/pusher.min.js"></script>




        <meta name="csrf-token" content="{{ csrf_token() }}">
        <style type="text/css">
            
            .active {
            color: #f66;
            }
        </style>




        <link rel="shortcut icon" href="favicon.ico" /> </head>
        <!-- END HEAD -->

       <body class="page-header-fixed page-sidebar-closed-hide-
        page-content-white page-md">
         <div class="page-wrapper"  >
            <!-- BEGIN HEADER -->
        
        <div  id="app" >
           <router-view></router-view>  
        </div>

        <!--[if lt IE 9]>
<script src="{{url('/')}}/admin/global/plugins/respond.min.js"></script>
<script src="{{url('/')}}/admin/global/plugins/excanvas.min.js"></script> 
<script src="{{url('/')}}/admin/global/plugins/ie8.fix.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->

        <script src="{{ asset('js/app.js') }}"></script>

        <script src="{{url('/')}}/admin/global/plugins/jquery.min.js" type="text/javascript"></script>

         <script src="{{url('/')}}/admin/global/plugins/bootstrap-switch/js/bootstrap-switch.js" type="text/javascript"></script>


       
        <script src="{{url('/')}}/admin/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
       
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="{{url('/')}}/admin/global/plugins/moment.min.js" type="text/javascript"></script>


        <script src="{{url('/')}}/admin/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>

        

        <script src="{{url('/')}}/admin/global/plugins/morris/morris.min.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/morris/raphael-min.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/amcharts/amcharts/amcharts.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/amcharts/amcharts/serial.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/amcharts/amcharts/pie.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/amcharts/amcharts/radar.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/amcharts/amcharts/themes/light.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/amcharts/amcharts/themes/patterns.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/amcharts/amcharts/themes/chalk.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/amcharts/ammap/ammap.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/amcharts/ammap/maps/js/worldLow.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/amcharts/amstockcharts/amstock.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/horizontal-timeline/horizontal-timeline.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/TagsInput/jquery.tagsinput.min.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/layouts/global/scripts/fontawesome-iconpicker.js"></script>
 <script src="{{url('/')}}/admin/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/typeahead/handlebars.min.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/typeahead/typeahead.bundle.min.js" type="text/javascript"></script>


          <script src="{{url('/')}}/admin/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>

        <script src="{{url('/')}}/admin/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>

         <script src="{{url('/')}}/admin/global/plugins/clockface/js/clockface.js" type="text/javascript"></script>

         <script src="{{url('/')}}/admin/global/plugins/bootstrap-growl/jquery.bootstrap-growl.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="{{url('/')}}/admin/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
       <script src="{{url('/')}}/admin/pages/scripts/ui-bootstrap-growl.min.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/pages/scripts/dashboard.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <script src="{{url('/')}}/admin/global/plugins/bootstrap-toastr/toastr.min.js" type="text/javascript"></script>
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="{{url('/')}}/admin/pages/scripts/ui-toastr.min.js" type="text/javascript"></script>

        <script src="{{url('/')}}/admin/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/scripts/app.min.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/pages/scripts/table-datatables-ajax.js" type="text/javascript"></script>
        
        <script src="{{url('/')}}/admin/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>

         <script src="{{url('/')}}/admin/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>



        <script src="{{url('/')}}/admin/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/icheck/icheck.min.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/pages/scripts/form-icheck.min.js" type="text/javascript"></script>

        <script src="{{url('/')}}/admin/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>

         <script src="{{url('/')}}/admin//pages/scripts/components-select2.min.js" type="text/javascript"></script>



        <script src="{{url('/')}}/admin/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>

        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="{{url('/')}}/admin/pages/scripts/table-datatables-managed.min.js" type="text/javascript"></script>

         <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

        <script>
            $(document).ready(function()
            {
                $('#clickmewow').click(function()
                {
                    $('#radio1003').attr('checked', 'checked');
                });
            })

      var notificationsWrapper   = $('.dropdown-notifications');
      var notificationsToggle    = notificationsWrapper.find('a[data-toggle]');
      var notificationsCountElem = notificationsToggle.find('i[data-count]');
      var notificationsCount     = parseInt(notificationsCountElem.data('count'));
      var notifications          = notificationsWrapper.find('ul.dropdown-menu');

      if (notificationsCount <= 0) {
        notificationsWrapper.hide();
      }

      // Enable pusher logging - don't include this in production
      // Pusher.logToConsole = true;

      var pusher = new Pusher('378fa63784c9b95b0f39', {
        cluster: 'eu',
        encrypted: true
      });

      // Subscribe to the channel we specified in our Laravel Event
      var channel = pusher.subscribe('status-liked');
      // Bind a function to a Event (the full Laravel class)
      channel.bind('StatusLiked', function(data) {
        var existingNotifications = notifications.html();
        var avatar = Math.floor(Math.random() * (71 - 20 + 1)) + 20;
        var newNotificationHtml = `
          <li class="notification active">
              <div class="media">
                <div class="media-left">
                  <div class="media-object">
                    <img src="https://api.adorable.io/avatars/71/`+avatar+`.png" class="img-circle" alt="50x50" style="width: 50px; height: 50px;">
                  </div>
                </div>
                <div class="media-body">
                  <strong class="notification-title">`+data+`</strong>
                  <!--p class="notification-desc">Extra description can go here</p-->
                  <div class="notification-meta">
                    <small class="timestamp">about a minute ago</small>
                  </div>
                </div>
              </div>
          </li>
        `;
        notifications.html(newNotificationHtml + existingNotifications);

        notificationsCount += 1;
        notificationsCountElem.attr('data-count', notificationsCount);
        notificationsWrapper.find('.notif-count').text(notificationsCount);
        notificationsWrapper.show();
      });
    </script>
        </script>




        @yield('js')
    </body>

</html>