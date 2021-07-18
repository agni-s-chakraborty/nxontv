<style>
/* The Close Button */
.close1 {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close1:hover,
.close1:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

.close2 {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close2:hover,
.close2:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

.close3 {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close3:hover,
.close3:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
</style>
<!-- View Functionality Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModal2Label"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">View</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span
                        aria-hidden="true">×</span> </button>
            </div>
            <div class="modal-body">
                <form class="">
                    <input type="hidden" name="view_id" id="view_id" />
                        <div class="row">
                            <!-- <div class="col-4 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label>ID</label>
                                    <input type="text" name="show_id" id="show_id" class="form-control" readonly>
                                </div>
                            </div> -->
                            <div class="col-4 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label>Channel Name</label>
                                    <input type="text" name="show_channel_name" id="show_channel_name" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-4 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label>Channel Description</label>
                                    <input type="text" name="show_channel_desccription" id="show_channel_desccription" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-4 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label>Region</label>
                                    <input type="text" name="show_region" id="show_region" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-4 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label>Channel Catchup</label>
                                    <input type="text" name="show_channel_catchup" id="show_channel_catchup" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-4 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label>Channel TRP</label>
                                    <input type="text" name="show_channel_trp" id="show_channel_trp" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-4 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label>Channel Status</label>
                                    <input type="text" name="show_channel_status" id="show_channel_status" class="form-control" readonly>
                                </div>
                            </div>

                            

                            <div class="col-4 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label>Company Name</label>
                                    <input type="text" name="show_company_id" id="show_company_id" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-4 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label>Channel Genre</label>
                                    <input type="text" name="show_channel_channel_genre_id" id="show_channel_channel_genre_id" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-4 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label>Channel Language</label>
                                    <input type="text" name="show_languages_id" id="show_languages_id" class="form-control" readonly>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-4 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label>Channel Logo1</label>
                                    </div>
                                    <figure class="mr-2">
                                        <img src="{{\URL::to('/').'/admin/assets/'}}" width="35" height="35" alt="..." id="show_channel_logo1">
                                    </figure>
                                </div>
                                <div class="col-4 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label>Channel Logo2</label>
                                    </div>
                                    <figure class="mr-2">
                                        <img src="{{\URL::to('/').'/admin/assets/'}}" width="35" height="35" alt="..." id="show_channel_logo2">
                                    </figure>
                                </div>
                                <div class="col-4 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label>Channel Logo3</label>
                                    </div>
                                    <figure class="mr-2">
                                        <img src="{{\URL::to('/').'/admin/assets/'}}" alt="..." width="35" height="35" id="show_channel_logo3">
                                    </figure>
                                </div>
                            </div>

                        </div>
                    <button class="d-none" id="fire-modal-2-submit"></button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- The Modal -->
<div id="myModal" class="modal">
  <span class="close1">&times;</span>
  <img src="{{\URL::to('/').'/admin/assets/'}}" id="show_channel_logo01">
</div>

<div id="myModal2" class="modal">
  <span class="close2">&times;</span>
  <img src="{{\URL::to('/').'/admin/assets/'}}" id="show_channel_logo02">
</div>

<div id="myModal3" class="modal">
  <span class="close3">&times;</span>
  <img src="{{\URL::to('/').'/admin/assets/'}}" id="show_channel_logo03">
</div>

<script>
    // Get the modal
    var modal = document.getElementById("myModal");
    var img = document.getElementById("show_channel_logo1");
    var modalImg = document.getElementById("show_channel_logo01");
    img.onclick = function(){
        modal.style.display = "block";
        modalImg.src = this.src;
    }

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close1")[0];
    span.onclick = function() {
        modal.style.display = "none";
    }

    // Get the modal2
    var modal2 = document.getElementById("myModal2");
    var img2 = document.getElementById("show_channel_logo2");
    var modal2Img2 = document.getElementById("show_channel_logo02");
    img2.onclick = function(){
        modal2.style.display = "block";
        modal2Img2.src = this.src;
    }

    // Get the <span> element that closes the modal2
    var span2 = document.getElementsByClassName("close2")[0];
    span2.onclick = function() {
        modal2.style.display = "none";
    }


    // Get the modal3
    var modal3 = document.getElementById("myModal3");
    var img3 = document.getElementById("show_channel_logo3");
    var modal3Img3 = document.getElementById("show_channel_logo03");
    img3.onclick = function(){
        modal3.style.display = "block";
        modal3Img3.src = this.src;
    }

    // Get the <span> element that closes the modal3
    var span3 = document.getElementsByClassName("close3")[0];
    span3.onclick = function() {
        modal3.style.display = "none";
    }

    
</script>