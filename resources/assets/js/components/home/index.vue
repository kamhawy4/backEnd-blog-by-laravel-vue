 <template>
 	<div>
            <div class="page-header navbar navbar-fixed-top">
                <!-- BEGIN HEADER INNER -->
                <div class="page-header-inner ">
                    <!-- BEGIN LOGO -->
                    <div class="page-logo">
                        <a href="auth">
                            <img   src="/admin/layouts/layout/img/logo-invert.png" alt="logo" class="logo-default" /> </a>
                        <div class="menu-toggler sidebar-toggler">
                            <span></span>
                        </div>
                    </div>
                    <!-- END LOGO -->
                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                        <span></span>
                    </a>
                    <!-- END RESPONSIVE MENU TOGGLER -->
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">

                           <li class="dropdown dropdown-notifications">
                              <a href="#notifications-panel" class="dropdown-toggle" data-toggle="dropdown">
                                <i data-count="0" class="glyphicon glyphicon-bell notification-icon"></i>
                              </a>

                              <div class="dropdown-container">
                                <ul class="dropdown-menu">
                                </ul>
                                <div class="dropdown-footer text-center">
                                </div>
                              </div>
                            </li>








                            <li class="dropdown dropdown-user">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <img alt="" class="img-circle" src="/admin/layouts/layout/img/avatar3_small.jpg" />
                                    <span class="username username-localStorage username-hide-on-mobile">
                                    {{username}} 
                                     </span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                    <li>

                                    
                                      <router-link :to="'/dashboard/users/'+id_username+'/edit'"> <i class="icon-user""></i>Profile</router-link>

                                    </li>
                                    <li>
                                        <a   target="_blank" href="">
                                            <i class="icon-eye"></i>Site</a>
                                    </li>
                                    <li>
                                        <router-link to="/dashboard/logout"> <i class="icon-key"></i>Logout</router-link>
                                    </li>
                                </ul>
                            </li>
                            <!-- END USER LOGIN DROPDOWN -->
                            <!-- END QUICK SIDEBAR TOGGLER -->
                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
                <!-- END HEADER INNER -->
            </div>
            <!-- END HEADER -->
            <!-- BEGIN HEADER & CONTENT DIVIDER -->
            <div class="clearfix"> </div>
            <!-- END HEADER & CONTENT DIVIDER -->
            <!-- BEGIN CONTAINER -->
            <div  class="page-container">
                <!-- BEGIN SIDEBAR -->
                <div class="page-sidebar-wrapper">
                    <!-- BEGIN SIDEBAR -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <div class="page-sidebar navbar-collapse collapse">
                        <!-- BEGIN SIDEBAR MENU -->
                        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                                <li class="sidebar-toggler-wrapper hide">
                                    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                                    <div class="sidebar-toggler">
                                        <span></span>
                                    </div>
                                    <!-- END SIDEBAR TOGGLER BUTTON -->
                                </li>


                            <router-link  to="/dashboard" tag="li" active-class="active" exact class="nav-item ">
                                <a class="nav-link">
                                    <i class="fa fa-home"></i>
                                    <span class="title"> Home </span>
                                </a>
                            </router-link>

                            <router-link  to="/dashboard/settings" tag="li" exact active-class="active" class="nav-item ">
                                <a class="nav-link">
                                    <i class="fa fa-cogs"></i>
                                    <span class="title"> Settings </span>
                                </a>
                            </router-link>


                            <router-link  to="/dashboard/users" tag="li"  active-class="active" class="nav-item ">
                                <a class="nav-link">
                                    <i class="fa fa-user"></i>
                                    <span class="title"> Users </span>
                                </a>
                            </router-link>



                            <router-link  to="/dashboard/categorys" tag="li"  active-class="active" class="nav-item ">
                                <a class="nav-link">
                                    <i class="fa fa-user"></i>
                                    <span class="title"> Categorys </span>
                                </a>
                            </router-link>



                            <router-link  to="/dashboard/articles" tag="li"  active-class="active" class="nav-item ">
                                <a class="nav-link">
                                    <i class="fa fa-newspaper-o"></i>
                                    <span class="title"> Articles </span>
                                </a>
                            </router-link>


                            <router-link  to="/dashboard/contact/us" tag="li"  active-class="active" class="nav-item ">
                                <a class="nav-link">
                                    <i class="fa fa-inbox"></i>
                                    <span class="title"> Contact Us </span>
                                </a>
                            </router-link>


                             <router-link  to="/dashboard/subscribe" tag="li"  active-class="active" class="nav-item ">
                                <a class="nav-link">
                                    <i class="fa fa-thumbs-o-up"></i>
                                    <span class="title"> Subscribe </span>
                                </a>
                            </router-link>

                             <router-link  to="/dashboard/chat" tag="li"  active-class="active" class="nav-item ">
                                <a class="nav-link">
                                    <i class="fa fa-commenting"></i>
                                    <span class="title"> Chat </span>
                                </a>
                            </router-link>
 

                        </ul>
                        <!-- END SIDEBAR MENU -->
                        <!-- END SIDEBAR MENU -->
                    </div>
                    <!-- END SIDEBAR -->
                </div>
                <!-- END SIDEBAR -->
                <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                   
                         <router-view></router-view>  
                    </div>
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->
            <div class="page-footer">
                <div class="page-footer-inner"> Copyright &copy;
                    <a target="_blank" href="http://glowapps.com.eg">Abdo</a> &nbsp;|&nbsp; 2018
                </div>
                <div class="scroll-to-top">
                    <i class="icon-arrow-up"></i>
                </div>
            </div>
            <!-- END FOOTER -->
        </div>

 	</div>
 </template>
<script>
export default {
    data(){
        return{
            username:'',
            id_username:'',
        }
    },mounted(){
            this.getDataUser();
        },methods:{
           getDataUser:function(){
               this.username =  localStorage.getItem('username');
               this.id_username =  localStorage.getItem('id_username');
           }
        }
}
    
</script>
