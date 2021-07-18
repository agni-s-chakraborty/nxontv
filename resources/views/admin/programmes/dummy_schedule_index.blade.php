<?php use Request as Input; ?>
@extends('admin.admindashboard')

@section('title','Dummy Schedule')
@section('css')
@endsection
@section('content')
<section class="section">

    <div class="section-header">
      <h1>Dummy Schedule</h1>
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
          <div class="form-group col-md-3">
            <label>Start Date</label>
            <input type="text" class="form-control">
          </div>
          <div class="form-group col-md-3">
            <label>Select Days</label>
            <select class="form-control">
              <option>Choose Days</option>
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
              <option>6</option>
              <option>7</option>
            </select>
          </div>

        </div>
        <div class="company-mas-dmm form-group col-md-2">
          <button class="btn btn-primary">Copy EPG</button>
        </div>
        <div class="card-header-action-dmm form-group col-md-2">
          <a href="#" class="btn btn-danger btn-action">Export EPG</a>
        </div>
      </div>
    </div>


  </section>
@endsection
