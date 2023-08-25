$("#state").on("change", function(event) {
    $("#town").empty();
    $.get("towns/" + event.target.value + "", function(response, state) {

        console.log(response);
    });

});