<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AirTravel</title>
    
    <link href="/welcome/img/AirTravelLogo.png" rel="icon">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets1/css/bootstrap.css">

    <link rel="stylesheet" href="assets1/vendors/simple-datatables/style.css">

    <link rel="stylesheet" href="assets1/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets1/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets1/css/app.css">
    <link rel="shortcut icon" href="assets1/images/favicon.svg" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                    <div class="logo">
                          <a href="/" class="logo-text">AirTravel</a>
                    </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item ">
                            <a href="/TransitaireDashboard" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-person-badge-fill"></i>
                                <span>Authentication</span>
                            </a>
                            <ul class="submenu ">
                            <li class="submenu-item ">
                                    <a href="/profile">Settings</a>
                                </li>
                                <li class="submenu-item ">
                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-responsive-nav-link :href="route('logout')"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-responsive-nav-link>
                                    </form>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="/TransitaireDashboard" class='sidebar-link'>
                                <i class="bi bi-file-earmark-medical-fill"></i>
                                <span>Rechercher</span>
                            </a>
                        </li>

                        <li class="sidebar-item active">
                            <a href="/liste_des_reservations_transitaire" class='sidebar-link'>
                                <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                                <span>Reservation</span>
                            </a>
                        </li>
                    </ul>
                </div>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            <div class="page-heading">
                <h3 style="color:#ffff" >Client</h3>
            </div>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">

                            <p class="text-subtitle text-muted"></p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/dashboard-transitaire">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Reservation</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            Reservation
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                         <th>Nom client</th>
                                        <th>Nom compagnie </th>
                                        <th>Ticket Price</th>
                                        <th>Nombre de tickets</th>
                                        <th>Prix Total</th>
                                      
                                    </tr>
                                </thead>
                                <tbody>

                                  @foreach ($reservations as $reservation )
                                  <tr>
                                        <td>{{$reservation->transitaire->name}}</td>
                                         <td>{{$reservation->offre->nom_compagnie}}</td>
                                        <td>{{$reservation->offre->ticket_price}}</td>
                                        <td>{{$reservation->Nombre_de_tickets}}</td>
                                        <td>{{$reservation->prixTotal}}</td>
                                    
                                    
                                      <td class="text-center">
                                        <span class="badge bg-{{ $reservation->status === 'attente' ? 'warning' : ($reservation->status === 'accepted' ? 'success' : 'danger') }}" style="font-size: 16px; padding: 10px; min-width: 80px;">
                                            {{ $reservation->status }}
                                        </span>
                                    </td>
                                    <td><button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#reservationModal{{ $reservation->id }}">Afficher</button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="reservationModal{{ $reservation->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="reservationModalLabel{{ $reservation->id }}"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="reservationModalLabel{{ $reservation->id }}">Reservation
                                                            Details</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <table class="table">
                                                            <tbody>
                                                                <tr>
                                                                    <td>Nom compagnie:</td>
                                                                    <td>{{$reservation->offre->nom_compagnie}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>num_vol:</td>
                                                                    <td>{{ $reservation->offre->num_vol }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Airport depart:</td>
                                                                    <td>{{ $reservation->offre->airport_depart }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Airport arrive:</td>
                                                                    <td>{{ $reservation->offre->airport_arrive}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Jour depart:</td>
                                                                    <td>{{ $reservation->offre->jour_depart }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Nombre de tickets:</td>
                                                                    <td>{{ $reservation->Nombre_de_tickets }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Ticket Price:</td>
                                                                    <td>{{ $reservation->offre->ticket_price }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Prix Total:</td>
                                                                    <td>{{ $reservation->prixTotal }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Nom Client:</td>
                                                                    <td>{{ $reservation->transitaire->name }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Prénom Client:</td>
                                                                    <td>{{ $reservation->transitaire->lastname }}</td>
                                                                </tr>
                                                                
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                  </tr>
                                  @endforeach

                              </tbody>
                            </table>
                        </div>
                    </div>

                </section>
            </div>


        </div>
    </div>
    <script src="assets1/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets1/js/bootstrap.bundle.min.js"></script>

    <script src="assets1/vendors/simple-datatables/simple-datatables.js"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>

    <script src="assets1/js/main.js"></script>
</body>


</html>
