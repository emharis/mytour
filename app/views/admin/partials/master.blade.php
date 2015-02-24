
<!DOCTYPE html>
<html lang="en">
    <head>
        <base href="{{ URL::to('/') }}/">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title>Web Manager</title>

        <meta name="description" content="top menu &amp; navigation" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

        <!-- bootstrap & fontawesome -->
        <link rel="stylesheet" href="adm/css/bootstrap.min.css" />
        <link rel="stylesheet" href="adm/font-awesome/4.1.0/css/font-awesome.min.css" />

        <!-- page specific plugin styles -->
        <link href="adm/css/colorbox.css" rel="stylesheet" type="text/css"/>

        <!-- text fonts -->
        <link rel="stylesheet" href="adm/fonts/fonts.googleapis.com.css" />

        <!-- ace styles -->
        <link rel="stylesheet" href="adm/css/ace.min.css" id="main-ace-style" />

        <!--[if lte IE 9]>
        <link rel="stylesheet" href="adm/css/ace-part2.min.css" />
        <![endif]-->
        <link rel="stylesheet" href="adm/css/ace-skins.min.css" />
        <link rel="stylesheet" href="adm/css/ace-rtl.min.css" />
        <!--[if lte IE 9]>
        <link rel="stylesheet" href="adm/css/ace-ie.min.css" />
        <![endif]-->

        <!-- page specific plugin styles -->
        <link rel="stylesheet" href="adm/css/dropzone.css" />
        <link rel="stylesheet" href="adm/css/custom.css" />

        <!-- inline styles related to this page -->

        <!-- ace settings handler -->
        <script src="adm/js/ace-extra.min.js"></script>

        <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

        <!--[if lte IE 8]>
        <script src="adm/js/html5shiv.min.js"></script>
        <script src="adm/js/respond.min.js"></script>
        <![endif]-->

        <!-- basic scripts -->

        <!--[if !IE]> -->
        <script src="adm/js/jquery.2.1.1.min.js"></script>

        <!-- <![endif]-->

        <!--[if IE]>
        <script src="adm/js/jquery.1.11.1.min.js"></script>
        <![endif]-->

        <!--[if IE]>
        <script type="text/javascript">
                window.jQuery || document.write("<script src='assets/js/jquery1x.min.js'>"+"<"+"/script>");
        </script>
        <![endif]-->
        <script type="text/javascript">
