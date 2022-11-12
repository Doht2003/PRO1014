function activeTab(element) {
    let siblings = element.parentNode.querySelectorAll("button");
    for (let item of siblings) {
        item.children[0].innerHTML = "Inactive";
        item.children[1].classList.add("hidden");
        item.classList.add("text-gray-600");
        item.classList.remove("text-indigo-700");
    }
    element.children[0].innerHTML = "Active";
    element.children[1].classList.remove("hidden");
    element.classList.remove("text-gray-600");
    element.classList.add("text-indigo-700");
}