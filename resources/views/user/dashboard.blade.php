@extends('user.layouts.master')
@section('content')
     <section class="section dashboard">
      <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Orders Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Orders <span>| Total</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{@$total_orders ? $total_orders : 0}}</h6>
                     </div>
                  </div>
                </div>

              </div>
            </div><!-- End Orders Card -->

           
          </div><!-- End News & Updates -->

        </div><!-- End Right side columns -->

      </div>
    </section>
@endsection