// dynamic field
const addBtn = document.querySelector(".add");
const input = document.querySelector(".inp-group");

function removeInput() {
    this.parentElement.remove();
}

function addInput() {
    const name = document.createElement("input");
    name.type = "text";
    name.placeholder = "Name of the product";
    name.style.width = "250px";

    const description = document.createElement("input");
    description.type = "text";
    description.placeholder = "Describe your product";

    const quantity = document.createElement("input");
    quantity.type = "number";
    quantity.placeholder = "Quantity (kgs)";
    quantity.style.width = "100px";

    const btn = document.createElement("a");
    btn.className = "delete";
    btn.innerHTML = "&times";

    btn.addEventListener("click", removeInput);

    const flex = document.createElement("div");
    flex.className = "flex";

    flex.appendChild(name);
    flex.appendChild(description);
    flex.appendChild(quantity);
    flex.appendChild(btn);

    input.appendChild(flex);
}

addBtn.addEventListener("click", addInput);

// Submit data to PHP script
const submitBtn = document.getElementById("sub");
submitBtn.addEventListener("click", function () {
    const inputs = document.querySelectorAll(".inp-group .flex");
    const products = [];

    inputs.forEach((input) => {
        const name = input.querySelector('input[placeholder="Name of the product"]').value;
        const description = input.querySelector('input[placeholder="Describe your product"]').value;
        const quantity = input.querySelector('input[placeholder="Quantity (kgs)"]').value;

        if (name && description && quantity) {
            products.push({
                name: name,
                description: description,
                quantity: quantity,
            });
        }
    });

    // Send data to PHP script using AJAX
    const formData = new FormData();
    formData.append("products", JSON.stringify(products));

    fetch("insert.php", {
        method: "POST",
        body: formData,
    })
        .then((response) => response.text())
        .then((data) => {
            alert(data); // Display response message
            if (data === "Data inserted successfully!") {
                // Redirect to login.php if data insertion is successful
                window.location.href = "loginsupermarket.php";
            }
        })
        .catch((error) => {
            console.error("Error:", error);
        });
});
 