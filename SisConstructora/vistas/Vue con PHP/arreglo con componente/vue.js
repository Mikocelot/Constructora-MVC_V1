Vue.component('componente-lista',{ // el componente nuevo en HTML como un body o input

    template: '#template-tarea', // en el creamos la estructura del componente en HTML
    data: function () {
        return {
            edit_tarea: null,
            newHomework: null,
        }
    },
    props: ['tareas-a'], // le pasa al template los datos , es un atributo como id o class para nuestro componente
    methods: {
        agrega: function (tareaP) {
            // console.info(tareaP);
            this.tareasA.unshift({
                titulo: tareaP, estado: false
            });
            this.newHomework ='';
        },
        eliminar: function (indice) {
            this.tareasA.splice(indice,1);
        },
        editar: function (tareaP) {
            console.log(tareaP);
        },
    }
});

 new Vue ({
    el: '#tareas_',
    data: {        
        tareasA: [
            {titulo: 'Sacar Basura', estado: false},
            {titulo: 'Buscar Pescado', estado: true},
            {titulo: 'Limpiar Cuarto', estado: false},
            {titulo: 'Estudiar Biologia', estado: false},
            {titulo: 'Editar Fotos', estado: false},
        ]
    }
});