//feedback_star
function s1ha(value) {
    var order = document.getElementById("order").innerHTML;
    var ratting_no = 1;
    // alert(ratting_no);
    $.ajax({
        method: "POST",
        url: "ajax/star.php",
        data: { ratting: ratting_no, order_id: order },
        success: function (data) {
            $("#str").html(data);
        }
    });
}

function s2ha(value) {
    var order = document.getElementById("order").innerHTML;
    var ratting_no = 2;
    // alert(ratting_no);
    $.ajax({
        method: "POST",
        url: "ajax/star.php",
        data: { ratting: ratting_no, order_id: order },
        success: function (data) {
            $("#str").html(data);
        }
    });
}

function s3ha(value) {
    var order = document.getElementById("order").innerHTML;
    var ratting_no = 3;
    // alert(ratting_no);
    $.ajax({
        method: "POST",
        url: "ajax/star.php",
        data: { ratting: ratting_no, order_id: order },
        success: function (data) {
            $("#str").html(data);
        }
    });
}

function s4ha(value) {
    var order = document.getElementById("order").innerHTML;
    var ratting_no = 4;
    //alert(ratting_no);
    $.ajax({
        method: "POST",
        url: "ajax/star.php",
        data: { ratting: ratting_no, order_id: order },
        success: function (data) {
            $("#str").html(data);
        }
    });
}

function s5ha(value) {
    var order = document.getElementById("order").innerHTML;
    var ratting_no = 5;
    //alert(ratting_no);
    $.ajax({
        method: "POST",
        url: "ajax/star.php",
        data: { ratting: ratting_no, order_id: order },
        success: function (data) {
            $("#str").html(data);
        }
    });
}

//feedback_submit
function feedback_submit() {
    var order = document.getElementById("order").innerHTML;
    let text = document.getElementById("feedback_area").value;
    if(text){
        document.getElementById("thank").innerHTML="Thanks for feedback";
        //alert(text);
        $.ajax({
        method: "POST",
         url: "ajax/text.php",
         data: { feedback_text: text, order_id: order }
        });
    }
    
}

