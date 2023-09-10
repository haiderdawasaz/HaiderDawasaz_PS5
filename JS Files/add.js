const products = [];

function addProduct(){
    let name = document.getElementById('name');
    let quantity = document.getElementById('quantity');
    let price = document.getElementById('price');
    const productDetails = {
        name: name,
        quantity: quantity,
        price: price
    };

    fetch("../PHP Files/addProd.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
      },
        body: JSON.stringify(productDetails)
    })
    .then(response => response.text())
    .then(data => {
        console.log(data); // Display the response from the server
    })
    .catch(error => {
        console.error("Error:", error);
    });
}