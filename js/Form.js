function vissibilityID(elementToChange,close){
   let a = document.getElementById(elementToChange);
   if (a.style.display=="none"){
    a.style.display = "block";
    document.getElementById(close).style.display ="none";
}
   else
    a.style.display = "none";
}
vissibilityID("newFamily");

vissibilityID("NewInFamily");
