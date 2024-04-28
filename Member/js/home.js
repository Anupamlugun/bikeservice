function list_collapse() {

        $(".show").removeClass("show");

}

function getLocation() {
        if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
        } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
        }
}

showPosition();

async function showPosition(position) {
        let url = 'https://nominatim.openstreetmap.org/reverse?lat=' + position.coords.latitude + '&lon=' + position.coords.longitude + '&format=json';
        let response = await fetch(url);
        let data = await response.json();

        document.getElementById("state").value = (data.address.state);
        document.getElementById("city").value = (data.address.city);
        if (data.address.suburb) {
                document.getElementById("your_area").value = (data.address.suburb);
        }
        else {
                document.getElementById("your_area").value = (data.address.county);
        }
        document.getElementById("pincode").value = (data.address.postcode);

}

