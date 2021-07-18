<?php use Request as Input; ?>
@extends('admin.admindashboard')

@section('title','OTT/Channel')
@section('css')
@endsection
@section('content')
<section class="section">

    <div class="section-header">
      <h1>OTT/Channel</h1>
      <hr>
    </div>
    <div class="section-body">
      <div class="row">
      <div class="form-row">
        <div class="row">

          <div class="form-group col-md-3">
            <label>OTT Name</label>
            <input type="text" class="form-control">
          </div>
          <div class="form-group col-md-3">
            <label>Upcoming Show/Movie Name</label>
            <input type="text" class="form-control">
          </div>

          <div class="form-group col-md-3">
            <label>Genre</label>
            <input type="text" class="form-control">
          </div>

          <div class="form-group col-md-3">
            <label>Sub Genre</label>
            <input type="text" class="form-control">
          </div>

          <div class="form-group col-md-3">
            <label>Story</label>
            <input type="text" class="form-control">
          </div>
        </div>

      <div class="row">
        <div class="col-3 col-md-3 col-lg-3 ott-sec">
          <h1>Star Cast</h1>
          <hr>
          <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control">
          </div>
          <div class="form-group ott-btn">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="customFile">Choose a Image</label>
              </div>
              <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Add"><i class="fas fa-plus"></i></a>
          </div>
        </div>

      </div>

      <div class="row">
        <div class="col-3 col-md-3 col-lg-3 ott-sec">
          <h1>Director</h1>
          <hr>
          <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control">
          </div>
          <div class="form-group ott-btn">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="customFile">Choose a Image</label>
              </div>
              <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Add"><i class="fas fa-plus"></i></a>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-3 col-md-3 col-lg-3 ott-sec">
          <h1>Produce</h1>
          <hr>
          <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control">
          </div>
          <div class="form-group ott-btn">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="customFile">Choose a Image</label>
              </div>
              <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Add"><i class="fas fa-plus"></i></a>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-3 col-md-3 col-lg-3 ott-sec">
          <h1>Writer</h1>
          <hr>
          <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control">
          </div>
          <div class="form-group ott-btn">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="customFile">Choose a Image</label>
              </div>
              <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Add"><i class="fas fa-plus"></i></a>
          </div>
       </div>
      </div>

      <div class="row">
        <div class="form-group col-md-3 ott-sec">
          <h1>Release Date</h1>

            <input type="date" class="form-control">

        </div>

        <div class="form-group col-md-3 ott-sec">
          <h1>Streaming On</h1>

            <input type="text" class="form-control">

        </div>

        <div class="form-group col-md-3 ott-sec ">
          <h1>Banner</h1>

            <div class="custom-file">
              <input type="file" class="custom-file-input" id="customFile">
              <label class="custom-file-label" for="customFile">Choose a Image</label>
            </div>

        </div>

        <div class="form-group col-md-3 ott-sec">
          <h1>Promo</h1>

            <div class="custom-file">
              <input type="file" class="custom-file-input" id="customFile">
              <label class="custom-file-label" for="customFile">Choose a Video</label>
            </div>

        </div>
        <div class="form-group col-md-12">
        </div>
        <div class="form-group col-md-12">
        </div>
        <div class="form-group col-md-12">
        </div>
        <div class="form-group col-md-12">
        </div>
      </div>


    </div>
    <div class="company-mas-ott form-group col-md-1">
      <button class="btn btn-primary">Add</button>
    </div><br>

    <div class="card-header-action-ott form-group col-md-1">
      <a href="#" class="btn btn-danger btn-action">Reset</a>
    </div><br>
    </div>
  </div>

  @include('admin.programmes.ott_listing')
  </section>

@section('scripts')
@endsection
@endsection
