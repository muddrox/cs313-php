function addToCart(item, price){
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if ( xhr.readyState == 4 && xhr.status == 200 ) {
            document.getElementById('cartInfo').innerHTML = this.responseText;
        } else if ( xhr.status == 404 ) {
            document.getElementById("error").innerHTML = "Error: file not found";
        }
    }

    xhr.open("POST", "addToCart.php?item=" + item + "&price=" + price, true);
    xhr.send(null);
}

function removeItem(index){
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if ( xhr.readyState == 4 && xhr.status == 200 ) {
            document.getElementById('itemReview').innerHTML = this.responseText;
        } else if ( xhr.status == 404 ) {
            document.getElementById("error").innerHTML = "Error: file not found";
        }
    }

    xhr.open("POST", "removeFromCart.php?index=" + index, true);
    xhr.send(null);
}