<?php use Request as Input; ?>
@extends('admin.admindashboard')

@section('title','Movie/Show Database')
@section('css')
@endsection
@section('content')
<section class="section">

    <div class="section-header">
      <h1>Movie/Show Database</h1>
      <hr>
    </div>
    <div class="section-body">
      <div class="form-row">
        <div class="row">

          <div class="form-group col-md-3">
            <label>Select Module</label>
            <select class="form-control">
              <option>Choose Module</option>
              <option>Show</option>
              <option>Movie</option>
              <option>Reality</option>
            </select>
          </div>
          <div class="form-group col-md-3">
            <label>Select Channel</label>
            <select class="form-control">
              <option>Choose Channel</option>
              <option>Show</option>
              <option>Movie</option>
              <option>Reality</option>
            </select>
          </div>
          <div class="form-group col-md-3">
            <label>Select Program</label>
            <select class="form-control">
              <option>Choose Program</option>
              <option>Show</option>
              <option>Movie</option>
              <option>Reality</option>
            </select>
          </div>
          <div class="form-group col-md-3">
            <label>Program Short Title </label>
            <input type="text" class="form-control">
          </div>
          <div class="form-group col-md-3">
            <label>Program Genre</label>
            <select class="form-control">
              <option>Choose Program Genre</option>
              <option>Show</option>
              <option>Movie</option>
              <option>Reality</option>
            </select>
          </div>
          <div class="form-group col-md-3">
            <label>Program Sub Genre</label>
            <select class="form-control">
              <option>Choose Program Sub Genre</option>
              <option>Show</option>
              <option>Movie</option>
              <option>Reality</option>
            </select>
          </div>
         
        </div>


    <div class="row">
      <div class="col-12 col-md-12 col-lg-12 ott-sec">
          <h1>Episode Details</h1>
          <hr>
      </div>
      <div class="form-group col-md-3">
        <div class="form-group">
          <label>Episode Title</label>
          <input type="text" class="form-control">
        </div>
      </div>
      <div class="form-group col-md-3">
        <div class="form-group">
          <label>Episodic Synopsis</label>
          <input type="text" class="form-control">
        </div>
      </div>
      <div class="form-group col-md-3">
        <div class="form-group">
          <label>Generic Synopsis</label>
          <input type="text" class="form-control">
        </div>
      </div>

      <div class="form-group col-md-3">
        <div class="form-group">
          <label>Season Number</label>
          <input type="number" class="form-control">
        </div>
      </div>

      <div class="form-group ott-btn col-md-3">
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="customFile">
          <label class="custom-file-label" for="customFile">Choose Landscape Image</label>
        </div>
        <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Add"><i class="fas fa-plus"></i></a>
    </div>
  </div>

      <div class="form-group ott-btn col-md-3">
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="customFile">
          <label class="custom-file-label" for="customFile">Choose Potrait Image</label>
        </div>
        <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Add"><i class="fas fa-plus"></i></a>
    </div>
    </div>
<hr>
    </div>
    <div class="row">
      <div class="col-3 col-md-3 col-lg-3 ott-sec">
        <h1>Star Cast</h1>
        <hr>
        <div class="form-group">
          <label>Starcast Name</label>
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
      <div class="form-group col-md-3">
        <div class="form-group">
          <label>About</label>
          <textarea class="form-control"></textarea>
        </div>
      </div>
      <div class="form-group col-md-3">
        <div class="form-group">
          <label>DOB</label>
          <input type="date" class="form-control">
        </div>
      </div>
      <div class="form-group col-md-3">
        <div class="form-group">
          <label>Occupation</label>
          <input type="text" class="form-control">
        </div>
      </div>
      <div class="form-group col-md-3">
        <div class="form-group">
          <label>Spouse</label>
          <input type="text" class="form-control">
        </div>
      </div>
      <div class="form-group col-md-3">
        <div class="form-group">
          <label>Children</label>
          <input type="text" class="form-control">
        </div>
      </div>
      <div class="form-group col-md-3">
        <div class="form-group">
          <label>Father's Name</label>
          <input type="text" class="form-control">
        </div>
      </div>
      <div class="form-group col-md-3">
        <div class="form-group">
          <label>Mother's Name</label>
          <input type="text" class="form-control">
        </div>
      </div>
      <div class="form-group col-md-3">
        <div class="form-group">
          <label>Birth-State</label>
          <select id="inputState" class="form-control">
            <option selected="">Choose...</option>
            <option>1</option>
            <option>2</option>
          </select>
        </div>
      </div>
      <div class="form-group col-md-3">
        <div class="form-group">
          <label>Birthplace</label>
          <input type="text" class="form-control">
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
    <div class="form-group col-md-3">
        <div class="form-group">
          <label>Release Date</label>
          <input type="date" class="form-control">
        </div>
      </div>
      <div class="form-group col-md-3">
        <div class="form-group">
          <label>Rating</label>
          <input type="text" class="form-control">
        </div>
      </div>
      <div class="form-group col-md-3">
        <div class="form-group">
          <label>Origin of Country</label>
          <input type="text" class="form-control">
        </div>
      </div>
      <div class="form-group col-md-3">
        <div class="form-group">
          <label>ShowLanguage</label>
          <input type="text" class="form-control">
        </div>
      </div>
      <div class="form-group col-md-3">
        <div class="form-group">
          <label>Show Dubbed</label>
          <input type="text" class="form-control">
        </div>
      </div>
      <div class="form-group col-md-3">
        <div class="form-group">
          <label>Trivia</label>
          <input type="text" class="form-control">
        </div>
      </div>
      <div class="form-group col-md-3">
        <div class="form-group form-sec">
          <label>Channels Name</label>
          <input type="text" class="form-control">

        </div>
      </div>
    </div>

  </div>
  <div class="form-group col-md-12"></div><br>
</div>

@include('admin.programmes.movie_shows_listing')
  </section>

@section('scripts')
@endsection
@endsection
