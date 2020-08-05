<div class="form-row mb-3">
  <ul id="avatars" class="avatars-list">
  </ul>
</div>

<script>
      $(document).ready(function() {
        $.ajax({
          url: "libs/avatarsApi.php",
          method: "GET",
          success: function(data) {

            console.log(data)
            let avatars = JSON.parse(data);
            for(let avatar of avatars) {
              $("#avatars").append(`<li><img src="${avatar.photo}" alt="avatar" class="avatar-image" width="100" height="100"></li>`)
              $(`img[src="${avatar.photo}"]`).click(function(event) {
                console.log('clicked')
                $(event.target).toggleClass("selected-image")
                $("#emPhoto").val(avatar.photo)
              })
            }
          }
        })
      })
  </script>