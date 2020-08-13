$(document).ready(function(){
    TableNotes = $("#tableNotes").DataTable({
        "columnDefs":[{
            "targets":-1,
            "data":null,
            "defaultContent":"<button type='button' class='btnEdit btn btn-success' data-toggle='modal' data-target='#exampleModal' >Update <i class='fas fa-pen'></i></button><button type='submit' class='btnDelete btn btn-danger' >Delete <i class='far fa-trash-alt'></i></button>"
        }]
    });

    var rowtablenote;

    $(document).on("click", "#new", function(){
        id="";
        name="";
        description="";
        $("#noteName").val(name);
        $("#noteDescription").val(description);
        option=1;
    });
    $(document).on("click", ".btnEdit", function(){
        rowtablenote=$(this).closest("tr");
        id=parseInt(rowtablenote.find('td:eq(0)').text());
        name=rowtablenote.find('td:eq(1)').text();
        description=rowtablenote.find('td:eq(2)').text();
        $("#noteName").val(name);
        $("#noteDescription").val(description);
        option=2;
    });
    $(document).on("click", ".btnDelete", function(){
        rowtablenote=$(this);
        id=parseInt($(this).closest('tr').find('td:eq(0)').text());
        option=3;
        $.ajax({
            url:"./crud.php",
            type:"POST",
            dataType:"json",
            data: {option:option, id:id},
            success:function(data){
                console.log('SUCCESS: DELETE');
                console.log(data);
                TableNotes.row(rowtablenote.parents('tr')).remove().draw();
            },
            error(x,y,z){
                console.log(x);
                console.log(y);
                console.log(z);
            }
        })
        
    });
    $("#formNotes").submit(function(e){
        e.preventDefault();
        name=$.trim($("#noteName").val());
        description=$.trim($("#noteDescription").val());
        $.ajax({
            url:"./crud.php",
            type:"POST",
            dataType:"json",
            data: {name:name, description:description, id:id, option:option},
            success:function(data){
                console.log('SUCCESS: DELETE');
                console.log(data);
                id=data[0].id;
                if(option == 1){
                    TableNotes.row.add([id, name, description]).draw();
                }
                else{
                    TableNotes.row(rowtablenote).data([id, name, description]).draw();
                }
                $("#exampleModal").modal('hide');
            },
            error(x,y,z){
                console.log(x);
                console.log(y);
                console.log(z);
            }
        });
        
    });
});


