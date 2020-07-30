<h1>Nueva Clasificación de Proyecto</h1>

<form action="<?= base_url ?>?controller=tipo&action=save" method="POST">

    <label for="tipo_proyecto">Tipo de Proyecto</label>
    <input type="text" name="tipo_proyecto" required/>

    <input type="submit" value="Guardar" />
</form>