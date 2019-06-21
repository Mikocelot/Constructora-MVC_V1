Vue.component('barra-navegacion',{

    template: `
    <div class="col-2 bg-dark p-4">
        <div class="nav flex-column nav-pills color_" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <label class="nav-item" data-toggle="pill"  > <img src="icons/skull.png" width="40">{{nom}} Gomez Prieto</label>
        <p class="nav-item" data-toggle="pill" @click="mostrarpanelI" ><img src="icons/house.png" width="40" alt=""> {{inicio}}</p>
        <p class="nav-item" data-toggle="pill" @click="mostrarpanelE" aria-selected="false"> <img src="icons/employee.png" width="40">{{empleados}}</p>
        <p class="nav-item" data-toggle="pill" @click="mostrarpanelM" aria-selected="false"><img src="icons/loader.png" width="40" alt=""> {{materiales}}</p>
        <p class="nav-item" data-toggle="pill" @click="mostrarpanelO" ><img src="icons/plan.png" width="40" alt="">{{obras}} </p>
        <p class="nav-item" data-toggle="pill" @click="mostrarpanelP" ><img src="icons/tool-box.png" width="40" alt="">{{proveedores}}</p>
        </div>
    </div>`,
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
            v.mostrarM = false; 
            v.mostrarO = false;  
            v.mostrarP = false;    
            v.mostrarI = false;  
        },
        mostrarpanelM: function () {
            v.mostrarM = ! v.mostrarM;
            v.mostrarE = false;
            v.mostrarO = false;
            v.mostrarP = false;
            v.mostrarI = false;
        },
        mostrarpanelO: function () {
            v.mostrarO = ! v.mostrarO;   
            v.mostrarM = false; 
            v.mostrarE = false;
            v.mostrarP = false;   
            v.mostrarI = false;     
        },
        mostrarpanelP: function () {
            v.mostrarP = ! v.mostrarP;   
            v.mostrarM = false; 
            v.mostrarE = false; 
            v.mostrarO = false;
            v.mostrarI = false;
        },
        mostrarpanelI: function () {
            v.mostrarI = ! v.mostrarI;   
            v.mostrarM = false; 
            v.mostrarE = false; 
            v.mostrarO = false;
            v.mostrarP = false; 
        }
    }
});

Vue.component('nav-inicio_',{

    template: `
    <div align="center" class="container " >
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <h1 class="">Tiempo</h1>
    </div>
    `

});

Vue.component('nav-obras', {
    template: `

    <div>
    
    <br>
    <div class="container" >
        <button class="btn btn-dark" data-toggle="modal" data-target="#modal-nuevo-material" >Nueva Obra</button>
        <br>
        <br>
        <table class="table">
                <thead>
                  <tr>  
                    <th scope="col">Nombre</th>
                    <th scope="col">Direccion</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Dueño de Obra</th>
                    <th scope="col">Fecha de Inicio</th>
                    <th scope="col">Fecha de Fin</th>
                    <th scope="col">Accion</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Ladrillo</td>
                    <td>Curita</td>
                    <td>1200</td>
                    <td>cubo</td>
                    <td>rojo</td>
                    <td>rojo</td>
                    <td>
                        <button class="btn btn-primary" >E</button>
                        <button class="btn btn-primary" >M</button>
                    </td>
                    
                  </tr>
                  <tr>
                </tbody>
              </table>
      <!-- Modal -->
      <div class="modal fade" id="modal-nuevo-material" tabindex="-1" role="dialog" aria-labelledby="modal-nuevo-material" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Nueva Obra</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body ">
                
                <input type="text"   name="" placeholder="Nombre" id="">
                <input type="text"   name="" placeholder="Direccion" id="">
                <input type="text"   name="" placeholder="Descripcion" id="">
                <input type="text"   name="" placeholder="Dueño de Obra" id="">
                <input type="text"   name="" placeholder="Fecha de Inicio" id="">
                <input type="text"   name="" placeholder="Fecha de Fin" id="">
                
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
        </div>

    
    </div>
    `
});

Vue.component('nav-materiales', {
    template: `
    <div>
    <br>
    <div class="container" >
        <button class="btn btn-dark" >Nuevo Material</button>
        <br>
        <br>
        <table class="table">
                <thead>
                  <tr>  
                    <th scope="col">Nombre</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Unidad de Medida</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Codigo de Barra</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Accion</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Ladrillo</td>
                    <td>Curita</td>
                    <td>1200</td>
                    <td>cubo</td>
                    <td>rojo</td>
                    <td>50.00</td>
                    <td>111111111111111111111</td>
                    <td>fotito</td>
                    <td>
                        <button class="btn btn-primary btn-sm">E</button>
                        <button class="btn btn-primary btn-sm" >M</button>
                    </td>
                    
                  </tr>
                  <tr>
                </tbody>
              </table>
        </div>
        </div>
    
    `
});


// componente de proveedores


