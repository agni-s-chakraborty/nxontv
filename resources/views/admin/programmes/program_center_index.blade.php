<?php use Request as Input; ?>
@extends('admin.admindashboard')

@section('title','Program Center')
@section('css')
@endsection
@section('content')
<section class="section">

    <div class="section-header">
      <h1>Program Center</h1>
      <hr>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="form-row">

          <div class="form-group col-md-3">
            <label>Select Channel</label>
            <select class="form-control">
              <option>Choose Discrepanc</option>
              <option>Zee</option>
              <option>Star</option>
              <option>Sony</option>
              <option>Discovery</option>
              <option>Sun</option>
              <option>Others</option>
            </select>
          </div>
          <div class="form-group col-md-1">

          </div>
          <div class="form-group col-md-3">
            <label>Select Language</label>
            <select class="form-control">
              <option>Choose Language</option>
              <option>English</option>
              <option>Hindi</option>
              <option>Marathi</option>
              <option>Tamil</option>
              <option>Telegu</option>
              <option>Bengali</option>
              <option>Kannada</option>
              <option>Malayalam</option>
              <option>Gujarati</option>
            </select>
          </div>

        </div>
        <div class="form-group col-md-12">
        </div><br>
      </div>
    </div>

    @include('admin.programmes.program_center_listing')
  </section>

@section('scripts')
@endsection
@endsection
