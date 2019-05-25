SELECT delito_delincuente.id_delincuente, delincuente.primer_nombre, delincuente.segundo_nombre, delincuente.
primer_apellido, delincuente.segundo_apellido, delincuente.domicilio, delito_delincuente.direccion, delito.delito, comuna.comuna, sector.sector, nacionalidad.nombre, provincia.provincia, region.region, region.region_ordinal, estado_delincuente.codigo,
    estado_delincuente.estado_delincuente

FROM delito_delincuente
    inner join delincuente on delito_delincuente.id_delincuente = delincuente.rut
    inner join delito on delito_delincuente.id_delito = delito.id_delito
    inner join comuna on delito_delincuente.id_comuna = comuna.id_comuna
    inner JOIN sector on comuna.id_sector = sector.id_sector
    inner JOIN nacionalidad on delincuente.id_nacionalidad = nacionalidad.id
    inner join provincia on comuna.id_provincia = provincia.id_provincia
    inner join region on provincia.id_region = region.id_region
    inner join estado_delincuente on delincuente.id_estado_delincuente = estado_delincuente.id_estado_delincuente
    