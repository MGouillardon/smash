const listItems = document.getElementsByClassName('list_option');
for (let i = 0; i < listItems.length; i += 1) {
    listItems[i].addEventListener('click', () => {
        document.getElementsByClassName('list_btn')[0].innerHTML =
            listItems[i].title;
    });
}
