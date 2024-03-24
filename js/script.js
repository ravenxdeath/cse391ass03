// radio mechanic func

function showMechanicType() {
    var userType = document.getElementById("usertype").value;
    var mechanicTypeDiv = document.getElementById("mechanicType");
    
    if (userType === "mechanic") {
        mechanicTypeDiv.style.display = "block";
    } else {
        mechanicTypeDiv.style.display = "none";
    }
}


// back to top button (Take me to heaven)


document.addEventListener('DOMContentLoaded', function () {
    var backToTopBtn = document.getElementById('backToTopBtn');

    window.addEventListener('scroll', function () {
        if (document.body.scrollTop > 60 || document.documentElement.scrollTop > 20) {
            backToTopBtn.style.display = 'block';
        } else {
            backToTopBtn.style.display = 'none';
        }
    });

    backToTopBtn.addEventListener('click', function () {
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE, and Opera
    });
});