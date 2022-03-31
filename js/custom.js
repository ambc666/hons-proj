/****************************************
=            Dropzone JS Val          =
****************************************/
Dropzone.options.dragndropform = {
  autoProcessQueue: false,
  uploadMultiple: false,
  parallelUploads: 100,
  maxFiles: 100,
  maxFiles: 1,
  maxFilesize: 6,
  clickable: false,
  acceptedFiles: "image/*",

  // Conofiguration
  init: function () {
    var myDropzone = this;

    // Button tells Dropzone to upload adata
    this.element
      .querySelector("button[type=submit]")
      .addEventListener("click", function (e) {
        // Prevent form being sent
        e.preventDefault();
        e.stopPropagation();
        myDropzone.processQueue();
      });

    this.on("success", function (files, response) {
      setTimeout(function () {
        location.reload();
      }, 3000);
    });
  }, //Closes init function
}; //Closes main function

/****************************************
=          Go Back Page Script         =
****************************************/
function goBack() {
  window.history.back();
}
/****************************************
=          Form 1 Validation           =
****************************************/
var fileName = document.getElementById("img").files[0].name;

function validateForm() {
  var formData = new FormData();
  var file = document.getElementById("img").files[0];
  formData.append("Filedata", file);
  var type = file.type.split("/").pop().toLowerCase();
  if (type != "jpeg" && type != "jpg" && type != "png" && type != "gif") {
    alert("Please select a valid image file that is jpeg, jpg, png or gif.");
    document.getElementById("img").value = "";
    return false;
  } else if (file.size > 6144000) {
    alert("Max Upload size is 6MB only");
    document.getElementById("img").value = "";
    return false;
  } else {
    alert(
      "Thank you for uploading your image. \n\n Please press okay to see the image in the gallery below the form and complete the form above."
    );
    return true;
  }
}
