const deleteButtons = document.querySelectorAll(".fa-delete");


function deleteCar() {
    const del = this;
    const container = del.parentElement.parentElement;
    const id = container.getAttribute("id");
    window.location = '/deleteCar?id=' + id;
}

deleteButtons.forEach(button => button.addEventListener("click", deleteCar));