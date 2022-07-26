<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="{{asset('./css/dashboard.css')}}"/>
      <link rel="stylesheet" href="{{asset('./css/create.css')}}"/>
      <link rel="stylesheet" href="{{asset('./css/view.css')}}"/>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css" integrity="sha384-/frq1SRXYH/bSyou/HUp/hib7RVN1TawQYja658FEOodR/FQBKVqT9Ol+Oz3Olq5" crossorigin="anonymous"/>

      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      <!-- BoxIcon CDN Link -->
      <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
      <!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->

      <!-- Toastr -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" />
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>


      <!-- Sweet Alert -->
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <title>SKIN MD</title>
</head>
<body>
     

      <div class="sidebar">
            <div class="logo-details">
                  <!-- <p class="ml-5"></p> -->
                  <i class="fa-solid fa-m"></i>
                  <span class="logo_name">Mujer Bella</span>
            </div>
                  <ul class="nav-links side-links">
                        <li class="dashboard-nav">
                              <a href="{{ route('profile') }}">
                                    <i class="fa-solid fa-user"></i>
                                    <span class="link_name">Profile</span>
                              </a>
                        </li>
                        <li class="patient-nav">
                              <a href="{{ route('product-list') }}">
                                    <i class="fa-solid fa-box"></i>
                                    <span class="link_name">Products</span>
                              </a>
                        </li>
                        <li class="patient-nav">
                              <a href="{{ route('inventory-list') }}">
                                    <i class="fa-solid fa-box"></i>
                                    <span class="link_name">Inventory</span>
                              </a>
                        </li>
                        <li class="appointment-nav">
                              <a href="{{ route('cart-show') }}">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                    <span class="link_name">Cart</span>
                              </a>
                        </li>
                        <li class="inventory-nav">
                              <a href="{{ route('order-list') }}">
                                    <i class="fa-solid fa-truck"></i>
                                    <span class="link_name">Orders</span>
                              </a>
                        </li>

                        @if(( Auth::user()->user_type_id == 1) || (Auth::user()->user_type_id == 4) || (Auth::user()->user_type_id == 5) || (Auth::user()->user_type_id == 7))
                              <li class="user-nav">
                                    <a href="">
                                          <i class='bx bxs-user-account'></i>
                                          <span class="link_name">User Management</span>
                                    </a>
                              </li>
                        @endif

                        <li >
                                <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                         <i class='bx bx-log-out' ></i>
                                    <span class="link_name ">Log out</span>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                        </li>
                  </ul>
      </div>

      <!-- HOME CONTENT -->

      <section class="home-section">
            <nav>
                  <div class="sidebar-button">
                        <i class='bx bx-menu sidebarBtn cursor-pointer' ></i>
                        <span class="dashboard">@yield('title')</span>
                  </div>
            </nav>

            <div>
                  @yield('content')
            </div>

      </section>

      <script src="{{asset('js/dashboard.js')}}"></script>
      </script>
      <!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"> -->
      </script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>

      <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>

      <script>    
      </script>

      @yield('after-content');
</body>
</html>
