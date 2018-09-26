<!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav slimscrollsidebar">
                <div class="sidebar-head">
                    <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3>
                </div>
                <ul class="nav" id="side-menu">
                    <li style="padding: 70px 0 0;">
                        <a href="<?php echo base_url('Beranda');?>" class="waves-effect"><i class="fa fa-home fa-fw" aria-hidden="true"></i>Beranda</a>
                    </li>
                    <!-- <li>
                        <a href="profile.html" class="waves-effect"><i class="fa fa-user fa-fw" aria-hidden="true"></i>Data</a>
                            <ul><a href="">Upload Data</a></ul>
                            <ul><a href=""></a></ul>
                            <ul><a href=""></a></ul>
                    </li> -->

                    <!-- <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Example dropdown </a>
                      <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                        <li><a href="#">Page</a></li>
                        <li><a href="#">Page</a></li>
                        <li><a href="#">Page</a></li>
                      </ul>
                    </li> -->

                   <!--  <button class="dropdown-btn">Dropdown 
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="#">Link 1</a>
    <a href="#">Link 2</a>
    <a href="#">Link 3</a>
  </div> -->

                    <li>
                        <a aria-expanded="false href="<?php echo base_url('Produk');?>" class="waves-effect"><i class="fa fa-table fa-fw" aria-hidden="true"></i>Data Produk</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('Transaksi');?>" class="waves-effect"><i class="fa fa-database fa-fw" aria-hidden="true"></i>Data Penjualan</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('Analisis');?>" class="waves-effect"><i class="fa fa-desktop fa-fw" aria-hidden="true"></i>Analisis</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('Bantuan');?>" class="waves-effect"><i class="fa fa-info-circle fa-fw" aria-hidden="true"></i>Bantuan</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('Profil');?>" class="waves-effect"><i class="fa fa-user fa-fw" aria-hidden="true"></i>Profil Admin</a>
                    </li>

                </ul>
                <div class="center p-20">
                    <!--  <a href="https://wrappixel.com/templates/ampleadmin/" target="_blank" class="btn btn-danger btn-block waves-effect waves-light">Logout</a> -->

                    <a href="<?php echo base_url('Login/logout');?>" class="btn btn-danger btn-block waves-effect waves-light"><i class="fa fa-power-off fa-fw "></i>Log Out</a>
                 </div>
            </div>
            
        </div>
        <!-- ============================================================== -->
        <!-- End Left Sidebar -->
        <!-- ============================================================== -->