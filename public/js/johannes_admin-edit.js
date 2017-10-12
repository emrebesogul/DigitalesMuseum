
var i = 1;

function addTextbox(){
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

  paragraph.appendChild(hidden);
  paragraph.appendChild(infoText);
  paragraph.appendChild(textbox);
  paragraph.appendChild(numberText);
  paragraph.appendChild(numbers);
  paragraph.id = "edit-form-data-text";

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

function addPictureBox(){
  var div = document.createElement("div");
  var pictureText = document.createTextNode("Titel des Bildes");
  var numberText = document.createTextNode(" Index des Elements");
  var numbers = document.createElement("input");
  var hidden = document.createElement("input");
  var text = document.createElement("input");
  var file = document.createElement("input");
  var pictureTitle = document.createElement("p");

  text.setAttribute("type", "text");
  text.className = "edit-form-textarea";
  text.setAttribute("placeholder", "Geben Sie hier den Titel des Bildes ein!");

  hidden.setAttribute("type", "hidden");
  hidden.setAttribute("value", "picture");
  hidden.name = "edit-form-data["+i+"][type]";

  pictureText.className = "edit-form-info";
  numberText.className = "edit-form-info";

  pictureTitle.id = "edit-form-data-name";
  pictureTitle.className = "edit-form-data";

  file.setAttribute("type", "file");
  file.setAttribute("accept", "image/*");
  file.name = "edit-form-data["+i+"][content]";
  file.id = "form-picture-data";

  numbers.setAttribute("type", "number");
  numbers.setAttribute("min", "1");
  numbers.id = "form-data-index";
  numbers.className ="edit-form-textarea";
  numbers.name = "edit-form-data["+i+"][index]";

  pictureTitle.appendChild(pictureText);
  pictureTitle.appendChild(text);
  div.appendChild(pictureTitle);
  div.appendChild(hidden);
  div.appendChild(file);
  div.appendChild(numberText);
  div.appendChild(numbers);

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

        if (!document.getElementById("form-profile-picture-data").value) {
            //event.preventDefault();
            //alert("Please choose a file!");
        } else {
            alert("File've been chosen");
            var btn = document.getElementsByClassName("custom-file-upload")[0];
            //console.log(btn);
            //btn.style.backgroundColor = "red";
        }
}
