# migrate-bootstrap4-to-bootstrap5

# Uso

```bash
php migrate.php MyPlugin/
```


# input-group
Hay que eliminar el wrapper `<span class="input-group-append">***</div>` y `<span class="input-group-prepend">***</div>` (span o div)

Antes:
```html
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">@</span>
  </div>
  <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
</div>
```

Después:
```html
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">@</span>
  <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
</div>
```

# btn-block

Hay que eliminar la clase `btn-block` y agregar `d-grid` al div padre

Antes:
```html
<div class="mb-3">
    <button type="button" class="btn btn-primary btn-lg btn-block">Block level button</button>
    <button type="button" class="btn btn-secondary btn-lg btn-block">Block level button</button>
</div>
```

Después:
```html
<div class="mb-3 d-grid">
    <button type="button" class="btn btn-primary btn-lg">Block level button</button>
    <button type="button" class="btn btn-secondary btn-lg">Block level button</button>
</div>
```

# input select
hay que cambiar la clase `form-control` por `form-select` en los inputs select.

Antes:
```html
<select class="form-control">
  <option>Large select</option>
</select>
```

Después:
```html
<select class="form-select">
  <option>Large select</option>
</select>
```

# boton cerrar de los modales

hay que cambiar la clase `close` por `btn-close` y eliminar el `<span aria-hidden="true">&times;</span>`

Antes:
```html
<div class="modal-header">
  <h5 class="modal-title">Modal title</h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
```

Después:
```html
<div class="modal-header">
  <h5 class="modal-title">Modal title</h5>
  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
```
