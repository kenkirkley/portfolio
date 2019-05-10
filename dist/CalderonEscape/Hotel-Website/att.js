function genatt(picpath, attname, htext, price, output, id) {
  var div = document.createElement("div");
  div.className = "attopt";
  div.id = id;
  var image = document.createElement("img");
  var h1 = document.createElement("h1");
  h1.textContent = attname;
  h1.className = "attTitle";
  var path = `inc/att/${picpath}`;
  image.src = path;
  image.alt = "";
  image.height = "300";
  image.width = "400";
  div.appendChild(image);
  div.appendChild(h1);
  var df = document.createDocumentFragment();
  for (var line in htext) {
    var p = document.createElement("p");
    p.textContent = htext[line];
    p.className = "attHtext";
    df.append(p);
  }
  var button = document.createElement("div");
  var overlay = document.createElement("div");
  overlay.className = "attoptOverlay";
  button.textContent = `CLICK TO ADD $${price}`; //On the main page don't include the price, replace this part with a link that says 'explore', and it should take them to the attractions page.
  button.className = "attButton";
  button.onclick = function() {
    if (att1.value == 0) {
      att1.value = 1;
      button.textContent = "REMOVE";
      button.style.backgroundColor = "red";
    } else {
      att1.value = 0;
      button.textContent = `CLICK TO ADD $${price}`;
      button.style.backgroundColor = "green";
    }
  };
  var h1o = document.createElement("h1");
  h1o.textContent = attname;
  h1o.className = "attOtitle";
  var bracket = document.createElement("img");
  bracket.src = "inc/icons/bracket.png";
  bracket.alt = "";
  bracket.className = "bracket";
  bracket.width = "380";
  bracket.height = "50";
  var block = document.createElement("block");
  block.className = "attpopup";
  overlay.appendChild(block);
  overlay.appendChild(h1o);
  overlay.appendChild(bracket);
  overlay.appendChild(df);
  overlay.appendChild(button);
  document.createElement("div");
  div.appendChild(overlay);
  activeoptiondiv.appendChild(div); //Change this to append it to whatever you want to append it to
}
