var contactHtml = document.getElementById('contact');
var editContact = document.getElementById('editContact');

const prams = new URLSearchParams(window.location.search);

if (prams.has('contact')) {
    const id = prams.get('contact');
    contacts.forEach(element => {
        if (element.id == id) {
            contactHtml.innerHTML =
                "<p class='name'>" + element.name +
                "</p><p class='address'>" + element.address +
                "</p><p class='work'>" + element.work +
                "</p><p class='number'>" + element.number +
                "</p><a href='./acount.html?contact=" + element.id +
                "'>Acount</a>";
            editContact.href = './add-contact.html?contact=' + element.id;
        }
    });
} else {
    window.location.href = '../contacts.html';
}