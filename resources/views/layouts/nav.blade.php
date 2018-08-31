<div class="left-sidebar">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <li class="nav-devider"></li>
                    <li class="nav-label">Amauta Solver</li>
                    <li> <a href="#" class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Rutero</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="email-inbox.html">Estudiantes</a></li>
                            <li><a href="email-compose.html">Flota</a></li>
                            <li><a href="email-read.html">Reglas</a></li>
                            <li><a href="email-read.html">Calcular rutas</a></li>
                            
                        </ul>
                    </li>
                    <li class="nav-label">Catálogos</li>
                    <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-address-book"></i><span class="hide-menu">Estudiantes</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href={{ url('/estudiantes/create') }}>Registrar</a></li>                                
                            <li><a href={{ url('/estudiantes/') }}>Ver estudiantes registrados</a></li>
                        </ul>
                    </li>
                    <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-bus"></i><span class="hide-menu">Flota escolar</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href={{ url('/vehiculos/create') }}>Registrar</a></li>                                
                            <li><a href={{ url('/vehiculos/') }}>Ver flota disponible</a></li>
                        </ul>
                    </li>                        
                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </div>