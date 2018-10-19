
$(document).ready(function() {
    $('.datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: 'datatable/getdata',
        columns: [
            {data: 'action', 
            name: 'action', 
            orderable: false, 
            searchable: false,
            fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
            $(nTd).html("<a href='liquidar/"+oData.id+"'><button type='button' class='btn btn-xs btn-primary'>Configurar</button></a>");
        }
            },
            {data: 'id', 
            name: 'id',
            fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
            $(nTd).html("<a href='liquidar/"+oData.id+"'>"+oData.id+"</a>");
        }
        },
            {data: 'name', name: 'name'},
            {data: 'tipo_documento', name: 'tipo_documento'},
            {data: 'numero_doc', name: 'numero_doc'},
            {data: 'telefono', name: 'telefono'},
            {data: 'email', name: 'email'},
            {data: 'tipo_usuario', name: 'tipo_usuario'},
            {data: 'estado', name: 'estado'},
        ]
    });


    $('.datatable2').DataTable({
        processing: true,
        serverSide: true,
        ajax: 'cliente/getdata',
        columns: [

            {data: 'id', name: 'id'},
            {data: 'created_at', name: 'created_at'},
            {data: 'updated_at', name: 'updated_at'},
            {data: 'nombre', name: 'nombre'},
            {data: 'tipo_doc', name: 'tipo_doc'},
            {data: 'cedula', name: 'cedula'},

        ]
    });


    $('.datatable3').DataTable({
        processing: true,
        serverSide: true,
        ajax: 'servicios/getdata',
        columns: [
            {data: 'id', 
            name: 'id',
            fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
            $(nTd).html("<a href='servicio/"+oData.id+"'>"+oData.id+"</a>");
        }
        },
            {data: 'tipo_servicio', name: 'tipo_servicio'},
            {data: 'departamento', name: 'departamento'},
            {data: 'ciudad', name: 'ciudad'},
            
        ]
    });


    $('#fecha').datepicker({  
      
     }); 

    
  
});