Vue.component('nav-proveedor', {
    template: `

    <div align="center">
    <div class="container" >
    <br>
    <button class="btn btn-dark" data-toggle="modal" data-target="#modal-buscar-proveedor" >Buscar Proveedor</button>
    <hr>
    <div class="grid-item form-estilo ">
        <div class="container ">
            <br>
            <form action="">
                <div class="row" >
                    <div class="col" >
                        <input type="text" class="form-control" name="" placeholder="Nombre" id="">
                    </div>
                    <div class="col" >
                        <input type="text" class="form-control" name="" placeholder="Direccion" id="">
                    </div>
                    <div class="col" >
                        <input type="text" class="form-control" name="" placeholder="Telefono" id="">
                    </div>
                </div>
                <br>
                <div class="row" >
                    <div class="col" >
                        <input type="text" class="form-control" name="" placeholder="Correo" id="">
                    </div>
                    <div class="col" >
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="foto" lang="es">
                            <label data-browse="Foto" class="custom-file-label" for="foto">Seleccionar Archivo</label>
                        </div>
                    </div>
                </div>
                <br>
                <button type="button"  class="btn btn-primary">Agregar</button>
            </form>
        </div>
    </div>
    <br>
    <div class="grid-item ">
        <div class="container ">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Direccion</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Accion</th>
                    </tr>
                </thead>
                <tbody>
                    <tr> 
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>Correo</td>
                        <td>Foto</td>
                        <td>
                            <button class="btn btn-dark" >M</button>
                            <button class="btn btn-dark" >E</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                        <td>Correo</td>
                        <td>Foto</td>
                        <td>
                            <button class="btn btn-dark" >M</button>
                            <button class="btn btn-dark" >E</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modal-buscar-proveedor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Busca tu Proveedor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div align="center" class="modal-body">
                    <input type="text" class="form-control" placeholder="Nombre Proveedor">
                    <br>
                    <button type="button" class="btn btn-primary">Buscar</button>
                </div>
            </div>
        </div>
    </div>
</div>
    
    
    </div>
    `
});


// componente de empleados
Vue.component('nav-empleados',{

    template: `

    <div class="container" >
            <div class="row " id="aplicacion" >
                    <div class="grid-container">
                        <div class="grid-item perfil">
                            <div>
                                <img src="icons/skull.png" width="300" alt="">
                                <h1>Nombre Empleado</h1>
                                <h4>Puesto</h4>
                                <hr>
                                <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Obra</th>
                                                <th scope="col">Salario</th>
                                                <th scope="col">Telefono</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr> 
                                                <td>Obra</td>
                                                <td>Salario</td>
                                                <td>Telefono</td>                                
                                            </tr>
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                        <div class="grid-item estilo-formulario ">
                            <div class="container ">
                                <form action="">
                                    <div class="row" >
                                        <div class="grid-item " >
                                            <input type="text" class="form-control" name="" placeholder="nombre" id="">
                                        </div>
                                        <div class="grid-item " >
                                            <input type="text" class="form-control" name="" placeholder="Apellido Paterno" id="">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row" >
                                        <div class="grid-item" >
                                            <input type="text" class="form-control" name="" placeholder="Telefono" id="">
                                        </div>
                                        <div class="grid-item" >
                                                <input type="text" class="form-control" name="" placeholder="Apellido Materno" id="">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row" >
                                        <div class="grid-item" >
                                            <input type="text" class="form-control" name="" placeholder="Puesto" id="">
                                        </div>
                                        <div class="grid-item">
                                            <input type="text" class="form-control" name="" placeholder="Direccion" id="">
                                        </div>
                                    </div>
                                    <br>
                                    
                                    <div class="row">
                                        <div class="grid-item">
                                            <input type="text" class="form-control" name="" placeholder="Correo" id="">
                                        </div>
                                        <div class="grid-item" >
                                            <input type="text" class="form-control" name="" placeholder="Salario" id="">
                                        </div>
                                    </div>
                                    <div class="row" >
                                        <div class="grid-item" >
                                            <button class="btn btn-dark" > QR</button>
                                        </div>
                                        <div class="grid-item" >
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFileLangHTML">
                                                <label class="custom-file-label" for="customFileLangHTML" data-browse="Foto">Foto Empleado</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid-item" >
                                        <select id="sel" class="form-control form-control-xl">
                                            <option>Small select</option>
                                        </select>
                                    </div>
                                    <br>
                                    <button type="button"  class="btn btn-primary">Agregar</button>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="estilo_tabla_em" >
                        <div class="col" >
                                <table class=" table">
                                        <thead>
                                          <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">First</th>
                                            <th scope="col">Last</th>
                                            <th scope="col">Handle</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <th scope="row">1</th>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                          </tr>
                                          <tr>
                                            <th scope="row">2</th>
                                            <td>Jacob</td>
                                            <td>Thornton</td>
                                            <td>@fat</td>
                                          </tr>
                                          <tr>
                                            <th scope="row">3</th>
                                            <td>Larry</td>
                                            <td>the Bird</td>
                                            <td>@twitter</td>
                                          </tr>
                                        </tbody>
                                      </table>
                        </div>
                </div>
    </div>
    
    `
    
});


var v = new Vue({
    el: '#aplicacion',
    data: {
        mostrarE: false,
        mostrarM: false,
        mostrarO: false,
        mostrarP: false,
        mostrarI: true,
        
        tiempo:'Timer',
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
});