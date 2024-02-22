@extends('layouts.dashboard')

@section('container')

<style>
    .name {
        font-size: 40px;
        font-weight: bold;
    }
</style>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <div class="name">Hello, {{ auth()->user()->name }}</div>   
</div>

<div class="row">

  <div class="col-md-6" style="margin-top: 70px">
      <div class="card">
          <div class="card-header">
              <h5 class="card-title">Latest Orders</h5>
          </div>
          <div class="card-body">
              <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                      Cras justo odio
                      <span class="badge bg-primary rounded-pill">14</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                      Dapibus ac facilisis in
                      <span class="badge bg-primary rounded-pill">2</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                      Morbi leo risus
                      <span class="badge bg-primary rounded-pill">1</span>
                  </li>
              </ul>
          </div>
      </div>
  </div>
</div>

<div class="row mt-4">
  <div class="col-md-6">
      <div class="card">
          <div class="card-header">
              <h5 class="card-title">Student Overview</h5>
          </div>
          <div class="card-body">
              <p class="card-text">Total students enrolled: <strong>250</strong></p>
              <p class="card-text">Average performance: <strong>85%</strong></p>
              <p class="card-text">Top performing student: <strong>John Doe</strong></p>
          </div>
      </div>
  </div>
</div>

<div class="col-md-6" style="margin-top: 30px">
  <div class="card">
      <div class="card-header">
          <h5 class="card-title">School Information</h5>
      </div>
      <div class="card-body">
          <p class="card-text">School name: <strong>RUS Academy</strong></p>
          <p class="card-text">Location: <strong>New York City</strong></p>
          <p class="card-text">Principal: <strong>Jane Smith</strong></p>
      </div>
  </div>
</div>
@endsection
