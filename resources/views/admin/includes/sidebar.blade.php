 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="index3.html" class="brand-link">
         <span class="brand-text font-weight-light">Blog. Admin Panel</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user panel (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
             </div>
             <div class="info">
                 <a href="#" class="d-block">Alexander Pierce</a>
             </div>
         </div>

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                 data-accordion="false">
                 <li class="nav-item">
                     <a href="{{ route('admin.main.index') }}" class="nav-link">
                         <i class="nav-icon fas fa-tachometer-alt"></i>
                         <p>
                             Приборная доска
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('admin.category.index') }}" class="nav-link">
                         <i class="nav-icon fas fa-th"></i>
                         <p>
                             Категории
                             <i class="fas fa-angle-left right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="{{ route('admin.category.index') }}" class="nav-link">
                                 <i class="fas fa-list nav-icon"></i>
                                 <p>Все</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ route('admin.category.create') }}" class="nav-link">
                                 <i class="fas fa-plus-circle nav-icon"></i>
                                 <p>Создать</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('admin.tag.index') }}" class="nav-link">
                         <i class="nav-icon fas fa-tags"></i>
                         <p>
                             Теги
                             <i class="fas fa-angle-left right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="{{ route('admin.tag.index') }}" class="nav-link">
                                 <i class="fas fa-list nav-icon"></i>
                                 <p>Все</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ route('admin.tag.create') }}" class="nav-link">
                                 <i class="fas fa-plus-circle nav-icon"></i>
                                 <p>Создать</p>
                             </a>
                         </li>
                     </ul>
                 </li>
             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>
