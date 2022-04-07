$("#m1").keyup(function () { 
    var m1=$("#m1").val();
    if(m1 == "")
    {
        m1=0;
    }
    if(parseFloat(m1)>=6)
    {
    $(".form-m1").html("Enter Maximum 5 Mark !!");
    }
    else
    {
    $(".form-m1").html(""); 
    }
});
$("#m2").keyup(function () { 
    var m2=$("#m2").val();
    if(m1 == "")
    {
        m1=0;
    }
    if(parseFloat(m2)>=6)
    {
    $(".form-m2").html("Enter Maximum 5 Mark !!");
    }
    else
    {
    $(".form-m2").html(""); 
    }
});