
var i = 2;

function addTextbox(content, index){
  var div = document.createElement("div");
  var infoText = document.createTextNode("Informationen:");
  var numberText = document.createTextNode("Index des Elements");
  var paragraph = document.createElement("p");
  var textbox = document.createElement("TEXTAREA");
  var numbers = document.createElement("input");
  var hidden = document.createElement("input");

  hidden.setAttribute("type", "hidden");
  hidden.setAttribute("value", "text");
  hidden.name = "edit-form-data["+i+"][type]";

  infoText.className = "edit-form-info";
  numberText.className = "edit-form-info";

  numbers.setAttribute("type", "number");
  numbers.setAttribute("min", "1");
  numbers.id = "form-data-index";
  numbers.className ="edit-form-textarea";
  numbers.name = "edit-form-data["+i+"][index]";
  if (index != null){
    numbers.value = index;
  }

  paragraph.appendChild(hidden);
  paragraph.appendChild(infoText);
  paragraph.appendChild(textbox);
  paragraph.appendChild(numberText);
  paragraph.appendChild(numbers);
  paragraph.id = "edit-form-data-text";

  textbox.innerHTML = content;
  textbox.id = "form-text-edit";
  textbox.name = "edit-form-data["+i+"][content]";
  textbox.className = "edit-form-textarea";
  textbox.setAttribute("placeholder", "Geben Sie hier die Informationen ein!");

  div.appendChild(paragraph);
  div.id = "form-text";

  var button = document.getElementById("form-text");
  button.insertBefore(div, button.childNodes[0]);

  i++;

}

// Parameter URL für PictureBox anzeigen
function addPictureBox(){
  var div = document.createElement("div");
  var hidden = document.createElement("input");
  var file = document.createElement("input");
  var pictureTitle = document.createElement("p");

  hidden.setAttribute("type", "hidden");
  hidden.setAttribute("value", "picture");
  hidden.name = "edit-form-data["+i+"][type]";

  pictureTitle.id = "edit-form-data-name";
  pictureTitle.className = "edit-form-data";

  file.setAttribute("type", "file");
  file.setAttribute("accept", "image/*");
  file.name = "edit-form-pictures[]";
  file.id = "form-picture-data";

  div.appendChild(pictureTitle);
  div.appendChild(hidden);
  div.appendChild(file);

  div.id = "form-text";

  var button = document.getElementById("form-picture");
  button.insertBefore(div, button.childNodes[0]);

  i++;

}

function btnChange(){
  var btn = document.getElementsByClassName("custom-file-upload")[0];
  btn.style.backgroundColor = "red";
}

function buttonSubmitClicked(event) {

        if (!document.getElementById("form-profile-picture-data").value || !document.getElementById("form-epoch-picture-data").value) {
            //event.preventDefault();
            //alert("Please choose a file!");
        } else {
            alert("File've been chosen");
            var btn = document.getElementsByClassName("custom-file-upload")[0];
            //console.log(btn);
            //btn.style.backgroundColor = "red";
        }
}

function addVideoBox(content){
  var div = document.createElement("div");
  var input = document.createElement("input");
  var p = document.createElement("p");
  var textbox = document.createElement("input");
  var videoText = document.createTextNode("Geben Sie hier die URL eines Videos ein:");

  div.id = "form-video";

  input.setAttribute("type", "hidden");
  input.setAttribute("value", "video");
  input.name = "edit-form-data["+i+"][type]";

  p.id = "edit-form-data-video";
  p.className = "edit-form-data";

  textbox.value = content;
  textbox.setAttribute("type", "text");
  textbox.id ="form-video-data";
  textbox.name = "edit-form-data["+i+"][content]";
  textbox.setAttribute("placeholder", "URL des Videos");

  p.appendChild(videoText);
  p.appendChild(textbox);
  div.appendChild(input);
  div.appendChild(p);

  var button = document.getElementById("form-video");
  button.insertBefore(div, button.childNodes[0]);

  i++;

}
