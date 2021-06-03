<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="index.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Interface
</div>


<!-- Nav Item - Charts -->
<li class="nav-item">
    <a class="nav-link" href="register.php">
        <i class="fas fa-fw fa-user-shield"></i>
        <span>Admins Profile</span></a>
</li>


<!-- Nav Item - Charts -->
<li class="nav-item">
    <a class="nav-link" href="products.php">
        <i class="fas fa-fw fa-shopping-bag"></i>
        <span>Products</span></a>
</li>

<!-- Nav Item - Charts -->
<li class="nav-item">
    <a class="nav-link" href="category.php">
        <i class="fas fa-fw fa-bookmark"></i>
        <span>Categories</span></a>
</li>



<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Settings
</div>


<!-- Nav Item - My Profile Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProfile"
        aria-expanded="true" aria-controls="collapseProfile">
        <i class="fas fa-fw fa-cog"></i>
        <span>My Profile</span>
    </a>
    <div id="collapseProfile" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Profile Components:</h6>
            <a class="collapse-item" href="edit_my_admin.php">Edit My Profile</a>
            <a class="collapse-item" href="change_admin_password.php">Change Password</a>
        </div>
    </div>
</li>

<!-- Nav Item - Logout -->
<li class="nav-item">

    <form action="code.php" method="POST">
        <button type="submit" name="admin_logout_btn" class="nav-link" style="background-color:#2f57cc; border:none;">
            <i class="fas fa-fw fa-sign-out-alt"></i><span>Logout</span>      
        </button>
    </form>
    
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>


</ul>
<!-- End of Sidebar -->
