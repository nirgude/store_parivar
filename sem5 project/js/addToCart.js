const productArray = document.querySelectorAll(".swiper-slide")
productArray.forEach(product => {
    const name = product.querySelector("h3").innerText;
    const price = product.querySelector(".price").innerText.split("₹")[1];
    const addToCart = product.querySelector("a");
    addToCart.addEventListener("click", e => {
        // const data = new FormData();
        // data.append("Item_Name", name);
        // data.append("Price", price);
        // fetch("http://localhost/miniProject/sem5%20project/manage_cart.php", {
        //     method: "POST",
        //     body: data
        // }).then(response => {
        //         if(response.status === 200){
        //             alert("Added to manage_cart");
        //         }
        // }).catch(err => console.log(err));
        const form  = document.createElement("form");
        form.method = "POST";
        form.action = "http://localhost/miniProject/sem5%20project/manage_cart.php";
        const ipName = document.createElement("input");
        ipName.name = "Item_Name";
        ipName.value = name;
        form.appendChild(ipName);
        const ipPrice = document.createElement("input");
        ipPrice.name = "Price";
        ipPrice.value = price
        form.appendChild(ipPrice);
        const ipSubmit = document.createElement("input");
        ipSubmit.type = "submit";
        ipSubmit.name = "Add_To_Cart";
        ipSubmit.value = "Add To Cart";
        form.appendChild(ipSubmit);
        document.querySelector("body").appendChild(form);
        ipSubmit.click();

    });
    console.log(name, price);
})