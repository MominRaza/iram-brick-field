var contactsHtml = document.getElementById('contacts');
var searchBox = document.getElementById('search');

const prams = new URLSearchParams(window.location.search);
newContacts = contacts;

if (prams.has('work')) {
    const wk = prams.get('work');
    if (wk == '') {
    } else {
        var filter = document.getElementById('work' + wk);
        filter.checked = true;
        newContacts = [];
        contacts.forEach(element => {
            if (element.work == wk) {
                newContacts.push(element);
            }
        });
    }
}
if (prams.has('search')) {
    window.sq = prams.get('search');
    searchBox.value = window.sq;
    for (let index = 0; index < newContacts.length; index++) {
        if (newContacts[index].name.search(new RegExp(window.sq, 'i')) < 0) {
        } else {
            contactsHtml.innerHTML += "<li><a  href='./contact.html?contact="
                + newContacts[index].id + "'><p class='name'>"
                + newContacts[index].name + "</p><p class='address'>"
                + newContacts[index].address + "</p><p class='work'>"
                + newContacts[index].work + "</p><p class='number'>"
                + newContacts[index].number + "</p></a></li>";
        }
    }
    if (!contactsHtml.innerHTML) {
        contactsHtml.innerHTML = "no contact found";
    }
} else {
    for (let index = 0; index < newContacts.length; index++) {
        contactsHtml.innerHTML += "<li><a  href='./contact.html?contact="
            + newContacts[index].id + "'><p class='name'>"
            + newContacts[index].name + "</p><p class='address'>"
            + newContacts[index].address + "</p><p class='work'>"
            + newContacts[index].work + "</p><p class='number'>"
            + newContacts[index].number + "</p></a></li>";
    }
}
function filterClicked(wkid) {
    if (!wkid) { wkid = '' }
    if (!window.sq) { window.sq = '' }
    window.location.href = "../contacts.html?search=" + window.sq + "&work=" + wkid;
}