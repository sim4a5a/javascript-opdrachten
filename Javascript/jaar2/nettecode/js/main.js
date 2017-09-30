document.getElementById("FullName").addEventListener("click", FullName);


function FullName() {
    var firstname = document.getElementById("firstname").value;
    var lastname = document.getElementById("lastname").value;
    var fullname = getFullName(firstname, lastname);

    document.getElementById("ResultName").innerHTML = fullname;
}

function getFullName(firstname, lastname) {
    var fullname = "Jouw volledige naam is: " + firstname + " " + lastname;
    return fullname;
}
