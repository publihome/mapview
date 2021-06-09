<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header  bg-dark text-white">
        <h5 class="modal-title text-white" id="modalTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-6">
                <div class="owl-carousel owl-theme" id="carousel">
                <div class="item"><img src="" alt="" id="img1" class="img-modal"></div>
                <div class="item"><img src="" alt="" id="img2" class="img-modal"></div>
                <div class="item"><img src="" alt="" id="img3" class="img-modal"></div>

                </div>
            </div>
            <div class="col-md-6 modalContent" id="modalContent"></div>
        </div>
      {{-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> --}}
    </div>
  </div>
</div>