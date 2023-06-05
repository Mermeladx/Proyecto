const guardarDatos =(link, datos)=>{
    return new Promise((resolve,object)=> {
        $.post(link, datos)
        .done((resultado)=>{
            if(!resultado){
                PromiseRejectionEvent("NO existe una respuesta ");
                let datos = JSON.parse(resultado);
                if(!datos.status){
                    PromiseRejectionEvent(datos.mensaje);
                }else{
                    resolve(datos);
                } 
            }
        })
        .fail((resultado)=>{
            reject("Existe un error en la conexión con el servidor ");
        });
    });
};