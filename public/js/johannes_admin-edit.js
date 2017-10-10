function addTextbox(){
  var div = document.createElement("div");
  var infoText = document.createTextNode("Informationen:");
  var numberText = document.createTextNode("Index des Elements");
  var paragraph = document.createElement("p");
  var textbox = document.createElement("TEXTAREA");
  var numbers = document.createElement("input");

  infoText.className = "edit-form-info";
  numberText.className = "edit-form-info";

  numbers.setAttribute("type", "number");
  numbers.setAttribute("min", "1");
  numbers.id = "form-data-index";
  numbers.className ="edit-form-textarea";

  paragraph.appendChild(infoText);
  paragraph.appendChild(textbox);
  paragraph.appendChild(numberText);
  paragraph.appendChild(numbers);
  paragraph.id = "edit-form-data-text";

  textbox.name = "edit-form-data[]";
  textbox.className = "edit-form-textarea";

  div.appendChild(paragraph);
  div.id = "form-text";

  var button = document.getElementById("form-text");
  button.insertBefore(div, button.childNodes[0]);


}
