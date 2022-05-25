const search = document.querySelector('input[placeholder="search car"]');
const carContainer = document.querySelector(".cars");

search.addEventListener("keyup", function (event) {
    if (event.key === "Enter") {
        event.preventDefault();

        const data = {search: this.value};

        fetch("/search", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(function (response) {
            return response.json();
        }).then(function (cars) {
            carContainer.innerHTML = "";
            loadcars(cars)
        });
    }
});

function loadcars(cars) {
    cars.forEach(car => {
        console.log(car);
        createcar(car);
    });
}

function createcar(car) {
    const template = document.querySelector("#car-template");

    const clone = template.content.cloneNode(true);
    const div = clone.querySelector("div");
    div.id = car.id;
    const image = clone.querySelector("img");
    image.src = `/public/uploads/${car.image}`;
    const title = clone.querySelector("h2");
    title.innerHTML = car.make;
    const description = clone.querySelector("p");
    description.innerHTML = car.model;

    carContainer.appendChild(clone);
}