if ('ontouchstart' in document.documentElement)
    document.write("<script src='assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
        </script>
        <script src="adm/js/bootstrap.min.js"></script>

        <!-- page specific plugin scripts -->

        <!-- ace scripts -->
        <script src="adm/js/ace-elements.min.js"></script>
        <script src="adm/js/ace.min.js"></script>

        <!--datatable script-->
        <script src="adm/js/jquery.dataTables.min.js"></script>
        <script src="adm/js/jquery.dataTables.bootstrap.js"></script>
        <script src="adm/js/tinymce/tinymce.min.js" type="text/javascript"></script>
        <script src="adm/js/jquery.colorbox-min.js" type="text/javascript"></script>

        <!--dropzone upload js-->
        <script src="adm/js/dropzone.js"></script>
        <script src="adm/js/dollarize.js" type="text/javascript"></script>
    </head>

    <body class="no-skin">
        <div id="navbar" class="navbar navbar-default    navbar-collapse       h-navbar">
            <script type="text/javascript">
try {
    ace.settings.check('navbar', 'fixed')
} catch (e) {
}
;
tinymce.init({
    selector: "textarea.full",
    plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern autoresize"
    ],
    toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
    toolbar2: "print preview media | forecolor backcolor emoticons",
    image_advtab: true,
    autosave_ask_before_unload: false,
    max_height: 200,
    min_height: 160,
    height: 180,
    autoresize_max_height: 800,
    file_browser_callback: RoxyFileBrowser
});
function RoxyFileBrowser(field_name, url, type, win) {
    var roxyFileman = 'adm/js/fileman/index.html';
    if (roxyFileman.indexOf("?") < 0) {
        roxyFileman += "?type=" + type;
    }
    else {
        roxyFileman += "&type=" + type;
    }
    roxyFileman += '&input=' + field_name + '&value=' + win.document.getElementById(field_name).value;
    if (tinyMCE.activeEditor.settings.language) {
        roxyFileman += '&langCode=' + tinyMCE.activeEditor.settings.language;
    }
    tinyMCE.activeEditor.windowManager.open({
        file: roxyFileman,
        title: 'Roxy Fileman',
        width: 850,
        height: 650,
        resizable: "yes",
        plugins: "media",
        inline: "yes",
        close_previous: "no"
    }, {window: win, input: field_name});
    return false;
}
tinymce.init({
    plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern autoresize"
    ],
    selector: "textarea.mini",
    toolbar: "undo redo | bold italic",
    menubar: false,
    statusbar: false,
    autosave_ask_before_unload: false,
    max_height: 100,
    min_height: 80,
    height: 90,
    autoresize_max_height: 800,
});
            </script>

            <div class="navbar-container" id="navbar-container">
                <div class="navbar-header pull-left">
                    <a href="#" class="navbar-brand">
                        <small>
                            <i class="fa fa-leaf"></i>
                            Web Manager
                        </small>
                    </a>

                    <button class="pull-right navbar-toggle navbar-toggle-img collapsed" type="button" data-toggle="collapse" data-target=".navbar-buttons,.navbar-menu">
                        <span class="sr-only">Toggle user menu</span>

                        <img src="adm/avatars/user.jpg" alt="Jason's Photo" />
                    </button>

                    <button class="pull-right navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".sidebar">
                        <span class="sr-only">Toggle sidebar</span>

                        <span class="icon-bar"></span>

                        <span class="icon-bar"></span>

                        <span class="icon-bar"></span>
                    </button>
                </div>

                <div class="navbar-buttons navbar-header pull-right  collapse navbar-collapse" role="navigation">
                    <ul class="nav ace-nav">
                        <li class="transparent">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <i class="ace-icon fa fa-bell icon-animated-bell"></i>
                            </a>

                            <div class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
                                <div class="tabbable">
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a data-toggle="tab" href="#navbar-tasks">
                                                Tasks
                                                <span class="badge badge-danger">4</span>
                                            </a>
                                        </li>

                                        <li>
                                            <a data-toggle="tab" href="#navbar-messages">
                                                Messages
                                                <span class="badge badge-danger">5</span>
                                            </a>
                                        </li>
                                    </ul><!-- .nav-tabs -->

                                    <div class="tab-content">
                                        <div id="navbar-tasks" class="tab-pane in active">
                                            <ul class="dropdown-menu-right dropdown-navbar dropdown-menu">
                                                <li>
                                                    <a href="#">
                                                        <div class="clearfix">
                                                            <span class="pull-left">Software Update</span>
                                                            <span class="pull-right">65%</span>
                                                        </div>

                                                        <div class="progress progress-mini">
                                                            <div style="width:65%" class="progress-bar"></div>
                                                        </div>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="#">
                                                        <div class="clearfix">
                                                            <span class="pull-left">Hardware Upgrade</span>
                                                            <span class="pull-right">35%</span>
                                                        </div>

                                                        <div class="progress progress-mini">
                                                            <div style="width:35%" class="progress-bar progress-bar-danger"></div>
                                                        </div>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="#">
                                                        <div class="clearfix">
                                                            <span class="pull-left">Unit Testing</span>
                                                            <span class="pull-right">15%</span>
                                                        </div>

                                                        <div class="progress progress-mini">
                                                            <div style="width:15%" class="progress-bar progress-bar-warning"></div>
                                                        </div>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="#">
                                                        <div class="clearfix">
                                                            <span class="pull-left">Bug Fixes</span>
                                                            <span class="pull-right">90%</span>
                                                        </div>

                                                        <div class="progress progress-mini progress-striped active">
                                                            <div style="width:90%" class="progress-bar progress-bar-success"></div>
                                                        </div>
                                                    </a>
                                                </li>

                                                <li class="dropdown-footer">
                                                    <a href="#">
                                                        See tasks with details
                                                        <i class="ace-icon fa fa-arrow-right"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div><!-- /.tab-pane -->

                                        <div id="navbar-messages" class="tab-pane">
                                            <ul class="dropdown-menu-right dropdown-navbar dropdown-menu">
                                                <li class="dropdown-content">
                                                    <ul class="dropdown-menu dropdown-navbar">
                                                        <li>
                                                            <a href="#">
                                                                <img src="adm/avatars/avatar.png" class="msg-photo" alt="Alex's Avatar" />
                                                                <span class="msg-body">
                                                                    <span class="msg-title">
                                                                        <span class="blue">Alex:</span>
                                                                        Ciao sociis natoque penatibus et auctor ...
                                                                    </span>

                                                                    <span class="msg-time">
                                                                        <i class="ace-icon fa fa-clock-o"></i>
                                                                        <span>a moment ago</span>
                                                                    </span>
                                                                </span>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a href="#">
                                                                <img src="adm/avatars/avatar3.png" class="msg-photo" alt="Susan's Avatar" />
                                                                <span class="msg-body">
                                                                    <span class="msg-title">
                                                                        <span class="blue">Susan:</span>
                                                                        Vestibulum id ligula porta felis euismod ...
                                                                    </span>

                                                                    <span class="msg-time">
                                                                        <i class="ace-icon fa fa-clock-o"></i>
                                                                        <span>20 minutes ago</span>
                                                                    </span>
                                                                </span>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a href="#">
                                                                <img src="adm/avatars/avatar4.png" class="msg-photo" alt="Bob's Avatar" />
                                                                <span class="msg-body">
                                                                    <span class="msg-title">
                                                                        <span class="blue">Bob:</span>
                                                                        Nullam quis risus eget urna mollis ornare ...
                                                                    </span>

                                                                    <span class="msg-time">
                                                                        <i class="ace-icon fa fa-clock-o"></i>
                                                                        <span>3:15 pm</span>
                                                                    </span>
                                                                </span>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a href="#">
                                                                <img src="adm/avatars/avatar2.png" class="msg-photo" alt="Kate's Avatar" />
                                                                <span class="msg-body">
                                                                    <span class="msg-title">
                                                                        <span class="blue">Kate:</span>
                                                                        Ciao sociis natoque eget urna mollis ornare ...
                                                                    </span>

                                                                    <span class="msg-time">
                                                                        <i class="ace-icon fa fa-clock-o"></i>
                                                                        <span>1:33 pm</span>
                                                                    </span>
                                                                </span>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a href="#">
                                                                <img src="adm/avatars/avatar5.png" class="msg-photo" alt="Fred's Avatar" />
                                                                <span class="msg-body">
                                                                    <span class="msg-title">
                                                                        <span class="blue">Fred:</span>
                                                                        Vestibulum id penatibus et auctor  ...
                                                                    </span>

                                                                    <span class="msg-time">
                                                                        <i class="ace-icon fa fa-clock-o"></i>
                                                                        <span>10:09 am</span>
                                                                    </span>
                                                                </span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>

                                                <li class="dropdown-footer">
                                                    <a href="inbox.html">
                                                        See all messages
                                                        <i class="ace-icon fa fa-arrow-right"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div><!-- /.tab-pane -->
                                    </div><!-- /.tab-content -->
                                </div><!-- /.tabbable -->
                            </div><!-- /.dropdown-menu -->
                        </li>

                        <li class="light-blue user-min">
                            <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                                <img class="nav-user-photo" src="adm/avatars/user.jpg" alt="Jason's Photo" />
                                <span class="user-info">
                                    <small>Welcome,</small>
                                    Jason
                                </span>

                                <i class="ace-icon fa fa-caret-down"></i>
                            </a>

                            <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                                <li>
                                    <a href="admin/setting">
                                        <i class="ace-icon fa fa-cog"></i>
                                        Settings
                                    </a>
                                </li>

                                <li>
                                    <a href="admin/profile">
                                        <i class="ace-icon fa fa-user"></i>
                                        Profile
                                    </a>
                                </li>

                                <li class="divider"></li>

                                <li>
                                    <a href="admin/logout">
                                        <i class="ace-icon fa fa-power-off"></i>
                                        Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>

                <nav role="navigation" class="navbar-menu pull-left collapse navbar-collapse">

                </nav>
            </div><!-- /.navbar-container -->
        </div>

        <div class="main-container" id="main-container">
            <script type="text/javascript">
                try {
                    ace.settings.check('main-container', 'fixed')
                } catch (e) {
                }
            </script>

            <div id="sidebar" class="sidebar      h-sidebar                navbar-collapse collapse">
                <script type="text/javascript">
                    try {
                        ace.settings.check('sidebar', 'fixed')
                    } catch (e) {
                    }
                </script>

                <div class="sidebar-shortcuts" id="sidebar-shortcuts">
                    <!--                    <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
                                            <button class="btn btn-success">
                                                <i class="ace-icon fa fa-signal"></i>
                                            </button>
                    
                                            <button class="btn btn-info">
                                                <i class="ace-icon fa fa-pencil"></i>
                                            </button>
                    
                                            <button class="btn btn-warning">
                                                <i class="ace-icon fa fa-users"></i>
                                            </button>
                    
                                            <button class="btn btn-danger">
                                                <i class="ace-icon fa fa-cogs"></i>
                                            </button>
                                        </div>-->

                    <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
                        <span class="btn btn-success"></span>

                        <span class="btn btn-info"></span>

                        <span class="btn btn-warning"></span>

                        <span class="btn btn-danger"></span>
                    </div>
                </div><!-- /.sidebar-shortcuts -->

                @include('admin.partials.navigation')

                <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
                    <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
                </div>

                <script type="text/javascript">
                    try {
                        ace.settings.check('sidebar', 'collapsed')
                    } catch (e) {
                    }
                </script>
            </div>

            <div class="main-content">
                <div class="page-content">
                    <div class="page-content-area">
                        @yield('main_content')
                    </div><!-- /.page-content-area -->
                </div><!-- /.page-content -->
            </div><!-- /.main-content -->

            <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
                <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
            </a>
        </div><!-- /.main-container -->

        <!-- inline scripts related to this page -->
        <script type="text/javascript">
            function datatableInit() {
                $('.datatable-general').dataTable({
                    bAutoWidth: false,
                    "bDestroy": true,
                    aLengthMenu: [
                        [25, 50, 100, 200, -1],
                        [25, 50, 100, 200, "All"]
                    ]
                });
            }

            jQuery(function ($) {
                var $sidebar = $('.sidebar').eq(0);
                if (!$sidebar.hasClass('h-sidebar'))
                    return;

                $(document).on('settings.ace.top_menu', function (ev, event_name, fixed) {
                    if (event_name !== 'sidebar_fixed')
                        return;

                    var sidebar = $sidebar.get(0);
                    var $window = $(window);

                    //return if sidebar is not fixed or in mobile view mode
                    if (!fixed || (ace.helper.mobile_view() || ace.helper.collapsible())) {
                        $sidebar.removeClass('hide-before');
                        //restore original, default marginTop
                        ace.helper.removeStyle(sidebar, 'margin-top')

                        $window.off('scroll.ace.top_menu')
                        return;
                    }


                    var done = false;
                    $window.on('scroll.ace.top_menu', function (e) {

                        var scroll = $window.scrollTop();
                        scroll = parseInt(scroll / 4);//move the menu up 1px for every 4px of document scrolling
                        if (scroll > 17)
                            scroll = 17;


                        if (scroll > 16) {
                            if (!done) {
                                $sidebar.addClass('hide-before');
                                done = true;
                            }
                        }
                        else {
                            if (done) {
                                $sidebar.removeClass('hide-before');
                                done = false;
                            }
                        }

                        sidebar.style['marginTop'] = (17 - scroll) + 'px';
                    }).triggerHandler('scroll.ace.top_menu');

                }).triggerHandler('settings.ace.top_menu', ['sidebar_fixed', $sidebar.hasClass('sidebar-fixed')]);

                $(window).on('resize.ace.top_menu', function () {
                    $(document).triggerHandler('settings.ace.top_menu', ['sidebar_fixed', $sidebar.hasClass('sidebar-fixed')]);
                });

                /**
                 * format rupiah di input uang
                 */
                jQuery(document).on('focus', '.uang', function () {
                    unformatRupiah(jQuery(this).attr('id'));
                });
                jQuery(document).on('blur', '.uang', function () {
                    formatRupiah(jQuery(this).attr('id'));
                });
            });
        </script>
    </body>
</html>

