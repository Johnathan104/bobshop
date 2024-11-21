$(document).ready(function () {
    $("#add_button").click(()=>{
        $("#addSection").show();
        $("#updateSection").hide();
        console.log( $("#updateSection").html())
    })
    $("#update_button").click(()=>{
        $("#addSection").hide();
        $("#updateSection").show();
        console.log( $("#addSection").html())

    })
    // for choosing 
    $("#gejala_select").change(function () { 
        $.ajax({
            type: "GET",
            url: "./backend/getGejala.php",
            data: {
                id: $("#gejala_select").val()
            },
            
            success: function (response) {
                response= JSON.parse(response)
                $("#update_gejala_nama").val(response.nama_gejala)
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                console.log(errorThrown)
             }
            
        });
    });

    $("#masalah_select").change(function () { 
        $.ajax({
            type: "GET",
            url: "./backend/getMasalah.php",
            data: {
                id: $("#masalah_select").val()
            },
            
            success: function (response) {
                response= JSON.parse(response)
                $("#update_masalah_nama").val(response.nama_masalah)
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                console.log(errorThrown)
             }
            
        });
    });
    $("#rule_select").change(function () { 
        $.ajax({
            type: "GET",
            url: "./backend/getRules.php",
            data: {
                id: $("#rule_select").val()
            },
            
            success: function (response) {
                response= JSON.parse(response)
                console.log(response)
                $("#update_rule_nama").val(response.gejala_conditions)
                $("#update_rule_masalah").val(response.masalah_id)
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                console.log(errorThrown)
             }
            
        });
    });
});