Vue.component('barra-navegacion',{

    template: `
    <div class="col-3 bg-dark p-4">
        <div class="nav flex-column nav-pills color_" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <label class="nav-item espacio" data-toggle="pill" role="tab" aria-controls="v-pills-home" aria-selected="true"> <img src="icons/skull.png" width="60">  {{nom}} Gomez Prieto</label>
        <p class="nav-item espacio" id="v-pills-profile-tab" data-toggle="pill" href="" role="tab" aria-controls="v-pills-profile" aria-selected="false"><img src="icons/house.png" width="60" alt=""> {{inicio}}</p>
        <p class="nav-item espacio" id="v-pills-messages-tab" data-toggle="pill" @click="mostrarpanelE" role="tab" aria-controls="v-pills-messages" aria-selected="false"> <img src="icons/employee.png" width="60">   {{empleados}}</p>
        <p class="nav-item espacio" id="v-pills-settings-tab" data-toggle="pill" href="#" role="tab" aria-controls="v-pills-settings" aria-selected="false"><img src="icons/loader.png" width="60" alt="">   {{materiales}}</p>
        <p class="nav-item espacio" id="v-pills-settings-tab" data-toggle="pill" href="" role="tab" aria-controls="v-pills-settings" aria-selected="false"><img src="icons/plan.png" width="60" alt="">   {{obras}} </p>
        <p class="nav-item espacio" id="v-pills-settings-tab" data-toggle="pill" href="" role="tab" aria-controls="v-pills-settings" aria-selected="false"><img src="icons/tool-box.png" width="60" alt="">   {{proveedores}}</p>
        </div>
    </div>`,

    // mounted: function () {
    //     this.datosMenu();
    // },
    data: function () {
        return {
           
            inicio: 'Inicio',
            empleados: 'Empleados',
            materiales: 'Materiales',
            obras: 'Obras',
            proveedores: 'Proveedores'
        }
    },
    methods: {
        lol: function (){
            alert("asdsadsadda");
        },
        mostrarpanelE: function () {
            v.mostrarE = ! v.mostrarE;
        }
    }
});


// componente de empleados

Vue.component('nav-empleados',{

    template: `
    <div class="grid-container">
    <div class="grid-item">
        <div>
            <img src="icons/skull.png" width="300" alt="">
            <h1>Nombre Empleado</h1>
            <h4>Puesto</h4>
            <table>
                <tr>Obra</tr>
                <tr>Salario</tr>
                <tr>Telefono</tr>
            </table>
        </div>
    </div>
    <div class="grid-item form-estilo ">
        <div class="container ">
            <form action="">
                <div class="row" >
                    <div class="grid-item " >
                        <input type="text" class="form-control" name="" placeholder="nombre" id="">
                    </div>
                    <div class="grid-item " >
                        <input type="text" class="form-control" name="" placeholder="Apellido Paterno" id="">
                    </div>
                    <div class="grid-item" >
                        <input type="text" class="form-control" name="" placeholder="Apellido Materno" id="">
                    </div>
                </div>
                <br>
                <div class="row" >
                    <div class="grid-item" >
                        <input type="text" class="form-control" name="" placeholder="Telefono" id="">
                    </div>
                    <div class="grid-item" >
                        <input type="text" class="form-control" name="" placeholder="Puesto" id="">
                    </div>
                    <div class="grid-item" >
                        <input type="text" class="form-control" name="" placeholder="Salario" id="">
                    </div>
                </div>
                <br>
                <div class="row" >
                    <div class="grid-item">
                        <input type="text" class="form-control" name="" placeholder="Direccion" id="">
                    </div>
                    <div class="grid-item"> 
                        <input type="text" class="form-control" name="" placeholder="Correo" id="">
                    </div>
                    <div class="grid-item" >
                        
                        <select id="sel" class="form-control form-control-sm">
                            <option>Small select</option>
                        </select>
                        
                        <label for="sel"> obra</label>
                        
                    </div>
                </div>

                <div class="grid-item" >
                        <div class="input-group mb-3">
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Example file input</label>
                                <input type="file" class="form-control-file" id="exampleFormControlFile1">
                            </div>
                        </div>
                    </div>
                    <button type="button"  class="btn btn-primary">Agregar</button>
            </form>
        </div>
    </div>
</div>

<div align="center" class="container" >
<table>
    <th>Nombre</th>
    <th>Apellido Paterno</th>
    <th>Apellido Materno</th>
    <th>Telefono</th>
    <th>Direccion</th>
    <th>Salario</th>
    <th>Puesto</th>
</table>
</div>

`,

    // mounted: function () {
    //     this.datosMenu();
    // },
    data: function () {
        return {
            
            inicio: 'Inicio',
            empleados: 'Empleados',
            materiales: 'Materiales',
            obras: 'Obras',
            proveedores: 'Proveedores'
        }
    },
    methods: {
        lol: function (){
            alert("asdsadsadda");
        },

    }
});


var v = new Vue({
    el: '#aplicacion',
    data: {
        mostrarE: false,
        
        tiempo:'sdasdasdas',
        nom: '',
        con: ''

    },
    methods: {
        primfecha: function () {
            var timer = new Date();
            var m = timer.getMonth();
            var y = timer.getYear();
            var d = timer.getDate();
            var fecha = d+" - "+(m+1)+" - "+y;
            this.tiempo = fecha;
        },
        
    },
    computed: {

        mostrarboton : function () {
            return this.nom && this.con;
        }
    }
    
    // data: {
    //     mensaje: 'Hora...',
    //     nom: 'Pedro',
    //     administrador : [
    //         {
    //             nombre: 'Eduardo', apellidos: ''
    //         }
    //     ],
    // }
});