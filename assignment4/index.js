
var report = function (celsius, fahrenheit) {
    "use strict";
    document.getElementById("result").innerHTML =
        celsius + " mile(s) = " + fahrenheit + "Kilometer";
};

document.getElementById("m_to_km").onclick = function () {
    "use strict";
    var f = document.getElementById("temperature").value;
    report(f  / 1.609, f);
};

document.getElementById("km_to_m").onclick = function () {
    "use strict";
    var c = document.getElementById("temperature").value;
    report(c, 1.609 * c);
};