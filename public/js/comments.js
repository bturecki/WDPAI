const commentButtons = document.querySelectorAll(".fa-comment");


function giveComment() {
    const comments = this;
    const container = comments.parentElement.parentElement;
    const id = container.getAttribute("id");
    window.location = '/commentCar?id=' + id;
}

commentButtons.forEach(button => button.addEventListener("click", giveComment));