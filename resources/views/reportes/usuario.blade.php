<div class="d-flex justify-content-end mb-3">
    <form action="{{ route('reporte.usuario.pdf') }}" method="GET" target="_blank">
        <input type="hidden" name="desde" value="{{ $desde }}">
        <input type="hidden" name="hasta" value="{{ $hasta }}">
        <button type="submit" class="btn btn-danger">
            <i class="fas fa-file-pdf"></i> Descargar PDF
        </button>
    </form>
</div>
