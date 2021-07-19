<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <!-- Logo Of APP -->
                </div>
                <div class="sidebar-brand-text mx-3">Mark Monitor</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url("login/auth")?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCustomer"
                    aria-expanded="true" aria-controls="collapseCustomer">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Customer</span>
                </a>
                <div id="collapseCustomer" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Customer:</h6>
                        <a class="collapse-item" href="<?= base_url('customer/create')?>">Create Customer</a>
                        <a class="collapse-item" href="<?= base_url('customer')?>">View Customer</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDevices"
                    aria-expanded="true" aria-controls="collapseDevices">
                    <i class="fas fa-fw fa-tablet-alt"></i>
                    <span>Devices</span>
                </a>
                <div id="collapseDevices" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Devices:</h6>
                        <a class="collapse-item" href="<?= base_url("devices/register")?>">Register Device</a>
                        <a class="collapse-item" href="<?= base_url("devices")?>">View Devices</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSetTime"
                    aria-expanded="true" aria-controls="collapseSetTime">
                    <i class="fas fa-fw fa-clock"></i>
                    <span>Set Time</span>
                </a>
                <div id="collapseSetTime" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Set Time:</h6>
                        <a class="collapse-item" href="<?= base_url('timer/set_time')?>">Set Time</a>
                        <a class="collapse-item" href="<?= base_url('timer')?>">View Status</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReports"
                    aria-expanded="true" aria-controls="collapseReports">
                    <i class="fas fa-fw fa-chart-bar"></i>
                    <span>Reports</span>
                </a>
                <div id="collapseReports" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Reports:</h6>
                        <a class="collapse-item" href="<?= base_url()?>">Energy Consumption</a>
                        <a class="collapse-item" href="<?= base_url()?>">Error Fault Report</a>
                    </div>
                </div>
            </li>
        </ul>