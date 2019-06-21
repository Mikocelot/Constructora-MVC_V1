Vue.component('empleados', {
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
    `
});





new vue({
    el: '#aplicacion'
});