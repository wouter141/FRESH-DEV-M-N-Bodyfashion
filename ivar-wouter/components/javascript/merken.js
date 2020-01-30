var divs = ["dropdowncontent-heren-ondermode", "dropdowncontent-heren-nachtmode", "dropdowncontent-heren-badmode", "dropdowncontent-dames-lingerie",
"dropdowncontent-dames-badmode", "dropdowncontent-dames-nachtmode", "dropdowncontent-dames-accessoires", "dropdowncontent-dames-shapewear"];
   var visibleDivId = null;
   function divVisibility(divId) {
     if(visibleDivId === divId) {
       visibleDivId = null;
     } else {
       visibleDivId = divId;
     }
     hideNonVisibleDivs();
   }
   function hideNonVisibleDivs() {
     var i, divId, div;
     for(i = 0; i < divs.length; i++) {
       divId = divs[i];
       div = document.getElementById(divId);
       if(visibleDivId === divId) {
         div.style.display = "block";
         div.style.height = "100%";
         div.style.lineHeight = "30px";
         div.style.fontWeight = "bolder";
         div.style.backgroundColor = "White";
       } else {
         div.style.display = "none";
       }
     }
   }
