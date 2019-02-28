window.onload = function() {
var dropFileForm = document.getElementById("dropFileForm");
var dropBox = document.getElementById("dropBox");
var fileLabelText = document.getElementById("fileLabelText");
var uploadStatus = document.getElementById("uploadStatus");
var fileInput = document.getElementById("fileInput");
var droppedFiles;
}

function overrideDefault(event) {
  event.preventDefault();
  event.stopPropagation();
}

function fileHover() {
  dropBox.classList.add("fileHover");
}

function fileHoverEnd() {
  dropBox.classList.remove("fileHover");
}

function addFiles(event) {
  droppedFiles = event.target.files || event.dataTransfer.files;
  showFiles(droppedFiles);
}

function dropFiles(event) {
  droppedFiles = event.target.files || event.dataTransfer.files;
  if(droppedFiles.length > 1)
    alert("Only one file pls");
  else{
    fileInput.files = droppedFiles;
    showFiles(droppedFiles);
  }
}

function showFiles(files) {
  fileLabelText.innerText = files[0].name + " " + (files[0].size/1048567).toFixed(2) + " MB";
}
