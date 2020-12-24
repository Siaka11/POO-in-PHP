

// window.onload = () => {
//     let buttons = document.querySelectorAll(".form-check-input")

//     for (let button of buttons) {
//         button.addEventListener("click", activer)
//     }
// }

// function activer() {
//     let xml = new XMLHttpRequest();
//     xml.open('GET', '/admin/activer/' + this.dataset.id)
//     xml.send()
// }


window.onload = () => {
    let updates = document.querySelectorAll(".pull-left")
    for (let update of updates) {
        update.addEventListener("click", updater)
    }

}

function updater() {
    let xmlUpdate = new XMLHttpRequest();
    xmlUpdate.open('GET', '/admin/modifier/' + this.dataset.id)
    xmlUpdate.send()
}

