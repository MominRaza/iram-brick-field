var uname = document.getElementById('name');
var address = document.getElementById('address');
var work = document.getElementById('work');
var number = document.getElementById('number');
var submit = document.getElementById('submit');

const prams = new URLSearchParams(window.location.search);

if (prams.has('contact')) {
    window.id = prams.get('contact');
    contacts.forEach(element => {
        if (element.id == window.id) {
            window.index = contacts.findIndex((obj => obj.id == window.id));
            // console.log(index);
            uname.value = element.name;
            address.value = element.address;
            work.value = element.work;
            number.value = element.number;
        }
    });
}

submit.addEventListener(
    "click", function () {
        if (uname.value == '' || address.value == '' || work.value == '' || number.value == '') {

        } else {
            if (window.index) {
                contact = {
                    id: window.id,
                    name: uname.value,
                    address: address.value,
                    work: work.value,
                    number: number.value,
                }
                contacts[window.index] = contact;
                window.location.href = "../contact.html?contact=" + window.id;
                // console.log("../contact.html?contact=" + window.id);
            } else {
                contact = {
                    id: 'c' + (new Date()).getTime(),
                    name: uname.value,
                    address: address.value,
                    work: work.value,
                    number: number.value,
                }
                contacts.push(contact);
                window.location.href = "../contacts.html";
                // console.log("../contacts.html");
            }
            // console.log(contacts);
        }
    }
);