var FreelancingService = {
  init: function(){
    $('#addFreelancingForm').validate({
      submitHandler: function(form) {
        var freelancing = Object.fromEntries((new FormData(form)).entries());
        FreelancingService.add(freelancing);
      }
    });
    FreelancingService.list();
  },

  list: function(){
    $.get("rest/freelancingapps", function(data) {

      $("#freelancing-list").html("");

      var html = "";
      for (let i = 0; i < data.length; i++) {
        html += `
        <div class="col-lg-3">
          <div class="card">
            <img class="card-img-top" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1801ecf42aa%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1801ecf42aa%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22107.1953125%22%20y%3D%2296.3%22%3E286x180%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">`+ data[i].description +`</h5>
              <p class="card-text">`+ data[i].created +`: Example text used to test test test test test</p>
              <div class="btn-group" role="group">
                <button type="button" class="btn btn-primary freelancing-button" onclick="FreelancingService.get(`+data[i].id+`)">Edit</button>
                <button type="button" class="btn btn-danger freelancing-button" onclick="FreelancingService.delete(`+data[i].id+`)">Delete</button>
              </div>
            </div>
          </div>
        </div>
        `;
      }
      $("#freelancing-list").html(html);
    });
  },

  get: function(id){
    $('.freelancing-button').attr('disabled', true);
    $.get('rest/freelancingapps/'+id, function(data){
      $("#description").val(data.description);
      $("#id").val(data.id);
      $("#created").val(data.created);
      $("#exampleModal").modal("show");
      $('.freelancing-button').attr('disabled', false);
    })
  },

  add: function(freelancing){
    $.ajax({
      url: 'rest/freelancingapps/',
      type: 'POST',
      data: JSON.stringify(freelancing),
      contentType: "application/json",
      dataType: "json",
      success: function(result) {
        $("freelancing-list").html('<div class="spinning-border" role="status"> <span class="sr-only"> </span> </div>');
        FreelancingService.list(); // performance optimization
        console.log(result);
        $("#addFreelancingModal").modal("hide");
      }
    });
  },

  update: function(){
    $('.save-freelancing-button').attr('disabled', true);
    var freelancing = {};
    freelancing.description = $('#description').val();
    freelancing.created = $('#created').val();

    $.ajax({
      url: 'rest/freelancingapps/'+$('#id').val(),
      type: 'PUT',
      data: JSON.stringify(freelancing),
      contentType: "application/json",
      dataType: "json",
      success: function(result) {
        $("#exampleModal").modal("hide");
        $('.save-freelancing-button').attr('disabled', false);
        $("freelancing-list").html('<div class="spinning-border" role="status"> <span class="sr-only"> </span> </div>');
        FreelancingService.list(); // performance optimization
      }
    });
  },

  delete: function(id){
    $('.freelancing-button').attr('disabled', true);
    $.ajax({
      url: 'rest/freelancingapps/'+id,
      type: 'DELETE',
      success: function(result) {
        $("freelancing-list").html('<div class="spinning-border" role="status"> <span class="sr-only"> </span> </div>');
        FreelancingService.list();
      }
    });
  },
}
