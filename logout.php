 <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body" id="logout">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <button id="btnLogout" class="btn btn-primary" value="Logout">Logout</button>
                </div>
      </div>
    </div>
  </div>
<script type='text/javascript'>
    $("#btnLogout").click(function(e){
		$.ajax({
    url: rootURL +'logout',
    type: "POST",
    success: function(data) {
    setTimeout(function() {
                    $("#loading").hide();
                }, 1000);
                if (data.status == "success") {
                   $("#logoutModal").hide();
                   window.location.href = "login.php";
                   console.log('logout');
                } 
            },
            error: function() {
                setTimeout(function() {
                    $("#loading").hide();
                }, 1000);
               
            },
    cache: false,
    contentType: false,
    processData: false
  });

  e.preventDefault();
});

</script>

