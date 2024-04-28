function edit() {
    $(".info-d").toggleClass("display_none");

    var x = document.getElementById("edit_button");
    if (x.innerHTML === "Edit Profile") {
        x.innerHTML = "Cancle Edit";
    } else {
        x.innerHTML = "Edit Profile";
    }
}
