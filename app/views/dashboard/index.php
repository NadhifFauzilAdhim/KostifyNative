<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kostify | {{ $title }}</title>
  <link rel="shortcut icon" type="image" href="<?= BASEURL?>/favicon.ico" />
  <link rel="stylesheet" href="<?= BASEURL?>/css/styles.min.css"/>
  <link rel="stylesheet" href="<?= BASEURL?>css/bootstrap-icons.css"/>

  <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
  <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
  <style>
    trix-toolbar [data-trix-button-group="file-tools"]{
      display: none;
    }
  </style>
  <script type="text/javascript">
    window.$crisp = [];
    window.CRISP_WEBSITE_ID = "1e04db0b-6c8c-4e95-a60b-49c6607ff0c3";
    (function () {
      d = document;
      s = d.createElement("script");
      s.src = "https://client.crisp.chat/l.js";
      s.async = 1;
      d.getElementsByTagName("head")[0].appendChild(s);
    })();
  </script>
</head>

<body>
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <aside class="left-sidebar">
    <div>
      <div class="brand-logo d-flex align-items-center justify-content-center">
      
          <img src="<?= BASEURL?>/img/Kostify.png" width="130" alt="" class="mt-4" />
       
        <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer mt-4" id="sidebarCollapse">
          <i class="bi bi-x-lg fs-6"></i>
        </div>
      </div>
      <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
        <ul id="sidebarnav">
          <li class="nav-small-cap">
            
            <span class="hide-menu">Home</span>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="/" aria-expanded="false">
              <span>
                <i class="bi bi-house"></i>
              </span>
              <span class="hide-menu">Home</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="/dashboard" aria-expanded="false">
              <span>
                <i class="bi bi-bookmark-check"></i>
              </span>
              <span class="hide-menu">Dashboard</span>
            </a>
          </li>
          @can('owner')
          <li class="nav-small-cap">
            <span class="hide-menu">Owner</span>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="/dashboard/overview" aria-expanded="false">
              <span>
                <i class="bi bi-clipboard-data"></i>
              </span>
              <span class="hide-menu">Overview</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="/dashboard/posts" aria-expanded="false">
              <span>
                <i class="bi bi-postcard"></i>
              </span>
              <span class="hide-menu">My Post</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="/" aria-expanded="false">
              <span>
                <i class="bi bi-cash-stack"></i>
              </span>
              <span class="hide-menu">Transactions</span>
            </a>
          </li>
          @endcan
          <li class="nav-small-cap">
            <span class="hide-menu">Resident</span>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="/" aria-expanded="false">
              <span>
                <i class="bi bi-cash-stack"></i>
              </span>
              <span class="hide-menu">Payment</span>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>
    <div class="body-wrapper">
    <header class="app-header">
    <nav class="navbar navbar-expand-lg navbar-light">
      <ul class="navbar-nav">
        <li class="nav-item d-block d-xl-none">
          <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
            <i class="bi bi-list"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-icon-hover" href="javascript:void(0)">
            <i class="bi bi-bell"></i>
            <div class="notification bg-primary rounded-circle"></div>
          </a>
        </li>
      </ul>
      <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
          <button class="btn btn-primary">Haii {{ auth()->user()->username }}</button>
          <form class="px-2" action="/logout" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Logout <span><i class="bi bi-box-arrow-in-right"></i></span></button>
          </form>
          <li class="nav-item dropdown">
            <a class="nav-link" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
              aria-expanded="false">
              <img src="https://img.icons8.com/color/48/user-male-circle--v1.png" alt="" width="35" height="35" class="rounded-circle">
              <span></span>
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
              <div class="message-body">
                <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                  <i class="ti ti-user fs-6"></i>
                  <p class="mb-0 fs-3">My Profile</p>
                </a>
                <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                  <i class="ti ti-mail fs-6"></i>
                  <p class="mb-0 fs-3">My Account</p>
                </a>
                <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                  <i class="ti ti-list-check fs-6"></i>
                  <p class="mb-0 fs-3">My Task</p>
                </a>
               
              </div>
            </div>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <div class="container-fluid">   
  <div class="row">
    <div class="col-lg-4 d-flex align-items-stretch ">
      <div class="card w-100">
        <div class="card-body p-4">
          <div class="mb-4">
            <h5 class="card-title fw-semibold">Recent Transactions</h5>
          </div>
          <ul class="timeline-widget mb-0 position-relative mb-n5">
            <li class="timeline-item d-flex position-relative overflow-hidden">
              <div class="timeline-time text-dark flex-shrink-0 text-end">09:30</div>
              <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                <span class="timeline-badge border-2 border border-primary flex-shrink-0 my-8"></span>
                <span class="timeline-badge-border d-block flex-shrink-0"></span>
              </div>
              <div class="timeline-desc fs-3 text-dark mt-n1">Payment received from John Doe of $385.90</div>
            </li>
            <li class="timeline-item d-flex position-relative overflow-hidden">
              <div class="timeline-time text-dark flex-shrink-0 text-end">10:00 am</div>
              <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                <span class="timeline-badge border-2 border border-info flex-shrink-0 my-8"></span>
                <span class="timeline-badge-border d-block flex-shrink-0"></span>
              </div>
              <div class="timeline-desc fs-3 text-dark mt-n1 fw-semibold">New sale recorded <a
                  href="javascript:void(0)" class="text-primary d-block fw-normal">#ML-3467</a>
              </div>
            </li>
            <li class="timeline-item d-flex position-relative overflow-hidden">
              <div class="timeline-time text-dark flex-shrink-0 text-end">12:00 am</div>
              <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                <span class="timeline-badge border-2 border border-success flex-shrink-0 my-8"></span>
                <span class="timeline-badge-border d-block flex-shrink-0"></span>
              </div>
              <div class="timeline-desc fs-3 text-dark mt-n1">Payment was made of $64.95 to Michael</div>
            </li>
            <li class="timeline-item d-flex position-relative overflow-hidden">
              <div class="timeline-time text-dark flex-shrink-0 text-end">09:30 am</div>
              <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                <span class="timeline-badge border-2 border border-warning flex-shrink-0 my-8"></span>
                <span class="timeline-badge-border d-block flex-shrink-0"></span>
              </div>
              <div class="timeline-desc fs-3 text-dark mt-n1 fw-semibold">New sale recorded <a
                  href="javascript:void(0)" class="text-primary d-block fw-normal">#ML-3467</a>
              </div>
            </li>
            <li class="timeline-item d-flex position-relative overflow-hidden">
              <div class="timeline-time text-dark flex-shrink-0 text-end">09:30 am</div>
              <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                <span class="timeline-badge border-2 border border-danger flex-shrink-0 my-8"></span>
                <span class="timeline-badge-border d-block flex-shrink-0"></span>
              </div>
              <div class="timeline-desc fs-3 text-dark mt-n1 fw-semibold">New arrival recorded 
              </div>
            </li>
            <li class="timeline-item d-flex position-relative overflow-hidden">
              <div class="timeline-time text-dark flex-shrink-0 text-end">12:00 am</div>
              <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                <span class="timeline-badge border-2 border border-success flex-shrink-0 my-8"></span>
              </div>
              <div class="timeline-desc fs-3 text-dark mt-n1">Payment Done</div>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-lg-8 d-flex align-items-stretch">
      <div class="card w-100">
        <div class="card-body p-4">
          <h5 class="card-title fw-semibold mb-4">Recent Comments</h5>
          <div class="table-responsive">
            <table class="table text-nowrap mb-0 align-middle">
              <thead class="text-dark fs-4">
                <tr>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Post</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Name</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Date</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Comment</h6>
                  </th>
                 
                </tr>
              </thead>
              <tbody>
            
               
               @foreach ($comments as $comment)
               <tr>
                <td class="border-bottom-0">
                    <a href="/detail/">
                        <h6 class="fw-semibold mb-0">{{ $comment->listing->slug }}<i class="bi bi-box-arrow-up-right text-primary"></i></h6>
                    </a>
                </td>
                <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">{{ $comment->user->name }}</h6>
                </td>
                <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">
                        {{ floor($comment->created_at->diffInDays(now())) }} days ago
                    </h6>
                </td>
                <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-1">{{ $comment->comment_body }}</h6>
                    <span class="fw-normal"></span>                          
                </td>
              </tr> 
               @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    @foreach ($listings as $item)
    
      <div class="col-sm-6 col-xl-3">
        <div class="card overflow-hidden rounded-2">
          <div class="position-relative">
            <a href="/detail/{{ $item->slug }}">
              @if ($item->image)
              <img src="{{ asset('storage/'.$item->image) }}" class="custom-block-image img-fluid rounded " alt="" />  
              @else
              <img src="{{ asset('assets/img/image-not-found.png') }}" class="custom-block-image img-fluid rounded" alt="..."></a>
              @endif
               <span class="bg-primary rounded-pill p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" ><i class="ti ti-basket fs-4"></i>{{ $item->available }} Tersedia</span>
  
            </a>
          </div>
          <div class="card-body pt-3 p-4">
            <h6 class="fw-semibold fs-4">{{ $item->placename }}</h6>
            <div class="d-flex align-items-center justify-content-between">
              <h6 class="fw-semibold fs-4 mb-0">Rp. {{ number_format($item->price, 0, ',', '.') }}/Bulan </h6>
            </div>
          </div>
        </div>
      </div>

      @endforeach
    </div>
  </div>
  <div class="py-6 px-6 text-center">
    <p class="mb-0 fs-4">Developed by <a href="https://ndfproject.my.id" target="_blank" class="pe-1 text-primary text-decoration-underline">NDFProject | Arabis Group</a> with &#10084; </p>
  </div>
</div>
    </div>
    
  </div>
 
  <script src="{{ asset('/js/jquery.min.js') }}"></script>
  <script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('/js/sidebarmenu.js') }}"></script>
  <script src="{{ asset('/js/app.min.js') }}"></script>
  {{-- <script src="./libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="./libs/simplebar/dist/simplebar.js"></script> --}}
  <script src="{{ asset('/js/dashboard.js') }}"></script>
  
</body>

</html>