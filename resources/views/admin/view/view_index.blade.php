<?php use Request as Input; ?>
@extends('admin.admindashboard')

@section('title','View')

@section('content')
<section class="section">

    <div class="section-header">
      <h1>View</h1>
      <hr>
    </div>
    <div class="section-body">
      <div class="row">
        <div class="form-row">

          <div class="form-group col-md-2">
            <label>Select Channel</label>
            <select class="form-control">
              <option>Choose Channel</option>
              <option>Zee</option>
              <option>Star</option>
              <option>Sony</option>
              <option>Discovery</option>
              <option>Sun</option>
              <option>Others</option>
            </select>
          </div>
          <div class="form-group col-md-2">
            <label>Select Language</label>
            <select class="form-control">
              <option>Choose Language</option>
              <option>English</option>
              <option>Hindi</option>
              <option>Marathi</option>
              <option>Bengali</option>
            </select>
          </div>
          <div class="form-group col-md-2">
            <label>Select Modulel</label>
            <select class="form-control">
              <option>Choose Modulel</option>
              <option>News Module</option>
              <option>Entertainment Module</option>
              <option>Sports Module</option>
              <option>Movie Module</option>
            </select>
          </div>
          <div class="form-group col-md-2">
            <label>Start Date</label>
            <input type="date" class="form-control">
          </div>
          <div class="form-group col-md-2">
            <label>Start Date</label>
            <input type="date" class="form-control">
          </div>

        </div>
        <div class="company-mas-view form-group col-md-2">
          <button class="btn btn-primary">Export</button>
        </div>
      <br>
    </div>


  @include('admin.view.view_listing')
  </section>
@endsection
@section('scripts')
@endsection

