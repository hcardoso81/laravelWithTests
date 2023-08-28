<div>
    <p>{{ $paramValue }}</p>
    <h1 class="text-center text-xl font-semibold mb-3">Eventos, Modal, SweetAlert</h1>
    <button type="button" wire:click='$emitTo("modal-bootstrap","display-modal")' class="btn btn-info mb-3">mostrar
        Modal
        Bootstrap</button>
    <form wire:submit.prevent='save'>
        <label>Nombre</label>
        <input wire:model='name' class="form-control">
        <label class="mt-3">Email</label>
        <input wire:model='email' class="form-control mb-3">
        <button type="button" wire:click='$emit("showAlertSweet")' class="btn btn-primary m">Guardar y desplegar
            alertSweet</button>
        <button type="submit" class="btn btn-primary m">Submit</button>
        <button type="button" wire:click='$emit("resetForm", "paramSendValue")' class="btn btn-danger">Limpiar
            Formulario</button>
    </form>
    <livewire:modal-bootstrap />
</div>
@push('scripts')
<script>
    Livewire.on('success', ()=> {
        alert("Alerta enviada desde el el metodo")
    } )

    window.addEventListener('swal-sucess', event => {
    Swal.fire({
            icon: event.detail.icon,
            title: event.detail.title,

        })
    })

    window.addEventListener('swal-error', event => {
        Swal.fire({
        icon: event.detail.icon,
        title: event.detail.title,
        
        })
        })
</script>

@endpush